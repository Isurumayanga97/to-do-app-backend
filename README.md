
# TO-DO Application Laravel Backend

This project create for manage users daily task.




## Run Locally

Clone the project.

```bash
  git clone https://github.com/Isurumayanga97/to-do-app-backend.git
```

Go to the project directory.

```bash
  cd to-do-app-backend
```

Install dependencies.

```bash
  composer install
```

Change .env.example to .env and change environment variables.

```bash
  DB_DATABASE=your database name
  DB_USERNAME=your user name
  DB_PASSWORD=your passsword

  MAIL_DRIVER=your smtp driver
  MAIL_HOST=your smtp host
  MAIL_PORT=your mail port
  MAIL_USERNAME=your username
  MAIL_PASSWORD=your email password(less secure off or register in google app)
  MAIL_ENCRYPTION=ssl/tsl
  MAIL_FROM_ADDRESS=your email address
```
Now create the database you provide in the .env file.

```bash
  create database YOUR_DATABASE_NAME
```
Migration databases

```bash
  php artisan migrate
```

Install laravel passport

```bash
  php artisan passport:install
```

Run application

```bash
  php artisan serve
```

## Authors

- [@Isurumayanga97](https://github.com/Isurumayanga97)


## Feedback

If you have any feedback, please reach out to us at umayangaisuru97@gmail.com

