<?php namespace App\Http\Models;
use DB;

class EquipmentModel
{
    protected $table        = 'm_equipment';
    protected $primaryKey   = 'equipment_id';
    public $timestamps  	= false;


    public function Rules()
    {
        return array(
                'equipment_category'                => 'required',
                'equipment_name'                    => 'required',
                'equipment_price'                   => 'required|numeric',
                );
    }

    public function Messages()
    {
        return array(
            'equipment_category.required'               => trans('validation.error_equipment_category_required'),
            'equipment_name.required'               => trans('validation.error_equipment_name_required'),
            'equipment_price.required'              => trans('validation.error_equipment_price_required'),
            'equipment_price.numeric'               => trans('validation.error_equipment_price_numeric'),
            
            );
    }

    //get all equipment list
    public function getAllEquipment($equipment_cat=null){
        if(empty($equipment_cat) || $equipment_cat == 'all'){
            return DB::table($this->table)->where('last_kind', '<>', DELETE)->orderBy('last_date', '=', 'desc')->simplePaginate(PAGINATION);
        }else{
            return DB::table($this->table)->where('last_kind', '<>', DELETE)->where('equipment_category', $equipment_cat)->orderBy('last_date', '=', 'desc')->simplePaginate(PAGINATION);
        }
    }

    public function getListEquipment(){
        return DB::table($this->table)->where('last_kind', '<>', DELETE)->orderBy('last_date', '=', 'desc')->pluck('equipment_name', 'equipment_id');
    }

    public function insert($data)
    {
        return DB::table($this->table)->insert($data);
    }

    public function get_by_id($id)
    {
        return DB::table($this->table)->where('last_kind', '<>', DELETE)->where('equipment_id', $id)->first();
    }

    public function trash_by_id($id)
    {
        return DB::table($this->table)->where('equipment_id', $id)->first();
    }

    public function update($id, $data)
    {
        return DB::table($this->table)->where('equipment_id', $id)->update($data);
    }

}