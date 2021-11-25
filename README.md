# Kopiamo 
# How to run kopiamo laravel project after cloning the code

Originally posted on colorfield.be

A quick todo list for setting up a freshly cloned project.

Install the dependencies with Composer.

# cd in your project directory or use terminal in VSCODE
```
composer update
composer dumpautoload -o
```

Check if the values in config/app.php meets your needs, depending where (staging, dev, …) and how (php -S, artisan, vm with a domain, …) you are running it.


Define your environment file, at the root of your project directory.

# Copy the environment template
```
cp .env.example .env
```

Generate the key for your environment file, it will define the value for ‘APP_KEY=’
```
php artisan key:generate
```

# Edit then the .env file to suit your needs (APP_*, DB_*, …).
```
DB_DATABASE=kopiamoaccounts
```


Finish by clearing the config and generate the cache.
```
php artisan config:clear
php artisan config:cache
```

Time to check your site, depending on your environment, for development, the easiest way is to use Artisan.
```
php artisan serve
```
Originally posted on colorfield.be


