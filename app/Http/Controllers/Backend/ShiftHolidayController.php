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

    /*
    |-----------------------------------
    | post shift holiday index
    |-----------------------------------
    */
    public function postHoliday() {
            echo '<pre>'; print_r(Input::all()); echo '</pre>'; die();
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