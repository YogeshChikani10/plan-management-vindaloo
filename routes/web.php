<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\EligibilityCriteriaController;
use App\Http\Controllers\ComboPlanController;

Route::get('/', function () {
    return redirect('/plan');
});


// Plan Routes
Route::get('/plan', [PlanController::class, 'index'])->name('plan.index');
Route::post('/plan/save', [PlanController::class, 'save'])->name('plan.save');
Route::post('/plan/details', [PlanController::class, 'details'])->name('plan.details');
Route::post('/plan/delete', [PlanController::class, 'delete'])->name('plan.delete');

// Criteria Routes
Route::get('/criteria', [EligibilityCriteriaController::class, 'index'])->name('criteria.index');
Route::post('/criteria/save', [EligibilityCriteriaController::class, 'save'])->name('criteria.save');
Route::post('/criteria/details', [EligibilityCriteriaController::class, 'details'])->name('criteria.details');
Route::post('/criteria/delete', [EligibilityCriteriaController::class, 'delete'])->name('criteria.delete');

// Combo Plans
Route::get('/combo-plan', [ComboPlanController::class, 'index'])->name('combo-plan.index');
Route::post('/combo-plan/save', [ComboPlanController::class, 'save'])->name('combo-plan.save');
Route::post('/combo-plan/details', [ComboPlanController::class, 'details'])->name('combo-plan.details');
Route::post('/combo-plan/delete', [ComboPlanController::class, 'delete'])->name('combo-plan.delete');
