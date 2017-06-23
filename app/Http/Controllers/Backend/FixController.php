<?php namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Models\EquipmentModel;
use Input;
use Request;
use Validator;
use Session;

class FixController extends BackendController
{
   /*
    |-----------------------------------
    | get view fix
    |-----------------------------------
    */
    public function index() {
        $clsEquipment = new EquipmentModel();
        $data['categories'] = [''=>'すべて','1'=>'技工', '2'=>'写真', '3'=>'その他','all'=>'すべて'];
        $equipment_cat = '';
        if( (Input::get('equipment_cat') != null) ){
            $equipment_cat = Input::get('equipment_cat');
        }
        $data['equiptments'] = $clsEquipment->getAllEquipment($equipment_cat);
        $data['equipment_cat'] = $equipment_cat;
        return view('backend.fix.index', $data);
    }

    /*
    |-----------------------------------
    | get view fix regist
    |-----------------------------------
    */
    public function regist() {
        return view('backend.fix.regist');
    }

    /*
    |-----------------------------------
    | post fix regist
    |-----------------------------------
    */
    public function postRegist() {
        $clsEquipment   = new EquipmentModel();
        $validator  = Validator::make(Input::all(), $clsEquipment->Rules(), $clsEquipment->Messages());

        if ($validator->fails()) {
            return redirect()->route('backend.fix.regist')->withErrors($validator)->withInput();
        }

        $data['equipment_category']             = Input::get('equipment_category');
        $data['equipment_name']                 = Input::get('equipment_name');
        $data['equipment_price']                = Input::get('equipment_price');
        $data['last_date']                      = date('Y-m-d H:i:s');
        $data['last_kind']                      = INSERT;
        $data['last_ipadrs']                    = CLIENT_IP_ADRS;
        $data['last_user']                      = 1;

        Session::put('equipment_regist', $data);

        return redirect()->route('backend.fix.regist_cnf');
    } 

    /*
    |-----------------------------------
    | get view fix regist confirm
    |-----------------------------------
    */
    public function registCnf() {
        $clsEquipment   = new EquipmentModel();
        $data = array();
        $data['categories'] = [''=>'すべて','1'=>'技工', '2'=>'写真', '3'=>'その他','all'=>'すべて'];
        if( Session::has('equipment_regist') ){
            $data['equipment'] = (Object) Session::get('equipment_regist');
        }else{
            return redirect()->route('backend.fix.regist');
        }
        return view('backend.fix.regist_cnf', $data);
    }

    /*
    |-----------------------------------
    | save fix regist
    |-----------------------------------
    */
    public function saveRegist() {
        $clsEquipment   = new EquipmentModel();
        $data = array();
        if( Session::has('equipment_regist') ){
            $data = Session::get('equipment_regist');
            if ( $clsEquipment->insert($data) ) {
                return redirect()->route('backend.fix.regist_complete');
            } else {
                Session::flash('danger', trans('common.msg_equipment_add_danger'));
                return redirect()->route('backend.fix.regist');
            }
        }else{
            return redirect()->route('backend.fix.regist');
        }
    }

    /*
    |-----------------------------------
    | get view fix regist complete
    |-----------------------------------
    */
    public function registComplete() {
        $clsEquipment   = new EquipmentModel();
        $data = array();
        if( Session::has('equipment_regist') ){
            $data = Session::get('equipment_regist');
        }
        $data['equipment'] = (Object) $data;
        $data['categories'] = [''=>'すべて','1'=>'技工', '2'=>'写真', '3'=>'その他','all'=>'すべて'];
        return view('backend.fix.regist_complete', $data);
        Session::forget('equipment_regist');
    }

    /*
    |-----------------------------------
    | get view fix delete confirm
    |-----------------------------------
    */
    public function deleteCnf($id) {
        $equipment_cat = 'all';
        if( (Input::get('equipment_cat') != null) ){
            $equipment_cat = Input::get('equipment_cat');
        }
        $data['equipment_cat'] = $equipment_cat;
        $clsEquipment   = new EquipmentModel();
        $data['equipment'] = $clsEquipment->get_by_id($id);
        $data['categories'] = [''=>'すべて','1'=>'技工', '2'=>'写真', '3'=>'その他','all'=>'すべて'];
        return view('backend.fix.delete_cnf', $data);
    }

    /*
    |-----------------------------------
    | post fix delete
    |-----------------------------------
    */
    public function postDelete($id) {
        $equipment_cat = 'all';
        if( (Input::get('equipment_cat') != null) ){
            $equipment_cat = Input::get('equipment_cat');
        }

        $clsEquipment   = new EquipmentModel();
        $data['last_date']                      = date('Y-m-d H:i:s');
        $data['last_kind']                      = DELETE;
        $data['last_ipadrs']                    = CLIENT_IP_ADRS;
        $data['last_user']                      = 1;
        if ( $clsEquipment->update($id, $data) ) {
            return redirect()->route('backend.fix.delete_complete', [$id, 'equipment_cat'=>$equipment_cat]);
        }else{
            return redirect()->route('backend.fix.delete_cnf', [$id, 'equipment_cat'=>$equipment_cat]);
        }
    }

    /*
    |-----------------------------------
    | get view fix delete complete
    |-----------------------------------
    */
    public function deleteComplete($id) {
        $equipment_cat = 'all';
        if( (Input::get('equipment_cat') != null) ){
            $equipment_cat = Input::get('equipment_cat');
        }
        $data['equipment_cat'] = $equipment_cat;
        $clsEquipment   = new EquipmentModel();
        $data['equipment'] = $clsEquipment->trash_by_id($id);
        $data['categories'] = [''=>'すべて','1'=>'技工', '2'=>'写真', '3'=>'その他','all'=>'すべて'];
        return view('backend.fix.delete_complete', $data);
    }

    /*
    |-----------------------------------
    | get view fix change
    |-----------------------------------
    */
    public function change($id) {
        $data['equipment_cat'] = 'all';
        if( (Input::get('equipment_cat') != null) ){
            $data['equipment_cat'] = Input::get('equipment_cat');
        }
        $clsEquipment  = new EquipmentModel();
        $data['equipment'] = $clsEquipment->get_by_id($id);
        $data['equipment_id'] = $id;
        if( Session::has('equipment_change') ){
            $data['equipment'] = (object) Session::get('equipment_change');
        }
        return view('backend.fix.change', $data);
    }

    /*
    |-----------------------------------
    | post fix change
    |-----------------------------------
    */
    public function postChange($id) {
        $clsEquipment  = new EquipmentModel();
        $equipment_cat = 'all';
        if( (Input::get('equipment_cat') != null) ){
            $equipment_cat = Input::get('equipment_cat');
        }

        $validator  = Validator::make(Input::all(), $clsEquipment->Rules(), $clsEquipment->Messages());

        if ($validator->fails()) {
            return redirect()->route('backend.fix.change',$id)->withErrors($validator)->withInput();
        }

        $data['equipment_category']             = Input::get('equipment_category');
        $data['equipment_name']                 = Input::get('equipment_name');
        $data['equipment_price']                = Input::get('equipment_price');
        $data['last_date']                      = date('Y-m-d H:i:s');
        $data['last_kind']                      = UPDATE;
        $data['last_ipadrs']                    = CLIENT_IP_ADRS;
        $data['last_user']                      = 1;

        Session::put('equipment_change', $data);
        return redirect()->route('backend.fix.change_cnf',[$id, 'equipment_cat'=>$equipment_cat]);
    }

    /*
    |-----------------------------------
    | get view fix change confirm
    |-----------------------------------
    */
    public function changeCnf($id) {
        $data = array();
        $data['equipment_id'] = $id;
        $data['equipment_cat'] = 'all';
        if( (Input::get('equipment_cat') != null) ){
            $data['equipment_cat'] = Input::get('equipment_cat');
        }
        if( Session::has('equipment_change') ){
            $data['equipment'] = (object) Session::get('equipment_change');
        }else{
            return redirect()->route('backend.fix.change',$id);
        }
        $data['categories'] = [''=>'すべて','1'=>'技工', '2'=>'写真', '3'=>'その他','all'=>'すべて'];
        return view('backend.fix.change_cnf', $data);
    }

    /*
    |-----------------------------------
    | get view equipment change save
    |-----------------------------------
    */
    public function saveChange($id) {
        $clsEquipment  = new EquipmentModel();
        $data = array();
        $data['equipment_id'] = $id;
        $equipment_cat = 'all';
        if( (Input::get('equipment_cat') != null) ){
            $equipment_cat = Input::get('equipment_cat');
        }
        if( Session::has('equipment_change') ){
            $data = Session::get('equipment_change');
            if ( $clsEquipment->update($id, $data) ) {
                Session::forget('equipment_change');
                return redirect()->route('backend.fix.change_complete', [$id, 'equipment_cat'=>$equipment_cat]);
            } else {
                Session::flash('danger', trans('common.msg_photo_change_danger'));
                return redirect()->route('backend.fix.change', [$id, 'equipment_cat'=>$equipment_cat]);
            }
        }else{
            return redirect()->route('backend.fix.change', [$id, 'equipment_cat'=>$equipment_cat]);
        }
    }

    /*
    |-----------------------------------
    | get view fix change complete
    |-----------------------------------
    */
    public function changeComplete($id) {
        $data = array();
        $data['equipment_id'] = $id;
        $data['equipment_cat'] = 'all';
        if( (Input::get('equipment_cat') != null) ){
            $data['equipment_cat'] = Input::get('equipment_cat');
        }
        $clsEquipment  = new EquipmentModel();
        $data['equipment'] = $clsEquipment->get_by_id($id);
        $data['categories'] = [''=>'すべて','1'=>'技工', '2'=>'写真', '3'=>'その他','all'=>'すべて'];
        return view('backend.fix.change_complete', $data);
    }

    /*
    |-----------------------------------
    | get view fix detail
    |-----------------------------------
    */
    public function detail($id) {
        $clsEquipment   = new EquipmentModel();
        $data['equipment'] = $clsEquipment->get_by_id($id);
        $data['categories'] = ['1'=>'技工', '2'=>'写真', '3'=>'その他'];
        $equipment_cat = 'all';
        if( (Input::get('equipment_cat') != null) ){
            $equipment_cat = Input::get('equipment_cat');
        }
        $data['equipment_cat'] = $equipment_cat;
        return view('backend.fix.detail', $data);
    }


}