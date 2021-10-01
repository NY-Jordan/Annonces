<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostsController;

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

Route::get('/', [AppController::class, 'home'])->name('home');
Route::post('/bestOffers', [AppController::class, 'saveEmailForBestOffers'])->name('saveEmailForBestOffers'); 
Route::get('/about', [AppController::class, 'about'])->name('about');
Route::get('/contact', [AppController::class, 'contact'])->name('contact');

Route::middleware(['auth'])->group(function ()
{
   Route::get('/addPost', [PostsController::class, 'addPost'])->name('addPost');
   Route::post('/sendpost', [PostsController::class, 'sendPost'])->name('sendPost');
   Route::get('/account', [UserController::class, 'account'])->name('account');
   Route::post('/account/updateInformations', [UserController::class, 'updateInformations'])->name('updateInformations');
   Route::get('/DeletePost/{id}', [PostsController::class, 'DeletePost'])->name('DeletePost');
   Route::get('/UpdatePost/{id}', [PostsController::class, 'UpdatePage'])->name('UpdatePost');
});
Route::get('post/{id}/details', [PostsController::class, 'postDetails'])->name('postDetails')->whereNumber('id');
Route::get('{tag}/search', [PostsController::class, 'search'])->name('search');


Route::get('/postsbycategory/{categorynameId}', [PostsController::class, 'showPostsByCategory'])->name('PostsByCategory');
Route::get('/postsByLocation/{locationId}', [PostsController::class, 'showPostsByLocation'])->name('PostsByLocation');
require __DIR__.'/auth.php';
