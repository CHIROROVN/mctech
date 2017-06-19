<?php namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\BackendController;

class LessonController extends BackendController
{
   /*
    |-----------------------------------
    | get view lesson
    |-----------------------------------
    */
    public function index() {        
        return view('backend.lessons.index');
    }

    /*
    |-----------------------------------
    | get view lesson regist
    |-----------------------------------
    */
    public function regist() {        
        return view('backend.lessons.regist');
    }

    /*
    |-----------------------------------
    | post lesson regist
    |-----------------------------------
    */
    public function postRegist() {        
        
    } 

    /*
    |-----------------------------------
    | get view lesson regist confirm
    |-----------------------------------
    */
    public function registCnf() {        
        return view('backend.lessons.regist_cnf');
    }

    /*
    |-----------------------------------
    | get view lesson regist complete
    |-----------------------------------
    */
    public function registComplete() {        
        return view('backend.lessons.regist_complete');
    }

    /*
    |-----------------------------------
    | get view lesson delete confirm
    |-----------------------------------
    */
    public function deleteCnf() {        
        return view('backend.lessons.delete_cnf');
    }

    /*
    |-----------------------------------
    | get view lesson delete complete
    |-----------------------------------
    */
    public function deleteComplete() {        
        return view('backend.lessons.delete_complete');
    }

    /*
    |-----------------------------------
    | get view lesson change
    |-----------------------------------
    */
    public function change() {        
        return view('backend.lessons.change');
    }

    /*
    |-----------------------------------
    | post lesson change
    |-----------------------------------
    */
    public function postChange() {        
        
    }

    /*
    |-----------------------------------
    | get view lesson change confirm
    |-----------------------------------
    */
    public function changeCnf() {        
        return view('backend.lessons.change_cnf');
    }

    /*
    |-----------------------------------
    | get view lesson change complete
    |-----------------------------------
    */
    public function changeComplete() {        
        return view('backend.lessons.change_complete');
    }

     /*
    |-----------------------------------
    | get view lesson detail
    |-----------------------------------
    */
    public function detail() {        
        return view('backend.lessons.detail');
    }


}