<?php
use Carbon\Carbon;

if (!function_exists('DayJp')) {

    /**
     * description
     *
     * @param date and comma 
     * @return day japanese string
     */
    function DayJp($date=null, $comm=null){
        if(empty($comm)){
            if(!empty($date)){
                $convertEn2Jp = array('Sun'=>'日', 'Mon'=>'月', 'Tue'=>'火', 'Wed'=>'水', 'Thu'=>'木', 'Fri'=>'金', 'Sat'=>'土');
                $dayEn = strtotime($date);
                return $convertEn2Jp[date("D", $dayEn)];
            }else{
                return null;
            }
        }else{
            if(!empty($date)){
                $convertEn2Jp = array('Sun'=>'日', 'Mon'=>'月', 'Tue'=>'火', 'Wed'=>'水', 'Thu'=>'木', 'Fri'=>'金', 'Sat'=>'土');
                $dayEn = strtotime($date);
                return '('.$convertEn2Jp[date("D", $dayEn)].')';
            }else{
                return null;
            }
        }
    }

    /**
     * description
     *
     * @param date YYYY-mm
     * @return YYYY or mm or YYYY年mm月
    **/
    function splitDate($date=null, $param=null){
        if(!empty($date)){
            $dt = explode('-', $date);
            if($param == 'y'){
                return (int) $dt[0];
            }elseif($param == 'm'){
                return (int) $dt[1];
            }elseif($param == '-'){
                return $dt[0].'-'.$dt[1];
            }else{
                return $dt[0].'年'.$dt[1].'月';
            }
        }else{
            return '';
        }
    }

    /**
     * description
     *
     * @param date YYYY-mm-dd
     * @return YYYY or mm or YYYY年mm月
    **/
    function sDate($date=null, $param=null){
        if(!empty($date)){
            $dt = explode('-', $date);
            if($param == 'y'){
                return (int) $dt[0];
            }elseif($param == 'm'){
                return (int) $dt[1];
            }elseif($param == 'd'){
                return (int) $dt[2];
            }
        }else{
            return '';
        }
    }

    function DayOfMonth($m, $year){
        return cal_days_in_month(CAL_GREGORIAN, $m, $year);
    }

    function c2Digit($str){
        return sprintf("%02d", $str);
    }

    function working_by_date($date){
        return App\Http\Controllers\Backend\ShiftHolidayController::working_by_date($date);
    }

    function get_days_in_month($month, $year)
    {
       return $month == 2 ? ($year % 4 ? 28 : ($year % 100 ? 29 : ($year %400 ? 28 : 29))) : (($month - 1) % 7 % 2 ? 30 : 31);
    }

    function getHistoryId($holiday_day, $working_id){
        $history = App\Http\Controllers\Backend\ShiftHolidayController::getHistoryId($holiday_day, $working_id);
        if(!empty($history)) return $history;
        else return '';
    }

    function getListUser(){
        $users = App\Http\Controllers\Backend\ShiftController::getListUser();
        if(!empty($users)) return $users;
        else return '';
    }

    function Kshift(){
        $shiftKind = App\Http\Controllers\Backend\ShiftController::getAllKshift();
        if(!empty($shiftKind)) return $shiftKind;
        else return '';
    }

    function Shifts($shift_date, $u_id){
        $shifts = App\Http\Controllers\Backend\ShiftController::getShiftByDate($shift_date, $u_id);
        if(!empty($shifts)) return $shifts;
        else return '';
    }

    function KShiftColor($kshift_id){
        $color = App\Http\Controllers\Backend\ShiftController::KShiftColor($kshift_id);
        if(!empty($color)){
            $cc = explode('#', $color);
            return $cc[1];
        }else{
            return '';
        }
    }

    function WorkingColor($working_id){
        $color = App\Http\Controllers\Backend\ShiftHolidayController::WorkingColor($working_id);
        if(!empty($color)){
            $cc = explode('#', $color);
            return $cc[1];
        }else{
            return '';
        }
    }
}
