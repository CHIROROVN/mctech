<?php namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\BackendController;

use App\Http\Models\HospitalModel;
use App\Http\Models\PrefModel;
use App\Http\Models\AreaModel;
use Input;
use Validator;
use Session;
use Config;

class HospitalController extends BackendController
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
        $data['s_hospital_address']     = Input::get('s_hospital_address', null);
        $data['s_pref_id']              = Input::get('s_pref_id', null);
        Session::put('whereParams', $data);

        $clsHospital                    = new HospitalModel();
        $clsPref                        = new PrefModel();
        $clsArea                        = new AreaModel();
        $hospitals                      = $clsHospital->get_all_limit($data, $data['page']);
        $data['hospitals']              = $hospitals['db'];
        $data['countAll']               = $hospitals['count'];
        $data['totalPage']              = ceil($data['countAll'] / PAGINATION);
        $data['prefInHospitals']        = $clsHospital->getPrefId();
        $data['prefInPrefs']            = $clsPref->getByArrayPrefId($data['prefInHospitals']);
        $data['areas']                  = $clsArea->get_all();

        foreach ( $data['areas'] as $keyArea => $area ) {
            $tmp = array();
            foreach ( $data['prefInPrefs'] as $pref ) {
                if ( $area->area_id == $pref->area_id ) {
                    $tmp[] = $pref;
                }
            }
            $data['areas'][$keyArea]->prefs = $tmp;
        }
        //echo '<pre>';print_r($data['prefInPrefs']);print_r($data['areas']);die;

        //get list pref already by hospital
        //get list area already by pref

        return view('backend.hospitals.index', $data);
    }

    public function getRegist()
    {
        if ( !Input::get('back') ) {
            Session::forget('dataInputs');
        }

        $clsPref                        = new PrefModel();
        $data['prefs']                  = $clsPref->get_all();

        return view('backend.hospitals.regist', $data);
    }

    public function postRegist()
    {
        $clsHospital                    = new HospitalModel();
        $clsPref                        = new PrefModel();
        $prefs                          = $clsPref->get_all();

        $inputs = Input::all();
        $validator = Validator::make($inputs, $clsHospital->Rules(), $clsHospital->Messages());
        if ($validator->fails()) {
            return redirect()->route('backend.hospitals.regist')->withErrors($validator)->withInput();
        }

        foreach ( $prefs as $pref ) {
            if ( $pref->pref_id == $inputs['pref_code'] ) {
                $inputs['pref_name'] = $pref->pref_name;
            }
        }

        Session::put('dataInputs', $inputs);

        return redirect()->route('backend.hospitals.regist.cnf');
    }

    public function getRegistCnf()
    {
        if ( !Session::has('dataInputs') ) {
            return redirect()->route('backend.hospitals.regist');
        }
        return view('backend.hospitals.regist_cnf');
    }

    public function getRegistEnd()
    {
        if ( !Session::has('dataInputs') ) {
            return redirect()->route('backend.hospitals.regist');
        }

        $clsHospital                        = new HospitalModel();

        $dataInputs = Session::get('dataInputs');

        //insert table "hospital"
        $clsHospital->insert($clsHospital->setData($dataInputs));

        return view('backend.hospitals.regist_end');
    }

    public function getDetail($id)
    {
        $clsHospital                        = new HospitalModel();
        $clsPref                            = new PrefModel();
        $prefs                              = $clsPref->get_all();
        $data['hospital']                   = $clsHospital->get_by_id($id);

        foreach ( $prefs as $pref ) {
            if ( $pref->pref_id == $data['hospital']->pref_code ) {
                $data['hospital']->pref_name = $pref->pref_name;
            }
        }

        return view('backend.hospitals.detail', $data);
    }

    public function getDeleteCnf($id)
    {
        $clsHospital                        = new HospitalModel();
        $clsPref                            = new PrefModel();
        $prefs                              = $clsPref->get_all();
        $data['hospital']                   = $clsHospital->get_by_id($id);

        foreach ( $prefs as $pref ) {
            if ( $pref->pref_id == $data['hospital']->pref_code ) {
                $data['hospital']->pref_name = $pref->pref_name;
            }
        }
        return view('backend.hospitals.delete_cnf', $data);
    }

    public function getDeleteEnd($id)
    {
        $clsHospital                        = new HospitalModel();
        $clsPref                            = new PrefModel();
        $prefs                              = $clsPref->get_all();
        $data['hospital']                   = $clsHospital->get_by_id($id);

        foreach ( $prefs as $pref ) {
            if ( $pref->pref_id == $data['hospital']->pref_code ) {
                $data['hospital']->pref_name = $pref->pref_name;
            }
        }
        $clsHospital->delete($id);
        return view('backend.hospitals.delete_end', $data);
    }

    public function getEdit($id)
    {
        if ( !Input::get('back') ) {
            Session::forget('dataInputs');
        }

        $clsHospital                        = new HospitalModel();
        $clsPref                            = new PrefModel();
        $data['hospital']                   = $clsHospital->get_by_id($id);
        $data['prefs']                      = $clsPref->get_all();
        return view('backend.hospitals.edit', $data);
    }

    public function postEdit($id)
    {
        $clsHospital                        = new HospitalModel();

        $inputs = Input::all();
        $validator = Validator::make($inputs, $clsHospital->Rules(), $clsHospital->Messages());
        if ($validator->fails()) {
            return redirect()->route('backend.hospitals.edit', $id)->withErrors($validator)->withInput();
        }

        $data['id'] = $id;
        Session::put('dataInputs', $inputs);

        return view('backend.hospitals.edit_cnf', $data);
    }

    public function getEditEnd($id)
    {
        if ( !Session::has('dataInputs') ) {
            return redirect()->route('backend.hospitals.edit', $id);
        }

        $clsHospital                        = new HospitalModel();

        $dataInputs = Session::get('dataInputs');
        $dataInputs['last_kind'] = UPDATE;
        $dataUpdate = $clsHospital->setData($dataInputs);
        $clsHospital->update($id, $dataUpdate);
        $data['id'] = $id;

        return view('backend.hospitals.edit_end', $data);
    }

    public function AutoCompleteMaterialName()
    {
        $key                = Input::get('key', '');
        $clsHospital        = new HospitalModel();
        $optionNames        = $clsHospital->get_for_autocomplate($key);
        $tmp = array();
        foreach ( $optionNames as $item ) {
            $tmp[] = (object)array(
                'value'     => $item->hospital_id,
                'label'     => $item->hospital_display,
                'desc'      => $item->hospital_display,
                'tel'       => $item->hospital_display,
            );
        }
        echo json_encode($tmp);
    }
}