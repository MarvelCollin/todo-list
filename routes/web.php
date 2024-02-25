<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodoController;

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
//     return view('pages.home');
// });

Route::get('/auth', [AuthController::class, 'authView'])->name('authviewer');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    // create tasks
    Route::get('/add', [TodoController::class, 'viewAdd'])->name('viewAdd')->middleware('auth');
    Route::post('/add-process', [TodoController::class, 'add'])->name('add');
    // delete
    Route::delete('/delete/{id}', [TodoController::class, 'delete'])->name('delete-task');
    
    // update 
    Route::get('/update/{id}', [TodoController::class, 'viewUpdate'])->name('viewUpdate');
    Route::post('/update-process/{id}', [TodoController::class, 'update'])->name('update');
    
    // profile
    Route::get('/profile/{id}', [AuthController::class, 'profileView'])->name('profileView');
    Route::post('/profile-update/{id}', [AuthController::class, 'profileUpdate'])->name('profileUpdate');


});

// home
Route::get('/', [TodoController::class, 'viewTasks'])->name('viewTasks');
