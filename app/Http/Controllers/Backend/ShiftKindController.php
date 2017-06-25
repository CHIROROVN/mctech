<?php namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Models\ShiftKindModel;
use Input;
use Session;
use Validator;

class ShiftKindController extends BackendController
{

    /*
    |-----------------------------------
    | get view shift shubetsu
    |-----------------------------------
    */
    public function shubetsu() {
        $clsShiftKind = new ShiftKindModel();
        $data['kshifts'] = $clsShiftKind->getAllKshift();
        return view('backend.shifts.shubetsu.index', $data);
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
        $clsShiftKind = new ShiftKindModel();
        $validator  = Validator::make(Input::all(), $clsShiftKind->Rules(), $clsShiftKind->Messages());

        if ($validator->fails()) {
            return redirect()->route('backend.shifts.shubetsu.regist')->withErrors($validator)->withInput();
        }

        $data['kshift_name']                    = Input::get('kshift_name');
        $data['kshift_color']                    = Input::get('kshift_color');
        $data['last_date']                      = date('Y-m-d H:i:s');
        $data['last_kind']                      = INSERT;
        $data['last_ipadrs']                    = CLIENT_IP_ADRS;
        $data['last_user']                      = 1;

        Session::put('kshift_regist', $data);

        return redirect()->route('backend.shifts.shubetsu.regist_cnf');
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
    | get shift shubetsu delete confirm
    |-----------------------------------
    */
    public function shubetsuDeleteCnf() {
        //return view('backend.shifts.shubetsu.regist');
    }


}