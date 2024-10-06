<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Global_Model extends CI_Model
{
    public $_table_name;
    public $_order_by;
    public $_primary_key;
    public $_order = '';

    public function get_th_day($day)
    {
        return $last_id;
    }

    public function thai_date($time){
      $thai_month_arr=array(
          "0"=>"",
          "01"=>"มกราคม",
          "02"=>"กุมภาพันธ์",
          "03"=>"มีนาคม",
          "04"=>"เมษายน",
          "05"=>"พฤษภาคม",
          "06"=>"มิถุนายน",
          "07"=>"กรกฎาคม",
          "08"=>"สิงหาคม",
          "09"=>"กันยายน",
          "10"=>"ตุลาคม",
          "11"=>"พฤศจิกายน",
          "12"=>"ธันวาคม"
        );
    $thai_month_arr;
    $thai_date_return="";
    $thai_date_return.= "".date("j",$time);
    $thai_date_return.=" ".$thai_month_arr[date("n",$time)];
    $thai_date_return.= " ".(date("Yํ",$time)+543);
    return $thai_date_return;
}
  public function DateThai($strDate){ //2022-03-01
    $strDatearr= explode("-",$strDate);
    $strYear = $strDatearr[0]+543;
    $strMonth= $strDatearr[1]*1;
    $strDay= $strDatearr[2]*1;
    $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
    $strMonthThai=$strMonthCut[$strMonth];
    return $strDay." ".$strMonthThai." ".$strYear;
  }


}
