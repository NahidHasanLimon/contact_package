<?php
use Nahidhasanlimon\Contact\Controllers\ContactController;

//     Route::get('demo-package', function(){
//     echo 'Hello from the demo package!';
// });
//     Route::get('check-view', function(){
//         return view('demo::contact');
// });
// Route::get('contact', function(){
//         return view('contact::contact');
// })->middleware('web');


Route::prefix('contact')->middleware(['web'])->group(function () {
    Route::get('/', [ContactController::class, 'index'])->name('contact.index');
    Route::get('/marked-all-seen', [ContactController::class, 'markded_all_seen'])->name('contact.marked.all.seen');
    Route::get('/create', function () {
        return view('contact::contact');
    });
    Route::post('contact', [ContactController::class, 'store'])->name('contact.post');
    
});


    