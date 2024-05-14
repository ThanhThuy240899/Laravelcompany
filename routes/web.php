<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});



Route::prefix('com')->group(function() {
    Route::get('/companyprofile', [CompanyController::class, 'showProfile'])->name('com.profile');
    Route::get('/companyupdate', [CompanyController::class, 'showUpdate'])->name('com.update');
    Route::post('/createsubmit', [CompanyController::class, 'createSubmit'])->name('com.create');
    Route::post('/companyprofile', [CompanyController::class, 'searchsubmit'])->name('com.search');
});

