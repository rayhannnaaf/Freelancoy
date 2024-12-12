<?php

use App\Http\Controllers\CategoryController;

Route::resource('categories', CategoryController::class);
Route::get('categories-pdf', [CategoryController::class, 'generatePDF'])->name('categories.pdf');

