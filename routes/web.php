<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\PhotosController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\UsersPermissionsController;
use App\Http\Controllers\Admin\UsersRolesController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ConfirmPasswordController;

Route::get('/', [PagesController::class, 'home'])->name('pages.home');
Route::get('nosotros', [PagesController::class, 'about'])->name('pages.about');
Route::get('archivo', [PagesController::class, 'archive'])->name('pages.archive');
Route::get('contacto', [PagesController::class, 'contact'])->name('pages.contact');

Route::get('blog/{post}', [PostController::class, 'show'])->name('blog.show');
Route::get('categorias/{category}', [CategoriesController::class, 'show'])->name('categories.show');
Route::get('tags/{tag}', [TagsController::class, 'show'])->name('tags.show');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    Route::resource('posts', PostsController::class, ['as' => 'admin'])->except('show');
    Route::resource('users', UsersController::class, ['as' => 'admin']);
    Route::resource('roles', RolesController::class, ['as' => 'admin'])->except('show');

    Route::middleware('role:Admin')
        ->put('users/{user}/roles', [UsersRolesController::class, 'update'])
        ->name('admin.users.roles.update');

    Route::put('users/{user}/permissions', [UsersPermissionsController::class, 'update'])->name('admin.users.permissions.update');

    Route::post('posts/{post}/photos', [PhotosController::class, 'store'])->name('admin.posts.photos.store');
    Route::delete('photos/{photo}', [PhotosController::class, 'destroy'])->name('admin.photos.destroy');
});

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
Route::get('password/confirm', [ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
Route::post('password/confirm', [ConfirmPasswordController::class, 'confirm']);
Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
Route::post('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');
