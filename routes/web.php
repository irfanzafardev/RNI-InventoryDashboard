<?php

use App\Models\User;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BasicController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StaffHomeController;
use App\Http\Controllers\StaffProductController;
use App\Http\Controllers\AdministratorHomeController;
use App\Http\Controllers\AdministratorUnitController;
use App\Http\Controllers\AdministratorGroupController;
use App\Http\Controllers\AdministratorStockController;
use App\Http\Controllers\AdministratorCompanyController;
use App\Http\Controllers\AdministratorProductController;
use App\Http\Controllers\AdministratorStockInController;
use App\Http\Controllers\AdministratorCategoryController;
use App\Http\Controllers\AdministratorStockOutController;
use App\Http\Controllers\DashboardAgroindustriController;
use App\Http\Controllers\AdministratorSubcategoryController;
use App\Models\Stock;

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

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin Frontend View

Route::get('/dashboard/agroindustri', [DashboardAgroindustriController::class, 'daily'])->name('dashboardAgroindustri');
Route::get('/dashboard/agroindustri/products', [DashboardAgroindustriController::class, 'product'])->name('dashboardAgroindustri');
Route::post('/dashboard/agroindustri/date', [DashboardAgroindustriController::class, 'search'])->name('dashboardAgroindustriSearch');

// Superadmin Frontend View

Route::get('/', [AdministratorHomeController::class, 'index'])->name('HomeAdministrator');

Route::get('/administrator/users', function () {
  return view('administrator.users.user', [
    'users' => User::all()
  ]);
})->middleware('auth');

Route::resource('/administrator/products', AdministratorProductController::class);
Route::get('getSubCategory/{id}', function ($id) {
  $subcategory = App\Models\Subcategory::where('category_id', $id)->get();
  return response()->json($subcategory);
});
Route::get('/administrator/deleteproduct/{id}', [AdministratorProductController::class, 'deleteproduct'])->name('deleteproduct');

Route::resource('/administrator/stocks', AdministratorStockController::class);
Route::get('/get/details/{id}', [AdministratorStockController::class, 'getDetails'])->name('getDetails');

Route::resource('/administrator/classes', AdministratorGroupController::class);

Route::resource('/administrator/categories', AdministratorCategoryController::class);

Route::resource('/administrator/subcategories', AdministratorSubcategoryController::class);

Route::resource('/administrator/units', AdministratorUnitController::class);

Route::resource('/administrator/companies', AdministratorCompanyController::class);

Route::resource('/administrator/stockin', AdministratorStockInController::class);
Route::get('/administrator/detailstockin/', [AdministratorStockInController::class, 'detail'])->name('detailstockin');
Route::post('/administrator/increasestockin/{id}', [AdministratorStockInController::class, 'increase'])->name('increaseStockIn');
Route::get('/administrator/deletestockin/{id}', [AdministratorStockInController::class, 'deletestockin'])->name('deletestockin');
Route::get('/administrator/detaildeletestockin/', [AdministratorStockInController::class, 'detaildelete'])->name('detaildeletestockin');
Route::post('/administrator/decreasestockin/{id}', [AdministratorStockInController::class, 'decrease'])->name('decreaseStockIn');

Route::resource('/administrator/stockout', AdministratorStockOutController::class);

// User Staff Frontend View

Route::get('/staff', [StaffHomeController::class, 'index'])->name('staffHome');

Route::resource('/staff/products', StaffProductController::class);
