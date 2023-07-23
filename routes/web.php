<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashbordController;

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

Route::get('/dashboard', [DashbordController::class,'logincontrole'])->middleware(['auth', 'verified'])->name('dashboard');
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
// Admin // / nf// ff//fv/vfv/vff///
   Route::middleware('auth','role:admin')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class,'index'])->name('admin');
});
// end Admin // / nf// ff//fv/vfv/vff///

// User /// / / // / // / // / // / // / // / // / //

Route::middleware('auth','role:user')->group(function () {
    //////////////// etudiant /////////////////////////
 Route::get('/user/dashboard', [UserController::class,'index'])->name('user');
 Route::post('/reservation/user',[UserController::class,'store'])->name('reservation.store');
//  Route::delete('/reservation/destroy/{id}',[UserController::class,'destroy'])->name('reservation.destroy');
 Route::get('/All/reservation', [UserController::class,'allreservation'])->name('all.reservation');
 Route::get('/My/reservation', [UserController::class,'myreservation'])->name('my.reservation');
 Route::delete('/reservation/destroy/{id}', [UserController::class,'destroyreservation'])->name('reservation.destroy');
 Route::post('/reservation/update/{id}',[UserController::class,'update'])->name('reservation.update');
 //////////////// etudiant //////////////////////////
 });
 // end User /// / / // / // / // / // / // / // / // / //
//  Route::get('calendar/index',[AdminController::class,'index'])->name('calendar.index');
// Route::post('calendar',[AdminController::class,'store'])->name('calendar.store');
 
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
