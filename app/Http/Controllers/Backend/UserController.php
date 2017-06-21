<?php namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\BackendController;

use App\Http\Models\UserModel;
use App\Http\Models\MaterialModel;
use Input;
use Validator;
use Session;
use Config;

class UserController extends BackendController
{
    public function index()
    {
        if ( Session::has('dataInputs') ) {
            Session::forget('dataInputs');
        }

        $data = array();
        $keyword                        = Input::get('keyword', null);
        $keyword_id                     = Input::get('keyword_id', null);
        if ( empty($keyword) ) {
            $keyword_id = null;
        }
        $data['keyword']                = $keyword;
        $data['keyword_id']             = $keyword_id;
        $data['page']                   = (isset($_GET['page'])) ? $_GET['page'] : 1;
        $data['s_u_power']              = Input::get('s_u_power', null);
        Session::put('whereParams', $data);

        $clsUser                        = new UserModel();
        $users                          = $clsUser->get_all_limit($data, $data['page']);
        $data['users']                  = $users['db'];
        $data['countAll']               = $users['count'];
        $data['totalPage']              = ceil($data['countAll'] / PAGINATION);

        return view('backend.users.index', $data);
    }

    public function getRegist()
    {
        if ( !Input::get('back') ) {
            Session::forget('dataInputs');
        }

        $clsUser                        = new UserModel();
        $data['colors']                 = Config::get('constants.COLORS');

        return view('backend.users.regist', $data);
    }

    public function postRegist()
    {
        $clsUser                        = new UserModel();
        $clsMaterial                    = new MaterialModel();
        $materials                      = $clsMaterial->get_all();

        $inputs = Input::all();
        $validator = Validator::make($inputs, $clsUser->Rules(), $clsUser->Messages());
        if ($validator->fails()) {
            return redirect()->route('backend.users.regist')->withErrors($validator)->withInput();
        }

        Session::put('dataInputs', $inputs);

        return redirect()->route('backend.users.regist.cnf');
    }

    public function getRegistCnf()
    {
        if ( !Session::has('dataInputs') ) {
            return redirect()->route('backend.users.regist');
        }
        return view('backend.users.regist_cnf');
    }

    public function getRegistEnd()
    {
        if ( !Session::has('dataInputs') ) {
            return redirect()->route('backend.users.regist');
        }

        $clsUser                        = new UserModel();

        $dataInputs = Session::get('dataInputs');

        //insert table "option"
        $clsUser->insert($clsUser->setData($dataInputs));

        return view('backend.users.regist_end');
    }

    public function getDetail($id)
    {
        $clsUser                        = new UserModel();
        $data['user']                   = $clsUser->get_by_id($id);
        return view('backend.users.detail', $data);
    }

    public function getDeleteCnf($id)
    {
        $clsUser                        = new UserModel();
        $data['user']                   = $clsUser->get_by_id($id);
        return view('backend.users.delete_cnf', $data);
    }

    public function getDeleteEnd($id)
    {
        $clsUser                        = new UserModel();
        $data['user']                   = $clsUser->get_by_id($id);
        $clsUser->delete($id);
        return view('backend.users.delete_end', $data);
    }

    public function getEdit($id)
    {
        if ( !Input::get('back') ) {
            Session::forget('dataInputs');
        }

        $clsUser                        = new UserModel();
        $data['user']                   = $clsUser->get_by_id($id);
        $data['colors']                 = Config::get('constants.COLORS');
        return view('backend.users.edit', $data);
    }

    public function postEdit($id)
    {
        $clsUser                        = new UserModel();

        $inputs = Input::all();
        $rules = $clsUser->Rules();
        if ( !empty($inputs['u_login']) ){
            unset($rules['u_login']);
        }
        unset($rules['u_passwd']);
        $validator = Validator::make($inputs, $rules, $clsUser->Messages());
        if ($validator->fails()) {
            return redirect()->route('backend.users.edit', $id)->withErrors($validator)->withInput();
        }

        $data['id'] = $id;
        Session::put('dataInputs', $inputs);

        return view('backend.users.edit_cnf', $data);
    }

    public function getEditEnd($id)
    {
        if ( !Session::has('dataInputs') ) {
            return redirect()->route('backend.users.edit', $id);
        }

        $clsUser                        = new UserModel();

        $dataInputs = Session::get('dataInputs');
        $dataInputs['last_kind'] = UPDATE;
        $dataUpdate = $clsUser->setData($dataInputs);
        if ( empty($dataUpdate['u_passwd']) ) {
            unset($dataUpdate['u_passwd']);
        }
        $clsUser->update($id, $dataUpdate);
        $data['id'] = $id;

        return view('backend.users.edit_end', $data);
    }

    public function AutoCompleteMaterialName()
    {
        $key            = Input::get('key', '');
        $clsUser      = new UserModel();
        $optionNames    = $clsUser->get_for_autocomplate($key);
        $tmp = array();
        foreach ( $optionNames as $item ) {
            $tmp[] = (object)array(
                'value'     => $item->u_id,
                'label'     => $item->u_f_name . ' ' . $item->u_g_name . ' (' . $item->u_f_name_kana . ' ' . $item->u_g_name_kana . ')',
                'desc'      => $item->u_f_name . ' ' . $item->u_g_name . ' (' . $item->u_f_name_kana . ' ' . $item->u_g_name_kana . ')',
                'tel'       => $item->u_f_name . ' ' . $item->u_g_name,
            );
        }
        echo json_encode($tmp);
    }
}