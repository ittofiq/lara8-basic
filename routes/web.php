<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\MultiPictureController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\AboutController;
use App\Models\User;

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

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/portfolio', [HomeController::class, 'portfolio'])->name('portfolio');

Route::get('/home', function () {
    return view('welcome');
});

Route::get('/about', function () {
	return view('about');
});

Route::get('/check', function () {
	echo "This is Check page";
})->middleware('age');

Route::get('/contact', [ContactController::class, 'index']);

Route::get('/contact2', [ContactController::class, 'index'])->name('con');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
	// $users = User::all();
	// $users = DB::table('users')->get();
    return view('layouts.admin.index');
})->name('dashboard');

Route::get('/slider/all', [SliderController::class, 'allSlider'])->name('all.slider');
Route::get('/slider/create', [SliderController::class, 'createSlider'])->name('create.slider');
Route::post('/slider/store', [SliderController::class, 'storeSlider'])->name('store.slider');
Route::get('/slider/edit/{id}', [SliderController::class, 'editSlider'])->name('edit.slider');
Route::get('/slider/delete/{id}', [SliderController::class, 'deleteSlider'])->name('delete.slider');

Route::get('/about/all', [AboutController::class, 'allAbout'])->name('all.about');
Route::get('/about/create', [AboutController::class, 'createAbout'])->name('create.about');
Route::post('/about/store', [AboutController::class, 'storeAbout'])->name('store.about');
Route::get('/about/edit/{id}', [AboutController::class, 'editAbout'])->name('edit.about');
Route::post('/about/update/{id}', [AboutController::class, 'updateAbout'])->name('update.about');
Route::get('/about/delete/{id}', [AboutController::class, 'deleteAbout'])->name('delete.about');

Route::get('/category/all', [CategoryController::class, 'allCategory'])->name('all.category');
Route::post('/category/add', [CategoryController::class, 'addCategory'])->name('store.category');
Route::get('/category/edit/{id}', [CategoryController::class, 'editCategory'])->name('edit.category');
Route::post('/category/update/{id}', [CategoryController::class, 'updateCategory'])->name('update.category');
Route::get('/category/softDelete/{id}', [CategoryController::class, 'softDelCategory'])->name('softdel.category');
Route::get('/category/restore/{id}', [CategoryController::class, 'restoreCategory'])->name('restore.category');
Route::get('/category/clear/{id}', [CategoryController::class, 'clearCategory'])->name('clear.category');

Route::get('/brand/all', [BrandController::class, 'allBrand'])->name('all.brand');
Route::post('/brand/add', [BrandController::class, 'addBrand'])->name('store.brand');
Route::get('/brand/edit/{id}', [BrandController::class, 'editBrand'])->name('edit.brand');
Route::post('/brand/update/{id}', [BrandController::class, 'updateBrand'])->name('update.brand');
Route::get('/brand/delete/{id}', [BrandController::class, 'deleteBrand'])->name('delete.brand');

Route::get('/multi-image/all', [MultiPictureController::class, 'allMultiImage'])->name('all.multiImage');
Route::post('/multi-image/add', [MultiPictureController::class, 'addMultiImage'])->name('store.multiImage');
Route::get('/multi-image/edit/{id}', [MultiPictureController::class, 'editMultiImage'])->name('edit.multiImage');
Route::get('/multi-image/delete/{id}', [MultiPictureController::class, 'deleteMultiImage'])->name('delete.multiImage');

Route::get('/contact/all', [ContactController::class, 'allContact'])->name('all.contact');
Route::get('/contact/create', [ContactController::class, 'createContact'])->name('create.contact');
Route::post('/contact/store', [ContactController::class, 'storeContact'])->name('store.contact');
Route::get('/contact/edit/{id}', [ContactController::class, 'editContact'])->name('edit.contact');
Route::post('/contact/update/{id}', [ContactController::class, 'updateContact'])->name('update.contact');
Route::get('/contact/delete/{id}', [ContactController::class, 'deleteContact'])->name('delete.contact');

Route::get('/user/logout', [BrandController::class, 'logout'])->name('user.logout');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');