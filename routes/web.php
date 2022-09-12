<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Sneaker page
Route::get('/sneaker/{id}', 'App\Http\Controllers\SneakerController@index')->name('sneakers.index');

// clothing page
Route::get('/clothe/{id}', 'App\Http\Controllers\ClotheController@index')->name('clothes.index');

 

Auth::routes();

Route::middleware('client')->group(function () {

    

});

Route::middleware('admin')->group(function () {

    // Home page ADMIN panel
    Route::get('/admin', 'App\Http\Controllers\AdminController@index')->name("admin.index");


    //sneakers index
    Route::get("/admin/sneakers", 'App\Http\Controllers\SneakerController@adminIndex')->name("admin.sneaker");
    

    // Admin create sneaker with page specific category
    Route::get("/admin/sneaker/create/{id}", 'App\Http\Controllers\SneakerController@create')->name("admin.sneakerCreate");

    // Admin create sneaker with page specific category
    Route::post("/admin/sneaker/store", 'App\Http\Controllers\SneakerController@store')->name("admin.sneakerStore");

    //edit sneaker
    Route::get("/admin/sneakers/{id}/edit", 'App\Http\Controllers\SneakerController@edit')->name("admin.sneakerEdit");

    // Admin sneaker page specific category
    Route::get("/admin/sneaker/{id}", 'App\Http\Controllers\SneakerController@adminShow')->name("admin.sneakersCategory");

    //store sneaker
    Route::post("/admin/sneakers", 'App\Http\Controllers\SneakerController@store')->name("admin.sneakerStore");

    //update sneaker
    Route::put("/admin/sneakers/{id}", 'App\Http\Controllers\SneakerController@update')->name("admin.sneakerUpdate");

    //destroy sneaker
    Route::get("/admin/sneakers/delete/{id}", 'App\Http\Controllers\SneakerController@destroy')->name("admin.sneakerDelete");

    // Admin page of add imgaes for sneaker
    Route::get("/admin/sneakers/show/{id}", 'App\Http\Controllers\SneakerController@show')->name("admin.sneakerShow");

    // Delete image for sneaker
    Route::get("/admin/sneakers/delete/sneaker/{id}", 'App\Http\Controllers\SneakerController@deleteImage')->name("admin.sneakerDeleteImage");

    // Add images for sneaker
    Route::post("/admin/sneakers/add/images/{id}", 'App\Http\Controllers\SneakerController@addImages')->name("admin.sneakerAddImages");


    //sneakers index
    Route::get("/admin/clothes", 'App\Http\Controllers\ClotheController@adminIndex')->name("admin.clothe");
    

    // Admin create Clothe with page specific category
    Route::get("/admin/clothe/create/{id}", 'App\Http\Controllers\ClotheController@create')->name("admin.clotheCreate");

    // Admin create Clothe with page specific category
    Route::post("/admin/clothe/store", 'App\Http\Controllers\ClotheController@store')->name("admin.clotheStore");


    //edit Clothe
    Route::get("/admin/clothes/{id}/edit", 'App\Http\Controllers\ClotheController@edit')->name("admin.clotheEdit");

    // Admin Clothe page specific category
    Route::get("/admin/clothe/{id}", 'App\Http\Controllers\ClotheController@adminShow')->name("admin.clothesCategory");

    //store Clothe
    Route::post("/admin/clothes", 'App\Http\Controllers\ClotheController@store')->name("admin.clotheStore");

    //update Clothe
    Route::put("/admin/clothes/{id}", 'App\Http\Controllers\ClotheController@update')->name("admin.clotheUpdate");

    //destroy Clothe
    Route::get("/admin/clothes/delete/{id}", 'App\Http\Controllers\ClotheController@destroy')->name("admin.clotheDelete");

    //show Clothe
    Route::get("/admin/clothes/{id}", 'App\Http\Controllers\ClotheController@show')->name("admin.clotheShow");

    // Admin page of add imgaes for Clothe
    Route::get("/admin/clothes/show/{id}", 'App\Http\Controllers\ClotheController@show')->name("admin.clotheShow");

    // Delete image for Clothe
    Route::get("/admin/clothes/delete/Clothe/{id}", 'App\Http\Controllers\ClotheController@deleteImage')->name("admin.clotheDeleteImage");

    // Add images for Clothe
    Route::post("/admin/clothes/add/images/{id}", 'App\Http\Controllers\ClotheController@addImages')->name("admin.clotheAddImages");




    //accessory index
    Route::get("/admin/accessories", 'App\Http\Controllers\AccessoryController@adminIndex')->name("admin.accessory");
    

    // Admin create Clothe with page specific category
    Route::get("/admin/accessory/create/{id}", 'App\Http\Controllers\AccessoryController@create')->name("admin.accessoryCreate");

    // Admin create Clothe with page specific category
    Route::post("/admin/accessory/store", 'App\Http\Controllers\AccessoryController@store')->name("admin.accessoryStore");


    //edit Clothe
    Route::get("/admin/accessories/{id}/edit", 'App\Http\Controllers\AccessoryController@edit')->name("admin.accessoryEdit");

    // Admin Clothe page specific category
    Route::get("/admin/accessory/{id}", 'App\Http\Controllers\AccessoryController@adminShow')->name("admin.accessoriesCategory");

    //store Clothe
    Route::post("/admin/accessories", 'App\Http\Controllers\AccessoryController@store')->name("admin.accessoryStore");

    //update Clothe
    Route::put("/admin/accessories/{id}", 'App\Http\Controllers\AccessoryController@update')->name("admin.accessoryUpdate");

    //destroy accessory
    Route::get("/admin/accessories/delete/{id}", 'App\Http\Controllers\AccessoryController@destroy')->name("admin.accessoryDelete");

    //show Clothe
    Route::get("/admin/accessories/{id}", 'App\Http\Controllers\AccessoryController@show')->name("admin.accessoryShow");

    // Admin page of add imgaes for Clothe
    Route::get("/admin/accessories/show/{id}", 'App\Http\Controllers\AccessoryController@show')->name("admin.accessoryShow");

    // Delete image for Clothe
    Route::get("/admin/accessories/delete/Clothe/{id}", 'App\Http\Controllers\AccessoryController@deleteImage')->name("admin.accessoryDeleteImage");

    // Add images for accessory
    Route::post("/admin/accessories/add/images/{id}", 'App\Http\Controllers\AccessoryController@addImages')->name("admin.accessoryAddImages");









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

//////arregkar las rutas