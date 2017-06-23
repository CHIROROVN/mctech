<?php namespace App\Http\Models;
use DB;

class LessonModel
{
    protected $table        = 'm_lecture';
    protected $primaryKey   = 'lecture_id';
    public $timestamps      = false;


    public function Rules()
    {
        return array(
                'lecture_name'                    => 'required',
                'lecture_price'                   => 'required|numeric',
                );
    }

    public function Messages()
    {
        return array(
            'lecture_name.required'               => trans('validation.error_lecture_name_required'),
            'lecture_price.required'              => trans('validation.error_lecture_price_required'),
            'lecture_price.numeric'               => trans('validation.error_lecture_price_numeric'),
            
            );
    }

    //get all lesson list
    public function getAlllesson($lecture_id=null){
        if(empty($lecture_id) || $lecture_id == 'all'){
            return DB::table($this->table)->where('last_kind', '<>', DELETE)->orderBy('last_date', '=', 'desc')->simplePaginate(PAGINATION);
        }else{
            return DB::table($this->table)->where('last_kind', '<>', DELETE)->where('lecture_id', $lecture_id)->orderBy('last_date', '=', 'desc')->simplePaginate(PAGINATION);
        }
    }

    public function getListlesson(){
        return DB::table($this->table)->where('last_kind', '<>', DELETE)->orderBy('last_date', '=', 'desc')->pluck('lecture_name', 'lecture_id');
    }

    public function insert($data)
    {
        return DB::table($this->table)->insert($data);
    }

    public function get_by_id($id)
    {
        return DB::table($this->table)->where('last_kind', '<>', DELETE)->where('lecture_id', $id)->first();
    }

    public function trash_by_id($id)
    {
        return DB::table($this->table)->where('lecture_id', $id)->first();
    }

    public function update($id, $data)
    {
        return DB::table($this->table)->where('lecture_id', $id)->update($data);
    }

}