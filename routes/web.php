<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\workspaceController;
use App\Models\workspace;
use App\Http\Controllers\boardeController;
use App\Http\Controllers\listController;
use App\Http\Controllers\cardController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    $workspaces=workspace::get()->all();
    return view('dashboard',compact('workspaces'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';
Route::middleware('auth')->group(function () {
route::get('/show/workspaces',[workspaceController::class,'showAll'])->name('show.workspace');
route::get('/Add/workspaces',[workspaceController::class,'create'])->name('create.workspace');
route::post('/Add/workspaces',[workspaceController::class,'store'])->name('store.workspace');
route::get('/edite/workspaces/{id}',[workspaceController::class,'ShowEdite'])->name('showedite.workspace');
route::post('/edite/workspaces/{id}',[workspaceController::class,'edite'])->name('edite.workspace');
route::get('/delete/workspaces/{id}',[workspaceController::class,'delete'])->name('delete.workspace');
route::get('/show/workspace/{id}',[workspaceController::class,'detailsworkspace'])->name('details.workspace');

route::get('/Add/board/{id}',[boardeController::class,'create'])->name('create.board');
route::post('/Add/board/{id}',[boardeController::class,'store'])->name('store.board');
route::get('/edite/board/{id}',[boardeController::class,'ShowEdite'])->name('showedite.boarde');
route::post('/edite/board/{id}',[boardeController::class,'edite'])->name('edite.boarde');
route::get('/delete/board/{id}',[boardeController::class,'delete'])->name('delete.boarde');



route::get('/Add/list/{id}',[listController::class,'create'])->name('create.list');
route::post('/Add/list/{id}',[listController::class,'store'])->name('store.list');
route::get('/edite/list/{id}',[listController::class,'ShowEdite'])->name('showedite.list');
route::post('/edite/list/{id}',[listController::class,'edite'])->name('edite.list');
route::get('/delete/list/{id}',[listController::class,'delete'])->name('delete.list');
route::get('/show/lists/{id}',[listController::class,'detailslists'])->name('details.list');



route::get('/Add/card/{id}',[cardController::class,'create'])->name('create.card');
route::post('/Add/card/{id}',[cardController::class,'store'])->name('store.card');
route::get('/edite/card/{id}',[cardController::class,'ShowEdite'])->name('showedite.card');
route::post('/edite/card/{id}',[cardController::class,'edite'])->name('edite.card');
route::get('/delete/card/{id}',[cardController::class,'delete'])->name('delete.card');
route::get('/show/card/{id}',[cardController::class,'detailslists'])->name('details.card');
});
