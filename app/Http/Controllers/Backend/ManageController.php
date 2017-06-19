<?php namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\BackendController;
//use Carbon/Carbon;
class ManageController extends BackendController
{
   /*
    |-----------------------------------
    | get view manage
    |-----------------------------------
    */
    public function index() {        
        return view('backend.manage.index');
    } 
}