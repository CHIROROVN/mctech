<?php namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Models\UserModel;
use App\Http\Models\ShiftKindModel;
use App\Http\Models\ShiftModel;
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

        return view('backend.shifts.index', $data);
    }

    public static function getListUser(){
        $clsUsers = new UserModel();
        return (Object) $clsUsers->getListUser();
    }

    public static function getAllKshift(){
        $clsShiftKind = new ShiftKindModel();
        return (Object) $clsShiftKind->getAllKshift();
    }

    public static function getShiftByDate($shift_date, $u_id){
        $clsShift = new ShiftModel();
        return (Object) $clsShift->getShiftByDate($shift_date, $u_id);
    }

    /*
    |-----------------------------------
    | post view shift
    |-----------------------------------
    */
    public function postIndex() {
        $clsShift = new ShiftModel();
        $inputDate = Input::get('curr_date');
        $arrDate = explode('-', $inputDate);
        $shift_rev = $clsShift->checkExistShift($arrDate[0], $arrDate[1]);

        if(empty($shift_rev)) $shift_rev = 0;
        $flag = false;

        $inputs = Input::all();

        unset($inputs['_token']);
        unset($inputs['curr_date']);

        $shifts = $inputs['shift'];

        $shift_memo = 'NULL';
        $shift_star = NULL;

        foreach ($shifts as $ks => $valS) {
            $arrSKey = explode('_', $ks);
            $u_id = $arrSKey[1];
            $shift_date = date('Y-m-d', strtotime($arrSKey[0]));
            $kshift_id = $valS;


            if(!empty($inputs['memo'])){
                $shift_memo = 'NULL';
                foreach ($inputs['memo'] as $km => $valM) {
                    $arrMKey = explode('_', $km);
                    if($arrMKey[0] == $shift_date && $arrMKey[1] == $u_id){
                        $shift_memo = $valM;
                    }
                }
            }

            if(!empty($inputs['star'])){
                $shift_star = NULL;
                foreach ($inputs['star'] as $kst => $valSt) {
                    $arrStKey = explode('_', $kst);
                    if($arrStKey[0] == $shift_date && $arrStKey[1] == $u_id){
                        $shift_star = $valSt;
                    }
                }
            }

            $data = array(
                //'shift_id'   => NULL,
                'shift_date' => date('Y-m-d', strtotime($shift_date)),
                'u_id'       => $u_id,
                'kshift_id'  => $kshift_id,
                'shift_memo' => $shift_memo,
                'shift_star' => $shift_star,
                'shift_rev'  => $shift_rev + 1,
                'last_date'  => date('Y-m-d H:i:s'),
                'last_kind'  => ($shift_rev == 0) ? INSERT : UPDATE,
                'last_ipadrs' => "'" . CLIENT_IP_ADRS . "'",
                'last_user'  => 1
                );

            if($clsShift->insert($data)){
                $flag = true;
            }else{
                $flag = false;
            }
        }

        if($flag){
            Session::flash('success', trans('common.msg_shift_update_success'));
            if(Input::has('next')){
                $next = Input::get('next');
                return redirect()->route('backend.shifts.index', ['next'=>$parm]);
            }elseif(Input::has('prev')){
                $prev = Input::get('prev');
                return redirect()->route('backend.shifts.index', ['prev'=>$parm]);
            }else{
                return redirect()->route('backend.shifts.index');
            }
        }else{
            Session::flash('danger', trans('common.msg_shift_update_danger'));
            if(Input::has('next')){
                $next = Input::get('next');
                return redirect()->route('backend.shifts.index', ['next'=>$parm]);
            }elseif(Input::has('prev')){
                $prev = Input::get('prev');
                return redirect()->route('backend.shifts.index', ['prev'=>$parm]);
            }else{
                return redirect()->route('backend.shifts.index');
            }
        }

    }

    /*
    |-----------------------------------
    | get view shift confirm
    |-----------------------------------
    */
    public function shiftCnf(){
        $data = array();
        // $clsShiftKind = new ShiftKindModel();
        // $data['kshift'] = $clsShiftKind->getListKShift();
        // if(Session::has('shifts')){
        //     $shifts = array();
        //     foreach (Session::get('shifts') as $value) {
        //         $shifts = $value;
        //     }

        //     $currDate = $shifts['curr_date'];
        //     $arrCurrDate = explode('-', $currDate);
        //     $data['year'] = $arrCurrDate[0];
        //     $data['month'] = $arrCurrDate[1];
        //     $data['max_day'] = $arrCurrDate[2];
        //     unset($shifts['curr_date']);
        // }

        // $data['shifts'] = $shifts;
        return view('backend.shifts.confirm', $data);
    }


}