<?php namespace App\Http\Models;

use DB;

class MoModel extends CommonModel
{
    protected $table = 'r_mo'; //table name
    protected $primaryKey = 'mo_id'; //column id name
    protected $fieldOrderBy = 'mo_id'; //column order by name
    protected $valueOrderBy = 'ASC'; //or DESC

    public function Rules()
    {
        return array(

        );
    }

    public function Messages()
    {
        return array(

        );
    }

    public function setData($data = array())
    {
        $dataInputs = array(
            'option_id'                         => isset($data['option_id']) ? $data['option_id'] : null,
            'material_id'                       => isset($data['material_id']) ? $data['material_id'] : null,
            'mo_free1'                          => isset($data['mo_free1']) ? $data['mo_free1'] : null,
            'mo_free2'                          => isset($data['mo_free2']) ? $data['mo_free2'] : null,
            'mo_free3'                          => isset($data['mo_free3']) ? $data['mo_free3'] : null,
            'mo_free4'                          => isset($data['mo_free4']) ? $data['mo_free4'] : null,
            'mo_free5'                          => isset($data['mo_free5']) ? $data['mo_free5'] : null,
            'last_date'                         => isset($data['last_date']) ? $data['last_date'] : date('Y-m-d H:i:s'),
            'last_kind'                         => isset($data['last_kind']) ? $data['last_kind'] : INSERT,
            'last_ipadrs'                       => isset($data['last_ipadrs']) ? $data['last_ipadrs'] : CLIENT_IP_ADRS,
            'last_user'                         => isset($data['last_user']) ? $data['last_user'] : null,
        );
        return $dataInputs;
    }

    public function get_by_option_id($option_id)
    {
        $results = DB::table($this->table)
                            ->join('m_material', 'r_mo.material_id', '=', 'm_material.material_id')
                            ->select('r_mo.*', 'm_material.material_name', 'm_material.material_class1', 'm_material.material_class2')
                            ->where('r_mo.last_kind', '<>', DELETE)
                            ->where('r_mo.option_id', $option_id)
                            ->orderBy($this->fieldOrderBy, $this->valueOrderBy)
                            ->get();
        return $results;
    }

    public function delete_by_option_id($option_id)
    {
        $data = array(
            'last_date'         => date('Y-m-d H:i:s'),
            'last_kind'         => DELETE,
            'last_ipadrs'       => CLIENT_IP_ADRS,
            'last_user'         => null
        );
        return DB::table($this->table)->where('option_id', $option_id)->update($data);
    }
}