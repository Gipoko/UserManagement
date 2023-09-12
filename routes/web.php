<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserManagementController;
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

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');


//auth route for both 
Route::group(['middleware' => ['auth']], function() { 
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');

    Route::get('/usermanagement', 'App\Http\Controllers\UserManagementController@Index')->name('usermanagement');
    Route::resource('UserM', UserManagementController::class);
});

// for superadministrator
Route::group(['middleware' => ['auth', 'role:superadministrator']], function() { 
    
    Route::get('/usermanagement', 'App\Http\Controllers\UserManagementController@Index')->name('usermanagement');
    
    Route::resource('UserM', UserManagementController::class);
});


require __DIR__.'/auth.php';
