<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsBlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WidgetController;
use App\Http\Controllers\ContactController;

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

//Route::get('/', function () {return view('welcome');});
Route::get('/',[NewsBlogController::class,'index'])->name('home');
Route::get('/contact',[NewsBlogController::class,'contact'])->name('contact');
Route::get('/single-page/{slug}',[NewsBlogController::class,'single_page'])->name('single.page');
Route::get('/category/{slug}',[NewsBlogController::class,'category'])->name('category');



Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
//    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
    Route::prefix('admin')->group(function (){

        Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
        Route::resource('/categories',CategoryController::class);
        Route::resource('/blogs',BlogController::class);

        Route::get('manage-admin',[AdminController::class,'manage_admin'])->name('manage.admin');
        Route::get('/edit-admin/{id}',[AdminController::class,'edit_admin'])->name('edit.admin');
        Route::post('/update-admin',[AdminController::class,'updateAdmin'])->name('update.admin');

        Route::get('home-setting',[WidgetController::class,'home_setting'])->name('home.setting');
        Route::post('save-advertisement',[WidgetController::class,'save_advertisement'])->name('save.advertisement');
        Route::get('save-advertisement-status/{id}',[WidgetController::class,'save_advertisement_status'])->name('save.advertisement.status');

        Route::post('save-first',[WidgetController::class,'save_first'])->name('save.first');
        Route::get('save-first-status/{id}',[WidgetController::class,'save_first_status'])->name('save.first.status');

        Route::post('save-second',[WidgetController::class,'save_second'])->name('save.second');
        Route::get('save-second-status/{id}',[WidgetController::class,'save_second_status'])->name('save.second.status');

        Route::post('save-third',[WidgetController::class,'save_third'])->name('save.third');
        Route::get('save-third-status/{id}',[WidgetController::class,'save_third_status'])->name('save.third.status');

        Route::post('save-four',[WidgetController::class,'save_four'])->name('save.four');
        Route::get('save-four-status/{id}',[WidgetController::class,'save_four_status'])->name('save.four.status');

        Route::get('contact-setting',[ContactController::class,'contact_setting'])->name('contact.setting');
        Route::post('update-contact-body',[ContactController::class,'update_contact_body'])->name('update.contact.body');

        Route::get('header-setting',[WidgetController::class,'header_setting'])->name('header.setting');
        Route::post('update-header-content',[WidgetController::class,'update_header_content'])->name('update.header.content');

        Route::get('save-topbar-status/{id}',[WidgetController::class,'save_topbar_status'])->name('save.topbar.status');

        Route::post('save-advertisementtwo',[WidgetController::class,'save_advertisementtwo'])->name('save.advertisementtwo');
        Route::get('save-advertisementtwo-status/{id}',[WidgetController::class,'save_advertisementtwo_status'])->name('save.advertisementtwo.status');





    });

});
