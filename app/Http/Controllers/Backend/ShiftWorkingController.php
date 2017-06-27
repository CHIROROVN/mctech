<?php namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Models\WorkingModel;
use Input;
use Session;
use Validator;

class ShiftWorkingController extends BackendController
{
    /*
    |-----------------------------------
    | get view shift syukkin
    |-----------------------------------
    */
    public function index() {
        $clsWorking = new WorkingModel();
        $data['works'] = $clsWorking->getAllWorking();
        return view('backend.shifts.syukkin.index', $data);
    }

    /*
    |-----------------------------------
    | get view shift syukkin regist
    |-----------------------------------
    */
    public function regist() {
        $data = array();
        if(Input::has('action')){
            if(Session::has('working_regist')){
                $data['working'] = (Object) Session::get('working_regist');
            }
        }else{
            if(Session::has('working_regist')){
                Session::forget('working_regist');
            }
        }
        return view('backend.shifts.syukkin.regist', $data);
    }

    /*
    |-----------------------------------
    | post shift syukkin regist
    |-----------------------------------
    */
    public function postRegist() {
        $clsWorking = new WorkingModel();
        $max_order = $clsWorking->get_max_order();
        $validator  = Validator::make(Input::all(), $clsWorking->Rules(), $clsWorking->Messages());

        if ($validator->fails()) {
            return redirect()->route('backend.shifts.syukkin.regist')->withErrors($validator)->withInput();
        }

        $data['working_name']                   = Input::get('working_name');
        $data['working_color']                  = Input::get('working_color');
        $data['working_sort']                   = $max_order + 1;
        $data['last_date']                      = date('Y-m-d H:i:s');
        $data['last_kind']                      = INSERT;
        $data['last_ipadrs']                    = CLIENT_IP_ADRS;
        $data['last_user']                      = 1;

        Session::put('working_regist', $data);
        return redirect()->route('backend.shifts.syukkin.regist_cnf');
    }

    /*
    |-----------------------------------
    | get view shift syukkin regist confirm
    |-----------------------------------
    */
    public function registCnf() {
        $data = array();
        if(Session::has('working_regist')){
            $data['working'] = (Object) Session::get('working_regist');
        }
        return view('backend.shifts.syukkin.regist_cnf', $data);
    }

    /*
    |-----------------------------------
    | save shift syukkin regist
    |-----------------------------------
    */
    public function saveRegist(){
        $data = array();
        $clsWorking = new WorkingModel();
        if(Session::has('working_regist')){
            $data = Session::get('working_regist');
            if ( $clsWorking->insert($data) ) {
                Session::forget('working_regist');
                return redirect()->route('backend.shifts.syukkin.index');
            } else {
                Session::flash('danger', trans('common.msg_shubetsu_add_danger'));
                return redirect()->route('backend.shifts.syukkin.regist');
            }
        }else{
            return redirect()->route('backend.shifts.syukkin.regist');
        }
    }

    /*
    |-----------------------------------
    | get view shift syukkin change
    |-----------------------------------
    */
    public function change($id) {
        $clsWorking = new WorkingModel();
        $data['working_id'] = $id;
        $data['working'] = $clsWorking->get_by_id($id);
        return view('backend.shifts.syukkin.change', $data);
    }

    /*
    |-----------------------------------
    | post shift syukkin change
    |-----------------------------------
    */
    public function postChange($id) {
        $clsWorking = new WorkingModel();
        $validator  = Validator::make(Input::all(), $clsWorking->Rules(), $clsWorking->Messages());

        if ($validator->fails()) {
            return redirect()->route('backend.shifts.syukkin.change', $id)->withErrors($validator)->withInput();
        }

        $data['working_name']                   = Input::get('working_name');
        $data['working_color']                  = Input::get('working_color');
        $data['last_date']                      = date('Y-m-d H:i:s');
        $data['last_kind']                      = UPDATE;
        $data['last_ipadrs']                    = CLIENT_IP_ADRS;
        $data['last_user']                      = 1;

        Session::put('working_change', $data);
        return redirect()->route('backend.shifts.syukkin.change_cnf', $id);
    }

    /*
    |-----------------------------------
    | get shift syukkin delete confirm
    |-----------------------------------
    */
    public function changeCnf($id) {
        $clsWorking = new WorkingModel();
        $data = array();
        $data['working_id'] = $id;
        $data['old_working'] = $clsWorking->get_by_id($id);

        if(Session::has('working_change')){
            $data['working'] = (Object) Session::get('working_change');
        }
        return view('backend.shifts.syukkin.change_cnf', $data);
    }

    /*
    |-----------------------------------
    | post shift syukkin change
    |-----------------------------------
    */
    public function saveChange($id) {
        $data = array();
        $clsWorking = new WorkingModel();
        if(Session::has('working_change')){
            $data = Session::get('working_change');
            if ( $clsWorking->update($id, $data) ) {
                Session::forget('working_change');
                return redirect()->route('backend.shifts.syukkin.index');
            } else {
                Session::flash('danger', trans('common.msg_syukkin_add_danger'));
                return redirect()->route('backend.shifts.syukkin.change', $id);
            }
        }else{
            return redirect()->route('backend.shifts.syukkin.change', $id);
        }
    }

    /*
    |-----------------------------------
    | get view shift syukkin delete confirm
    |-----------------------------------
    */
    public function deleteCnf($id) {
        $clsWorking = new WorkingModel();
        $data['working'] = $clsWorking->get_by_id($id);

        return view('backend.shifts.syukkin.delete_cnf', $data);
    }

    /*
    |-----------------------------------
    | save shift syukkin delete
    |-----------------------------------
    */
    public function saveDelete($id){
        $data = array();
        $clsWorking = new WorkingModel();
        $data['last_date']                      = date('Y-m-d H:i:s');
        $data['last_kind']                      = DELETE;
        $data['last_ipadrs']                    = CLIENT_IP_ADRS;
        $data['last_user']                      = 1;

        if ( $clsWorking->update($id, $data) ) {
            return redirect()->route('backend.shifts.syukkin.index');
        } else {
            Session::flash('danger', trans('common.msg_syukkin_delete_danger'));
            return redirect()->route('backend.shifts.syukkin.delete_cnf', $id);
        }

    }


}