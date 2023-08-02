<?php

use App\Http\Controllers\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\WriterController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\GoogleLoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PublicController::class, 'homepage'])->name('welcome');

Route::middleware('is_writer')->group(function () {
    Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');
    Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store');
    Route::get('/article/edit/{article}', [ArticleController::class, 'edit'])->name('article.edit');
    Route::put('/article/{article}/update', [ArticleController::class, 'update'])->name('article.update');
    Route::delete('/article/{article}/destroy', [ArticleController::class, 'destroy'])->name('article.destroy');
});

Route::get('/article/index', [ArticleController::class, 'index'])->name('article.index');
Route::get('/article/show/{article:slug}', [ArticleController::class, 'show'])->name('article.show');

Route::get('article/category/{category}', [ArticleController::class, 'byCategory'])->name('article.byCategory');

Route::get('/careers', [PublicController::class, 'careers'])->middleware('auth')->name('careers');
Route::post('/careers/submit', [PublicController::class, 'careersSubmit'])->middleware('auth')->name('careers.submit');

Route::prefix('admin')->middleware('is_admin')->group(function () {
    Route::get('/dashboard',[AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/{user}/set-revisor',[AdminController::class, 'setRevisor'])->name('admin.setRevisor');
    Route::get('/{user}/set-writer',[AdminController::class, 'setWriter'])->name('admin.setWriter');

    Route::put('/edit/{tag}/tag',[AdminController::class, 'editTag'])->name('admin.editTag');
    Route::delete('/delete/{tag}/tag',[AdminController::class, 'deleteTag'])->name('admin.deleteTag');

    Route::put('/edit/{category}/category',[AdminController::class, 'editCategory'])->name('admin.editCategory');
    Route::delete('/delete/{category}/tag',[AdminController::class, 'deleteCategory'])->name('admin.deleteCategory');

    Route::post('/create/category',[AdminController::class, 'createCategory'])->name('admin.createCategory'); 
});

Route::prefix('writer')->middleware('is_writer')->group(function(){

    Route::get('/dashboard',[WriterController::class,'dashboard'])->name('writer.dashboard');

});

Route::middleware('is_revisor')->group(function () {
    Route::get('/revisor/dashboard',[RevisorController::class,'dashboard'])->name('revisor.dashboard');

    Route::get('/revisor/{article}/accept',[RevisorController::class,'acceptArticle'])->name('revisor.acceptArticle');
    Route::get('/revisor/{article}/reject',[RevisorController::class,'rejectArticle'])->name('revisor.rejectArticle');
    Route::get('/revisor/{article}/undo',[RevisorController::class,'undoArticle'])->name('revisor.undoArticle');
});

Route::get('/article/search',[ArticleController::class,'search'])->name('article.search');

Route::get('/auth/google',[GoogleLoginController::class,'redirectToGoogle']);
Route::get('/auth/google/callback',[GoogleLoginController::class,'handleGoogleCallback']);