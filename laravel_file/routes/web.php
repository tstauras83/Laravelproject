<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\UserController;
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

Route::get('/', HomeController::class);


Route::group(['prefix' => 'admin'], function () {
    Route::resources([
        'products' => ProductsController::class,
        'persons' => PersonController::class,
        'categories' => CategoriesController::class,
        'orders' => OrderController::class,
        'statuses' => StatusController::class,
        'addresses' => AddressController::class,
        'users' => UserController::class,
    ]);
});



