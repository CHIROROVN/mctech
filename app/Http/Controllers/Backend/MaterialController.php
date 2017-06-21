<?php namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\BackendController;

use App\Http\Models\MaterialModel;
use Input;
use Validator;
use Session;

class MaterialController extends BackendController
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
        Session::put('whereParams', $data);

        $clsMaterial                    = new MaterialModel();
        $materials                      = $clsMaterial->get_all_limit($data, $data['page']);
        $data['materials']              = $materials['db'];
        $data['countAll']               = $materials['count'];
        $data['totalPage']              = ceil($data['countAll'] / PAGINATION);

        return view('backend.materials.index', $data);
    }

    public function getRegist()
    {
        if ( !Input::get('back') ) {
            Session::forget('dataInputs');
        }

        $clsMaterial                    = new MaterialModel();

        return view('backend.materials.regist');
    }

    public function postRegist()
    {
        $clsMaterial                    = new MaterialModel();

        $inputs = Input::all();
        $inputs['material_class'] = '';
        if ( isset($inputs['material_class1']) ) {
            $inputs['material_class'] = $inputs['material_class1'];
        } elseif ( isset($inputs['material_class2']) ) {
            $inputs['material_class'] = $inputs['material_class2'];
        }
        $validator = Validator::make($inputs, $clsMaterial->Rules(), $clsMaterial->Messages());
        if ($validator->fails()) {
            return redirect()->route('backend.materials.regist')->withErrors($validator)->withInput();
        }

        $dataInputs = $clsMaterial->setData($inputs);
        Session::put('dataInputs', $dataInputs);

        return redirect()->route('backend.materials.regist.cnf');
    }

    public function getRegistCnf()
    {
        if ( !Session::has('dataInputs') ) {
            return redirect()->route('backend.materials.regist');
        }
        return view('backend.materials.regist_cnf');
    }

    public function getRegistEnd()
    {
        if ( !Session::has('dataInputs') ) {
            return redirect()->route('backend.materials.regist');
        }

        $clsMaterial                    = new MaterialModel();

        $dataInputs = Session::get('dataInputs');
        if ( !$clsMaterial->insert($dataInputs) ) {
            return redirect()->route('backend.materials.regist');
        }

        return view('backend.materials.regist_end');
    }

    public function getDetail($id)
    {
        $clsMaterial                    = new MaterialModel();
        $data['material']               = $clsMaterial->get_by_id($id);
        return view('backend.materials.detail', $data);
    }

    public function getDeleteCnf($id)
    {
        $clsMaterial                    = new MaterialModel();
        $data['material']               = $clsMaterial->get_by_id($id);
        return view('backend.materials.delete_cnf', $data);
    }

    public function getDeleteEnd($id)
    {
        $clsMaterial                    = new MaterialModel();
        $data['material']               = $clsMaterial->get_by_id($id);
        $clsMaterial->delete($id);
        return view('backend.materials.delete_end', $data);
    }

    public function getEdit($id)
    {
        if ( !Input::get('back') ) {
            Session::forget('dataInputs');
        }

        $clsMaterial                    = new MaterialModel();
        $data['material']               = $clsMaterial->get_by_id($id);

        return view('backend.materials.edit', $data);
    }

    public function postEdit($id)
    {
        $clsMaterial                    = new MaterialModel();

        $inputs = Input::all();
        $inputs['material_class'] = '';
        if ( isset($inputs['material_class1']) ) {
            $inputs['material_class'] = $inputs['material_class1'];
        } elseif ( isset($inputs['material_class2']) ) {
            $inputs['material_class'] = $inputs['material_class2'];
        }
        $validator = Validator::make($inputs, $clsMaterial->Rules(), $clsMaterial->Messages());
        if ($validator->fails()) {
            return redirect()->route('backend.materials.edit', $id)->withErrors($validator)->withInput();
        }

        $dataInputs = $clsMaterial->setData($inputs);
        $data['id'] = $id;
        Session::put('dataInputs', $dataInputs);

        return view('backend.materials.edit_cnf', $data);
    }

    public function getEditEnd($id)
    {
        if ( !Session::has('dataInputs') ) {
            return redirect()->route('backend.materials.edit', $id);
        }

        $clsMaterial                    = new MaterialModel();

        $dataInputs = Session::get('dataInputs');
        $dataInputs['last_kind'] = UPDATE;

        if ( !$clsMaterial->update($id, $dataInputs) ) {
            return redirect()->route('backend.materials.edit', $id);
        }

        $data['id'] = $id;

        return view('backend.materials.edit_end', $data);
    }

    public function AutoCompleteMaterialName()
    {
        $key            = Input::get('key', '');
        $clsMaterial    = new MaterialModel();
        $materialNames  = $clsMaterial->get_for_autocomplate($key);
        $tmp = array();
        foreach ( $materialNames as $item ) {
            $tmp[] = (object)array(
                'value'     => $item->material_id,
                'label'     => $item->material_name,
                'desc'      => $item->material_name,
                'tel'       => $item->material_name,
            );
        }
        echo json_encode($tmp);
    }
}