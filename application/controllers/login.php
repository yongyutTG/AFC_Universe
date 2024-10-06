<?php
class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('encrypt');
        $this->db2 = $this->load->database('login',true);

    }
/*
    function index() {
        $data['page_title'] = 'เข้าสู่ระบบ';
        $this->load->view('login',$data);
    }
*/
function func_hass($input){
        $res = hash('md5',$input);
        $srtleft = substr($res,0,4);
        $srtright = substr($res,-4,4);
        $res = $srtleft.''.$srtright;
        return $res;

}

function index() {

  $s_auth = $this->session->userdata('s_auth');
  $s_login = $this->session->userdata('s_login');

  if(empty($s_login['login_id']) && $s_auth['auth_4'] != 1)
  {
    $data['page_title'] = 'เข้าสู่ระบบ';
     $this->load->view('login',$data);
  }else{
    redirect('Mainpage');
  }
}

function login_check() {
    /* ว่าด้วยเรื่องสิทธิต่างของพนักงาน */
    $username = $this->input->post('user_name');
    $password = $this->input->post('password');

    $result = false;

    $this->db2->where('username', $username);
    $query = $this->db2->get('tbmember');
    $msg = '';
    if ($query->num_rows() == 0) {
        $this->session->set_flashdata('error','ชื่อผู้ใช้งานไม่ถูกต้อง');
    } else {
        $row = $query->row_array();
        if ($password != $this->encrypt->decode($row['password'])) {
            $msg = 'รหัสผ่านไม่ถูกต้อง';
            //$msg = $this->encrypt->decode($row['password']);
            $this->session->set_flashdata('error',$this->encrypt->encode('1234'));
            //$this->session->set_flashdata('error',$msg);
        } else {
                $result = true;
                $this->db2->where('username', $username);
                $row = $this->db2->get('tbmember')->row_array();
                $position_AgentID = $row['AgentID'];
                $s_login = array(
                    'login_id' => $row['id'],
                    'login_name' => $row['name'],
                    'AgentID' => $position_AgentID,
                    'mem_status' => $row['status'],
                    'login_email' => $row['email'],
                    'login_status' => '1'
                );
                $this->session->set_userdata('s_login', $s_login);


                //**************  ตำแหน่ง คน login
                $sql = " SELECT A.name,A.AgentID,B.id as user_login_position ,B.position_name_sh,B.position_name_th,c.section_sh_name_en,C.section_sh_name_th,D.division_name_th,E.department_name_th, ";
                $sql.= " B.section,B.division,B.department,B.level ";
                $sql.= " FROM tbmember A ";
                $sql.= "     LEFT JOIN tbl_position B ON A.position_id = B.id ";
                $sql.= "     LEFT JOIN tbl_section C ON C.id = B.section ";
                $sql.= "     LEFT JOIN tbl_division D ON D.id = B.division ";
                $sql.= "     LEFT JOIN tbl_department E ON E.id = B.department ";
                $sql.= " WHERE A.AgentID = $position_AgentID ";
                $data = $this->db2->query($sql)->row_array();

                $level_user_login = $data['level'];
                $level_header_user = $level_user_login+100;

                //*****

                $section_user = $data['section'];
                $division_user = $data['division'];
                $department_user = $data['department'];

                $s_position = array(
                                'AgentID' => $data['AgentID'],
                                'position_name_sh' => $data['position_name_sh'],
                                'user_login_position' => $data['user_login_position'],
                                'position_name_th' => $data['position_name_th'],
                                'section_sh_name_en' => $data['section_sh_name_en'],
                                'section_sh_name_th' => $data['section_sh_name_th'],
                                'division_name_th' => $data['division_name_th'],
                                'department_name_th' => $data['department_name_th'],
                                'section' => $data['section'],
                                'division' => $data['division'],
                                'department' => $data['department'],
                                'level' => $level_user_login
                            );
                $this->session->set_userdata('s_position', $s_position);

                //**************  จบ ตำแหน่ง คน login
                //**************  ตำแหน่ง หัวหน้า คน login

                $sql = " SELECT A.email,A.name,A.AgentID,B.position_name_sh,B.position_name_th,c.section_sh_name_en,C.section_sh_name_th,D.division_name_th,E.department_name_th, ";
                $sql.= " B.section,B.division,B.department,B.level,B.id as position_id ";
                $sql.= " FROM tbmember A ";
                $sql.= "     LEFT JOIN tbl_position B ON A.position_id = B.id ";
                $sql.= "     LEFT JOIN tbl_section C ON C.id = B.section ";
                $sql.= "     LEFT JOIN tbl_division D ON D.id = B.division ";
                $sql.= "     LEFT JOIN tbl_department E ON E.id = B.department ";
                $sql.= " WHERE B.level = $level_header_user ";

                if ($level_user_login == 100){
                $sql.= " AND B.section = $section_user ";
                }elseif($level_user_login == 200){
                $sql.= " AND B.division = $division_user AND B.section = 0 ";
                }elseif($level_user_login == 300){
                $sql.= " AND B.section = 0 ";
                $sql.= " AND B.division = 0 ";
                }elseif($level_user_login == 400){
                $sql.= " AND B.section = 0 ";
                $sql.= " AND B.division = 0 ";
                }
                $sql.= " AND B.department = $department_user AND A.status = 1 ";

                //$this->session->set_userdata('sql', $sql);

                $data = $this->db2->query($sql)->row_array();

                    $head_position = array(
                                    'head_agent_id' => $data['AgentID'],
                                    'head_position_id' => $data['position_id'],
                                    'head_level' => $data['level'] ,
                                    'head_email' => $data['email']
                                );
                    $this->session->set_userdata('head_position', $head_position);
                //**************  จบ ตำแหน่ง หัวหน้า login
                    /* ว่าด้วยเรื่องสิทธิต่างของพนักงาน//
                    * auth_1 เห็นเมนู Setting//
                    * auth_2
                    * auth_3
                    * auth_4
                    * auth_5 view รายละเอียดผู้ใช้งาน//
                    * auth_6 Reset password/
                    * auth_7 edit รายละเอียดผู้ใช้งาน//
                    * auth_8 create ผู้ใช้งาน//
                    * auth_9
                    * auth_10
                    * auth_11 สำหรับให้ ผจก คีย์ใช้วันหยุดแทนพนักงาน//
                    */
                $this->db2->where('AgentID', $row['AgentID']);
                $row = $this->db2->get('tbauth')->row_array();
                $s_auth =array(
                    'auth_1' =>  $row['auth_1'],
                    'auth_2' =>  $row['auth_2'],
                    'auth_3' =>  $row['auth_3'],
                    'auth_4' =>  $row['auth_4'],
                    'auth_5' =>  $row['auth_5'],
                    'auth_6' =>  $row['auth_6'],
                    'auth_7' =>  $row['auth_7'],
                    'auth_8' =>  $row['auth_8'],
                    'auth_9' =>  $row['auth_9'],
                    'auth_10' => $row['auth_10'],
                    'auth_11' => $row['auth_11']
                );
                $this->session->set_userdata('s_auth', $s_auth);

        }
    }

    if ($result) {
     $s_login = $this->session->userdata('s_login');
     $AgentID = $s_login['login_id'];
     $date_login = date("Y-m-d H:i:s");
     $ipaddress = $this->input->ip_address();
     $this->db->query(" INSERT INTO tbl_log_login (ip_address,date_time,user_agent,txn_log_status)
                         VALUES ( '".$ipaddress."' ,'".$date_login."' , '".$AgentID."','1' ) "); // OK

    redirect('Mainpage');
    //$this->load->view('login');
    } else {
        $data['user'] = $username;
        $data['msg_text'] = $msg;
        $this->load->view('login',$data);
        //redirect('login');
    }




}

function logout() {

    $this->session->sess_destroy();
    redirect('login');

    /*
      if($this->backup_tables()){

        $this->db->query("DELETE FROM hol_holiday  WHERE DATEDIFF(curdate(),day_ot ) > 732");
        $this->db->query("DELETE FROM hol_holiday_use_detail  WHERE DATEDIFF(curdate(),date_use ) > 732  ");

        $this->session->sess_destroy();
        redirect('login');
    }else{
        $this->db->query("DELETE FROM hol_holiday  WHERE DATEDIFF(curdate(),day_ot ) > 732");
        $this->db->query("DELETE FROM hol_holiday_use_detail  WHERE DATEDIFF(curdate(),date_use ) > 732  ");

        $this->session->sess_destroy();
        redirect('login');
    }
    */
}


/* backup the db OR just a table */
function backup_tables(){

    // Define the name of the backup directory
    define('BACKUP_DIR', '../myBackups' ) ;
    // Define  Database Credentials

    //define('HOST', $host ) ;
    //define('USER', $username ) ;
    //define('PASSWORD', $pw ) ;
    //define('DB_NAME', $db ) ;
    define('HOST', 'localhost:3406' ) ;
    define('USER', 'root' ) ;
    define('PASSWORD', '' ) ;
    define('DB_NAME', 'ismart_holiday' ) ;


    /*
    Define the filename for the sql file
    If you plan to upload the  file to Amazon's S3 service , use only lower-case letters
    */
    $fileName = 'Holiday_sqlbackup_' . date('Y-m-d') . '@'.date('h.i.s').'.sql' ;
    // Set execution time limit
    if(function_exists('max_execution_time')) {
    if( ini_get('max_execution_time') > 0 ) 	set_time_limit(0) ;
    }

    ###########################

    //END  OF  CONFIGURATIONS

    ###########################

    // Check if directory is already created and has the proper permissions
    if (!file_exists(BACKUP_DIR)) mkdir(BACKUP_DIR , 0700) ;
    if (!is_writable(BACKUP_DIR)) chmod(BACKUP_DIR , 0700) ;

    // Create an ".htaccess" file , it will restrict direct accss to the backup-directory .
    /*
    $content = 'deny from all' ;
    $file = new SplFileObject(BACKUP_DIR . '/.htaccess', "w") ;
    $file->fwrite($content) ;
    */

    $mysqli = new mysqli(HOST , USER , PASSWORD , DB_NAME) ;

    //– Set MySQLi Charset to UTF-8 (support Thai Language)
    $mysqli->set_charset("utf8");

    /* change character set to utf8 */
    /*
    if (!$mysqli->set_charset("utf8")) {
        printf("Error loading character set utf8: %s\n", $mysqli->error);
    } else {
        printf("Current character set: %s\n", $mysqli->character_set_name());
    }
    */

    if (mysqli_connect_errno())
    {
       printf("Connect failed: %s", mysqli_connect_error());
       exit();
    }else{
        $return = "";
     // Introduction information
    $return .= "--\n";
    $return .= "-- A Mysql Backup System \n";
    $return .= "--\n";
    $return .= '-- Export created: ' . date("Y/m/d") . ' on ' . date("h:i") . "\n\n\n";
    $return = "--\n";
    $return .= "-- Database : " . DB_NAME . "\n";
    $return .= "--\n";
    $return .= "-- --------------------------------------------------\n";
    $return .= "-- ---------------------------------------------------\n";
    //$return .= 'SET AUTOCOMMIT = 0 ;' ."\n" ;
    //$return .= 'SET FOREIGN_KEY_CHECKS=0 ;' ."\n" ;
    $tables = array() ;

    // Exploring what tables this database has
    $result = $mysqli->query('SHOW TABLES' ) ;

    // Cycle through "$result" and put content into an array
    while ($row = $result->fetch_row()) {
        $tables[] = $row[0] ;
    }
    // Cycle through each  table
     foreach($tables as $table){
       // Get content of each table
       $result = $mysqli->query('SELECT * FROM '. $table) ;
       // Get number of fields (columns) of each table
       $num_fields = $mysqli->field_count  ;
       // Add table information
       $return .= "--\n" ;
       $return .= '-- Tabel structure for table `' . $table . '`' . "\n" ;
       $return .= "--\n" ;
       $return.= 'DROP TABLE  IF EXISTS `'.$table.'`;' . "\n" ;
       // Get the table-shema
       $shema = $mysqli->query('SHOW CREATE TABLE '.$table) ;
       // Extract table shema
       $tableshema = $shema->fetch_row() ;
       // Append table-shema into code
       $return.= $tableshema[1].";" . "\n\n" ;
       // Cycle through each table-row
       while($rowdata = $result->fetch_row()) {
       // Prepare code that will insert data into table
            $return .= 'INSERT INTO `'.$table .'`  VALUES ( '  ;
       // Extract data of each row
       for($i=0; $i<$num_fields; $i++)
       {
       $return .= '"'.$rowdata[$i] . "\"," ;
        }
        // Let's remove the last comma
        $return = substr("$return", 0, -1) ;
        $return .= ");" ."\n" ;
        }
        $return .= "\n\n" ;
    }
    // Close the connection


    $return .= 'SET FOREIGN_KEY_CHECKS = 1 ; '  . "\n" ;
    $return .= 'COMMIT ; '  . "\n" ;
    $return .= 'SET AUTOCOMMIT = 1 ; ' . "\n"  ;

    //tbl_filename_backup
    $data =  array(
                    'program_id'   => 1,
                    'file_name'    => $fileName,
                    'update_date' => date('Y-m-d')
                );
    $this->db->insert('tbl_filename_backup', $data);

    $fsave=@fopen("./myBackups/".$fileName,"w");
                    fwrite($fsave,$return);
                    fclose($fsave);

//ข้อมูลครบ 30 วัน
// ตรวจสอบเพื่อลบไฟล์ BackUp ที่นานกว่า 1 เดือนนับจากวันที่กำลังทำ BackUP ล่าสุด
      $result_bk = $mysqli->query(' SELECT id,file_name,DATEDIFF(CURRENT_DATE(),update_date  ) AS diff_date
                                    FROM tbl_filename_backup
                                    where DATEDIFF(CURRENT_DATE(),update_date  ) > 30 '
                                  ) ;

    while ($row = $result_bk->fetch_row()) {

        // ลบข้อมูลใน database
        $this->db->where('id',$row[0]);
        $this->db->delete('tbl_filename_backup');

        // ลบไฟล์ BackUP
        $strFileName = './myBackups/'.$row[1];
        unlink($strFileName);
    }

    $mysqli->close() ;

    }

}


}

?>
