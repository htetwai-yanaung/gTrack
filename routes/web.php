<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Clients\CarController;
use App\Http\Controllers\Clients\AjaxController;
use App\Http\Controllers\Clients\DriverController;
use App\Http\Controllers\Clients\CarDriverController;
use App\Http\Controllers\Clients\CheckListController;

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
Route::redirect('/', '/login');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::get('driver/login', [AuthController::class, 'driverLoginPage'])->name('driver.loginPage');
Route::get('driver/register', [AuthController::class, 'driverRegisterPage'])->name('driver.registerPage');
Route::post('driver/store', [AuthController::class, 'store'])->name('driver.store');
Route::get('/driver/index/', [AuthController::class, 'index'])->name('driver.index');
Route::get('/driver/check-list/', [AuthController::class, 'checkList'])->name('driver.checkList');
Route::get('driver/check-list/check', [AjaxController::class, 'check']);




Route::get('/admin', function() {
    return view('admin.index');
});
Route::get('/client', function() {
    return view('clients.cars.index');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', [AuthController::class, 'role'])->name('dashboard');
    Route::prefix('cars')->controller(CarController::class)->group(function() {
        Route::get('index', 'index')->name('cars.index');
        Route::get('create', 'create')->name('cars.create');
        Route::post('store', 'store')->name('cars.store');
        Route::get('details/{id}', 'details')->name('cars.details');
    });
    Route::prefix('drivers')->controller(DriverController::class)->group(function() {
        Route::get('index', 'index')->name('drivers.index');
        Route::get('create', 'create')->name('drivers.create');
        Route::post('store', 'store')->name('drivers.store');
        Route::get('profile/{id}', 'profile')->name('drivers.profile');
    });
    Route::controller(CarDriverController::class)->group(function() {
        Route::get('add-car-driver/{car_id}/{driver_id}', 'addDriver')->name('add.driver');
        Route::get('remove-car-driver/{car_id}/{driver_id}', 'removeDriver')->name('remove.driver');
    });
    Route::prefix('check-list')->controller(CheckListController::class)->group(function() {
        Route::get('index', 'index')->name('checkList.index');
        Route::post('store', 'store')->name('checkList.store');
        Route::get('delete', 'delete')->name('checkList.delete');
    });
    Route::get('check-list/list', [AjaxController::class, 'list']);
});