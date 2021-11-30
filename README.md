<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


## How to run kopiamo laravel project after cloning the code

Originally posted on colorfield.be

A quick todo list for setting up a freshly cloned project.

Install the dependencies with Composer.

## 1. Run composer update in VSCODE Terminal            
```
composer update
composer dumpautoload -o
```

Check if the values in config/app.php meets your needs, depending where (staging, dev, …) and how (php -S, artisan, vm with a domain, …) you are running it.

## 2. Generate key for .env

Generate the key for your environment file, it will define the value for ‘APP_KEY=’
```
php artisan key:generate
```

## 3. Edit the .env file (if needed)
```
DB_DATABASE=kopiamoaccounts
```


## 4. Finish by clearing the config and generate the cache and run
```
php artisan config:clear
php artisan config:cache
```

Time to check your site, depending on your environment, for development, the easiest way is to use Artisan.
```
php artisan serve
```
Originally posted on colorfield.be


