<?php namespace App\Http\Models;

use DB;

class MaterialModel extends CommonModel
{
    protected $table = 'm_material'; //table name
    protected $primaryKey = 'material_id'; //column id name
    protected $fieldOrderBy = 'material_name'; //column order by name
    protected $valueOrderBy = 'ASC'; //or DESC

    public function Rules()
    {
        return array(
            'material_name'                     => 'required',
            'material_price'                    => 'required|numeric',
            'material_class'                    => 'required',
            'material_disposal'                 => 'required',
        );
    }

    public function Messages()
    {
        return array(
            'material_name.required'            => trans('validation.error_material_name_required'),
            'material_price.required'           => trans('validation.error_material_price_required'),
            'material_price.numeric'           => trans('validation.error_material_price_numeric'),
            'material_class.required'           => trans('validation.error_material_class_required'),
            'material_disposal.required'        => trans('validation.error_material_disposal_required'),
        );
    }

    public function setData($data = array())
    {
        $dataInputs = array(
            'material_name'                     => isset($data['material_name']) ? $data['material_name'] : null,
            'material_price'                    => isset($data['material_price']) ? $data['material_price'] : null,
            'material_class1'                   => isset($data['material_class1']) ? $data['material_class1'] : null,
            'material_class2'                   => isset($data['material_class2']) ? $data['material_class2'] : null,
            'material_disposal'                 => isset($data['material_disposal']) ? $data['material_disposal'] : null,
            'material_free1'                    => isset($data['material_free1']) ? $data['material_free1'] : null,
            'material_free2'                    => isset($data['material_free2']) ? $data['material_free2'] : null,
            'material_free3'                    => isset($data['material_free3']) ? $data['material_free3'] : null,
            'material_free4'                    => isset($data['material_free4']) ? $data['material_free4'] : null,
            'material_free5'                    => isset($data['material_free5']) ? $data['material_free5'] : null,
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

        if ( !empty($where['keyword']) ) {
            $results = $results->where('material_name', 'LIKE', '%' . $where['keyword'] . '%');
        }

        //count
        $count = $results->count();

        $db = $results->orderBy($this->fieldOrderBy, $this->valueOrderBy)->offset($start)->limit(PAGINATION)->get();
        return [
            'count' => $count,
            'db' => $db
        ];
    }

    public function get_by_class($class = 1)
    {
        $results = DB::table($this->table)->where('last_kind', '<>', DELETE)->where('material_class'.$class, 1);
        $db = $results->orderBy($this->fieldOrderBy, $this->valueOrderBy)->get();
        return $db;
    }

    public function get_for_autocomplate($key = '')
    {
        $results = DB::table($this->table)->select('material_name')->where('last_kind', '<>', DELETE);

        if ( !empty($key) ) {
            $results = $results->where('material_name', 'like', '%' . $key . '%');
        }

        $db = $results->orderBy($this->fieldOrderBy, $this->valueOrderBy)->get();
        return $db;
    }
}