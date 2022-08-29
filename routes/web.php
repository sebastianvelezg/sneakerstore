<?php

use Illuminate\Support\Facades\Route;

// Home page
Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");

// About page
Route::get('/about', 'App\Http\Controllers\HomeController@about')->name('home.about');

// Support page
Route::get('/support', 'App\Http\Controllers\HomeController@support')->name('home.support');

 

Auth::routes();

Route::middleware('client')->group(function () {

    

});

Route::middleware('admin')->group(function () {

    // Home page ADMIN panel
    Route::get('/admin', 'App\Http\Controllers\AdminController@index')->name("admin.index");

    // //sneakers index
    Route::get("/admin/sneakers", 'App\Http\Controllers\SneakerController@indexAdmin')->name("admin.sneaker");

    //create sneaker
    Route::get("/admin/sneakers/create", 'App\Http\Controllers\SneakerController@create')->name("admin.sneakerCreate");

    //edit sneaker
    Route::get("/admin/sneakers/{id}/edit", 'App\Http\Controllers\SneakerController@edit')->name("admin.sneakerEdit");

    //store sneaker
    Route::post("/admin/sneakers", 'App\Http\Controllers\SneakerController@store')->name("admin.sneakerStore");

    //update sneaker
    Route::patch("/admin/sneakers/{id}", 'App\Http\Controllers\SneakerController@update')->name("admin.sneakerUpdate");

    //destroy sneaker
    Route::get("/admin/sneakers/delete/{id}", 'App\Http\Controllers\SneakerController@destroy')->name("admin.sneakerDelete");

    //show sneaker
    Route::get("/admin/sneakers/{id}", 'App\Http\Controllers\SneakerController@show')->name("admin.sneakerShow");

    // Admin user page
    Route::get("/admin/user", 'App\Http\Controllers\UserController@indexAdmin')->name("admin.user");

    // Admin create user page
    Route::get("/admin/user/create", 'App\Http\Controllers\UserController@create')->name("admin.userCreate");

    // Admin update user page
    Route::get("/admin/user/edit/{id}", 'App\Http\Controllers\UserController@edit')->name("admin.userEdit");

    // Admin create user page
    Route::post("/admin/user/create", 'App\Http\Controllers\UserController@store')->name("admin.userStore");

    // Admin update user page
    Route::put("/admin/user/update/{id}", 'App\Http\Controllers\UserController@update')->name("admin.userUpdate");

    // Delete user
    Route::get("/admin/user/delete/{id}", 'App\Http\Controllers\UserController@destroy')->name("admin.userDelete");
});