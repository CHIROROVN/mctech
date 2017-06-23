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
                'working_price'                   => 'required|numeric',
                );
    }

    public function Messages()
    {
        return array(
            'working_name.required'               => trans('validation.error_working_name_required'),
            'working_price.required'              => trans('validation.error_working_price_required'),
            'working_price.numeric'               => trans('validation.error_working_price_numeric'),
            
            );
    }

    //get all Working list
    public function getAllWorking($working_id=null){
        if(empty($working_id) || $working_id == 'all'){
            return DB::table($this->table)->where('last_kind', '<>', DELETE)->orderBy('last_date', '=', 'desc')->simplePaginate(PAGINATION);
        }else{
            return DB::table($this->table)->where('last_kind', '<>', DELETE)->where('working_id', $working_id)->orderBy('last_date', '=', 'desc')->simplePaginate(PAGINATION);
        }
    }

    public function getListWorking(){
        return DB::table($this->table)->where('last_kind', '<>', DELETE)->orderBy('last_date', '=', 'desc')->pluck('working_name', 'working_id');
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

}