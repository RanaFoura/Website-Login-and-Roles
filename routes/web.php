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

//================================================= route for @role 'guest' =======================================================
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


//================================================= route for @role 'user' =======================================================
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//================================================= route for @role 'admin' =======================================================
Route::group(['middleware'=>'role:admin'], function($routes) {
//=============== route for Manage Roles =====================
Route::get('/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('roles.index');
Route::get('/role/edit/{id}', [App\Http\Controllers\RoleController::class, 'edit'])->name('role.edit');
Route::get('/role/create', [App\Http\Controllers\RoleController::class, 'create'])->name('role.create');
Route::get('/role/show/{id}', [App\Http\Controllers\RoleController::class, 'show'])->name('role.show');
Route::post('/role/store', [App\Http\Controllers\RoleController::class, 'store'])->name('role.store');
Route::put('/role/update/{id}', [App\Http\Controllers\RoleController::class, 'update'])->name('role.update');
Route::delete('/role/destroy/{id}', [App\Http\Controllers\RoleController::class, 'destroy'])->name('role.destroy');


//============== route for Manage Permissions ================
Route::get('/permissions', [App\Http\Controllers\PermissionController::class, 'index'])->name('permissions.index');
Route::get('/permission/edit/{id}', [App\Http\Controllers\PermissionController::class, 'edit'])->name('permission.edit');
Route::get('/permission/create', [App\Http\Controllers\PermissionController::class, 'create'])->name('permission.create');
Route::get('/permission/show/{id}', [App\Http\Controllers\PermissionController::class, 'show'])->name('permission.show');
Route::post('/permission/store', [App\Http\Controllers\PermissionController::class, 'store'])->name('permission.store');
Route::put('/permission/update/{id}', [App\Http\Controllers\PermissionController::class, 'update'])->name('permission.update');
Route::delete('/permission/destroy/{id}', [App\Http\Controllers\PermissionController::class, 'destroy'])->name('permission.destroy');


//================ route for Manage Users ====================
Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
Route::get('/banned', [App\Http\Controllers\UserController::class, 'banned'])->name('banned');
Route::get('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
Route::get('/user/create', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');
Route::get('/user/show/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('user.show');
Route::post('/user/store', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
Route::put('/user/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
Route::delete('/user/destroy/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');
Route::get('/user/hdelete/{id}', [App\Http\Controllers\UserController::class, 'hdelete'])->name('user.hdelete');
Route::get('/user/restore/{id}', [App\Http\Controllers\UserController::class, 'restore'])->name('user.restore');

});
//=========================================== /// END route for @role 'admin' ====================================================
