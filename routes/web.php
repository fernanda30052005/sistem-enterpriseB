<?php

use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Test;
use App\Http\Controllers\CRMController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DepartementController;

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

// Rute beranda - langsung ke dashboard
Route::get('/', function () {
    return redirect('/dashboard');
});

// Rute dashboard - dapat diakses tanpa login
Route::get('/dashboard', function () {
    return view('admin.blank.index');
})->name('dashboard');


    // Route untuk Submenu 1
Route::get('/submenu1', [AdminController::class, 'submenu1'])->name('submenu1');

Route::resource('users', UserController::class);

Route::resource('roles', RoleController::class);

Route::resource('departements', DepartementController::class);

Route::resource('employees',EmployeeController::class);

Route::resource('payrolls', PayrollController::class);

Route::resource('leaves', LeaveController::class);

Route::resource('attendances', AttendanceController::class);

Route::get('/send-promotion', [CRMController::class, 'index'])->name('send.promotion.form');
Route::post('/send-promotion', [CRMController::class, 'sendPromotion'])->name('send.promotion');
Route::resource('customers', CustomerController::class);
Route::resource('promotions', PromotionController::class);



//Auth routes (login, register, password reset, etc.)
Route::get('email', function(){

    Mail::to('sample@gmail.com')
        ->send(new TestMail());
    return 'oke';
});

