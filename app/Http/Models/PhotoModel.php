<?php namespace App\Http\Models;
use DB;

class PhotoModel
{
    protected $table        = 'm_photo';
    protected $primaryKey   = 'photo_id';
    public $timestamps  	= false;


    public function Rules()
    {
        return array(
                'photo_name'                    => 'required',
                'photo_price'                   => 'required|numeric',
                );
    }

    public function Messages()
    {
        return array(
            'photo_name.required'               => trans('validation.error_photo_name_required'),
            'photo_price.required'              => trans('validation.error_photo_price_required'),
            'photo_price.numeric'               => trans('validation.error_photo_price_numeric'),
            
            );
    }

    //get all photo list
    public function getAllPhoto($photo_id=null){
        if(empty($photo_id) || $photo_id == 'all'){
            return DB::table($this->table)->where('last_kind', '<>', DELETE)->orderBy('last_date', '=', 'desc')->simplePaginate(PAGINATION);
        }else{
            return DB::table($this->table)->where('last_kind', '<>', DELETE)->where('photo_id', $photo_id)->orderBy('last_date', '=', 'desc')->simplePaginate(PAGINATION);
        }
    }

    public function getListPhoto(){
        return DB::table($this->table)->where('last_kind', '<>', DELETE)->orderBy('last_date', '=', 'desc')->pluck('photo_name', 'photo_id');
    }

    public function insert($data)
    {
        return DB::table($this->table)->insert($data);
    }

    public function get_by_id($id)
    {
        return DB::table($this->table)->where('last_kind', '<>', DELETE)->where('photo_id', $id)->first();
    }

    public function trash_by_id($id)
    {
        return DB::table($this->table)->where('photo_id', $id)->first();
    }

    public function update($id, $data)
    {
        return DB::table($this->table)->where('photo_id', $id)->update($data);
    }

}