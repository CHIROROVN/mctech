<?php namespace App\Http\Models;
use DB;

class HolidayModel
{
    protected $table        = 't_holiday';
    protected $primaryKey   = 'holiday_id';
    public $timestamps  	= false;


    public function Rules()
    {
        return array(
                'working_id'                    => 'required',
                );
    }

    public function Messages()
    {
        return array(
            'working_id.required'               => trans('validation.error_holiday_working_required'),
            );
    }

    //get all Working list
    public function getAllHoliday($date=null){
            return DB::table($this->table)->select('working_id')->where('last_kind', '<>', DELETE)
            ->where('holiday_day', '=', $date)->first();
        }

    public function insert($data)
    {
        return DB::table($this->table)->insert($data);
    }

    public function get_by_id($id)
    {
        return DB::table($this->table)->where('last_kind', '<>', DELETE)->where('holiday_id', $id)->first();
    }

    public function get_max_order()
    {
        return DB::table($this->table)->where('last_kind', '<>', DELETE)->max('holiday_sort');
    }

    public function trash_by_id($id)
    {
        return DB::table($this->table)->where('holiday_id', $id)->first();
    }

    public function update($id, $data)
    {
        return DB::table($this->table)->where('holiday_id', $id)->update($data);
    }

}