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
// clothing page
Route::get('/accessory/{id}', 'App\Http\Controllers\AccessoryController@index')->name('accessories.index');
// Sneaker page
Route::get('/sneaker/{id}', 'App\Http\Controllers\SneakerController@index')->name('sneakers.index');
 
Auth::routes();

Route::middleware('client')->group(function () {
    // Create new comment
  Route::post('/comment/create/{id}', 'App\Http\Controllers\CommentController@store')->name("comment.store");

  // Create new comment
  Route::get('/comment/delete/{id}', 'App\Http\Controllers\CommentController@destroy')->name("comment.delete");
  // cart
Route::get('/cart', 'App\Http\Controllers\CartController@index')->name("cart.index");
//cart add
Route::get('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name("cart.add");
//cart removeAll 
Route::get('/cart/removeAll/', 'App\Http\Controllers\CartController@removeAll')->name("cart.removeAll");
//cart remove
Route::get('/cart/remove/', 'App\Http\Controllers\CartController@remove')->name("cart.remove");
// cart checkout
Route::get('/cart/checkOut/', 'App\Http\Controllers\CartController@checkOut')->name("cart.checkOut");

});

Route::middleware('admin')->group(function () {

    // Admin index
    // Admin panel index
    Route::get('/admin', 'App\Http\Controllers\AdminController@index')->name("admin.index");
    // sneakers Admin index
    Route::get("/admin/sneakers", 'App\Http\Controllers\SneakerController@adminIndex')->name("admin.sneaker");
    // Clothes Admin index
    Route::get("/admin/clothes", 'App\Http\Controllers\ClotheController@adminIndex')->name("admin.clothe");
    // Accessory Admin index
    Route::get("/admin/accessories", 'App\Http\Controllers\AccessoryController@adminIndex')->name("admin.accessory"); 
    // User Admin index
    Route::get("/admin/user", 'App\Http\Controllers\UserController@indexAdmin')->name("admin.user");
    // Category Admin index
    Route::get("/admin/category", 'App\Http\Controllers\CategoryController@indexAdmin')->name("admin.category");


    // Admin create
    // Admin create sneaker with page specific category
    Route::get("/admin/sneaker/create/{id}", 'App\Http\Controllers\SneakerController@create')->name("admin.sneakerCreate");
    // Admin create Clothe with page specific category
    Route::get("/admin/clothe/create/{id}", 'App\Http\Controllers\ClotheController@create')->name("admin.clotheCreate");
    // Admin create Clothe with page specific category
    Route::get("/admin/accessory/create/{id}", 'App\Http\Controllers\AccessoryController@create')->name("admin.accessoryCreate");
    // Admin create user page
    Route::get("/admin/user/create", 'App\Http\Controllers\UserController@create')->name("admin.userCreate");
    // Admin create category page
    Route::get("/admin/category/create", 'App\Http\Controllers\CategoryController@create')->name("admin.categoryCreate");


    // Admin store
    // Admin store sneaker with specific category
    Route::post("/admin/sneaker/store", 'App\Http\Controllers\SneakerController@store')->name("admin.sneakerStore");
    // Admin store Clothe with specific category
    Route::post("/admin/clothe/store", 'App\Http\Controllers\ClotheController@store')->name("admin.clotheStore");
    // Admin store accessory with specific category
    Route::post("/admin/accessory/store", 'App\Http\Controllers\AccessoryController@store')->name("admin.accessoryStore");
    // Admin store user
    Route::post("/admin/user/create", 'App\Http\Controllers\UserController@store')->name("admin.userStore");
    // Admin store category
    Route::post("/admin/category/create", 'App\Http\Controllers\CategoryController@store')->name("admin.categoryStore");


    // Admin edit
    // Admin Edit sneaker
    Route::get("/admin/sneakers/{id}/edit", 'App\Http\Controllers\SneakerController@edit')->name("admin.sneakerEdit");
    // Admin Edit Clothe
    Route::get("/admin/clothes/{id}/edit", 'App\Http\Controllers\ClotheController@edit')->name("admin.clotheEdit");
    // Admin Edit Accessory
    Route::get("/admin/accessories/{id}/edit", 'App\Http\Controllers\AccessoryController@edit')->name("admin.accessoryEdit");
    // Admin Edit User
    Route::get("/admin/user/edit/{id}", 'App\Http\Controllers\UserController@edit')->name("admin.userEdit");
    // Admin Edit Category
    Route::get("/admin/category/edit/{id}", 'App\Http\Controllers\CategoryController@edit')->name("admin.categoryEdit");


    // Admin show
    // Admin Show all sneakers
    Route::get("/admin/sneaker/{id}", 'App\Http\Controllers\SneakerController@adminShow')->name("admin.sneakersCategory");
    // Admin Show single sneaker
    Route::get("/admin/sneakers/show/{id}", 'App\Http\Controllers\SneakerController@show')->name("admin.sneakerShow");
    // Admin Show all Clothes
    Route::get("/admin/clothe/{id}", 'App\Http\Controllers\ClotheController@adminShow')->name("admin.clothesCategory");
    // Admin Show single Clothe
    Route::get("/admin/clothes/show/{id}", 'App\Http\Controllers\ClotheController@show')->name("admin.clotheShow");
    // Admin Show all accesories
    Route::get("/admin/accessory/{id}", 'App\Http\Controllers\AccessoryController@adminShow')->name("admin.accessoriesCategory");
    // Admin Show single accesory
    Route::get("/admin/accessories/show/{id}", 'App\Http\Controllers\AccessoryController@show')->name("admin.accessoryShow");


    // Admin store
    // Admin store sneaker
    Route::post("/admin/sneakers", 'App\Http\Controllers\SneakerController@store')->name("admin.sneakerStore");
    // Admin store Clothe
    Route::post("/admin/clothes", 'App\Http\Controllers\ClotheController@store')->name("admin.clotheStore");
    // Admin store Accessory
    Route::post("/admin/accessories", 'App\Http\Controllers\AccessoryController@store')->name("admin.accessoryStore");


    // Admin update
    // Admin update sneaker
    Route::put("/admin/sneakers/{id}", 'App\Http\Controllers\SneakerController@update')->name("admin.sneakerUpdate");
    // Admin update Clothe
    Route::put("/admin/clothes/{id}", 'App\Http\Controllers\ClotheController@update')->name("admin.clotheUpdate");
    // Admin update Accessory
    Route::put("/admin/accessories/{id}", 'App\Http\Controllers\AccessoryController@update')->name("admin.accessoryUpdate");
    // Admin update user
    Route::put("/admin/user/update/{id}", 'App\Http\Controllers\UserController@update')->name("admin.userUpdate");
    // Admin update category
    Route::put("/admin/category/update/{id}", 'App\Http\Controllers\CategoryController@update')->name("admin.categoryUpdate");


    // Admin destroy
    // Admin destroy sneaker
    Route::get("/admin/sneakers/delete/{id}", 'App\Http\Controllers\SneakerController@destroy')->name("admin.sneakerDelete");
    // Admin destroy Clothe
    Route::get("/admin/clothes/delete/{id}", 'App\Http\Controllers\ClotheController@destroy')->name("admin.clotheDelete");
    // Admin destroy accessory
    Route::get("/admin/accessories/delete/{id}", 'App\Http\Controllers\AccessoryController@destroy')->name("admin.accessoryDelete");
    // Admin destroy user
    Route::get("/admin/user/delete/{id}", 'App\Http\Controllers\UserController@destroy')->name("admin.userDelete");
    //  Admin destroy category
    Route::get("/admin/category/delete/{id}", 'App\Http\Controllers\CategoryController@destroy')->name("admin.categoryDelete");


    // Admin show 'add image'
    // Admin Add images for sneaker
    Route::post("/admin/sneakers/add/images/{id}", 'App\Http\Controllers\SneakerController@addImages')->name("admin.sneakerAddImages");
    // Admin Add images for Clothe
    Route::post("/admin/clothes/add/images/{id}", 'App\Http\Controllers\ClotheController@addImages')->name("admin.clotheAddImages");
    // Admin Add images for accessory
    Route::post("/admin/accessories/add/images/{id}", 'App\Http\Controllers\AccessoryController@addImages')->name("admin.accessoryAddImages");


    // Admin delete image
    // Admin Delete image for sneaker
    Route::get("/admin/sneakers/delete/sneaker/{id}", 'App\Http\Controllers\SneakerController@deleteImage')->name("admin.sneakerDeleteImage");
    // Admin Delete image for Clothe
    Route::get("/admin/clothes/delete/Clothe/{id}", 'App\Http\Controllers\ClotheController@deleteImage')->name("admin.clotheDeleteImage");
    // Admin Delete image for accessory
    Route::get("/admin/accessories/delete/Clothe/{id}", 'App\Http\Controllers\AccessoryController@deleteImage')->name("admin.accessoryDeleteImage");



    
    































});

//////arregkar las rutas