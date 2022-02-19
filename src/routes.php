<?php
use Nahidhasanlimon\Contact\Controllers\ContactController;

//     Route::get('demo-package', function(){
//     echo 'Hello from the demo package!';
// });
//     Route::get('check-view', function(){
//         return view('demo::contact');
// });
    Route::get('contact', function(){
        return view('contact::contact');
})->middleware('web');
    Route::post('contact', [ContactController::class, 'store'])->middleware('web')->name('contact.post');
    