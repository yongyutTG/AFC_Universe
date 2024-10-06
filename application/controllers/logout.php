<?php
class Logout extends CI_Controller {


    function index() {

        $this->session->sess_destroy();
        //redirect('login');
         $s_login = $this->session->userdata('s_login');


        $AgentID = $s_login['login_id'];
        $date_login = date("Y-m-d H:i:s");
        $ipaddress = $this->input->ip_address();
        $this->db->query(" INSERT INTO tbl_log_login (ip_address,date_time,user_agent,txn_log_status)
                            VALUES ( '".$ipaddress."' ,'".$date_login."' , '".$AgentID."','2' ) "); // OK


        redirect(base_url());
    }

}

?>
