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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/admin/role', function () {
//     return view('adminprovinsi/role/role');
// });
//Route::resource('/admin/role','admin\roleController');
Route::get('/admin/role','admin\roleController@index');
Route::post('/admin/role/add','admin\roleController@store');