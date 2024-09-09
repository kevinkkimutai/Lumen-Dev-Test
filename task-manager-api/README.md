# Lumen PHP Framework

This is a simple RESTful API for managing tasks, built using the Lumen micro-framework. The API allows users to perform basic CRUD operations (Create, Read, Update, Delete) on tasks and includes additional features such as task filtering, pagination, and search functionality.

## Features
<b>Create a Task</b>: Add new tasks with a title, description, status, and due date.

<b>Get All Tasks:</b> Retrieve a list of all tasks with optional filters and pagination.

<b>Get a Specific Task:</b> Retrieve detailed information about a single task by its ID.

<b>Update a Task:</b> Modify an existing task's information.

<b>Delete a Task:</b> Remove a task from the system.

- ## Bonus Features:
     - Filter tasks by status and due date.
     - Paginate task listings.
     - Search tasks by title.

## Technologies Used
* <b>Lumen</b> - A lightweight PHP micro-framework

* <b>PostgreSQL</b> - Database for storing tasks

## Requirements
* PHP >= 7.3

* Composer

* PostgreSQL

# Getting Started
<b> 1. Clone the Repository</b>
```bash
git clone git@github.com:kevinkkimutai/Lumen-Dev-Test.git
cd task-management-api
```
<b>2. Install Dependencies</b>

Use Composer to install the required dependencies:
```bash
composer install
```
<b>3. Configure Environment Variables</b>

Create a copy of the .env.example file and rename it to .env:
```bash
cp .env.example .env
```

Edit the .env file to set your database connection details and any other necessary configuration: 

👉 This is my temporary DB expires in 30 days
```env
DB_CONNECTION=pgsql
DB_HOST=dpg-crfajr3qf0us738i0jr0-a.singapore-postgres.render.com
DB_PORT=5432
DB_DATABASE=tasks_m6t3
DB_USERNAME=kelvin
DB_PASSWORD=oVL4NgJxCrRAeUGFu5GNu2NSG8U2zY0x
```

<b>4. Run Database Migrations</b>

Migrate the database to create the necessary tables:

```bash
php artisan migrate
```
<b>5. Start the Server</b>

You can now start the development server:
```bash
php -S localhost:8000 -t public
```
<b>6. Testing the API</b>

Use tools like Postman, thunderClient or curl to test the endpoints. Here are a few examples:

* <b> Create a Task</b>
```bash
POST /tasks
Content-Type: application/json

{
  "title": "My First Task",
  "description": "This is a task description",
  "due_date": "2024-09-15"
}

```

* <b>Get all tasks</b>
```bash
GET /tasks
```
* <b>Get a Specific Task</b>
```bash
GET /tasks/{id}
```
* <b>Update a Task</b>
```bash
PUT /tasks/{id}
Content-Type: application/json

{
  "title": "Updated Task Title",
  "status": "completed"
}
```

* <b>Delete a Task</b>
```bash
DELETE /tasks/{id}
```
## Bonus Features
* <b>Task Filtering by Status and Due Date</b>

   You can filter tasks by status and due date by passing query parameters:
```bash
GET /tasks?status=pending&due_date=2024-09-15
```

* <b>Pagination</b>

  Use pagination to limit the number of tasks returned:
```bash
GET /tasks?page=1
```

* <b>Search Tasks by Title</b>

    Search for tasks by title using the following query parameter:
```bash
GET /tasks?title=Second
```

# Project Structure
* <b>app/Models/Task.php:</b>   
The Task model, which defines the fields and attributes of a task.

* <b>app/Http/Controllers/TaskController.php:</b>

    Handles the logic for CRUD operations.

* <b>routes/web.php:</b>

    API routes for task management.

