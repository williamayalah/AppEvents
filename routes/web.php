<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventAssistantController;
use App\Http\Controllers\EventController;
use App\Models\Event;
use Hamcrest\Core\Every;
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
    return redirect('events');
});
//EVENTS
Route::get('events', [EventController::class, 'index'])->name('event.index')->middleware('inspect.language.request');
Route::get('events/create', [EventController::class, 'create'])->name('event.create');
Route::delete('events/{event}',[EventController::class,'destroy'])->name('event.destroy');
Route::get('events/{event}',[EventController::class,'show'])->name('event.show');
Route::get('events/{event}/edit',[EventController::class,'edit'])->name('event.edit');
Route::put('events/{event}',[EventController::class,'update'])->name('event.update');
Route::post('events', [EventController::class, 'store'])->name('event.store');

//CATEGORIES
Route::get('categories', [CategoryController::class, 'index'])->name('category.index')->middleware('inspect.language.request');
Route::get('categories/create', [CategoryController::class, 'create'])->name('category.create');
Route::delete('categories/{category}',[CategoryController::class,'destroy'])->name('category.destroy');
Route::post('categories', [CategoryController::class, 'store'])->name('category.store');
Route::get('categories/{category}',[CategoryController::class,'show'])->name('category.show');
Route::get('categories/{category}/edit',[CategoryController::class,'edit'])->name('category.edit');
Route::put('categories/{category}',[CategoryController::class,'update'])->name('category.update');

//ASSISTANTS
Route::get('assistants/{event}', [EventAssistantController::class, 'show'])->name('assistant.show')/* ->middleware('inspect.language.request') */;
Route::post('assistants/{event}', [EventAssistantController::class, 'store'])->name('assistant.store');








