<?php namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Models\LessonModel;
use Input;
use Request;
use Validator;
use Session;

class LessonController extends BackendController
{
   /*
    |-----------------------------------
    | get view lesson
    |-----------------------------------
    */
    public function index() { 
        $clsLesson = new LessonModel();
        $data['list_lesson'] = $clsLesson->getListLesson();
        $lecture_id = '';
        if( (Input::get('lecture_id') != null) ){
            $lecture_id = Input::get('lecture_id');
        }
        $data['ls_selected'] = Input::get('lecture_id');
        $data['lessons'] = $clsLesson->getAllLesson($lecture_id);
        return view('backend.lessons.index', $data);
    }

    /*
    |-----------------------------------
    | get view lesson regist
    |-----------------------------------
    */
    public function regist() {
        if(Session::has('lesson_regist')){
            Session::forget('lesson_regist');
        }
        return view('backend.lessons.regist');
    }

    /*
    |-----------------------------------
    | post view lesson regist
    |-----------------------------------
    */
    public function postRegist() {
        $clsLesson   = new LessonModel();
        $validator  = Validator::make(Input::all(), $clsLesson->Rules(), $clsLesson->Messages());

        if ($validator->fails()) {
            return redirect()->route('backend.lessons.regist')->withErrors($validator)->withInput();
        }

        $data['lecture_name']                     = Input::get('lecture_name');
        $data['lecture_price']                    = Input::get('lecture_price');
        $data['last_date']                      = date('Y-m-d H:i:s');
        $data['last_kind']                      = INSERT;
        $data['last_ipadrs']                    = CLIENT_IP_ADRS;
        $data['last_user']                      = 1;

        Session::put('lesson_regist', $data);

        return redirect()->route('backend.lessons.regist_cnf');

    }

    /*
    |-----------------------------------
    | get view lesson regist confirm
    |-----------------------------------
    */
    public function registCnf() {
        $clsLesson   = new LessonModel();
        $data = array();
        if( Session::has('lesson_regist') ){
            $data['lesson'] = (Object) Session::get('lesson_regist');
        }else{
            return redirect()->route('backend.lessons.regist');
        }
        return view('backend.lessons.regist_cnf', $data);
    }

    /*
    |-----------------------------------
    | save lesson regist
    |-----------------------------------
    */
    public function saveRegist() {
         $clsLesson   = new LessonModel();
        $data = array();
        if( Session::has('lesson_regist') ){
            $data = Session::get('lesson_regist');
            if ( $clsLesson->insert($data) ) {
                return redirect()->route('backend.lessons.regist_complete');
            } else {
                Session::flash('danger', trans('common.msg_lecture_add_danger'));
                return redirect()->route('backend.lessons.regist');
            }
        }else{
            return redirect()->route('backend.lessons.regist');
        }
    }

    /*
    |-----------------------------------
    | get view lesson regist complete
    |-----------------------------------
    */
    public function registComplete() {
        $data = array();
        if( Session::has('lesson_regist') ){
            $data = Session::get('lesson_regist');
        }
        $data['lesson'] = (Object) $data;
        return view('backend.lessons.regist_complete', $data);
        // Session::forget('lesson_regist');
    }

    /*
    |-----------------------------------
    | get view lesson delete confirm
    |-----------------------------------
    */
    public function deleteCnf($id) {
        $clsLesson   = new LessonModel();
        $data['lesson'] = $clsLesson->get_by_id($id);
        return view('backend.lessons.delete_cnf', $data);
    }

    /*
    |-----------------------------------
    | get view lesson delete compete
    |-----------------------------------
    */
    public function postDelete($id) {
        $clsLesson   = new LessonModel();
        $data['last_date']                      = date('Y-m-d H:i:s');
        $data['last_kind']                      = DELETE;
        $data['last_ipadrs']                    = CLIENT_IP_ADRS;
        $data['last_user']                      = 1;
        if ( $clsLesson->update($id, $data) ) {
            return redirect()->route('backend.lessons.delete_complete', $id);
        }else{
            return redirect()->route('backend.lessons.delete_cnf',$id);
        }
    }

    /*saveDelete
    |-----------------------------------
    | get view lesson delete compete
    |-----------------------------------
    */
    public function deleteComplete($id) {
        $clsLesson   = new LessonModel();
        $data['lesson'] = $clsLesson->trash_by_id($id);
        return view('backend.lessons.delete_complete', $data);
    }

        /*
    |-----------------------------------
    | get view lesson change
    |-----------------------------------
    */
    public function change($id) {
        if( Session::has('lesson_change') ){
            Session::get('lesson_change');
        }
        $clsLesson   = new LessonModel();
        $data['lesson'] = $clsLesson->get_by_id($id);
        $data['lecture_id'] = $id;
        if( Session::has('lesson_change') ){
            $data['lesson'] = (object) Session::get('lesson_change');
        }
        return view('backend.lessons.change', $data);
    }

    /*
    |-----------------------------------
    | post lesson change
    |-----------------------------------
    */
    public function postChange($id) {
        $clsLesson   = new LessonModel();
        $validator  = Validator::make(Input::all(), $clsLesson->Rules(), $clsLesson->Messages());

        if ($validator->fails()) {
            return redirect()->route('backend.lessons.change',$id)->withErrors($validator)->withInput();
        }

        $data['lecture_name']                     = Input::get('lecture_name');
        $data['lecture_price']                    = Input::get('lecture_price');
        $data['last_date']                      = date('Y-m-d H:i:s');
        $data['last_kind']                      = UPDATE;
        $data['last_ipadrs']                    = CLIENT_IP_ADRS;
        $data['last_user']                      = 1;

        Session::put('lesson_change', $data);
        return redirect()->route('backend.lessons.change_cnf',$id);
    }

    /*
    |-----------------------------------
    | get view lesson change confirm
    |-----------------------------------
    */
    public function changeCnf($id) {
        $data = array();
        $data['lecture_id'] = $id;
        if( Session::has('lesson_change') ){
            $data['lesson'] = (object) Session::get('lesson_change');
        }else{
            return redirect()->route('backend.lessons.change',$id);
        }
        return view('backend.lessons.change_cnf', $data);
    }

    /*
    |-----------------------------------
    | get view lesson change save
    |-----------------------------------
    */
    public function saveChange($id) {
        $clsLesson   = new LessonModel();
        $data = array();
        if( Session::has('lesson_change') ){
            $data = Session::get('lesson_change');
            if ( $clsLesson->update($id, $data) ) {
                Session::forget('lesson_change');
                return redirect()->route('backend.lessons.change_complete',$id);
            } else {
                Session::flash('danger', trans('common.msg_lesson_change_danger'));
                return redirect()->route('backend.lessons.change',$id);
            }
        }else{
            return redirect()->route('backend.lessons.change',$id);
        }
    }

    /*
    |-----------------------------------
    | get view lesson change complete
    |-----------------------------------
    */
    public function changeComplete($id) {
        $data = array();
        $clsLesson   = new LessonModel();
        $data['lesson'] = $clsLesson->get_by_id($id);

        return view('backend.lessons.change_complete', $data);
    }

     /*
    |-----------------------------------
    | get view lesson detail
    |-----------------------------------
    */
    public function detail($id) {
        $clsLesson   = new LessonModel();
        $data['lesson'] = $clsLesson->get_by_id($id);
        return view('backend.lessons.detail', $data);
    }


}