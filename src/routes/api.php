<?php
Route::group(['namespace'=>'AppHr\Payroll\Http\Controllers','prefix'=>'payroll'],function(){
    Route::get('/api', 'PayrollFieldController@api');
    Route::get('show/fields', 'PayrollFieldController@getAllPayrollFields');
    Route::post('create/field', 'PayrollFieldController@createPayrollField');

});