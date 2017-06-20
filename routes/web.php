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
    Route::get('/lesson/regist_complete', ['as' => 'backend.lessons.regist_complete', 'uses' => 'LessonController@registComplete']);
    Route::get('/lesson/detail', ['as' => 'backend.lessons.detail', 'uses' => 'LessonController@detail']);
    Route::get('/lesson/delete_confirm', ['as' => 'backend.lessons.delete_cnf', 'uses' => 'LessonController@deleteCnf']);
    Route::get('/lesson/delete_complete', ['as' => 'backend.lessons.delete_complete', 'uses' => 'LessonController@deleteComlete']);
    Route::get('/lesson/detail', ['as' => 'backend.lessons.detail', 'uses' => 'LessonController@detail']);
    Route::get('/lesson/change', ['as' => 'backend.lessons.change', 'uses' => 'LessonController@change']);
    Route::post('/lesson/change', ['as' => 'backend.lessons.change', 'uses' => 'LessonController@postChange']);
    Route::get('/lesson/change_confirm', ['as' => 'backend.lessons.change_cnf', 'uses' => 'LessonController@changeCnf']);
    Route::get('/lesson/change_complete', ['as' => 'backend.lessons.change_complete', 'uses' => 'LessonController@changeComplete']);

    /*
    |--------------------------------------------------------------------------
    | Backend fix page
    |--------------------------------------------------------------------------
    */
    Route::get('/fix', ['as' => 'backend.fix.index', 'uses' => 'FixController@index']);
    Route::get('/fix/regist', ['as' => 'backend.fix.regist', 'uses' => 'FixController@regist']);
    Route::post('/fix/regist', ['as' => 'backend.fix.regist', 'uses' => 'FixController@postRegist']);
    Route::get('/fix/regist_confirm', ['as' => 'backend.fix.regist_cnf', 'uses' => 'FixController@registCnf']);
    Route::get('/fix/regist_complete', ['as' => 'backend.fix.regist_complete', 'uses' => 'FixController@registComplete']);
    Route::get('/fix/detail', ['as' => 'backend.fix.detail', 'uses' => 'FixController@detail']);
    Route::get('/fix/delete_confirm', ['as' => 'backend.fix.delete_cnf', 'uses' => 'FixController@deleteCnf']);
    Route::get('/fix/delete_complete', ['as' => 'backend.fix.delete_complete', 'uses' => 'FixController@deleteComlete']);
    Route::get('/fix/detail', ['as' => 'backend.fix.detail', 'uses' => 'FixController@detail']);
    Route::get('/fix/change', ['as' => 'backend.fix.change', 'uses' => 'FixController@change']);
    Route::post('/fix/change', ['as' => 'backend.fix.change', 'uses' => 'FixController@postChange']);
    Route::get('/fix/change_confirm', ['as' => 'backend.fix.change_cnf', 'uses' => 'FixController@changeCnf']);
    Route::get('/fix/change_complete', ['as' => 'backend.fix.change_complete', 'uses' => 'FixController@changeComplete']);

    /*
    |--------------------------------------------------------------------------
    | Backend shift page
    |--------------------------------------------------------------------------
    */
    Route::get('/shifts', ['as' => 'backend.shifts.index', 'uses' => 'ShiftsController@index']);
    Route::post('/shifts', ['as' => 'backend.shifts.regist', 'uses' => 'ShiftController@postIndex']);
    Route::get('/shifts/shubetsu', ['as' => 'backend.shifts.shubetsu.index', 'uses' => 'ShiftController@shubetsu']);
    Route::get('/shifts/shubetsu/regist', ['as' => 'backend.shifts.shubetsu.regist', 'uses' => 'ShiftController@shubetsuRegist']);
    Route::post('/shifts/shubetsu/regist', ['as' => 'backend.shifts.shubetsu.regist', 'uses' => 'ShiftController@postShubetsuRegist']);
    Route::get('/shifts/shubetsu/change', ['as' => 'backend.shifts.shubetsu.change', 'uses' => 'ShiftController@shubetsuChange']);
    Route::post('/shifts/shubetsu/change', ['as' => 'backend.shifts.shubetsu.change', 'uses' => 'ShiftController@postShubetsuChange']);

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
