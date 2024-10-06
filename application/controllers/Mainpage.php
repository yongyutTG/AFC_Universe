<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mainpage extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('encrypt');

    }


	public function index()
	{
    $s_auth = $this->session->userdata('s_auth');
    $s_login = $this->session->userdata('s_login');
    if($s_auth['auth_4'] != 1)
    {
        /*$this->session->set_flashdata('error','auth_4 ไม่ถูกต้อง');
        $this->load->view('login');*/
        $data['content'] = 'Home/welcome_message';
        $this->load->view('components/template_v', $data);


    }else{
      $data['content'] = 'Home/welcome_message';
      $this->load->view('components/template_v', $data);
    }

	}
}
