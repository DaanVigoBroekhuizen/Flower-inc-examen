<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FlowerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\WarehouseFlowerController;
use App\Models\Flower;
use App\Models\User;
use App\Models\WarehouseFlower;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

/* password routes */
Route::get('/password-form', function () {
    $user = User::find(Auth::user()->id);
    return view('password.form', compact('user'));
})->middleware(['auth'])->name('password-form');
Route::put('/password-change/{id}', [UserController::class, 'update'])->middleware(['auth'])->name('password-change');

/* extra stock routes */
Route::get('/see-stock/{id}', [WarehouseFlowerController::class, 'show'])->middleware('auth')->name('see-stock');
Route::get('/go-to-add-stock/{id}', [WarehouseFlowerController::class, 'create'])->middleware('auth')->name('go-to-add-stock');
Route::post('/add-stock/{id}', [WarehouseFlowerController::class, 'store'])->middleware('auth')->name('add-stock');

Route::get('/see-warehouses/{id}', [FlowerController::class, 'show'])->middleware('auth')->name('see-warehouses');

Route::resources([
    'warehouses' => WarehouseController::class,
    'flowers' => FlowerController::class,
    'warehouseFlowers' => WarehouseFlowerController::class,
]);

require __DIR__.'/auth.php';
