<?php namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\BackendController;

class PhotoController extends BackendController
{
   /*
    |-----------------------------------
    | get view photo
    |-----------------------------------
    */
    public function index() {        
        return view('backend.photos.index');
    }

    /*
    |-----------------------------------
    | get view photo regist
    |-----------------------------------
    */
    public function regist() {        
        return view('backend.photos.regist');
    }

    /*
    |-----------------------------------
    | post view photo regist
    |-----------------------------------
    */
    public function postRegist() {        
        
    } 

    /*
    |-----------------------------------
    | get view photo regist confirm
    |-----------------------------------
    */
    public function registCnf() {        
        return view('backend.photos.regist_cnf');
    }

    /*
    |-----------------------------------
    | get view photo regist complete
    |-----------------------------------
    */
    public function registComplete() {        
        return view('backend.photos.regist_complete');
    }

    /*
    |-----------------------------------
    | get view photo delete confirm
    |-----------------------------------
    */
    public function deleteCnf() {        
        return view('backend.photos.delete_cnf');
    }

    /*
    |-----------------------------------
    | get view photo delete compete
    |-----------------------------------
    */
    public function deleteComplete() {        
        return view('backend.photos.delete_complete');
    }

        /*
    |-----------------------------------
    | get view photo change
    |-----------------------------------
    */
    public function change() {        
        return view('backend.photos.change');
    }

    /*
    |-----------------------------------
    | post photo change
    |-----------------------------------
    */
    public function postChange() {        
        
    }

    /*
    |-----------------------------------
    | get view photo change confirm
    |-----------------------------------
    */
    public function changeCnf() {        
        return view('backend.photos.change_cnf');
    }

    /*
    |-----------------------------------
    | get view photo change complete
    |-----------------------------------
    */
    public function changeComplete() {        
        return view('backend.photos.change_complete');
    }

     /*
    |-----------------------------------
    | get view photo detail
    |-----------------------------------
    */
    public function detail() {        
        return view('backend.photos.detail');
    }



}