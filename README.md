# Poll Management System

Welcome to the Poll Management System repository! This web application allows users to create polls with multiple options and enables participants to vote for their preferred choices. The project is built using the Laravel framework along with the Livewire library, providing a seamless and dynamic user experience.

## Features

- **Create Polls**: Users can easily create polls by specifying the question and adding multiple options for participants to choose from.

- **Vote for Options**: Participants can cast their votes for the available options in each poll.

- **Real-time Updates with Livewire**: The Livewire library is integrated to ensure real-time updates without the need for page refreshes, creating a smooth and interactive voting experience.

## Requirements

Make sure your environment meets the following requirements:

- PHP >= 7.3
- Composer installed
- Laravel >= 7.x
- Livewire library

## Installation

1. Clone the repository:

```bash
git clone https://github.com//Musab-Dev/polling-app-laravel-livewire.git
```

2. Navigate to the project directory:

```bash
cd polling-app-laravel-livewire
```

3. Install dependencies:

```bash
composer install
```

4. Create a copy of the `.env` file:

```bash
cp .env.example .env
```

5. Generate an application key:

```bash
php artisan key:generate
```

6. Configure your database connection in the `.env` file:

```env
DB_CONNECTION=mysql
DB_HOST=your_database_host
DB_PORT=your_database_port
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```

7. Run database migrations:

```bash
php artisan migrate
```

8. Serve the application:

```bash
php artisan serve
```

Visit `http://localhost:8000` in your web browser to access the Poll Management System.


Feel free to explore the features, report issues, and contribute to make the Poll Management System even better!
