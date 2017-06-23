<?php namespace App\Http\Models;

use DB;
use Hash;

class AreaModel extends CommonModel
{
    protected $table = 'm_area'; //table name
    protected $primaryKey = 'area_id'; //column id name
    protected $fieldOrderBy = 'area_name'; //column order by name
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

        );
        return $dataInputs;
    }
}