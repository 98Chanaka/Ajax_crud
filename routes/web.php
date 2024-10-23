<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LoginController;
use GuzzleHttp\Middleware;

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
//     return view('login');
// });

Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::get('/adminlte', [LoginController::class, 'login'])->name('adminlte');
Route::get('/logout', [LoginController::class, 'index'])->name('logout');




//Route:: middleware(['auth','isAdmin'])-> group(function(){
    //Route::middleware(['admin'])->group(function () {

    Route::group(['middleware' => ['auth','admin']], function(){
// Route::middleware(['auth','admin'])->group(function () {






    Route::post('/store', [EmployeeController::class, 'store'])->name('employee.store');
    Route::put('employee/{id}', [EmployeeController::class, 'update'])->name('employee.update');
    Route::get('employee/{id}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
    Route::delete('employee/{id}', [EmployeeController::class, 'destroy'])->name('employee.delete');
    Route::get('Employee', [EmployeeController::class, 'index'])->name('Employee');
    //Route::get('Employee', EmployeeController::class);
    Route::post('Employee', [EmployeeController::class, 'store']);
    //Route::resource('Employee', EmployeeController::class);



    // Route::get('/login', function () {
    //     return view('adminlte');
    // })->name('login');



    Route::get('/dashboard', function () {
        return view('adminlte');
    })->name('dashboard');


    Route::get('/Home', function () {
        return view('Home');
    })->name('home');




});










