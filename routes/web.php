<?php

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
    return view('welcome');
});

Auth::routes();

//Backend
Route::group(['prefix' => 'manage', 'namespace' => 'Backend'], function () {
    /*
    |--------------------------------------------------------------------------
    | Backend home page
    |--------------------------------------------------------------------------
    */
    Route::get('/main', ['as' => 'backend.menu.index', 'uses' => 'MenuController@index']);

    /*
    |--------------------------------------------------------------------------
    | Backend photo page
    |--------------------------------------------------------------------------
    */
    Route::get('/photo', ['as' => 'backend.photos.index', 'uses' => 'PhotoController@index']);
    Route::get('/photo/regist', ['as' => 'backend.photos.regist', 'uses' => 'PhotoController@regist']);
    Route::post('/photo/regist', ['as' => 'backend.photos.regist', 'uses' => 'PhotoController@postRegist']);
    Route::get('/photo/regist_confirm', ['as' => 'backend.photos.regist_cnf', 'uses' => 'PhotoController@registCnf']);
    Route::get('/photo/regist_save', ['as' => 'backend.photos.regist_save', 'uses' => 'PhotoController@saveRegist']);
    Route::get('/photo/regist_complete', ['as' => 'backend.photos.regist_complete', 'uses' => 'PhotoController@registComplete']);
    Route::get('/photo/delete/{id}', ['as' => 'backend.photos.delete_cnf', 'uses' => 'PhotoController@deleteCnf']);
    Route::get('/photo/save_del/{id}', ['as' => 'backend.photos.save_delete', 'uses' => 'PhotoController@postDelete']);
    Route::get('/photo/delete/{id}/complete', ['as' => 'backend.photos.delete_complete', 'uses' => 'PhotoController@deleteComplete']);
    Route::get('/photo/detail/{id}', ['as' => 'backend.photos.detail', 'uses' => 'PhotoController@detail']);    
    Route::get('/photo/change/{id}', ['as' => 'backend.photos.change', 'uses' => 'PhotoController@change']);   
    Route::post('/photo/change/{id}', ['as' => 'backend.photos.change', 'uses' => 'PhotoController@postChange']);
    Route::get('/photo/change/{id}/confirm', ['as' => 'backend.photos.change_cnf', 'uses' => 'PhotoController@changeCnf']);
    Route::get('/photo/change/{id}/save', ['as' => 'backend.photos.change_save', 'uses' => 'PhotoController@saveChange']);
    Route::get('/photo/change/{id}/complete', ['as' => 'backend.photos.change_complete', 'uses' => 'PhotoController@changeComplete']);

    /*
    |--------------------------------------------------------------------------
    | Backend lesson page
    |--------------------------------------------------------------------------
    */
    Route::get('/lesson', ['as' => 'backend.lessons.index', 'uses' => 'LessonController@index']);
    Route::get('/lesson/regist', ['as' => 'backend.lessons.regist', 'uses' => 'LessonController@regist']);
    Route::post('/lesson/regist', ['as' => 'backend.lessons.regist', 'uses' => 'LessonController@postRegist']);
    Route::get('/lesson/regist_confirm', ['as' => 'backend.lessons.regist_cnf', 'uses' => 'LessonController@registCnf']);
    Route::get('/lesson/regist_save', ['as' => 'backend.lessons.regist_save', 'uses' => 'LessonController@saveRegist']);
    Route::get('/lesson/regist_complete', ['as' => 'backend.lessons.regist_complete', 'uses' => 'LessonController@registComplete']);
    Route::get('/lesson/delete/{id}', ['as' => 'backend.lessons.delete_cnf', 'uses' => 'LessonController@deleteCnf']);
    Route::get('/lesson/save_del/{id}', ['as' => 'backend.lessons.save_delete', 'uses' => 'LessonController@postDelete']);
    Route::get('/lesson/delete/{id}/complete', ['as' => 'backend.lessons.delete_complete', 'uses' => 'LessonController@deleteComplete']);

    Route::get('/lesson/detail/{id}', ['as' => 'backend.lessons.detail', 'uses' => 'LessonController@detail']);
    Route::get('/lesson/save_del/{id}', ['as' => 'backend.lessons.save_delete', 'uses' => 'LessonController@postDelete']);
    Route::get('/lesson/change/{id}', ['as' => 'backend.lessons.change', 'uses' => 'LessonController@change']);   
    Route::post('/lesson/change/{id}', ['as' => 'backend.lessons.change', 'uses' => 'LessonController@postChange']);
    Route::get('/lesson/change/{id}/confirm', ['as' => 'backend.lessons.change_cnf', 'uses' => 'LessonController@changeCnf']);
    Route::get('/lesson/change/{id}/save', ['as' => 'backend.lessons.change_save', 'uses' => 'LessonController@saveChange']);
    Route::get('/lesson/change/{id}/complete', ['as' => 'backend.lessons.change_complete', 'uses' => 'LessonController@changeComplete']);

    /*
    |--------------------------------------------------------------------------
    | Backend fix page
    |--------------------------------------------------------------------------
    */
    Route::get('/fix', ['as' => 'backend.fix.index', 'uses' => 'FixController@index']);
    Route::get('/fix/regist', ['as' => 'backend.fix.regist', 'uses' => 'FixController@regist']);
    Route::post('/fix/regist', ['as' => 'backend.fix.regist', 'uses' => 'FixController@postRegist']);
    Route::get('/fix/regist_confirm', ['as' => 'backend.fix.regist_cnf', 'uses' => 'FixController@registCnf']);
    Route::get('/fix/regist_save', ['as' => 'backend.fix.regist_save', 'uses' => 'FixController@saveRegist']);
    Route::get('/fix/save_del/{id}', ['as' => 'backend.fix.save_delete', 'uses' => 'FixController@postDelete']);
    Route::get('/fix/regist_complete', ['as' => 'backend.fix.regist_complete', 'uses' => 'FixController@registComplete']);
    Route::get('/fix/detail/{id}', ['as' => 'backend.fix.detail', 'uses' => 'FixController@detail']);
    Route::get('/fix/delete_confirm/{id}', ['as' => 'backend.fix.delete_cnf', 'uses' => 'FixController@deleteCnf']);
    Route::get('/fix/delete_complete/{id}', ['as' => 'backend.fix.delete_complete', 'uses' => 'FixController@deleteComplete']);
    Route::get('/fix/detail/{id}', ['as' => 'backend.fix.detail', 'uses' => 'FixController@detail']);
    
    Route::get('/fix/change/{id}', ['as' => 'backend.fix.change', 'uses' => 'FixController@change']);
    Route::post('/fix/change/{id}', ['as' => 'backend.fix.change', 'uses' => 'FixController@postChange']);
    Route::get('/fix/change/{id}/confirm', ['as' => 'backend.fix.change_cnf', 'uses' => 'FixController@changeCnf']);
    Route::get('/fix/change/{id}/save', ['as' => 'backend.fix.change_save', 'uses' => 'FixController@saveChange']);
    Route::get('/fix/change/{id}/complete', ['as' => 'backend.fix.change_complete', 'uses' => 'FixController@changeComplete']);

    /*
    |--------------------------------------------------------------------------
    | Backend shift page
    |--------------------------------------------------------------------------
    */
    
    Route::get('/shifts/shubetsu', ['as' => 'backend.shifts.shubetsu.index', 'uses' => 'ShiftKindController@shubetsu']);
    
    Route::get('/shifts/shubetsu/regist', ['as' => 'backend.shifts.shubetsu.regist', 'uses' => 'ShiftKindController@shubetsuRegist']);
    Route::post('/shifts/shubetsu/regist', ['as' => 'backend.shifts.shubetsu.regist', 'uses' => 'ShiftKindController@postShubetsuRegist']);
    Route::get('/shifts/shubetsu/regist_save', ['as' => 'backend.shifts.shubetsu.regist_save', 'uses' => 'ShiftKindController@saveRegist']);
    Route::get('/shifts/shubetsu/regist_confirm', ['as' => 'backend.shifts.shubetsu.regist_cnf', 'uses' => 'ShiftKindController@shubetsuRegistCnf']);

    Route::get('/shifts/shubetsu/change/{id}', ['as' => 'backend.shifts.shubetsu.change', 'uses' => 'ShiftKindController@getChange']);
    Route::post('/shifts/shubetsu/change/{id}', ['as' => 'backend.shifts.shubetsu.change', 'uses' => 'ShiftKindController@postChange']);
    Route::get('/shifts/shubetsu/change/{id}/confirm', ['as' => 'backend.shifts.shubetsu.change_cnf', 'uses' => 'ShiftKindController@changeCnf']);
    Route::get('/shifts/shubetsu/change_save/{id}/confirm', ['as' => 'backend.shifts.shubetsu.change_save', 'uses' => 'ShiftKindController@saveChange']);
    Route::get('/shifts/shubetsu/delete/{id}/confirm', ['as' => 'backend.shifts.shubetsu.delete_cnf', 'uses' => 'ShiftKindController@deleteCnf']);
    Route::get('/shifts/shubetsu/delete_save/{id}', ['as' => 'backend.shifts.shubetsu.delete_save', 'uses' => 'ShiftKindController@saveDelete']);

    Route::get('/shifts', ['as' => 'backend.shifts.index', 'uses' => 'ShiftsController@index']);
    Route::post('/shifts', ['as' => 'backend.shifts.regist', 'uses' => 'ShiftController@postIndex']);

    Route::get('/shifts/syukkin', ['as' => 'backend.shifts.syukkin.index', 'uses' => 'ShiftController@syukkin']);
    Route::get('/shifts/syukkin/regist', ['as' => 'backend.shifts.syukkin.regist', 'uses' => 'ShiftController@syukkinRegist']);
    Route::post('/shifts/syukkin/regist', ['as' => 'backend.shifts.syukkin.regist', 'uses' => 'ShiftController@postSyukkinRegist']);
    Route::get('/shifts/syukkin/change', ['as' => 'backend.shifts.syukkin.change', 'uses' => 'ShiftController@syukkinChange']);
    Route::post('/shifts/syukkin/change', ['as' => 'backend.shifts.syukkin.change', 'uses' => 'ShiftController@postSyukkinChange']);

    Route::get('/shifts/holiday', ['as' => 'backend.shifts.holiday.index', 'uses' => 'ShiftController@holiday']);
    Route::post('/shifts/holiday', ['as' => 'backend.shifts.holiday.index', 'uses' => 'ShiftController@postHoliday']);

    Route::get('/shifts/holiday/regist_cnf', ['as' => 'backend.shifts.holiday.regist_cnf', 'uses' => 'ShiftController@holidayRegistCnf']);
    
    Route::get('/shifts/holiday/regist_complete', ['as' => 'backend.shifts.holiday.regist_complete', 'uses' => 'ShiftController@holidayRegistComplete']);

    //material
    Route::get('materials', ['as' => 'backend.materials.index', 'uses' => 'MaterialController@index']);
    Route::get('materials/regist', ['as' => 'backend.materials.regist', 'uses' => 'MaterialController@getRegist']);
    Route::post('materials/regist', ['as' => 'backend.materials.regist', 'uses' => 'MaterialController@postRegist']);
    Route::get('materials/regist/cnf', ['as' => 'backend.materials.regist.cnf', 'uses' => 'MaterialController@getRegistCnf']);
    Route::get('materials/regist/end', ['as' => 'backend.materials.regist.end', 'uses' => 'MaterialController@getRegistEnd']);
    Route::get('materials/detail/{id}', ['as' => 'backend.materials.detail', 'uses' => 'MaterialController@getDetail']);
    Route::get('materials/delete/cnf/{id}', ['as' => 'backend.materials.delete.cnf', 'uses' => 'MaterialController@getDeleteCnf']);
    Route::get('materials/delete/end/{id}', ['as' => 'backend.materials.delete.end', 'uses' => 'MaterialController@getDeleteEnd']);
    Route::get('materials/edit/{id}', ['as' => 'backend.materials.edit', 'uses' => 'MaterialController@getEdit']);
    Route::post('materials/edit/{id}', ['as' => 'backend.materials.edit', 'uses' => 'MaterialController@postEdit']);
    Route::get('materials/edit/end/{id}', ['as' => 'backend.materials.edit.end', 'uses' => 'MaterialController@getEditEnd']);
    Route::get('materials/ajax/autocomplete-materials-name', ['as' => 'backend.materials.autocomplete.materials.name', 'uses' => 'MaterialController@AutoCompleteMaterialName']);

    //option
    Route::get('options', ['as' => 'backend.options.index', 'uses' => 'OptionController@index']);
    Route::get('options/regist', ['as' => 'backend.options.regist', 'uses' => 'OptionController@getRegist']);
    Route::post('options/regist', ['as' => 'backend.options.regist', 'uses' => 'OptionController@postRegist']);
    Route::get('options/regist/cnf', ['as' => 'backend.options.regist.cnf', 'uses' => 'OptionController@getRegistCnf']);
    Route::get('options/regist/end', ['as' => 'backend.options.regist.end', 'uses' => 'OptionController@getRegistEnd']);
    Route::get('options/detail/{id}', ['as' => 'backend.options.detail', 'uses' => 'OptionController@getDetail']);
    Route::get('options/delete/cnf/{id}', ['as' => 'backend.options.delete.cnf', 'uses' => 'OptionController@getDeleteCnf']);
    Route::get('options/delete/end/{id}', ['as' => 'backend.options.delete.end', 'uses' => 'OptionController@getDeleteEnd']);
    Route::get('options/edit/{id}', ['as' => 'backend.options.edit', 'uses' => 'OptionController@getEdit']);
    Route::post('options/edit/{id}', ['as' => 'backend.options.edit', 'uses' => 'OptionController@postEdit']);
    Route::get('options/edit/end/{id}', ['as' => 'backend.options.edit.end', 'uses' => 'OptionController@getEditEnd']);
    Route::get('options/ajax/autocomplete-options-name', ['as' => 'backend.options.autocomplete.options.name', 'uses' => 'OptionController@AutoCompleteMaterialName']);

    //user
    Route::get('users', ['as' => 'backend.users.index', 'uses' => 'UserController@index']);
    Route::get('users/regist', ['as' => 'backend.users.regist', 'uses' => 'UserController@getRegist']);
    Route::post('users/regist', ['as' => 'backend.users.regist', 'uses' => 'UserController@postRegist']);
    Route::get('users/regist/cnf', ['as' => 'backend.users.regist.cnf', 'uses' => 'UserController@getRegistCnf']);
    Route::get('users/regist/end', ['as' => 'backend.users.regist.end', 'uses' => 'UserController@getRegistEnd']);
    Route::get('users/detail/{id}', ['as' => 'backend.users.detail', 'uses' => 'UserController@getDetail']);
    Route::get('users/delete/cnf/{id}', ['as' => 'backend.users.delete.cnf', 'uses' => 'UserController@getDeleteCnf']);
    Route::get('users/delete/end/{id}', ['as' => 'backend.users.delete.end', 'uses' => 'UserController@getDeleteEnd']);
    Route::get('users/edit/{id}', ['as' => 'backend.users.edit', 'uses' => 'UserController@getEdit']);
    Route::post('users/edit/{id}', ['as' => 'backend.users.edit', 'uses' => 'UserController@postEdit']);
    Route::get('users/edit/end/{id}', ['as' => 'backend.users.edit.end', 'uses' => 'UserController@getEditEnd']);
    Route::get('users/ajax/autocomplete-users-name', ['as' => 'backend.users.autocomplete.users.name', 'uses' => 'UserController@AutoCompleteMaterialName']);

    //hospital
    Route::get('hospitals', ['as' => 'backend.hospitals.index', 'uses' => 'HospitalController@index']);
    Route::get('hospitals/regist', ['as' => 'backend.hospitals.regist', 'uses' => 'HospitalController@getRegist']);
    Route::post('hospitals/regist', ['as' => 'backend.hospitals.regist', 'uses' => 'HospitalController@postRegist']);
    Route::get('hospitals/regist/cnf', ['as' => 'backend.hospitals.regist.cnf', 'uses' => 'HospitalController@getRegistCnf']);
    Route::get('hospitals/regist/end', ['as' => 'backend.hospitals.regist.end', 'uses' => 'HospitalController@getRegistEnd']);
    Route::get('hospitals/detail/{id}', ['as' => 'backend.hospitals.detail', 'uses' => 'HospitalController@getDetail']);
    Route::get('hospitals/delete/cnf/{id}', ['as' => 'backend.hospitals.delete.cnf', 'uses' => 'HospitalController@getDeleteCnf']);
    Route::get('hospitals/delete/end/{id}', ['as' => 'backend.hospitals.delete.end', 'uses' => 'HospitalController@getDeleteEnd']);
    Route::get('hospitals/edit/{id}', ['as' => 'backend.hospitals.edit', 'uses' => 'HospitalController@getEdit']);
    Route::post('hospitals/edit/{id}', ['as' => 'backend.hospitals.edit', 'uses' => 'HospitalController@postEdit']);
    Route::get('hospitals/edit/end/{id}', ['as' => 'backend.hospitals.edit.end', 'uses' => 'HospitalController@getEditEnd']);
    Route::get('hospitals/ajax/autocomplete-hospitals-name', ['as' => 'backend.hospitals.autocomplete.hospitals.name', 'uses' => 'HospitalController@AutoCompleteMaterialName']);

    /*
    |--------------------------------------------------------------------------
    | Backend manage page
    |--------------------------------------------------------------------------
    */
    Route::get('/menu', ['as' => 'backend.manage.index', 'uses' => 'ManageController@index']);

});

//Frontend
Route::group(['prefix' => 'users', 'namespace' => 'Frontend'], function () {
    /*
    |--------------------------------------------------------------------------
    | frontend calendar page
    |--------------------------------------------------------------------------
    */
    Route::get('/calendar', ['as' => 'frontend.calendar.index', 'uses' => 'CalendarController@index']);


});
