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

// Supported themes
Route::pattern('theme', 'bootstrap|foundation|materialize');

Route::get('users/{theme?}', function ($theme = 'bootstrap') {
    // Change pagination theme
    Config::set('blade-pagination.theme', $theme);
    // Get CSS framework CDN
    $cdn = get_cdn($theme);
    // Paginate users and render the view
    $users = App\User::paginate(10);
    // Render the view
    return view('users', compact('users', 'theme', 'cdn'));
});