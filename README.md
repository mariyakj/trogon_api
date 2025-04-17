# Project Management API

This is a Laravel-based API for managing projects and tasks. It supports JWT token authentication, project management, task management, and daily task remarks.

## Features

- **User Management**
  - Register and log in using email and password.
  - JWT Token Authentication for API security.

- **Project Management**
  - Users can create, update, and delete projects.
  - Each project is private to the user who created it.

- **Task Management**
  - Users can create tasks under their projects.
  - Users can update the task’s status (e.g., Pending, In Progress, Completed).
  - Users can add remarks for each task every day.

- **Task Reports**
  - Users can fetch project reports showing:
    - Task details
    - Status history
    - Daily remarks

## API Documentation

### Authentication

**POST** `/api/login`
- Login with email and password, return JWT token.

**POST** `/api/register`
- Register a new user with email and password.

### Project Management

**GET** `/api/projects`
- Retrieve a list of projects created by the user.

**POST** `/api/projects`
- Create a new project.

**PUT** `/api/projects/{id}`
- Update project details.

**DELETE** `/api/projects/{id}`
- Delete a project.

### Task Management

**GET** `/api/projects/{projectId}/tasks`
- Retrieve a list of tasks for a specific project.

**POST** `/api/projects/{projectId}/tasks`
- Create a new task under the project.

**PUT** `/api/tasks/{taskId}`
- Update a task's status or details.

**POST** `/api/tasks/{taskId}/remarks`
- Add a remark for a task.

### Task Reports

**GET** `/api/projects/{projectId}/reports`
- Fetch a report for a project with task details, status history, and daily remarks.



2)Install Dependencies

composer install

3)Set Up Environment

APP_NAME=Laravel
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_db_username
DB_PASSWORD=your_db_password


4) Generate App Keys

php artisan key:generate
php artisan jwt:secret


5) Run Migrations

php artisan migrate


6) Start the Server

php artisan serve


The API will be available at http://127.0.0.1:8000

