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
            if($param == 'Y'){
                return (int) $dt[0];
            }elseif($param == 'm'){
                return (int) $dt[1];
            }else{
                return $dt[0].'年'.$dt[1].'月';
            }
        }else{
            return '';
        }
    }
}
