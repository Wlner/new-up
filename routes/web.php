<?php

use App\Http\Livewire\LOt\LotList;
use App\Http\Livewire\Map\MapList;

use App\Http\Livewire\Dead\DeadList;
use App\Http\Livewire\Type\TypeList;
use App\Http\Livewire\User\UserList;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Block\BlockList;
use App\Http\Livewire\Order\OrderList;
use App\Http\Controllers\MapController;
use App\Http\Livewire\Burial\BurialList;


use App\Http\Livewire\Visitor\VisitorList;
use App\Http\Controllers\ProfileController;

use App\Http\Livewire\Deceased\DeceasedList;
use App\Http\Controllers\DashboardController;
use App\Http\Livewire\Authentication\RoleList;
use App\Http\Livewire\Reservation\ReservationList;
use App\Http\Livewire\Authentication\PermissionList;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('user', UserList::class);
    
    Route::get('role', RoleList::class);
    Route::get('permission', PermissionList::class);
    Route::get('lots', LotList::class);

    Route::get('blocks', BlockList::class);
    Route::get('visitors', VisitorList::class);
    //Route::get('deceases', DeceasedList::class);
    Route::get('maps', MapList::class);
    Route::get('types', TypeList::class);
    Route::get('orders', OrderList::class);
    Route::get('reservations', ReservationList::class);
    Route::get('burials', BurialList::class);

    Route::get('deads', DeadList::class);


});

Route::group(['middleware' => ['role:admin|secretary']], function () {

});

Route::group(['middleware' => ['role:admin|secretary|staff']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('deads', DeadList::class);
});

Route::group(['middleware' => ['role:admin|secretary|staff|customer']], function () {

});

require __DIR__.'/auth.php';
