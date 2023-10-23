# Human Resources Management API

## Description

The Human Resources Management API is a comprehensive Laravel-based solution designed to streamline human resources processes within your organization. This API offers a versatile set of features to efficiently manage HR-related tasks, enabling you to enhance productivity and organization-wide communication, this API utilizes Laravel Sanctum for authentification.

## Features

### User Management

Effortlessly create, update, and delete user profiles. Define user roles and permissions for fine-grained access control within your HR system. Secure user authentication mechanisms ensure data privacy.

### Vacation Management

Track and manage employee vacations with ease. Approve or reject vacation requests promptly, maintaining a transparent record of employee leave history.

### Announcement Management

Communicate with your organization effectively by creating and broadcasting announcements. Categorize announcements for easy reference and maintain a history of past announcements.

### Meeting Management

Coordinate meetings seamlessly within your HR department. Schedule and manage meetings, invite participants, and maintain meeting agendas and minutes for productive collaboration.

### Candidate Management

Simplify the candidate management process. Track job candidates, accept or reject them, and even send email notifications to applicants, ensuring a professional and efficient hiring process.

### To-do-items list Management

Efficiently organize and manage your tasks with our to-do list management feature. Keep track of your to-do items, set priorities, and stay organized with ease.

## API Endpoints

**User Authentication**

- `POST /api/login`: Authenticate a user.
- `GET /api/logout`: Log out a user.
- `GET /api/me`: Get the authenticated user's information.

**User Management**

- `GET /api/users`: List all users.
- `POST /api/users`: Create a new user.
- `GET /api/users/{id}`: View user details.
- `PUT /api/users/{id}`: Update user information.
- `DELETE /api/users/{id}`: Delete a user.

**Vacation Management**

- `GET /api/vaccations`: List all vacation requests.
- `POST /api/vaccations`: Create a new vacation request.
- `GET /api/vaccations/{id}`: View a specific vacation request.
- `PUT /api/vaccations/{id}`: Update a vacation request.
- `DELETE /api/vaccations/{id}`: Delete a vacation request.

**Announcement Management**

- `GET /api/announcements`: List all announcements.
- `POST /api/announcements`: Create a new announcement.
- `PUT /api/announcements/{id}`: Update an announcement.
- `DELETE /api/announcements/{id}`: Delete an announcement.

**Meeting Management**

- `GET /api/meetings`: List all meetings.
- `POST /api/meetings`: Schedule a new meeting.
- `PUT /api/meetings/{id}`: Update a meeting.
- `DELETE /api/meetings/{id}`: Delete a meeting.

**User Password Management**

- `POST /api/users/change-password/{id}`: Change a user's password.

**Candidate Management**

- `GET /api/candidats`: List all candidates.
- `GET /api/candidats/cv`: Get a candidate's CV.

**Send Email to Candidate**

- `POST /api/candidats/send-email`: Send an email to a candidate.

**To-Do Item Management**

- `GET /api/to-do-items`: List all to-do items.
- `POST /api/to-do-items`: Create a new to-do item.

# Requirements and Docker Installation

Before running your Dockerized Laravel HR Management API, ensure that you have the following requirements in place:

## Requirements

- **Docker**: Docker is a containerization platform that allows you to package and run applications in isolated environments. It's an essential component for running this Dockerized application.

## Docker Installation

If you haven't already installed Docker, follow these steps to set it up on your system:

### On Linux

1. Open a terminal.

2. Update your package repository to the latest packages:

```
sudo apt update
```

3. Insatll docker

```
sudo apt install -y docker.io
```

4. Insatll docker

```
 sudo apt install -y docker.io
```

5. Verify the installation by running the following command

```
 docker --version
```

## Add mysql volume file

You need to create a volume file for the MySQL container. To do this, run the following command:

```
 mkdir mysql
```

# Running the application

1. To run the application, all you need to do is run the Docker Compose command in the cloned repository folder on your host.

```
 docker-compose up -d
```
