<?php namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\BackendController;

class ShiftController extends BackendController
{

    /*
    |-----------------------------------
    | get view shift shubetsu
    |-----------------------------------
    */
    public function shubetsu() {        
        return view('backend.shifts.shubetsu.index');
    }

    /*
    |-----------------------------------
    | get view shift shubetsu regist
    |-----------------------------------
    */
    public function shubetsuRegist() {        
        return view('backend.shifts.shubetsu.regist');
    }

    /*
    |-----------------------------------
    | post shift shubetsu regist
    |-----------------------------------
    */
    public function postShubetsuRegist() {        
        
    }

    /*
    |-----------------------------------
    | get view shift shubetsu change
    |-----------------------------------
    */
    public function shubetsuChange() {        
        return view('backend.shifts.shubetsu.change');
    }

    /*
    |-----------------------------------
    | post shift shubetsu change
    |-----------------------------------
    */
    public function postShubetsuChange() {        
        
    }



}