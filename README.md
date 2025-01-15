# How to setup this project?

1. Clone this repository to your machine
```
git clone https://github.com/urfavteddybear/VisionRent
```
2. cd to your directory
```
cd VisionRent
```
3. Install all dependency
```
composer install
```
```
npm install
```
4. Copy `.env.example` to `.env`
```
cp .env.example .env
```
5. Fill your database credentials
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=anything_you_want
DB_USERNAME=root
DB_PASSWORD=
```
6. Generate app key
```
php artisan key:generate
```
7. Run migration
```
php artisan migrate
```
8. Run seeder ( optional )
```
php artisan db:seed
```
9. Make storage symlink
```
php artisan storage:link
```
10. Run the project
```
npm run dev
```
```
php artisan serve
```
11. Run queue worker if you want the rental checking works ( local deployment )
```
php artisan schedule:work
```
or cronjob ( prod deployment )
```
* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
```
