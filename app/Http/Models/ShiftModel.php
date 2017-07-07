<?php namespace App\Http\Models;
use DB;

class ShiftModel
{
    protected $table        = 't_shift';
    protected $primaryKey   = 'shift_id';
    public $timestamps  	= false;

    //get shift by shift_date
    public function getShiftByDate($shift_date=null, $u_id=null){
        return DB::table($this->table)->where('last_kind', '<>', DELETE)->where('shift_date', '=', $shift_date)->where('u_id', '=', $u_id)->orderBy('shift_rev', '=', 'desc')->first();
    }

    public function checkExistShift($year=null, $month=null){
        return DB::table($this->table)->select('shift_rev')->where('last_kind', '<>', DELETE)->whereYear('shift_date', '=', $year)->whereMonth('shift_date', '=', $month)->max('shift_rev');
    }

    public function insert($data)
    {
        return DB::table($this->table)->insert($data);
    }

    public function get_by_id($id)
    {
        return DB::table($this->table)->where('last_kind', '<>', DELETE)->where('kshift_id', $id)->first();
    }

    public function update($id, $data)
    {
        return DB::table($this->table)->where('shift_id', $id)->update($data);
    }

}