### Project Description:
IMPORTANT!!! project was build following FreeCodeCamp video tutorial (https://www.youtube.com/watch?v=ImtZ5yENzgE),
but since it was an old video with Laravel ver of 5.8, i made my own changes according to the new version (laravel 11) etc and included some more features
and instead of vue.js i used alpine.js, because it was inbuild in laravel breeze starter kit for blade templates, which i use for auth system.

This project is a simplified version of Instagram, built with Laravel 11, Blade templates, and a little Alpine.js for interactivity. 
It provides a social media platform with essential features such as auth system, profile editing, image posting, follow system and search system.

## Features:
- User registration and login system (using Laravel's built-in authentication).
- Profile management: Edit additional information and profile picture.
- Post pictures with titles.
- Follow/unfollow users and search functionality.
- search functionality by username
- main page with all posts and individual post feed of followings
- Basic error handling and validation.

## Tech Stack
Backend and Frontend: Laravel framework, Blade templates, Alpine.js + Tailwind for styling

How to install:
```
git clone https://github.com/exeeny/instagram_clone.git
cd repository-name
cp .env.example .env
composer install
php artisan key:generate
php artisan migrate (click yes to make db file)
```

next:
```
npm install
npm run build
```

done!

