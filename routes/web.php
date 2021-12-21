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
//SUPERADMIN
//Pengaturan Role
Route::get('/superadmin/role','superadmin\RoleController@index');
Route::get('/superadmin/role/getData','superadmin\RoleController@getData');
Route::post('/superadmin/role/storeData','superadmin\RoleController@store');
Route::get('/superadmin/role/editData/{id}','superadmin\RoleController@edit');
Route::post('/superadmin/role/updateData','superadmin\RoleController@update');
Route::post('/superadmin/role/destroyData','superadmin\RoleController@destroy');

//ADMIN
//Database Bidang
Route::get('/admin/bidang','admin\BidangController@index');
Route::get('/admin/bidang/getData','admin\BidangController@getData');
Route::post('/admin/bidang/storeData','admin\BidangController@store');
Route::get('/admin/bidang/editData/{id}','admin\BidangController@edit');
Route::post('/admin/bidang/updateData','admin\BidangController@update');
Route::post('/admin/bidang/destroyData','admin\BidangController@destroy');
//Database Satuan Kerja
Route::get('/admin/satker','admin\SatuankerjaController@index');
Route::get('/admin/satker/getData','admin\SatuankerjaController@getData');
Route::post('/admin/satker/storeData','admin\SatuankerjaController@store');
Route::get('/admin/satker/editData/{id}','admin\SatuankerjaController@edit');
Route::post('/admin/satker/updateData','admin\SatuankerjaController@update');
Route::post('/admin/satker/destroyData','admin\SatuankerjaController@destroy');
Route::get('/admin/satker/viewData','admin\SatuankerjaController@viewData');
//Database List Seksi
Route::get('/admin/list_seksi','admin\ListseksiController@index');
Route::get('/admin/list_seksi/getData','admin\ListseksiController@getData');
Route::post('/admin/list_seksi/storeData','admin\ListseksiController@store');
Route::get('/admin/list_seksi/editData/{id}','admin\ListseksiController@edit');
Route::post('/admin/list_seksi/updateData','admin\ListseksiController@update');
Route::post('/admin/list_seksi/destroyData','admin\ListseksiController@destroy');
Route::get('/admin/list_seksi/viewData','admin\ListseksiController@viewData');
//Database Seksi
Route::get('/admin/seksi','admin\SeksiController@index');
Route::get('/admin/seksi/getData','admin\SeksiController@getData');
Route::post('/admin/seksi/storeData','admin\SeksiController@store');
Route::get('/admin/seksi/editData/{id}','admin\SeksiController@edit');
Route::post('/admin/seksi/updateData','admin\SeksiController@update');
Route::post('/admin/seksi/destroyData','admin\SeksiController@destroy');
Route::get('/admin/seksi/viewData','admin\SeksiController@viewData');