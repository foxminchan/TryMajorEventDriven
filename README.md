# MajorAPI

MajorAPI is a RESTful API built using the FastAPI framework in Python and PHP. It leverages the benefits of event-driven architecture to provide a high-performance and scalable solution for building APIs.

## Features:

- FastAPI and PHP frameworks for building high-performance APIs
- Event-driven architecture for scalability and high availability
- RESTful API endpoints for handling requests and responses

## Requirements

- Python 3.11 or higher
- PHP 8.0 or higher
- pip package manager
- Docker and Docker Compose (optional)

## Installation

1. Clone the repository to your local machine using the command

```bash
git clone https://github.com/foxminchan/MajorAPI.git
```

2. Install the required dependencies using the command:

```bash
pip install -r requirements.txt
```

3. Start the API server using the command:
```bash
uvicorn main:app --reload
```

## Endpoints
The following endpoints are available in the API:

- `/major` - Add major.
- `/major/{pk}` - Get major state.
- `/event` - Submit event

## Event-driven architecture:

The MajorAPI is built using an event-driven architecture to provide a scalable and high-performance solution for building APIs. The API server communicates with other services using events, which are asynchronous messages sent between services. This allows for the processing of large numbers of requests concurrently, while maintaining high availability and fault tolerance.

<div align="center">
<img src="https://user-images.githubusercontent.com/56079798/221529836-f95f60c6-5ffe-4ec6-b7e4-6e173ab5c421.png" alt="event driven" />
</div>

## Conclusion:

The MajorAPI with FastAPI and PHP provides a high-performance and scalable solution for building RESTful APIs. Its event-driven architecture ensures high availability and fault tolerance, making it suitable for use in production environments.
