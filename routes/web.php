<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Dashboard\AdminArticleController;
use App\Http\Controllers\Dashboard\AdminDashboardController;
use App\Http\Controllers\Dashboard\AdminUserController;
use App\Http\Controllers\HomeController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class,'index'])->name('home');

// Auth::routes(['verifiy' => true]);

// socialite google
Route::get('sign-in-google', [UserController::class, 'google'])->name('user.login.google');
Route::get('auth/google/callback', [UserController::class, 'handleProviderCallback'])->name('user.google.callback');

Route::middleware(['auth','admin'])->group(function () {
    // admin
    Route::get('/admin/dashboard',[AdminDashboardController::class, 'index'])->name('admin.dashboard');

    // article
    Route::get('/admin/dashboard/article',[AdminArticleController::class, 'index'])->name('admin.dashboard.article');
    Route::get('/admin/dashboard/article/create',[AdminArticleController::class, 'create'])->name('admin.dashboard.article.create');
    Route::post('/admin/dashboard/article',[AdminArticleController::class, 'store'])->name('admin.dashboard.article.store');
    Route::get('/admin/dashboard/article/edit/{article}',[AdminArticleController::class, 'edit'])->name('admin.dashboard.article.edit');
    Route::put('/admin/dashboard/article/update/{article}',[AdminArticleController::class, 'update'])->name('admin.dashboard.article.update');
    Route::delete('/admin/dashboard/article/delete/{article}',[AdminArticleController::class, 'destroy'])->name('admin.dashboard.article.destroy');
    
    // user
    Route::get('/admin/dashboard/user',[AdminUserController::class, 'index'])->name('admin.dashboard.user');
    
    // user
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
});




require __DIR__.'/auth.php';
