<?php
Route::prefix('admin')->middleware(['web','auth','admin'])->namespace('Admin')->group(function (){
    Route::get('/','AdminController@index');
    \App\Factory::Route_list();
    \App\Source::Route_list();
    \App\TypeSize::Route_list();
    \App\Category::Route_list();
    \App\Product::Route_list();
    \App\Color::Route_list();
    \App\Surface::Route_list();

});
