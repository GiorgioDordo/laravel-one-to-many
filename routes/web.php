<?php

use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
//     return view('pages.home');
// });

Auth::routes();

Route::get('/', HomeController::class)->name('home');

Route::middleware("auth")->prefix("/admin")->name("admin.")->group(function(){
    // Rotta per mostrare tutti i progetti
    Route::get("/projects", [AdminProjectController::class, "index"]) ->name("projects.index");

    // Rotta per creare i progetti
    Route::get("/projects/create", [AdminProjectController::class, "create"])->name("projects.create");

    // Rotta per mostrare i singoli progetti
    Route::get("/projects/{project}", [AdminProjectController::class, "show"])->name("projects.show");

    // Rotta per salvare nuovi progetti creati nel database
    Route::post("/projects", [AdminProjectController::class, "store"])->name("projects.store");

});
