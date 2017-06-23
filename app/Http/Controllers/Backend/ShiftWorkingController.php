<?php namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\BackendController;

class ShiftWorkingController extends BackendController
{
        /*
    |-----------------------------------
    | get view shift syukkin
    |-----------------------------------
    */
    public function syukkin() {        
        return view('backend.shifts.syukkin.index');
    }

    /*
    |-----------------------------------
    | get view shift syukkin regist
    |-----------------------------------
    */
    public function syukkinRegist() {        
        return view('backend.shifts.syukkin.regist');
    }

    /*
    |-----------------------------------
    | post shift syukkin regist
    |-----------------------------------
    */
    public function postSyukkinRegist() {        
        
    }

    /*
    |-----------------------------------
    | get view shift syukkin change
    |-----------------------------------
    */
    public function syukkinChange() {        
        return view('backend.shifts.syukkin.change');
    }

    /*
    |-----------------------------------
    | post shift syukkin change
    |-----------------------------------
    */
    public function postSyukkinChange() {        
        
    }


}