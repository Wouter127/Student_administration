<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('home');
//});

Auth::routes(['register' => false]);

Route::get('logout', 'Auth\LoginController@logout');
Route::redirect('home', '/');
Route::view('/', 'home');
Route::get('courses', 'CourseController@index');
Route::get('courses/{id}', 'CourseController@show');

Route::middleware(['auth'])->prefix('courses/{id}')->group(function () {
    Route::redirect('/', 'courses/{id}');
    Route::get('/', 'CourseController@show');
});

