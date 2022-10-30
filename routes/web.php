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


//=========== route for Manage Post Types ==============
Route::get('/types', [App\Http\Controllers\PostypeController::class, 'index'])->name('types.index');
Route::get('/type/edit/{id}', [App\Http\Controllers\PostypeController::class, 'edit'])->name('type.edit');
Route::get('/type/create', [App\Http\Controllers\PostypeController::class, 'create'])->name('type.create');
Route::get('/type/show/{id}', [App\Http\Controllers\PostypeController::class, 'show'])->name('type.show');
Route::post('/type/store', [App\Http\Controllers\PostypeController::class, 'store'])->name('type.store');
Route::put('/type/update/{id}', [App\Http\Controllers\PostypeController::class, 'update'])->name('type.update');
Route::delete('/type/destroy/{id}', [App\Http\Controllers\PostypeController::class, 'destroy'])->name('type.destroy');

//=========== route for Manage Post ==============
Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('posts.index');
Route::get('/post/edit/{id}', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
Route::get('/post/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');
Route::get('/post/show/{id}', [App\Http\Controllers\PostController::class, 'show'])->name('post.show');
Route::post('/post/store', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
Route::put('/post/update/{id}', [App\Http\Controllers\PostController::class, 'update'])->name('post.update');
Route::delete('/post/destroy/{id}', [App\Http\Controllers\PostController::class, 'destroy'])->name('post.destroy');

//=========== route for Manage Tags ====================
Route::get('/tags', [App\Http\Controllers\TagController::class, 'index'])->name('tags.index');
Route::get('/tag/edit/{id}', [App\Http\Controllers\TagController::class, 'edit'])->name('tag.edit');
Route::get('/tag/create', [App\Http\Controllers\TagController::class, 'create'])->name('tag.create');
Route::get('/tag/show/{id}', [App\Http\Controllers\TagController::class, 'show'])->name('tag.show');
Route::post('/tag/store', [App\Http\Controllers\TagController::class, 'store'])->name('tag.store');
Route::put('/tag/update/{id}', [App\Http\Controllers\TagController::class, 'update'])->name('tag.update');
Route::delete('/tag/destroy/{id}', [App\Http\Controllers\TagController::class, 'destroy'])->name('tag.destroy');

//=============== route for Manage Site Settings =====================
Route::get('/siteinfo', [App\Http\Controllers\SitesettingsController::class, 'index'])->name('siteinfo.index');
Route::get('/siteinfo/edit/{id}', [App\Http\Controllers\SitesettingsController::class, 'edit'])->name('siteinfo.edit');
Route::put('/siteinfo/update/{id}', [App\Http\Controllers\SitesettingsController::class, 'update'])->name('siteinfo.update');


});
//=========================================== /// END route for @role 'admin' ====================================================
