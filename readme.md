## Blade Pagination tests

This is a Laravel 5.1 project, install it as you normally would:

1. Clone or download
2. Run `composer install` inside the project's folder
3. Create an empty database.sqlite file inside the storage directory
4. Create an empty database.tests.sqlite file inside the storage directory
5. Run `php artisan migrate --seed` inside the project's folder
6. Configure a virtual host for the project (for example laravel.pagination), remember to point to the public/ directory
7. Run http://laravel.pagination/users/bootstrap in the web browser
8. You should see an example of the package working and the pagination with the Bootstrap theme
9. Run http://laravel.pagination/users/foundation in the web browser
10. Now you will see an example but with the Foundation theme
11. Run http://laravel.pagination/users/materialize in the web browser, this is the materialize theme
12. For more documentation go the package's repository: https://github.com/StydeNet/blade-pagination
13. If you are curious, check `app/Http/routes.php` to check this example's code
14. You can also run `phpunit` of course and check the test in tests/PaginationTest.php