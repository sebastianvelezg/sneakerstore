<?php

use Illuminate\Support\Facades\Route;

// Home page
Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");

// About page
Route::get('/about', 'App\Http\Controllers\HomeController@about')->name('home.about');

// Support page
Route::get('/support', 'App\Http\Controllers\HomeController@support')->name('home.support');

// Categories page
Route::get('/categories', 'App\Http\Controllers\CategoryController@index')->name('category.index');

// Category page
Route::get('/category/{id}', 'App\Http\Controllers\CategoryController@show')->name('category.show');

 

Auth::routes();

Route::middleware('client')->group(function () {

    

});

Route::middleware('admin')->group(function () {

    // Home page ADMIN panel
    Route::get('/admin', 'App\Http\Controllers\AdminController@index')->name("admin.index");

    //sneakers index
    Route::get("/admin/sneakers", 'App\Http\Controllers\SneakerController@adminIndex')->name("admin.sneaker");
    
    // Admin sneaker page specific category
    Route::get("/admin/sneaker/{id}", 'App\Http\Controllers\SneakerController@adminShow')->name("admin.sneakersCategory");

    // Admin create sneaker with page specific category
    Route::get("/admin/sneaker/create/{id}", 'App\Http\Controllers\SneakerController@create')->name("admin.sneakerCreate");

    // Admin create sneaker with page specific category
    Route::post("/admin/sneaker/store", 'App\Http\Controllers\SneakerController@store')->name("admin.sneakerStore");

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

    // Admin page of add imgaes for sneaker
    Route::get("/admin/sneakers/show/{id}", 'App\Http\Controllers\SneakerController@show')->name("admin.sneakerShow");

    // Delete image for sneaker
    Route::get("/admin/sneakers/delete/sneaker/{id}", 'App\Http\Controllers\SneakerController@deleteImage')->name("admin.sneakerDeleteImage");

    // Add images for sneaker
    Route::post("/admin/sneakers/add/images/{id}", 'App\Http\Controllers\SneakerController@addImages')->name("admin.sneakerAddImages");

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

    // Admin category page
    Route::get("/admin/category", 'App\Http\Controllers\CategoryController@indexAdmin')->name("admin.category");

    // Admin create category page
    Route::get("/admin/category/create", 'App\Http\Controllers\CategoryController@create')->name("admin.categoryCreate");

    // Admin update category page
    Route::get("/admin/category/edit/{id}", 'App\Http\Controllers\CategoryController@edit')->name("admin.categoryEdit");

    // Admin create category page
    Route::post("/admin/category/create", 'App\Http\Controllers\CategoryController@store')->name("admin.categoryStore");

    // Admin update category page
    Route::put("/admin/category/update/{id}", 'App\Http\Controllers\CategoryController@update')->name("admin.categoryUpdate");

    // Delete category
    Route::get("/admin/category/delete/{id}", 'App\Http\Controllers\CategoryController@destroy')->name("admin.categoryDelete");
});