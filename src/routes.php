<?php
use Nahidhasanlimon\Contact\Controllers\ContactController;
use Nahidhasanlimon\Contact\Controllers\EmailTemplateController;

Route::prefix('contact')->middleware(['web'])->group(function () {
    Route::get('/', [ContactController::class, 'index'])->name('contact.index');
    Route::get('/create', [ContactController::class, 'create'])->name('contact.create');
    Route::get('/marked-all-seen', [ContactController::class, 'marked_all_seen'])->name('contact.marked.all.seen');
    Route::post('store', [ContactController::class, 'store'])->name('contact.store');
});
Route::prefix('template')->middleware(['web'])->group(function () {
    Route::get('/', [EmailTemplateController::class, 'index'])->name('template.index');
    Route::get('/show/{template}', [EmailTemplateController::class, 'show'])->name('template.show');
    Route::get('/create', [EmailTemplateController::class, 'create'])->name('template.create');
    Route::post('/store', [EmailTemplateController::class, 'store'])->name('template.post');
    Route::post('/change-status/{template}', [EmailTemplateController::class, 'change_status'])->name('template.change_status');
    
});


    