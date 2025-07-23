## Initialisation

If you don't have PHP and Composer installed on your local machine on Linux :
Run ```/bin/bash -c "$(curl -fsSL https://php.new/install/linux/8.4)" ```

If you don't have a database :
Run  ```mysql -u root -p```
Then Run ```CREATE DATABASE projet_commun; ```

When project is cloned, you need to :

- Copy .env.example in a .env file in root directory with : ```cp .env.example .env```

- Set your DB_USERNAME and DB_PASSWORD in your .env file with your personal logs

At the beginnig of your .env you have to specify the APP_KEY, call me and I'll give it to you

Install all the dependencies with :

```composer install```

Run if you're not using SQLite as database:

```php artisan migrate```

Run :

```npm install && npm run build```

then

```composer run dev```
