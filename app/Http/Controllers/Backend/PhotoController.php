<?php namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Models\PhotoModel;
use Input;
use Request;
use Validator;
use Session;

class PhotoController extends BackendController
{
   /*
    |-----------------------------------
    | get view photo
    |-----------------------------------
    */
    public function index() { 
        $clsPhoto = new PhotoModel();
        $data['list_photo'] = $clsPhoto->getListPhoto();
        $photo_id = '';
        if( (Input::get('photo_id') != null) ){
            $photo_id = Input::get('photo_id');
        }
        $data['pt_selected'] = Input::get('photo_id');
        $data['photos'] = $clsPhoto->getAllPhoto($photo_id);
        return view('backend.photos.index', $data);
    }

    /*
    |-----------------------------------
    | get view photo regist
    |-----------------------------------
    */
    public function regist() {
        if(Session::has('photo_regist')){
            Session::forget('photo_regist');
        }
        return view('backend.photos.regist');
    }

    /*
    |-----------------------------------
    | post view photo regist
    |-----------------------------------
    */
    public function postRegist() {
        $clsPhoto   = new PhotoModel();
        $validator  = Validator::make(Input::all(), $clsPhoto->Rules(), $clsPhoto->Messages());

        if ($validator->fails()) {
            return redirect()->route('backend.photos.regist')->withErrors($validator)->withInput();
        }

        $data['photo_name']                     = Input::get('photo_name');
        $data['photo_price']                    = Input::get('photo_price');
        $data['last_date']                      = date('Y-m-d H:i:s');
        $data['last_kind']                      = INSERT;
        $data['last_ipadrs']                    = CLIENT_IP_ADRS;
        $data['last_user']                      = 1;

        Session::put('photo_regist', $data);

        return redirect()->route('backend.photos.regist_cnf');

    }

    /*
    |-----------------------------------
    | get view photo regist confirm
    |-----------------------------------
    */
    public function registCnf() {
        $clsPhoto   = new PhotoModel();
        $data = array();
        if( Session::has('photo_regist') ){
            $data['photo'] = (Object) Session::get('photo_regist');
        }else{
            return redirect()->route('backend.photos.regist');
        }
        return view('backend.photos.regist_cnf', $data);
    }

    /*
    |-----------------------------------
    | save photo regist
    |-----------------------------------
    */
    public function saveRegist() {
        $clsPhoto = new PhotoModel();
        $data = array();
        if( Session::has('photo_regist') ){
            $data = Session::get('photo_regist');
            if ( $clsPhoto->insert($data) ) {
                return redirect()->route('backend.photos.regist_complete');
            } else {
                Session::flash('danger', trans('common.msg_photo_add_danger'));
                return redirect()->route('backend.photos.regist');
            }
        }else{
            return redirect()->route('backend.photos.regist');
        }
    }

    /*
    |-----------------------------------
    | get view photo regist complete
    |-----------------------------------
    */
    public function registComplete() {
        $data = array();
        if( Session::has('photo_regist') ){
            $data = Session::get('photo_regist');
        }
        $data['photo'] = (Object) $data;
        return view('backend.photos.regist_complete', $data);
        // Session::forget('photo_regist');
    }

    /*
    |-----------------------------------
    | get view photo delete confirm
    |-----------------------------------
    */
    public function deleteCnf($id) {
        $clsPhoto   = new PhotoModel();
        $data['photo'] = $clsPhoto->get_by_id($id);
        return view('backend.photos.delete_cnf', $data);
    }

    /*
    |-----------------------------------
    | get view photo delete compete
    |-----------------------------------
    */
    public function postDelete($id) {
        $clsPhoto   = new PhotoModel();
        $data['last_date']                      = date('Y-m-d H:i:s');
        $data['last_kind']                      = DELETE;
        $data['last_ipadrs']                    = CLIENT_IP_ADRS;
        $data['last_user']                      = 1;
        if ( $clsPhoto->update($id, $data) ) {
            return redirect()->route('backend.photos.delete_complete', $id);
        }else{
            return redirect()->route('backend.photos.delete_cnf',$id);
        }
    }

    /*saveDelete
    |-----------------------------------
    | get view photo delete compete
    |-----------------------------------
    */
    public function deleteComplete($id) {
        $clsPhoto   = new PhotoModel();
        $data['photo'] = $clsPhoto->trash_by_id($id);
        return view('backend.photos.delete_complete', $data);
    }

        /*
    |-----------------------------------
    | get view photo change
    |-----------------------------------
    */
    public function change($id) {
        $clsPhoto   = new PhotoModel();
        $data['photo'] = $clsPhoto->get_by_id($id);
        $data['photo_id'] = $id;
        if( Session::has('photo_change') ){
            $data['photo'] = (object) Session::get('photo_change');
        }
        return view('backend.photos.change', $data);
    }

    /*
    |-----------------------------------
    | post photo change
    |-----------------------------------
    */
    public function postChange($id) {
        $clsPhoto   = new PhotoModel();
        $validator  = Validator::make(Input::all(), $clsPhoto->Rules(), $clsPhoto->Messages());

        if ($validator->fails()) {
            return redirect()->route('backend.photos.change',$id)->withErrors($validator)->withInput();
        }

        $data['photo_name']                     = Input::get('photo_name');
        $data['photo_price']                    = Input::get('photo_price');
        $data['last_date']                      = date('Y-m-d H:i:s');
        $data['last_kind']                      = UPDATE;
        $data['last_ipadrs']                    = CLIENT_IP_ADRS;
        $data['last_user']                      = 1;

        Session::put('photo_change', $data);
        return redirect()->route('backend.photos.change_cnf',$id);
    }

    /*
    |-----------------------------------
    | get view photo change confirm
    |-----------------------------------
    */
    public function changeCnf($id) {
        $data = array();
        $data['photo_id'] = $id;
        if( Session::has('photo_change') ){
            $data['photo'] = (object) Session::get('photo_change');
        }else{
            return redirect()->route('backend.photos.change',$id);
        }
        return view('backend.photos.change_cnf', $data);
    }

    /*
    |-----------------------------------
    | get view photo change save
    |-----------------------------------
    */
    public function saveChange($id) {
        $clsPhoto   = new PhotoModel();
        $data = array();
        if( Session::has('photo_change') ){
            $data = Session::get('photo_change');
            if ( $clsPhoto->update($id, $data) ) {
                Session::forget('photo_change');
                return redirect()->route('backend.photos.change_complete',$id);
            } else {
                Session::flash('danger', trans('common.msg_photo_change_danger'));
                return redirect()->route('backend.photos.change',$id);
            }
        }else{
            return redirect()->route('backend.photos.change',$id);
        }
    }

    /*
    |-----------------------------------
    | get view photo change complete
    |-----------------------------------
    */
    public function changeComplete($id) {
        $data = array();
        $clsPhoto   = new PhotoModel();
        $data['photo'] = $clsPhoto->get_by_id($id);

        return view('backend.photos.change_complete', $data);
    }

     /*
    |-----------------------------------
    | get view photo detail
    |-----------------------------------
    */
    public function detail($id) {
        $clsPhoto   = new PhotoModel();
        $data['photo'] = $clsPhoto->get_by_id($id);
        return view('backend.photos.detail', $data);
    }



}