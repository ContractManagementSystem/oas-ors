<?php

use App\Http\Controllers\RolesController;
use App\Http\Controllers\WebController;
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
Auth::routes();

Route::group(['middleware' => ['auth']], function(){
    //Admin dashboard
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::view('/king',  view: 'admin/index')->name('admin-index');

//roles
Route::resource('roles', App\Http\Controllers\RolesController::class);

//permissions
Route::resource('permissions', App\Http\Controllers\PermissionsController::class);

//site-setting
Route::resource('sitesettings', App\Http\Controllers\SiteSettingsController::class);

/*oas*/
Route::view('/logins',  view: 'oas/login')->name('logins'); 
Route::view('/application',  view: 'oas/application')->name('application'); 
Route::view('/register',  view: 'oas/register')->name('register'); 
Route::view('/normaltable',  view: 'oas/normaltable')->name('normaltable'); 
Route::view('/datetable',  view: 'oas/datatable')->name('datatable'); 
});
