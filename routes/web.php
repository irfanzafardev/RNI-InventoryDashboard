<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BasicController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdministratorUnitController;
use App\Http\Controllers\AdministratorGroupController;
use App\Http\Controllers\AdministratorCompanyController;
use App\Http\Controllers\AdministratorProductController;
use App\Http\Controllers\AdministratorStockInController;
use App\Http\Controllers\AdministratorCategoryController;
use App\Http\Controllers\AdministratorStockOutController;
use App\Http\Controllers\AdministratorSubcategoryController;

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

// Route::get('/', [LoginController::class, 'index']);
// Route::post('/', [LoginController::class, 'authenticate'])->name('login');

// Route::get('/register', [RegisterController::class, 'index'])->name('register');
// Route::post('/register', [RegisterController::class, 'store'])->name('register');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::get('/', function () {
  return view('administrator.home');
})->middleware('auth');

Route::get('/administrator/users', function () {
  return view('administrator.users.user', [
    'users' => User::all()
  ]);
})->middleware('auth');

Route::resource('/administrator/products', AdministratorProductController::class);
Route::get('/administrator/deleteproduct/{id}', [AdministratorProductController::class, 'deleteproduct'])->name('deleteproduct');

Route::resource('/administrator/classes', AdministratorGroupController::class);

Route::resource('/administrator/categories', AdministratorCategoryController::class);

Route::resource('/administrator/subcategories', AdministratorSubcategoryController::class);

Route::resource('/administrator/units', AdministratorUnitController::class);

Route::resource('/administrator/companies', AdministratorCompanyController::class);

Route::resource('/administrator/stockin', AdministratorStockInController::class);

Route::resource('/administrator/stockout', AdministratorStockOutController::class);






// Route::get('/basic', [BasicController::class, 'index'])->name('basic');
// Route::get('/basicform', [BasicController::class, 'basicform'])->name('basicform');
// Route::post('/insertbasic', [BasicController::class, 'insertbasic'])->name('insertbasic');
// Route::get('/viewbasic/{id}', [BasicController::class, 'viewbasic'])->name('viewbasic');
// Route::post('/updatebasic/{id}', [BasicController::class, 'updatebasic'])->name('updatebasic');
// Route::get('/deletebasic/{id}', [BasicController::class, 'deletebasic'])->name('deletebasic');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
