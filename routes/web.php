<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\ForgotController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\User\BlogController as UserBlogController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RatingController;

use App\Http\Controllers\User\UserController;
use Illuminate\Http\Request;

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


// admin route

Route::get('/admin', [LoginController::class, 'index']);
Route::post('admin-login', [LoginController::class, 'admin_login']);
Route::group(['middleware' => ['admin'], 'prefix' => 'admin'], function () {
   Route::get('/dashboard',[LoginController::class,'dashboard_view']);
   // Blogs
   Route::resource('blogs', BlogController::class);
   Route::delete('blog/{id}', [BlogController::class,'destroy'])->name('blog.destroy');
   Route::get('blog-data-table', [BlogController::class, 'data_table']);
   Route::get('logout', [LoginController::class, 'logout']);
});


// front-end route

Route::get('/',[FrontController::class,'index'])->name('/');
Route::get('/all-blogs', [FrontController::class,'get_blogs']);
Route::get('/blog-detail/{id}', [FrontController::class,'blog_detail']);

Route::get('/get-more-blogs',[FrontController::class, 'index']);
Route::post('/add-like',[FrontController::class, 'add_like'])->name('add-like');;
Route::post('/add-comment',[CommentController::class, 'store'])->name('add-comment');
Route::post('/comment-reply',[CommentController::class, 'reply'])->name('comment-reply');

Route::post('/add-rating',[RatingController::class,'add_rating']);

Route::get('test', function(Request $request){
   // session()->forget(['blog_id','user_id','user']);

   return $request->session()->all();
});


// User

Route::post('/user-register', [UserController::class,'user_register'])->name('user-register');
Route::post('/user-login', [UserController::class,'user_login'])->name('user-login');
Route::group(['middleware' => ['auth'], 'prefix' => 'user'], function () {
   Route::get('/dashboard',[UserController::class,'dashboard_view']);
   // User Blog
   Route::resource('blogs', UserBlogController::class);
   Route::delete('blog/{id}', [UserBlogController::class,'destroy'])->name('blog.destroy');
   Route::get('blog-data-table', [UserBlogController::class, 'data_table']);

   Route::get('logout', [UserController::class, 'logout']);
});
