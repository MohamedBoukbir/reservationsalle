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

    // Route::get('/prof/student/index', [ProfController::class,'indexStudent'])->name('students.index');

    // // add cours and Etudiant
    // Route::post('/add/etudiant', [ProfController::class,'addetudiant'])->name('etudiant.add');
    // Route::post('/add/cours', [ProfController::class,'addcours'])->name('cours.add');
    // // update cours and Etudiant
    // Route::post('update/etudiant/{etudiant}', [ProfController::class, 'updateetudiant'])->name('etudiant.update');
    // Route::post('update/cours/{cours}', [ProfController::class, 'updatecours'])->name('cours.update');
    // // delete cours and Etudiant
    // Route::delete('delete/cours/{cours}', [ProfController::class,'destroyCours'])->name('cours.destroye');
    // Route::delete('delete/etudiant/{etudiant}', [ProfController::class,'destroyEtudiant'])->name('etudiant.destroye');
     //////////////// comment //////////////////////////

});
// end Admin // / nf// ff//fv/vfv/vff///

// User /// / / // / // / // / // / // / // / // / //

Route::middleware('auth','role:user')->group(function () {
    //////////////// etudiant /////////////////////////
 Route::get('/user/dashboard', [UserController::class,'index'])->name('user');
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
