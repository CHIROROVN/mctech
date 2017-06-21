<?php namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\BackendController;

use App\Http\Models\OptionModel;
use App\Http\Models\MaterialModel;
use App\Http\Models\MoModel;
use Input;
use Validator;
use Session;

class OptionController extends BackendController
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
        $data['s_material_class1']      = Input::get('s_material_class1', null);
        $data['s_material_class2']      = Input::get('s_material_class2', null);
        Session::put('whereParams', $data);

        $clsOption                      = new OptionModel();
        $clsMo                          = new MoModel();
        $clsMaterial                    = new MaterialModel();
        $options                        = $clsOption->get_all_limit($data, $data['page']);
        $data['options']                = $options['db'];
        $data['countAll']               = $options['count'];
        $data['totalPage']              = ceil($data['countAll'] / PAGINATION);
        $data['materialClass1']         = $clsMaterial->get_by_class(1);
        $data['materialClass2']         = $clsMaterial->get_by_class(2);

        //set material
        foreach ( $data['options'] as $key => $item ) {
            $materials = $clsMo->get_by_option_id($item->option_id);
            $data['options'][$key]->materials = $materials;
        }

        //set status material_class
        foreach ( $data['options'] as $keyOption => $valueOption ) {
            $materialIdClass1 = array();
            $materialIdClass2 = array();
            foreach ( $valueOption->materials as $keyMaterial => $valueMaterial ) {
                if ( $valueMaterial->material_class1 == 1 ) {
                    $materialIdClass1[] = $valueMaterial->material_id;
                }
                if ( $valueMaterial->material_class2 == 1 ) {
                    $materialIdClass2[] = $valueMaterial->material_id;
                }
            }
            $data['options'][$keyOption]->materialIdClass1 = $materialIdClass1;
            $data['options'][$keyOption]->materialIdClass2 = $materialIdClass2;
        }
        //echo '<pre>';print_r($data);die;
        return view('backend.options.index', $data);
    }

    public function getRegist()
    {
        if ( !Input::get('back') ) {
            Session::forget('dataInputs');
        }

        $clsOption                      = new OptionModel();
        $clsMaterial                    = new MaterialModel();
        $data['materials']              = $clsMaterial->get_all();

        return view('backend.options.regist', $data);
    }

    public function postRegist()
    {
        $clsOption                      = new OptionModel();
        $clsMaterial                    = new MaterialModel();
        $materials                      = $clsMaterial->get_all();

        $inputs = Input::all();
        $validator = Validator::make($inputs, $clsOption->Rules(), $clsOption->Messages());
        if ($validator->fails()) {
            return redirect()->route('backend.options.regist')->withErrors($validator)->withInput();
        }

        //$dataInputs = $clsOption->setData($inputs);
        $tmp = array();
        if ( !empty($inputs['material_id'] && count($inputs['material_id']) > 0) ) {
            foreach ( $inputs['material_id'] as $material_id ) {
                foreach ( $materials as $material ) {
                    if ( $material_id == $material->material_id ) {
                        $arr = array(
                            'material_id' => $material->material_id,
                            'material_name' => $material->material_name
                        );
                        $tmp[] = $arr;
                    }
                }
            }
        }
        $inputs['materialName'] = $tmp;
        Session::put('dataInputs', $inputs);

        return redirect()->route('backend.options.regist.cnf');
    }

    public function getRegistCnf()
    {
        if ( !Session::has('dataInputs') ) {
            return redirect()->route('backend.options.regist');
        }
        return view('backend.options.regist_cnf');
    }

    public function getRegistEnd()
    {
        if ( !Session::has('dataInputs') ) {
            return redirect()->route('backend.options.regist');
        }

        $clsOption                    = new OptionModel();
        $clsMo                        = new MoModel();

        $dataInputs = Session::get('dataInputs');

        //insert table "option"
        $option_id = $clsOption->insert_get_id($clsOption->setData($dataInputs));

        //insert table "mo"
        if ( !empty($dataInputs['materialName']) && count($dataInputs['materialName']) > 0 ) {
            foreach ( $dataInputs['materialName'] as $item ) {
                $arr = array(
                    'option_id' => $option_id,
                    'material_id' => $item['material_id']
                );
                $clsMo->insert($clsMo->setData($arr));
            }
        }

        return view('backend.options.regist_end');
    }

    public function getDetail($id)
    {
        $clsOption                      = new OptionModel();
        $clsMo                          = new MoModel();
        $data['option']                 = $clsOption->get_by_id($id);

        //set material
        $materials                      = $clsMo->get_by_option_id($data['option']->option_id);
        $data['option']->materials      = $materials;
        return view('backend.options.detail', $data);
    }

    public function getDeleteCnf($id)
    {
        $clsOption                      = new OptionModel();
        $clsMo                          = new MoModel();
        $data['option']                 = $clsOption->get_by_id($id);

        //set material
        $materials                      = $clsMo->get_by_option_id($data['option']->option_id);
        $data['option']->materials      = $materials;
        return view('backend.options.delete_cnf', $data);
    }

    public function getDeleteEnd($id)
    {
        $clsOption                      = new OptionModel();
        $clsMo                          = new MoModel();
        $data['option']                 = $clsOption->get_by_id($id);

        //set material
        $materials                      = $clsMo->get_by_option_id($data['option']->option_id);
        $data['option']->materials      = $materials;

        //delete on table "option"
        $clsOption->delete($id);

        //delete on table "mo"
        $clsMo->delete_by_option_id($id);
        return view('backend.options.delete_end', $data);
    }

    public function getEdit($id)
    {
        if ( !Input::get('back') ) {
            Session::forget('dataInputs');
        }

        $clsOption                      = new OptionModel();
        $clsMaterial                    = new MaterialModel();
        $clsMo                          = new MoModel();
        $data['option']                 = $clsOption->get_by_id($id);
        $data['materials']              = $clsMaterial->get_all();

        //set material
        $materials                      = $clsMo->get_by_option_id($data['option']->option_id);
        $data['option']->materials      = $materials;

        //set status material_id, single
        $materialIds = array();
        foreach ( $data['option']->materials as $keyMaterial => $valueMaterial ) {
                $materialIds[] = $valueMaterial->material_id;
        }
        $data['option']->materialIds = $materialIds;

        return view('backend.options.edit', $data);
    }

    public function postEdit($id)
    {
        $clsOption                      = new OptionModel();
        $clsMaterial                    = new MaterialModel();
        $materials                      = $clsMaterial->get_all();

        $inputs = Input::all();
        $validator = Validator::make($inputs, $clsOption->Rules(), $clsOption->Messages());
        if ($validator->fails()) {
            return redirect()->route('backend.options.edit', $id)->withErrors($validator)->withInput();
        }

        //$dataInputs = $clsOption->setData($inputs);
        $tmp = array();
        if ( !empty($inputs['material_id'] && count($inputs['material_id']) > 0) ) {
            foreach ( $inputs['material_id'] as $material_id ) {
                foreach ( $materials as $material ) {
                    if ( $material_id == $material->material_id ) {
                        $arr = array(
                            'material_id' => $material->material_id,
                            'material_name' => $material->material_name
                        );
                        $tmp[] = $arr;
                    }
                }
            }
        }
        $inputs['materialName'] = $tmp;
        $data['id'] = $id;
        Session::put('dataInputs', $inputs);

        return view('backend.options.edit_cnf', $data);
    }

    public function getEditEnd($id)
    {
        if ( !Session::has('dataInputs') ) {
            return redirect()->route('backend.options.edit', $id);
        }

        $clsOption                      = new OptionModel();
        $clsMaterial                    = new MaterialModel();
        $clsMo                          = new MoModel();

        $dataInputs = Session::get('dataInputs');
        $dataInputs['last_kind'] = UPDATE;

        //update on table "option"
        $clsOption->update($id, $clsOption->setData($dataInputs));

        //update on table "mo"
        //step 1: delete old
        //step 2: insert new
        $clsMo->delete_by_option_id($id);
        foreach ( $dataInputs['material_id'] as $item ) {
            $dataInsert = $clsMo->setData($dataInputs);
            $dataInsert['option_id'] = $id;
            $dataInsert['material_id'] = $item;
            $clsMo->insert($dataInsert);
        }

        $data['id'] = $id;

        return view('backend.options.edit_end', $data);
    }

    public function AutoCompleteMaterialName()
    {
        $key            = Input::get('key', '');
        $clsOption      = new OptionModel();
        $optionNames    = $clsOption->get_for_autocomplate($key);
        $tmp = array();
        foreach ( $optionNames as $item ) {
            $tmp[] = (object)array(
                'value'     => $item->option_id,
                'label'     => $item->option_name,
                'desc'      => $item->option_name,
                'tel'       => $item->option_name,
            );
        }
        echo json_encode($tmp);
    }
}