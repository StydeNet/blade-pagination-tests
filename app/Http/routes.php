<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

require_once(__DIR__ . '/helpers.php');

Route::get('/', function () {
    return view('welcome');
});

// Out of the box supported themes
Route::pattern('theme', implode('|', Themes::getSupported()));

Route::get('users/{theme?}/{per_page?}', function ($theme = 'bootstrap', $perPage = 10) {
    // Change pagination theme
    Config::set('blade-pagination.theme', $theme);
    // Get CSS framework CDN
    $cdn = Themes::getCdn($theme);
    // Paginate users and render the view
    $users = App\User::paginate($perPage);
    // Render the view
    return view('users', compact('users', 'theme', 'cdn'));
});