<?php namespace App\Http\Models;
use DB;

class ShiftKindModel
{
    protected $table        = 'm_shift_kind';
    protected $primaryKey   = 'kshift_id';
    public $timestamps  	= false;


    public function Rules()
    {
        return array(
                'kshift_name'                    => 'required',
                );
    }

    public function Messages()
    {
        return array(
            'kshift_name.required'               => trans('validation.error_kshift_name_required'),
            );
    }

    //get all Working list
    public function getAllKshift(){
            return DB::table($this->table)->where('last_kind', '<>', DELETE)->orderBy('last_date', '=', 'desc')->get();
        }

    public function insert($data)
    {
        return DB::table($this->table)->insert($data);
    }

    public function get_by_id($id)
    {
        return DB::table($this->table)->where('last_kind', '<>', DELETE)->where('kshift_id', $id)->first();
    }

    public function trash_by_id($id)
    {
        return DB::table($this->table)->where('kshift_id', $id)->first();
    }

    public function update($id, $data)
    {
        return DB::table($this->table)->where('kshift_id', $id)->update($data);
    }

}