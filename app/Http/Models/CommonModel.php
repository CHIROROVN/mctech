<?php namespace App\Http\Models;

use DB;

class CommonModel
{
    protected $table = 'm_table'; //table name
    protected $primaryKey = 'field_id_name'; //column id name
    protected $fieldOrderBy = 'field_orderby_name'; //column order by name
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

    public function get_all()
    {
        $results = DB::table($this->table)->where('last_kind', '<>', DELETE)->orderBy($this->fieldOrderBy, $this->valueOrderBy)->get();
        return $results;
    }

    public function get_all_pagination()
    {
        $results = DB::table($this->table)->where('last_kind', '<>', DELETE)->orderBy($this->fieldOrderBy, $this->valueOrderBy)->paginate(PAGINATION);
        return $results;
    }

    public function countAll()
    {
        return DB::table($this->table)->where('last_kind', '<>', DELETE)->count();
    }

    public function insert($data)
    {
        return DB::table($this->table)->insert($data);
    }

    public function insert_get_id($data)
    {
        return DB::table($this->table)->insertGetId($data);
    }

    public function get_by_id($id)
    {
        return DB::table($this->table)->where($this->primaryKey, $id)->first();
    }

    public function update($id, $data)
    {
        return DB::table($this->table)->where($this->primaryKey, $id)->update($data);
    }

    public function delete($id)
    {
        $data = array(
            'last_date'         => date('Y-m-d H:i:s'),
            'last_kind'         => DELETE,
            'last_ipadrs'       => CLIENT_IP_ADRS,
            'last_user'         => null
        );
        return DB::table($this->table)->where($this->primaryKey, $id)->update($data);
    }
}