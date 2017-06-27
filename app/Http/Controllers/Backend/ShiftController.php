<?php namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Models\UserModel;
use Input;
use Session;
use Validator;
use Carbon\Carbon;

class ShiftController extends BackendController
{

   /*
    |-----------------------------------
    | get view shift
    |-----------------------------------
    */
    public function index() {
        $clsUsers = new UserModel();
        $data['users'] = $clsUsers->getListUser();
        $cDateNow = Carbon::now();
        $strDate = $cDateNow->toDateString();

        $dt = Carbon::createFromDate(2017, 06);


        if(Input::has('prev')){
            $prevYear = (int) splitDate(Input::get('prev'), 'Y');
            $data['yearCurr'] = $prevYear;
            $prevMonth = (int) splitDate(Input::get('prev'), 'm') - 1;
            $data['monthCurr'] = $prevMonth;
            $data['prevDate'] = $prevYear.'-'.$prevMonth;
        }else{
            $data['yearCurr'] = date('Y');
            $data['monthCurr'] = (int) date('m') + 0;
            $data['prevDate'] = date('Y').'-'.(int) date('m');
        }

        if(Input::has('next')){
            $nextYear = (int) splitDate(Input::get('next'), 'Y');
            $data['yearCurr'] = $nextYear;
            $nextMonth = (int) splitDate(Input::get('next'), 'm') + 1;
            $data['monthCurr'] = $nextMonth;
            $data['nextDate'] = $nextYear.'-'.$nextMonth;
        }else{
            $data['yearCurr'] = date('Y');
            $data['monthCurr'] = (int) date('m') + 0;
            $data['nextDate'] = date('Y').'-'.(int) date('m');
        }



        return view('backend.shifts.index', $data);
    }

    /*
    |-----------------------------------
    | post view shift
    |-----------------------------------
    */
    public function postIndex() {
    
    }

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