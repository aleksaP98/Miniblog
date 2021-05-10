<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\Admin\AdminController;



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

Route::get('/', [LoginController::class,'index'])->name('login');

Route::get('/home',[PagesController::class,'index'])->middleware('authenticated')->name('home');

Route::get('/about',[PagesController::class,'about'])->middleware('authenticated')->name('about');

Route::post('/register',[RegisterController::class,'registerUser'])->name('register');

Route::post('/login',[LoginController::class,'login'])->name('loginUser');

Route::get('/logout',[LoginController::class,'logout'])->name('logout');

Route::get('/users',[UsersController::class,'findUsersAjax']);

Route::get('/search',[PagesController::class,'search'])->middleware('authenticated')->name('search');

Route::post('/mail',[MailController::class,'sendMail'])->name('mail');

Route::prefix('/profile/{id}')->middleware('authenticated')->group(function(){

    Route::get('/',[UsersController::class,'showOneUser'])->name('profile');

    Route::post('/imageUpdate',[ImagesController::class,'insertAndUpdateImage']);

    Route::post('/profileImageUpdate',[ImagesController::class,'updateProfileImage']);

    Route::post('/infoUpdate',[UsersController::class,'updateUser']);

    Route::post('/passwordUpdate',[ResetPasswordController::class,'changePassword']);

    Route::post('/addPost',[PostsController::class,'addPost']);

    
});
Route::post('/deletePost/{id}',[PostsController::class,'deletePost'])->name('deletePost');

Route::post('/comment',[UsersController::class,'addComment']);

Route::post('/reply',[UsersController::class,'addReply']);

Route::prefix('/admin')->middleware('isAdmin')->group(function (){

    Route::get('/',[AdminController::class,'index'])->name('admin');

    Route::get('/createUser',[AdminController::class,'createUserForm'])->name('admin.createUserForm');
    Route::post('/createUser',[AdminController::class,'createUser'])->name('admin.createUser');

    Route::get('/updateUser',[AdminController::class,'updateUserForm'])->name('admin.updateUserForm');
    Route::post('/updateUser',[AdminController::class,'updateUser'])->name('admin.updateUser');

    Route::delete('/deleteUser',[AdminController::class,'deleteUser'])->name('admin.deleteUser');

    Route::get('/createPost',[AdminController::class,'createPostForm'])->name('admin.createPostForm');
    Route::post('/createPost',[AdminController::class,'createPost'])->name('admin.createPost');

    Route::get('/updatePost',[AdminController::class,'updatePostForm'])->name('admin.updatePostForm');
    Route::post('/updatePost',[AdminController::class,'updatePost'])->name('admin.updatePost');

    Route::delete('/deletePost',[AdminController::class,'deletePost'])->name('admin.deletePost');
});

Route::get('/documentation', [PagesController::class,'documentation'])->name('documentation');


