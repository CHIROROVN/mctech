<?php namespace App\Http\Models\Backend;
use DB;

class PhotoModel
{
    protected $table        = 'm_photo';
    protected $primaryKey   = 'photo_id';
    public $timestamps  	= false;


    public function Rules()
    {
        return array(
                'photo_name'                        => 'required',
                'price'                             => 'required|numeric',
                );
    }

    public function Messages()
    {
        return array(
                'photo_name.required'               => trans('validation.error_photo_name_required'),
                'price.required'               		=> trans('validation.error_price_required'),
                'price.numeric'               		=> trans('validation.error_price_numeric'),
                
                );
    }

    //get all photo list
    public function getAllPhoto($photo_id=null){
        if(!empty($photo_id)){
            return DB::table($this->table)->where('last_kind', '<>', DELETE)->where('photo_id', $photo_id)->orderBy('last_date', '=', 'desc')->paginate();
        }else{
            return DB::table($this->table)->where('last_kind', '<>', DELETE)->orderBy('last_date', '=', 'desc')->paginate();
        }
    }

    // public function getListCat(){
    //     return DB::table($this->table)->where('last_kind', '<>', DELETE)->orderBy('order', '=', 'asc')->pluck('name', 'id');
    // }

    public function insert($data)
    {
        return DB::table($this->table)->insert($data);
    }

    public function get_by_id($id)
    {
        return DB::table($this->table)->where('id', $id)->first();
    }

    public function update($id, $data)
    {
        return DB::table($this->table)->where('id', $id)->update($data);
    }

}