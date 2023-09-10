<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\FormSubmissionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ResearchController;
use App\Http\Controllers\ResearchBudgetController;
use App\Models\Project;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/projects', [ProjectController::class, 'index'])->middleware(['auth', 'verified'])->name('project');

// Show the research page with the form and selected team members
Route::get('/research', [ResearchBudgetController::class, 'showResearch'])->middleware(['auth', 'verified'])->name('research');
// Process the form submission and save the research budget
Route::post('/research/budget/store', [ResearchBudgetController::class, 'store'])->middleware(['auth', 'verified'])->name('research.budget.store');

Route::delete('/research-budget/delete/{id}', [ResearchBudgetController::class, 'delete'])->middleware(['auth', 'verified'])->name('research-budget.delete');

Route::get('/upload', [ProjectController::class, 'showForm'])->middleware(['auth', 'verified'])->name('form.submit');
Route::post('/upload', [ProjectController::class, 'store'])->middleware(['auth', 'verified'])->name('form.submit');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
