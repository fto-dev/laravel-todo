## Todo App with Laravel API and Vue JS

You can add,remove and mark completed todo app.

Laravel, MySQL and Vue js todo web application.

## Installation
Clone the repository

```
git clone https://github.com/fto-dev/laravel-todo.git
```

Then cd into the folder with this command
```
cd laravel-todo
```

Install composer packages
```
composer install
```

Create an environment file using this command
```
cp .env.example .env
```

Remove comment line and replace default values on env file
```
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=laravel
# DB_USERNAME=root
# DB_PASSWORD=
```

Then create a database and run migrations using this command
```
php artisan migrate
```

At last generate application key, which will be used for password hashing, session and cookie encryption etc.
```
php artisan key:generate
```

Laravel and database installation completed. 

Install frontend packages.
```
npm install
```

Build frontend packages.
```
npm run build
```

Run server using this command
```
php artisan serve
```