@echo off
echo Todo API Setup
composer install
if not exist .env copy .env.example .env && php artisan key:generate
if not exist database/database.sqlite type nul > database/database.sqlite && php artisan migrate
echo Done! Run: php artisan serve
