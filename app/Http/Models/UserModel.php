<?php namespace App\Http\Models;

use DB;
use Hash;

class UserModel extends CommonModel
{
    protected $table = 'm_user'; //table name
    protected $primaryKey = 'u_id'; //column id name
    protected $fieldOrderBy = 'u_name'; //column order by name
    protected $valueOrderBy = 'ASC'; //or DESC

    public function Rules()
    {
        return array(
            'u_f_name'                          => 'required',
            'u_g_name'                          => 'required',
            'u_f_name_kana'                     => 'required|regex:/^[\x{30A0}-\x{30FF}]+$/u',
            'u_g_name_kana'                     => 'required|regex:/^[\x{30A0}-\x{30FF}]+$/u',
            'u_name'                            => 'required',
            'u_login'                           => 'required|unique:m_user',
            'u_passwd'                          => 'required',
            'u_power'                           => 'required',
            'u_shift'                           => 'required',
            //'u_acronym'                         => 'required',
        );
    }

    public function Messages()
    {
        return array(
            'u_f_name.required'                 => trans('validation.error_u_f_name_required'),
            'u_g_name.required'                 => trans('validation.error_u_g_name_required'),
            'u_f_name_kana.required'            => trans('validation.error_u_f_name_kana_required'),
            'u_f_name_kana.regex'               => trans('validation.error_u_f_name_kana_regex'),
            'u_g_name_kana.required'            => trans('validation.error_u_g_name_kana_required'),
            'u_g_name_kana.regex'               => trans('validation.error_u_g_name_kana_regex'),
            'u_name.required'                   => trans('validation.error_u_name_required'),
            'u_login.required'                  => trans('validation.error_u_login_required'),
            'u_login.unique'                    => trans('validation.error_u_login_unique'),
            'u_passwd.required'                 => trans('validation.error_u_passwd_required'),
            'u_power.required'                  => trans('validation.error_u_power_required'),
            'u_shift.required'                  => trans('validation.error_u_shift_required'),
            'u_acronym.required'                => trans('validation.error_u_acronym_required'),
        );
    }

    public function setData($data = array())
    {
        $dataInputs = array(
            'u_f_name'                          => isset($data['u_f_name']) ? $data['u_f_name'] : null,
            'u_g_name'                          => isset($data['u_g_name']) ? $data['u_g_name'] : null,
            'u_f_name_kana'                     => isset($data['u_f_name_kana']) ? $data['u_f_name_kana'] : null,
            'u_g_name_kana'                     => isset($data['u_g_name_kana']) ? $data['u_g_name_kana'] : null,
            'u_name'                            => isset($data['u_name']) ? $data['u_name'] : null,
            'u_login'                           => isset($data['u_login']) ? $data['u_login'] : null,
            'u_passwd'                          => isset($data['u_passwd']) ? Hash::make($data['u_passwd']) : null,
            'u_power'                           => isset($data['u_power']) ? $data['u_power'] : null,
            'u_shift'                           => isset($data['u_shift']) ? $data['u_shift'] : null,
            'u_acronym'                         => isset($data['u_acronym']) ? $data['u_acronym'] : null,
            'u_color'                           => isset($data['u_color']) ? $data['u_color'] : null,
            'u_quit_day'                        => isset($data['u_quit_day']) ? $data['u_quit_day'] : null,
            'u_memo'                            => isset($data['u_memo']) ? $data['u_memo'] : null,
            'u_lastlogin'                       => isset($data['u_lastlogin']) ? $data['u_lastlogin'] : null,
            'u_free1'                           => isset($data['u_free1']) ? $data['u_free1'] : null,
            'u_free2'                           => isset($data['u_free2']) ? $data['u_free2'] : null,
            'u_free3'                           => isset($data['u_free3']) ? $data['u_free3'] : null,
            'u_free4'                           => isset($data['u_free4']) ? $data['u_free4'] : null,
            'u_free5'                           => isset($data['u_free5']) ? $data['u_free5'] : null,
            'last_date'                         => isset($data['last_date']) ? $data['last_date'] : date('Y-m-d H:i:s'),
            'last_kind'                         => isset($data['last_kind']) ? $data['last_kind'] : INSERT,
            'last_ipadrs'                       => isset($data['last_ipadrs']) ? $data['last_ipadrs'] : CLIENT_IP_ADRS,
            'last_user'                         => isset($data['last_user']) ? $data['last_user'] : null,
        );
        return $dataInputs;
    }

    public function get_all_limit($where = array(), $page)
    {
        $start = (($page - 1) * PAGINATION);
        $results = DB::table($this->table)->where('last_kind', '<>', DELETE);

        if ( !empty($where['keyword']) && empty($where['keyword_id']) ) {
            $results = $results->where(function($subQuery) use ($where) {
                $subQuery->orWhere('u_f_name', 'like', '%' . $where['keyword'] . '%');
                $subQuery->orWhere('u_g_name', 'like', '%' . $where['keyword'] . '%');
                $subQuery->orWhere('u_f_name_kana', 'like', '%' . $where['keyword'] . '%');
                $subQuery->orWhere('u_g_name_kana', 'like', '%' . $where['keyword'] . '%');
            });
        }

        // keyword_id
        if ( !empty($where['keyword_id']) ) {
            $results = $results->where('u_id', $where['keyword_id']);
        }

        // u_power
        if ( !empty($where['s_u_power']) ) {
            $results = $results->where('u_power', $where['s_u_power']);
        }

        //count
        $count = $results->count();

        $db = $results->orderBy($this->fieldOrderBy, $this->valueOrderBy)->offset($start)->limit(PAGINATION)->get();
        return [
            'count' => $count,
            'db' => $db
        ];
    }

    public function get_for_autocomplate($key = '')
    {
        $results = DB::table($this->table)->select('u_id', 'u_f_name', 'u_g_name', 'u_f_name_kana', 'u_g_name_kana')->where('last_kind', '<>', DELETE);

        if ( !empty($key) ) {
            $results = $results->where('u_f_name', 'like', '%' . $key . '%')
                                ->orWhere('u_g_name', 'like', '%' . $key . '%')
                                ->orWhere('u_f_name_kana', 'like', '%' . $key . '%')
                                ->orWhere('u_g_name_kana', 'like', '%' . $key . '%');
        }

        $db = $results->orderBy($this->fieldOrderBy, $this->valueOrderBy)->get();
        return $db;
    }

    public function getListUser(){
        return DB::table($this->table)->where('last_kind', '<>', DELETE)->orderBy('u_name', '=', 'asc')->pluck('u_name', 'u_id');
    }
}