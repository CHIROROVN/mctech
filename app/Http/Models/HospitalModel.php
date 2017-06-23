<?php namespace App\Http\Models;

use DB;
use Hash;

class HospitalModel extends CommonModel
{
    protected $table = 'm_hospital'; //table name
    protected $primaryKey = 'hospital_id'; //column id name
    protected $fieldOrderBy = 'hospital_display'; //column order by name
    protected $valueOrderBy = 'ASC'; //or DESC

    public function Rules()
    {
        return array(
            'hospital_display'                          => 'required',
            'hospital_name'                             => 'required',
            'hospital_doctor'                           => 'required',
            'hospital_zip'                              => 'required',
            'pref_code'                                 => 'required',
            'hospital_address'                          => 'required',
            'hospital_tel'                              => 'required',
            'hospital_email'                            => 'email',
        );
    }

    public function Messages()
    {
        return array(
            'hospital_display.required'                 => trans('validation.error_hospital_display_required'),
            'hospital_name.required'                    => trans('validation.error_hospital_name_required'),
            'hospital_doctor.required'                  => trans('validation.error_hospital_doctor_required'),
            'hospital_zip.required'                     => trans('validation.error_hospital_zip_required'),
            'pref_code.required'                        => trans('validation.error_pref_code_required'),
            'hospital_address.required'                 => trans('validation.error_hospital_address_required'),
            'hospital_tel.required'                     => trans('validation.error_hospital_tel_required'),
            'hospital_email.email'                      => trans('validation.error_hospital_email_email'),
        );
    }

    public function setData($data = array())
    {
        $dataInputs = array(
            'hospital_display'                          => isset($data['hospital_display']) ? $data['hospital_display'] : null,
            'hospital_name'                             => isset($data['hospital_name']) ? $data['hospital_name'] : null,
            'hospital_doctor'                           => isset($data['hospital_doctor']) ? $data['hospital_doctor'] : null,
            'hospital_zip'                              => isset($data['hospital_zip']) ? $data['hospital_zip'] : null,
            'pref_code'                                 => isset($data['pref_code']) ? $data['pref_code'] : null,
            'hospital_address'                          => isset($data['hospital_address']) ? $data['hospital_address'] : null,
            'hospital_tel'                              => isset($data['hospital_tel']) ? $data['hospital_tel'] : null,
            'hospital_fax'                              => isset($data['hospital_fax']) ? $data['hospital_fax'] : null,
            'hospital_email'                            => isset($data['hospital_email']) ? $data['hospital_email'] : null,
            'hospital_holiday_1'                        => isset($data['hospital_holiday_1']) ? $data['hospital_holiday_1'] : null,
            'hospital_holiday_2'                        => isset($data['hospital_holiday_2']) ? $data['hospital_holiday_2'] : null,
            'hospital_holiday_3'                        => isset($data['hospital_holiday_3']) ? $data['hospital_holiday_3'] : null,
            'hospital_holiday_4'                        => isset($data['hospital_holiday_4']) ? $data['hospital_holiday_4'] : null,
            'hospital_holiday_5'                        => isset($data['hospital_holiday_5']) ? $data['hospital_holiday_5'] : null,
            'hospital_holiday_6'                        => isset($data['hospital_holiday_6']) ? $data['hospital_holiday_6'] : null,
            'hospital_holiday_7'                        => isset($data['hospital_holiday_7']) ? $data['hospital_holiday_7'] : null,
            'hospital_discount'                         => isset($data['hospital_discount']) ? $data['hospital_discount'] : null,
            'hospital_return'                           => isset($data['hospital_return']) ? $data['hospital_return'] : null,
            'hospital_dspl_flag'                        => isset($data['hospital_dspl_flag']) ? $data['hospital_dspl_flag'] : null,
            'hospital_memo'                             => isset($data['hospital_memo']) ? $data['hospital_memo'] : null,
            'hospital_free1'                            => isset($data['hospital_free1']) ? $data['hospital_free1'] : null,
            'hospital_free2'                            => isset($data['hospital_free2']) ? $data['hospital_free2'] : null,
            'hospital_free3'                            => isset($data['hospital_free3']) ? $data['hospital_free3'] : null,
            'hospital_free4'                            => isset($data['hospital_free4']) ? $data['hospital_free4'] : null,
            'hospital_free5'                            => isset($data['hospital_free5']) ? $data['hospital_free5'] : null,
            'last_date'                                 => isset($data['last_date']) ? $data['last_date'] : date('Y-m-d H:i:s'),
            'last_kind'                                 => isset($data['last_kind']) ? $data['last_kind'] : INSERT,
            'last_ipadrs'                               => isset($data['last_ipadrs']) ? $data['last_ipadrs'] : CLIENT_IP_ADRS,
            'last_user'                                 => isset($data['last_user']) ? $data['last_user'] : null,
        );
        return $dataInputs;
    }

    public function get_all_limit($where = array(), $page)
    {
        $start = (($page - 1) * PAGINATION);
        $results = DB::table($this->table)->where('last_kind', '<>', DELETE);

        if ( !empty($where['keyword']) && empty($where['keyword_id']) ) {
            $results = $results->where(function($subQuery) use ($where) {
                $subQuery->orWhere('hospital_display', 'like', '%' . $where['keyword'] . '%');;
            });
        }

        // keyword_id
        if ( !empty($where['keyword_id']) ) {
            $results = $results->where($this->primaryKey, $where['keyword_id']);
        }

        // s_hospital_address
        if ( !empty($where['s_hospital_address']) ) {
            $results = $results->where('hospital_address', 'LIKE', '%' . $where['s_hospital_address'] . '%');
        }

        // s_pref_id
        if ( !empty($where['s_pref_id']) ) {
            $results = $results->whereIn('pref_code', $where['s_pref_id']);
        }

        //count
        $count = $results->count();

        $db = $results->orderBy($this->fieldOrderBy, $this->valueOrderBy)->offset($start)->limit(PAGINATION)->get();
        return [
            'count' => $count,
            'db' => $db
        ];
    }

    public function getPrefId()
    {
        $results = DB::table($this->table)->select('pref_code')->where('last_kind', '<>', DELETE)->get();
        $tmp = array();
        foreach ( $results as $item ) {
            $tmp[] = $item->pref_code;
        }
        return $tmp;
    }

    public function get_for_autocomplate($key = '')
    {
        $results = DB::table($this->table)->select('hospital_id', 'hospital_display')->where('last_kind', '<>', DELETE);

        if ( !empty($key) ) {
            $results = $results->where('hospital_display', 'like', '%' . $key . '%');
        }

        $db = $results->orderBy($this->fieldOrderBy, $this->valueOrderBy)->get();
        return $db;
    }
}