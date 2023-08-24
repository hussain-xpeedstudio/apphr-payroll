<?php
Route::group(['namespace'=>'AppHr\Payroll\Http\Controllers','prefix'=>'payroll'],function(){
    Route::get('/api', 'PayrollFieldController@api');
    Route::get('show/fields', 'PayrollFieldController@getAllPayrollFields');
    Route::post('create/field', 'PayrollFieldController@createPayrollField');
    Route::post('create/general-settings', 'PayrollFieldController@createPayrollGeneralSetting');
    Route::get('show/general-settings', 'PayrollFieldController@getPayrollGeneralSetting');

    //Pivot Interaction
    Route::get('show/pivot-data', 'PayrollFieldController@getPayrollPivotData');

});