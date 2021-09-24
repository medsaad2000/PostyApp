<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DashboardContoller;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\Auth\LoginContoller;
use App\Http\Controllers\Auth\LogoutContoller;
use App\Http\Controllers\Auth\RegisterContoller;
use App\Http\Controllers\UserPostController;

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

Route::get('/'  ,function(){
    return view('home');
})->name('home');


Route::get('/dashboard'  ,[DashboardContoller::class , 'index'])->name('dashboard');

Route::get('/users/{user:username}/posts'  ,[UserPostController::class , 'index'])->name('users.posts');

Route::get('/login'  ,[LoginContoller::class , 'index'])->name('login');
Route::post('/login'  ,[LoginContoller::class , 'store']);

Route::post('/logout'  ,[LogoutContoller::class , 'store'])->name('logout');

Route::get('/register'  ,[RegisterContoller::class , 'index'])->name('register');
Route::post('/register'  ,[RegisterContoller::class , 'store']);


Route::get('/posts'  ,[PostController::class , 'index'])->name('posts');
Route::get('/posts/{post}'  ,[PostController::class , 'show'])->name('posts.show');
Route::post('/posts'  ,[PostController::class , 'store']);
Route::delete('/posts/{post}'  ,[PostController::class , 'destroy'])->name('posts.destroy');


Route::post('/posts/{post}/likes'  ,[PostLikeController::class , 'store'])->name('posts.likes');
Route::delete('/posts/{post}/likes'  ,[PostLikeController::class , 'destroy'])->name('posts.likes');

