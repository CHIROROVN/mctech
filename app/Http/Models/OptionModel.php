<?php namespace App\Http\Models;

use DB;

class OptionModel extends CommonModel
{
    protected $table = 'm_option'; //table name
    protected $primaryKey = 'option_id'; //column id name
    protected $fieldOrderBy = 'option_name'; //column order by name
    protected $valueOrderBy = 'ASC'; //or DESC

    public function Rules()
    {
        return array(
            'option_name'                       => 'required',
            'option_price'                      => 'required|numeric',
        );
    }

    public function Messages()
    {
        return array(
            'option_name.required'              => trans('validation.error_option_name_required'),
            'option_price.required'             => trans('validation.error_option_price_required'),
            'option_price.numeric'              => trans('validation.error_option_price_numeric'),
        );
    }

    public function setData($data = array())
    {
        $dataInputs = array(
            'option_name'                     => isset($data['option_name']) ? $data['option_name'] : null,
            'option_price'                    => isset($data['option_price']) ? $data['option_price'] : null,
            'option_free1'                    => isset($data['option_free1']) ? $data['option_free1'] : null,
            'option_free2'                    => isset($data['option_free2']) ? $data['option_free2'] : null,
            'option_free3'                    => isset($data['option_free3']) ? $data['option_free3'] : null,
            'option_free4'                    => isset($data['option_free4']) ? $data['option_free4'] : null,
            'option_free5'                    => isset($data['option_free5']) ? $data['option_free5'] : null,
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
            $results = $results->where('option_name', 'LIKE', '%' . $where['keyword'] . '%');
        }

        // keyword_id
        if ( !empty($where['keyword_id']) ) {
            $results = $results->orWhere('option_id', $where['keyword_id']);
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
        $results = DB::table($this->table)->select('option_id', 'option_name')->where('last_kind', '<>', DELETE);

        if ( !empty($key) ) {
            $results = $results->where('option_name', 'like', '%' . $key . '%');
        }

        $db = $results->orderBy($this->fieldOrderBy, $this->valueOrderBy)->get();
        return $db;
    }
}