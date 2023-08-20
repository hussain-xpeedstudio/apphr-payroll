<?php
Route::group(['namespace'=>'AppHr\Payroll\Http\Controllers'],function(){
    Route::get('/api', 'PayrollFieldController@api');

});