<?php namespace App\Http\Models;
use DB;

class WorkingModel
{
    protected $table        = 'm_working';
    protected $primaryKey   = 'working_id';
    public $timestamps  	= false;


    public function Rules()
    {
        return array(
                'working_name'                    => 'required',
                );
    }

    public function Messages()
    {
        return array(
            'working_name.required'               => trans('validation.error_working_name_required'),
            );
    }

    //get all Working list
    public function getAllWorking(){
        return DB::table($this->table)->where('last_kind', '<>', DELETE)->orderBy('last_date', '=', 'desc')->orderBy('last_date', '=', 'desc')->get();
    }

    public function getListWorking(){
        return DB::table($this->table)->where('last_kind', '<>', DELETE)->orderBy('last_date', '=', 'desc')->pluck('working_name', 'working_id');
    }

    public function getWorking(){
        return DB::table($this->table)->select('working_id', 'working_name', 'working_color')->where('last_kind', '<>', DELETE)->orderBy('last_date', '=', 'desc')->get();
    }

    public function insert($data)
    {
        return DB::table($this->table)->insert($data);
    }

    public function get_by_id($id)
    {
        return DB::table($this->table)->where('last_kind', '<>', DELETE)->where('working_id', $id)->first();
    }

    public function trash_by_id($id)
    {
        return DB::table($this->table)->where('working_id', $id)->first();
    }

    public function update($id, $data)
    {
        return DB::table($this->table)->where('working_id', $id)->update($data);
    }

    public function get_max_order()
    {
        return DB::table($this->table)->where('last_kind', '<>', DELETE)->max('working_sort');
    }

    public function WorkingColor($working_id){
        return DB::table($this->table)->select('working_color')->where('last_kind', '<>', DELETE)->where('working_id', '=', $working_id)->first();
    }

}