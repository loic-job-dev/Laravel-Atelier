## Initialisation

If you don't have PHP and Composer installed on your local machine on Linux :
Run ```/bin/bash -c "$(curl -fsSL https://php.new/install/linux/8.4)" ```


- Run the command ```composer global require laravel/installer```
- Run the command ```npm install && npm run build```
- Copy and rename .env.example in .env
- Add your password in the .env file 
- Run the command ```php artisan migrate```
- Create the database (chose Yes)
- Run the command ```composer require barryvdh/laravel-debugbar --dev``` in order to use the debugbar
- To launch the server, run the command ```composer run dev```

This project is based on the Laravel framework.
