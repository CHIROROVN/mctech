<?php namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\BackendController;

class ShiftController extends BackendController
{

    /*
    |-----------------------------------
    | get view shift holiday index
    |-----------------------------------
    */
    public function holiday() {        
        return view('backend.shifts.holiday.index');
    }

    /*
    |-----------------------------------
    | post shift holiday index
    |-----------------------------------
    */
    public function postHolidayRegist() {        
        
    }

    /*
    |-----------------------------------
    | get view shift holiday comlete
    |-----------------------------------
    */
    public function holidayRegistComplete() {
        return view('backend.shifts.holiday.complete');
    }
    

}