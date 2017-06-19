<?php namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Frontend\FrontendController;
use Calendar;

class CalendarController extends FrontendController
{
   /*
    |-----------------------------------
    | get view calendar
    |-----------------------------------
    */
    public function index() {        
        return view('frontend.calendar.index');
    } 
}