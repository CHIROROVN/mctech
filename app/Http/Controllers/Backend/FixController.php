<?php namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\BackendController;

class FixController extends BackendController
{
   /*
    |-----------------------------------
    | get view fix
    |-----------------------------------
    */
    public function index() {        
        return view('backend.fix.index');
    }

    /*
    |-----------------------------------
    | get view fix regist
    |-----------------------------------
    */
    public function regist() {        
        return view('backend.fix.regist');
    }

    /*
    |-----------------------------------
    | post fix regist
    |-----------------------------------
    */
    public function postRegist() {        
        
    } 

    /*
    |-----------------------------------
    | get view fix regist confirm
    |-----------------------------------
    */
    public function registCnf() {        
        return view('backend.fix.regist_cnf');
    }

    /*
    |-----------------------------------
    | get view fix regist complete
    |-----------------------------------
    */
    public function registComplete() {        
        return view('backend.fix.regist_complete');
    }

    /*
    |-----------------------------------
    | get view fix delete confirm
    |-----------------------------------
    */
    public function deleteCnf() {        
        return view('backend.fix.delete_cnf');
    }

    /*
    |-----------------------------------
    | get view fix delete complete
    |-----------------------------------
    */
    public function deleteComplete() {        
        return view('backend.fix.delete_complete');
    }

    /*
    |-----------------------------------
    | get view fix change
    |-----------------------------------
    */
    public function change() {        
        return view('backend.fix.change');
    }

    /*
    |-----------------------------------
    | post fix change
    |-----------------------------------
    */
    public function postChange() {        
        
    }

    /*
    |-----------------------------------
    | get view fix change confirm
    |-----------------------------------
    */
    public function changeCnf() {        
        return view('backend.fix.change_cnf');
    }

    /*
    |-----------------------------------
    | get view fix change complete
    |-----------------------------------
    */
    public function changeComplete() {        
        return view('backend.fix.change_complete');
    }

     /*
    |-----------------------------------
    | get view fix detail
    |-----------------------------------
    */
    public function detail() {        
        return view('backend.fix.detail');
    }


}