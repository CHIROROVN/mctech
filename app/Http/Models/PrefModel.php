<?php namespace App\Http\Models;

use DB;
use Hash;

class PrefModel extends CommonModel
{
    protected $table = 'm_pref'; //table name
    protected $primaryKey = 'pref_id'; //column id name
    protected $fieldOrderBy = 'pref_name'; //column order by name
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

    public function getByArrayPrefId($arrPrefId = array())
    {
        return DB::table($this->table)->where('last_kind', '<>', DELETE)->whereIn($this->primaryKey, $arrPrefId)->get();
    }


}