<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Decision_Model extends CI_Model
{

    public function get_discount(){
        $this->db->select_sum('discount_amount');
        $this->db->where('tbl_order.order_status', 2);
        $query_result = $this->db->get('tbl_order');
        $result = $query_result->row();
        return $result;
    }

    public function get_ridership_ppl($businessDayID){
      /*
        $this->db->where('rider_businessDayID',$businessDayID);
    		$query = $this->db->get('ridership_ppl');
        //var_dump($this->db->last_query());
    		return $query->result_array();
*/
       $sql = " SELECT *
			            FROM  ridership_ppl
			            WHERE rider_businessDayID = $businessDayID
			               ";
			$row_data = $this->db->query($sql)->result();
      //var_dump($this->db->last_query());
			return $row_data;

    }


}
