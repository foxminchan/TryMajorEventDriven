from fastapi import FastAPI, Request
from fastapi.middleware.cors import CORSMiddleware
from redis_om import get_redis_connection, HashModel
import json
import subscriber

app = FastAPI()

app.add_middleware(
    CORSMiddleware,
    allow_origins=["http://localhost:3000"],
    allow_methods=["*"],
    allow_headers=["*"]
)

redis = get_redis_connection(
    host='localhost',
    port=6379,
    password=None,
    decode_responses=True
)


class Major(HashModel):
    student_id: str = ''
    name: str = ''
    class_name: str = ''
    major: str = ''

    class Meta:
        database = redis


class Event(HashModel):
    registration_id: str = ''
    type: str
    data: str

    class Meta:
        database = redis


@app.get("/major/{pk}")
async def get_state(pk: str):
    state = redis.get(f'major:{pk}')
    if state:
        return json.loads(state)
    return build_state(pk)


def build_state(pk: str):
    pks = Event.all_pks()
    all_events = [Event.get(pk) for pk in pks]
    events = [event for event in all_events if event.registration_id == pk]
    state = {}

    for event in events:
        state = subscriber.SUBSCRIBER[event.type](state, event)

    redis.set(f'major:{pk}', json.dumps(state))
    return state


@app.post("/major")
async def add_major(request: Request):
    body = await request.json()
    major = Major(student_id=body['data']["student_id"],
                  name=body['data']["name"],
                  class_name=body['data']["class_name"],
                  major=body['data']["major"]).save()
    event = Event(
        registration_id=major.pk,
        type=body['type'],
        data=json.dumps(body['data'])).save()
    state = subscriber.SUBSCRIBER[event.type]({}, event)
    redis.set(f'major:{major.pk}', json.dumps(state))
    return state


@app.post("/event")
async def dispatch(request: Request):
    body = await request.json()
    registration_id = body['registration_id']
    event = Event(registration_id=registration_id,
                  type=body['type'],
                  data=json.dumps(body['data'])).save()
    state = await get_state(registration_id)
    new_state = subscriber.SUBSCRIBER[event.type](state, event)
    redis.set(f'major:{registration_id}', json.dumps(new_state))
    return new_state
