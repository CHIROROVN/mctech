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
        $data = array();
        if(Session::has('kshift_regist')){
            $data['shubetsu'] = (Object) Session::get('kshift_regist');
        }

        return view('backend.shifts.shubetsu.regist', $data);
    }

    /*
    |-----------------------------------
    | post shift shubetsu regist
    |-----------------------------------
    */
    public function postShubetsuRegist() {
        $clsShiftKind = new ShiftKindModel();
        $max_order = $clsShiftKind->get_max_order();
        $validator  = Validator::make(Input::all(), $clsShiftKind->Rules(), $clsShiftKind->Messages());

        if ($validator->fails()) {
            return redirect()->route('backend.shifts.shubetsu.regist')->withErrors($validator)->withInput();
        }

        $data['kshift_name']                    = Input::get('kshift_name');
        $data['kshift_color']                   = Input::get('kshift_color');
        $data['kshift_sort']                    = $max_order;
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
    public function shubetsuRegistCnf() {
        $data = array();
        if(Session::has('kshift_regist')){
            $data['shubetsu'] = (Object) Session::get('kshift_regist');
        }

        return view('backend.shifts.shubetsu.regist_cnf', $data);
    }

    /*
    |-----------------------------------
    | save shift shubetsu regist
    |-----------------------------------
    */
    public function saveRegist(){
        $data = array();
        $clsShiftKind = new ShiftKindModel();
        if(Session::has('kshift_regist')){
            $data = Session::get('kshift_regist');
            if ( $clsShiftKind->insert($data) ) {
                Session::forget('kshift_regist');
                return redirect()->route('backend.shifts.shubetsu.index');
            } else {
                Session::flash('danger', trans('common.msg_shubetsu_add_danger'));
                return redirect()->route('backend.shifts.shubetsu.regist');
            }
        }else{
            return redirect()->route('backend.shifts.shubetsu.regist');
        }
    }

    /*
    |-----------------------------------
    | get view shift shubetsu delete confirm
    |-----------------------------------
    */
    public function deleteCnf($id) {
        $clsShiftKind = new ShiftKindModel();
        $data['kshift'] = $clsShiftKind->get_by_id($id);

        return view('backend.shifts.shubetsu.delete_cnf', $data);
    }

        /*
    |-----------------------------------
    | save shift shubetsu delete
    |-----------------------------------
    */
    public function saveDelete($id){
        $data = array();
        $clsShiftKind = new ShiftKindModel();
        $data['last_date']                      = date('Y-m-d H:i:s');
        $data['last_kind']                      = DELETE;
        $data['last_ipadrs']                    = CLIENT_IP_ADRS;
        $data['last_user']                      = 1;

        if ( $clsShiftKind->update($id, $data) ) {
            return redirect()->route('backend.shifts.shubetsu.index');
        } else {
            Session::flash('danger', trans('common.msg_shubetsu_delete_danger'));
            return redirect()->route('backend.shifts.shubetsu.delete_cnf', $id);
        }

    }

    /*
    |-----------------------------------
    | get view shift shubetsu change
    |-----------------------------------
    */
    public function getChange($id) {
        $clsShiftKind = new ShiftKindModel();
        $data['kshift_id'] = $id;
        $data['shubetsu'] = $clsShiftKind->get_by_id($id);
        return view('backend.shifts.shubetsu.change', $data);
    }

     /*
    |-----------------------------------
    | post shift shubetsu change
    |-----------------------------------
    */
    public function postChange($id) {
        $clsShiftKind = new ShiftKindModel();
        $validator  = Validator::make(Input::all(), $clsShiftKind->Rules(), $clsShiftKind->Messages());

        if ($validator->fails()) {
            return redirect()->route('backend.shifts.shubetsu.change', $id)->withErrors($validator)->withInput();
        }

        $data['kshift_name']                    = Input::get('kshift_name');
        $data['kshift_color']                   = Input::get('kshift_color');
        $data['last_date']                      = date('Y-m-d H:i:s');
        $data['last_kind']                      = UPDATE;
        $data['last_ipadrs']                    = CLIENT_IP_ADRS;
        $data['last_user']                      = 1;

        Session::put('kshift_change', $data);

        return redirect()->route('backend.shifts.shubetsu.change_cnf', $id);
    }

    /*
    |-----------------------------------
    | post shift shubetsu change
    |-----------------------------------
    */
    public function saveChange($id) {
        $data = array();
        $clsShiftKind = new ShiftKindModel();
        if(Session::has('kshift_change')){
            $data = Session::get('kshift_change');
            if ( $clsShiftKind->update($id, $data) ) {
                Session::forget('kshift_change');
                return redirect()->route('backend.shifts.shubetsu.index');
            } else {
                Session::flash('danger', trans('common.msg_shubetsu_add_danger'));
                return redirect()->route('backend.shifts.shubetsu.change', $id);
            }
        }else{
            return redirect()->route('backend.shifts.shubetsu.change', $id);
        }
    }

    /*
    |-----------------------------------
    | get shift shubetsu delete confirm
    |-----------------------------------
    */
    public function changeCnf($id) {
        $clsShiftKind = new ShiftKindModel();
        $data = array();
        $data['kshift_id'] = $id;
        $data['kshift'] = $clsShiftKind->get_by_id($id);

        if(Session::has('kshift_change')){
            $data['shubetsu'] = (Object) Session::get('kshift_change');
        }
        return view('backend.shifts.shubetsu.change_cnf', $data);
    }


}