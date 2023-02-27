import json

from fastapi import HTTPException


def add_major(state, event):
    data = json.loads(event.data)

    if data['major'] in {'CNPM', 'MMT', 'TTNT', 'ANM', 'HTTT'}:
        return {
            'id': event.registration_id,
            'student_id': data['student_id'],
            'name': data['name'],
            'class_name': data['class_name'],
            'major': data['major'],
            'status': 'ready'
        }

    raise HTTPException(status_code=400, detail="Major must be in {'CNPM', 'MMT', 'TTNT', 'ANM', 'HTTT'}")


def start_registration(state, event):
    if state['status'] != 'ready':
        raise HTTPException(status_code=400, detail="Registration not started")
    return state | {'status': 'completed'}


SUBSCRIBER = {
    'ADD_MAJOR': add_major,
    'START_REGISTRATION': start_registration
}
