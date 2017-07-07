<?php namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Models\HolidayModel;
use App\Http\Models\WorkingModel;
use Input;
use Session;
use Validator;
use Carbon\Carbon;

class ShiftHolidayController extends BackendController
{

    /*
    |-----------------------------------
    | get view shift holiday index
    |-----------------------------------
    */
    public function index() {
        if(Session::has('holidays')){
            Session::forget('holidays');
        }

        $cShowDate = Carbon::now();
        $data['ymShow'] = $cShowDate->toDateString();

        $prevDate = Carbon::now()->subMonth();
        $data['prevDate'] = $prevDate->toDateString();

        $nextDate = Carbon::now()->addMonth();
        $data['nextDate'] = $nextDate->toDateString();

        $sYear = date('Y');
        $sMonth = date('m');

        if(Input::has('prev')){
            $sYear = splitDate(Input::get('prev'),'y');
            $sMonth = splitDate(Input::get('prev'),'m');

            $data['ymShow'] = Carbon::createFromDate($sYear, $sMonth)->toDateString();
            $prevDate = Carbon::createFromDate($sYear, $sMonth)->subMonth();
            $data['prevDate'] = $prevDate->toDateString();
            $nextDate =  Carbon::createFromDate($sYear, $sMonth)->addMonth();
            $data['nextDate'] = $nextDate->toDateString();
        }

        if(Input::has('next')){
            $sYear = splitDate(Input::get('next'),'y');
            $sMonth = splitDate(Input::get('next'),'m');

            $data['ymShow'] = Carbon::createFromDate($sYear, $sMonth)->toDateString();
            $prevDate = Carbon::createFromDate($sYear, $sMonth)->subMonth();
            $data['prevDate'] = $prevDate->toDateString();
            $nextDate =  Carbon::createFromDate($sYear, $sMonth)->addMonth();
            $data['nextDate'] = $nextDate->toDateString();
        }

        $clsWorking = new WorkingModel();
        $data['working'] = $clsWorking->getWorking();

        return view('backend.shifts.holiday.index', $data);
    }

    public static function working_by_date($date){
        $clsHoliday = new HolidayModel();
        $holiday = $clsHoliday->getAllHoliday($date);
        if(!empty($holiday)){
            return $holiday->working_id;
        }else{
            return '';
        }
        
    }

    public static function getHistoryId($holiday_day, $working_id){
        $clsHoliday = new HolidayModel();
        $holiday_id = $clsHoliday->getHistoryId($holiday_day, $working_id);
        if(!empty($holiday_id)){
            return $holiday_id;
        }else{
            return '';
        }
    }

    /*
    |-----------------------------------
    | post shift holiday index
    |-----------------------------------
    */
    public function postHoliday() {
        Session::push('holidays', Input::get('holidays'));
        return redirect()->route('backend.shifts.holiday.confirm');

    }

    /*
    |-----------------------------------
    | get view shift holiday confirm
    |-----------------------------------
    */
    public function holidayCnf() {
        if(!Session::has('holidays')){
            return redirect()->route('backend.shifts.holiday.index');
        }

        $data = array();
        $clsWorking = new WorkingModel();
        $data['working'] = $clsWorking->getWorking();
        $holidays = array();
        if(Session::has('holidays')){
            $holiday = Session::get('holidays');
            foreach ($holiday as $valHoliday) {
                $holidays = $valHoliday;
            }
        }
        $data['holiday'] = $holidays;

        return view('backend.shifts.holiday.confirm', $data);
    }

    /*
    |-----------------------------------
    |save shift holiday
    |-----------------------------------
    */
    public function holidaySave() {
        $clsHoliday = new HolidayModel();
        $flag = false;
        if(Session::has('holidays')){
            $holidays = array();
            foreach(Session::get('holidays') as $hd){
                $holidays = $hd;
            }
            foreach ($holidays as $kh => $valH) {
                $data['holiday_day'] = date('Y-m-d', strtotime($kh));
                $data['working_id'] = $valH;
                $data['last_date']  = date('Y-m-d H:i:s');
                $data['last_kind']  = INSERT;
                $data['last_ipadrs'] = "'" . CLIENT_IP_ADRS . "'";
                $data['last_user'] = 1;

                if($clsHoliday->insert($data)){
                    $flag = true;
                }else{
                    $flag = false;
                }
            }

            if($flag){
                return redirect()->route('backend.shifts.holiday.complete');
            }else{
                Session::flash('danger', trans('common.msg_shift_holiday_update_danger'));
                return redirect()->route('backend.shifts.holiday.confirm');
            }

        }else{
            return redirect()->route('backend.shifts.holiday.index');
        }
    }

    /*
    |-----------------------------------
    | get view shift holiday comlete
    |-----------------------------------
    */
    public function holidayComplete() {
         if(!Session::has('holidays')){
            return redirect()->route('backend.shifts.holiday.index');
        }
        $data = array();
        $clsWorking = new WorkingModel();
        $data['working'] = $clsWorking->getWorking();
        $holidays = array();
        if(Session::has('holidays')){
            $holiday = Session::get('holidays');
            foreach ($holiday as $valHoliday) {
                $holidays = $valHoliday;
            }
        }
        $data['holiday'] = $holidays;

        return view('backend.shifts.holiday.complete', $data);
    }
    

}