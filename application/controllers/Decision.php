<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Decision extends MX_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('encrypt');
        $this->load->model('global_model');
        $this->load->model('decision_Model');
		    //$this->db3 = $this->load->database('ms_sql',true);

        $s_auth = $this->session->userdata('s_auth');
        $s_login = $this->session->userdata('s_login');
        $s_position= $this->session->userdata('s_position');
        if($s_auth['auth_4'] != 1)
        {
            redirect('login');
        }
    }

	public function addRidership()
	{
    //$this->load->library('encrypt');
  	$data['encrypt'] = $this->encrypt;
    $s_position= $this->session->userdata('s_position');

    $_prev_sdate = date("Y-m-d", strtotime("first day of previous month"));
    $_prev_edate = date("Y-m-d", strtotime("last day of previous month"));

    $_sdate = date("Y-m-d", strtotime("first day of this month"));
    $_edate = date("Y-m-d", strtotime("last day of this month"));

    $data['DateThai']  = $this->global_model;

    if($s_position['section'] == '1'){ //

    // My SQL
      	$sql = " SELECT
                	CASE
                		WHEN Day_type = 1 THEN 'WD'
                		WHEN Day_type = 2 THEN 'WE'
                		WHEN Day_type = 3 THEN 'SH'
                	ELSE 'Unknow' END Day_type2
                ,DAYOFWEEK(date) WEEKOfDAY
                ,A.*,B.*,C.PPL_BL,C.update_PPL_BL
                FROM DIM_DATE A
                	LEFT OUTER JOIN ridership_ppl B ON A.BusinessDayID = B.ppl_rider_businessDayID
                  LEFT OUTER JOIN ridership_bl c ON A.BusinessDayID = C.bl_rider_businessDayID
                WHERE date BETWEEN '$_sdate' AND  '$_edate'
                ORDER BY DATE
              ";
              //var_dump($sql);
            $result = $this->db->query($sql)->result_array();
            $data['arrdata_report'] = $result;
      $data['content'] = 'Decision/Ridership/addRidershipPPL';
    }else if ($s_position['section'] == '2'){
      $data['content'] = 'Decision/Ridership/addRidershipCCH';
    }else if ($s_position['section'] == '3'){
      $data['content'] = 'Decision/Ridership/addRidershipBL';
    }else{
      $data['content'] = 'Decision/Ridership/addRidership_v';
    }

    $this->load->view('components/template_v', $data);

	}

	public function get_data_grid_add()
	{
    $res['encrypt'] = $this->encrypt;
    $data_sent = $this->encrypt->decode($this->input->post('data_rider'));
    $data_sent_array = explode(",",$data_sent);
    $_date = $data_sent_array[0];
    $_date_id = $data_sent_array[1];

    //$res['data_sent'] =  $this->encrypt->decode($this->input->post('data_rider'));


    $s_position= $this->session->userdata('s_position');

    $_prev_sdate = date("Y-m-d", strtotime("first day of previous month"));
    $_prev_edate = date("Y-m-d", strtotime("last day of previous month"));
    $_sdate = date("Y-m-d", strtotime("first day of this month"));
    $_edate = date("Y-m-d", strtotime("last day of this month"));

    $res['prev_sdate'] = $_prev_sdate;
    $res['prev_edate'] =$_prev_edate;
    $res['sdate'] =$_sdate;
    $res['edate'] =$_edate;

    $res['DateThai2']  = $this->global_model;



    if($s_position['section'] == '1'){ //
      //$res['res_ridership_ppl']  = $this->Decision_Model->get_ridership_ppl($_date_id);
      $sql = " SELECT
                CASE
                  WHEN Day_type = 1 THEN 'WD'
                  WHEN Day_type = 2 THEN 'WE'
                  WHEN Day_type = 3 THEN 'SH'
                ELSE 'Unknow' END Day_type2
              ,DAYOFWEEK(date) WEEKOfDAY
              ,A.*,B.*,C.*
              FROM DIM_DATE A
                LEFT JOIN ridership_ppl B ON A.BusinessDayID = B.ppl_rider_businessDayID
                LEFT JOIN reason_ppl C ON A.BusinessDayID = c.reason_businessDayID
              WHERE A.BusinessDayID = $_date_id
                    ";
     $res['res_ridership_ppl'] = $this->db->query($sql)->row();
      $data= $this->load->view('Decision/Ridership/grid_Ridership_add_ppl', $res);

    }else if ($s_position['section'] == '2'){
      $data = $this->load->view('Decision/Ridership/grid_Ridership_add_bl', $res);

    }else if ($s_position['section'] == '3'){
      $data = $this->load->view('Decision/Ridership/grid_Ridership_add_cch', $res);
    }else{
      redirect('addRidership.JS');
    }

		json_encode($data);
    //return json_encode($data,JSON_NUMERIC_CHECK | JSON_UNESCAPED_UNICODE);

	}
  public function create_rider_action() // PPL
	{
    $s_login = $this->session->userdata('s_login');
    $res['encrypt'] = $this->encrypt;
    if($this->input->post('ppl_rider_id') != ""){
      $_ppl_rider_id = $this->encrypt->decode($this->input->post('ppl_rider_id'));
    }else{
      $_ppl_rider_id = $this->input->post('ppl_rider_id');
    }

    if($this->input->post('ppl_reson_id') != ""){
      $_ppl_reson_id = $this->encrypt->decode($this->input->post('ppl_reson_id'));
    }else{
      $_ppl_reson_id = $this->input->post('ppl_reson_id');
    }

    if($this->input->post('businessDayID') != ""){
      $_businessDayID = $this->encrypt->decode($this->input->post('businessDayID'));
    }else{
      $_businessDayID = $this->input->post('businessDayID');
    }



    $_ridership_ppl_PPL_PPL = $this->input->post('ridership_ppl_PPL_PPL');
    $_checkboxPrimary1 = $this->input->post('checkboxPrimary1');
    $_ridership_ppl_BL_PPL = $this->input->post('ridership_ppl_BL_PPL');
    $_checkboxPrimary2 = $this->input->post('checkboxPrimary2');
    $_ridership_ppl_BL_PP16 = $this->input->post('ridership_ppl_BL_PP16');
    $_checkboxPrimary3 = $this->input->post('checkboxPrimary3');
    $_ridership_ppl_update_PPL_PPL = $this->input->post('ridership_ppl_update_PPL_PPL');
    $_ridership_ppl_update_BL_PPL = $this->input->post('ridership_ppl_update_BL_PPL');
    $_ridership_ppl_update_BL_PP16 = $this->input->post('ridership_ppl_update_BL_PP16');

    if ($_ridership_ppl_PPL_PPL == ""){
      $_ridership_ppl_PPL_PPL = NULL;
    }else{$_ridership_ppl_PPL_PPL = str_replace( ',', '', $_ridership_ppl_PPL_PPL );}

    if ($_ridership_ppl_BL_PPL == ""){
      $_ridership_ppl_BL_PPL = NULL;
    }else{$_ridership_ppl_BL_PPL = str_replace( ',', '', $_ridership_ppl_BL_PPL );}

    if ($_ridership_ppl_BL_PP16 == ""){
      $_ridership_ppl_BL_PP16 = NULL;
    }else{$_ridership_ppl_BL_PP16 = str_replace( ',', '', $_ridership_ppl_BL_PP16 );}


    if ($_ridership_ppl_update_PPL_PPL == ""){
      $_ridership_ppl_update_PPL_PPL = NULL;
    }else{$_ridership_ppl_update_PPL_PPL = str_replace( ',', '', $_ridership_ppl_update_PPL_PPL );}

    if ($_ridership_ppl_update_BL_PPL == ""){
      $_ridership_ppl_update_BL_PPL = NULL;
    }else{$_ridership_ppl_update_BL_PPL = str_replace( ',', '', $_ridership_ppl_update_BL_PPL );}

    if ($_ridership_ppl_update_BL_PP16 == ""){
      $_ridership_ppl_update_BL_PP16 = NULL;
    }else{$_ridership_ppl_update_BL_PP16 = str_replace( ',', '', $_ridership_ppl_update_BL_PP16 );}

    if(isset($_checkboxPrimary1)) {$_checkboxPrimary1 = '1';}else{$_checkboxPrimary1 =  NULL;}
    if(isset($_checkboxPrimary2)) {$_checkboxPrimary2 = '1';}else{$_checkboxPrimary2 =  NULL;}
    if(isset($_checkboxPrimary3)) {$_checkboxPrimary3 = '1';}else{$_checkboxPrimary3 =  NULL;}

    //////   txn_ridership_ppl ///////
    $_ridership_ppl_status = flase;
     $txn_ridership_ppl = array(
                  'ppl_rider_businessDayID' => $_businessDayID,
                  'PPL_PPL' => $_ridership_ppl_PPL_PPL,
                  'PPL_PPL_status' => $_checkboxPrimary1,
                  'BL_PPL' => $_ridership_ppl_BL_PPL,
                  'BL_PPL_status' => $_checkboxPrimary2,
                  'BL_PP16' => $_ridership_ppl_BL_PP16,
                  'BL_PP16_status' => $_checkboxPrimary3,

                  'update_date' => date("Y-m-d H:i:s"),
                  'update_by' => $s_login['login_id'],

                  'update_PPL_PPL' => $_ridership_ppl_update_PPL_PPL,
                  'update_BL_PPL' => $_ridership_ppl_update_BL_PPL,
                  'update_BL_PP16' => $_ridership_ppl_update_BL_PP16
                  );

    if($_ppl_rider_id != ""){
      $this->db->where('ridership_ppl_id', $_ppl_rider_id);
      if($this->db->update('ridership_ppl', $txn_ridership_ppl)){$_ridership_ppl_status = true;}
    }else{
      if($this->db->insert('ridership_ppl', $txn_ridership_ppl)){$_ridership_ppl_status = true;}
    }

    //////   txn_ppl_reson_id_ppl ///////
    $_reson_ppl_status = flase;
    $txn_reson_ppl = array(
                  'reason_businessDayID' => $_businessDayID,
                  'reason_ppl' => $this->input->post('ridership_ppl_reason_ppl'),
                  'update_date' => date("Y-m-d H:i:s"),
                  'update_by' => $s_login['login_id'],
                  );
    if($_ppl_reson_id != ""){
      $this->db->where('reason_ppl_id', $_ppl_reson_id);
      $this->db->update('reason_ppl', $txn_reson_ppl);

    }else{
      $this->db->insert('reason_ppl', $txn_reson_ppl);
    }

    if($_reson_ppl_status && $_ridership_ppl_status){
      $this->session->set_flashdata('data_Status','success' );
      $this->session->set_flashdata('data_txt','บันทึกข้อมูลเรียบร้อย' );
    }else{
      $this->session->set_flashdata('data_Status','error' );
      $this->session->set_flashdata('data_txt','ข้อมูล บางส่วนไม่ถูกต้องกรุณาตรวจสอบ' );
    }





    redirect('addRidership.JS');
	}








	public function get_staft_test_para()
	{
		 $select = $this->input->post('select');
		 $_array = explode("-", $rs_date);
		$sdate_array = explode("/", $_array[0]);
		$edate_array = explode("/", $_array[1]);

// ด ว ป
		$data['rs_date'] = $rs_date;
		$data['sdate'] = trim($sdate_array[2]).'-'.trim($sdate_array[0]).'-'.trim($sdate_array[1]);
		$data['edate'] = trim($edate_array[2]).'-'.trim($edate_array[0]).'-'.trim($edate_array[1]);
        echo json_encode($data);


	}

//getdetail_issue
	public function getdetail_issue()
	{
		 	$staft_id = $this->input->post('staft_id');
			$r_sdate = $this->input->post('r_sdate');
			$r_edate = $this->input->post('r_edate');
			$r_daytype = $this->input->post('daytype');



// New Para




		 $r_sdate_array = explode("-", $r_sdate);
		 $r_edate_array = explode("-", $r_edate);

		$issue_sdate = trim($r_sdate_array[2]).'-'.trim($r_sdate_array[1]).'-'.trim($r_sdate_array[0]);
		$issue_edate = trim($r_edate_array[2]).'-'.trim($r_edate_array[1]).'-'.trim($r_edate_array[0]);


		$sdate = trim($r_sdate_array[2]).'-'.trim($r_sdate_array[1]).'-'.trim($r_sdate_array[0]);
		$edate = trim($r_edate_array[2]).'-'.trim($r_edate_array[1]).'-'.trim($r_edate_array[0]);

//$staft_id = substr($staft_id,1,4);



$strSQL = "
SELECT [BUSINESS_DATE],[STAFF_ID]
      ,[STAFF_NAME]
      ,[SHIFT_NO]
      ,[ISSUE_LOCATION]
      ,[EQUIPMENT_NAME]
      ,[ISSUE_DESTINATION]
      ,[CARD_SERIAL_NUMBER]
      ,[PASSENGER_TYPE]
      ,[DATE_TIME_ISSUE]
      ,[MM_ISSUE]
      ,[VALUE_ISSUE]
      ,[APPLICATION_PASSENGER_TYPE]
			,C.Day_type
  FROM [AFCMIS].[AGG].[Staff_Issue_Senior_Child_Token_Detail] A
			LEFT JOIN [AFC_PPL_DEVELOP].[dbo].[DIM_DATE] C ON A.[BUSINESS_DATE] = C.DATE
	WHERE  A.BUSINESS_DATE between'$sdate' AND '$edate'
	AND STAFF_ID = '$staft_id' ";
if ($r_daytype == 1){
	$strSQL .= " AND C.Day_type = 1 ";
}else{
	$strSQL .= " AND C.Day_type <> 1 ";
}

$strSQL .= " ORDER BY A.DATE_TIME_ISSUE ";


	$result = $this->db->query($strSQL)->result_array();
	$data['arrdetailstaft'] = $result;

			$staftSQL = "
				SELECT ID,NAME,DESCRIPTION
				FROM AFCMIS.AFCMIS.[Staffall3] Stx
				WHERE ID = '$staft_id'
			";
			$r_result = $this->db->query($staftSQL)->result_array();
			$data['arr_staftSQL'] = $r_result;


//$data['strSQL']  = $r_daytype; //$strSQL;

$data['staff_id']  = $staft_id;
	$this->load->view('StaffIssueTokenDiscount/detail_issue_grid', $data);
    //echo json_encode($data);
	}



}

/*

		SELECT PV.[ISSUE_LOC_ID],PV.[STAFF_ID]
		,ISNULL(PV.[59],0) as Chi
		,ISNULL(PV.[60],0) as Se
		,ISNULL(PV.[60],0)+ISNULL(PV.[59],0) AS Sum_by_STAFF
		,ISNULL(AVG_AMT,10) AS AVG_AMT
		,Sum_Shift
		FROM(
				SELECT A.ISSUE_LOC_ID,A.STAFF_ID,A.PASSENGER_ID,A.AMT ,AVG_BY_LOC.AVG_AMT,st_Shif.Sum_Shift
				FROM (
					SELECT  [ISSUE_LOC_ID],[STAFF_ID],[PASSENGER_ID],SUM([QTY]*1) AS AMT
					FROM AFCMIS.[AGG].[Staff_Issue_Senior_Child_Token] A
							LEFT JOIN AFCMIS.[AFCMIS].[Staffall3] B ON  A.STAFF_ID = B.ID
							LEFT JOIN [AFC_PPL_DEVELOP].[dbo].[DIM_DATE] C ON A.[BUSINESS_DATE] = C.DATE
					WHERE [BUSINESS_DATE] >= '$sdate' AND  [BUSINESS_DATE] <= '$edate'
					AND C.Day_type = $_data_of_week
					GROUP BY [STAFF_ID],[ISSUE_LOC_ID],[PASSENGER_ID]
				)A

				LEFT JOIN(


							SELECT  ISSUE_LOC_ID
								,AVG(AMT) *
									(SELECT COUNT(Day_type) FROM [AFC_PPL_DEVELOP].[dbo].[DIM_DATE]
										WHERE DATE BETWEEN '$sdate' AND '$edate'
										AND Day_type = $_data_of_week
									) AS AVG_AMT
						FROM (
								SELECT  [BUSINESS_DATE],[ISSUE_LOC_ID],STAFF_ID
								,max([QTY]) AS AMT
								FROM AFCMIS.[AGG].[Staff_Issue_Senior_Child_Token] A
										LEFT JOIN AFCMIS.[AFCMIS].[Staffall3] B ON  A.STAFF_ID = B.ID
										LEFT JOIN [AFC_PPL_DEVELOP].[dbo].[DIM_DATE] C ON A.[BUSINESS_DATE] = C.DATE
								WHERE [BUSINESS_DATE] >= '$sdate' AND  [BUSINESS_DATE] <= '$edate'
								AND C.Day_type = $_data_of_week
								GROUP BY [BUSINESS_DATE],[ISSUE_LOC_ID],STAFF_ID
						)A
						GROUP BY [ISSUE_LOC_ID]


						) AVG_BY_LOC ON AVG_BY_LOC.ISSUE_LOC_ID = A.ISSUE_LOC_ID
					LEFT JOIN (
					SELECT DEVICE_LOCATION_ID,STAFF_ID_DEX,Count(STAFF_ID_DEX) AS Sum_Shift
					FROM (
					SELECT DEVICE_LOCATION-150994944 AS DEVICE_LOCATION_ID,DEVICE_LOCATION,AFC_PPL_DEVELOP.dbo.CUT_SP_OPERATOR.DEVICE_ID
					,EQUIPMENT_NO
					,UD_TYPE,UD_SUBTYPE
					,CONVERT(INT,CONVERT(VARBINARY(4),STAFF_ID,2)) as STAFF_ID_DEX,
					DATEADD(HOUR,7,TXN_DATE_TIME) as TXN_DATE_TIME
					,OPERATOR_SHIFT_NUMBER
					,LEAD(UD_SUBTYPE,1) OVER(PARTITION BY DEVICE_LOCATION,AFC_PPL_DEVELOP.dbo.CUT_SP_OPERATOR.DEVICE_ID,CONVERT(INT,CONVERT(VARBINARY(4),STAFF_ID,2)),OPERATOR_SHIFT_NUMBER
							ORDER BY DEVICE_LOCATION,AFC_PPL_DEVELOP.dbo.CUT_SP_OPERATOR.DEVICE_ID,CONVERT(INT,CONVERT(VARBINARY(4),STAFF_ID,2)),OPERATOR_SHIFT_NUMBER,DATEADD(HOUR,7,TXN_DATE_TIME) asc) AS UD_SUBTYPE_22
					,LEAD(DATEADD(HOUR,7,TXN_DATE_TIME),1) OVER(PARTITION BY DEVICE_LOCATION,AFC_PPL_DEVELOP.dbo.CUT_SP_OPERATOR.DEVICE_ID,CONVERT(INT,CONVERT(VARBINARY(4),STAFF_ID,2)),OPERATOR_SHIFT_NUMBER
							ORDER BY DEVICE_LOCATION,AFC_PPL_DEVELOP.dbo.CUT_SP_OPERATOR.DEVICE_ID,CONVERT(INT,CONVERT(VARBINARY(4),STAFF_ID,2)),OPERATOR_SHIFT_NUMBER,DATEADD(HOUR,7,TXN_DATE_TIME) asc) AS TXN_DATE_TIME_22
					FROM AFC_PPL_DEVELOP.dbo.CUT_SP_OPERATOR
						LEFT OUTER JOIN (SELECT * FROM [AFC_PPL_DEVELOP].SYSTEMCD.DEVICE_STATUS) DEV ON AFC_PPL_DEVELOP.dbo.CUT_SP_OPERATOR.DEVICE_ID = DEV.DEVICE_ID
					WHERE (exception_list IS NULL OR exception_list NOT LIKE '%DDT%')
						AND PORTIONED_TXN_FLAG = 0
						AND ISS_TXN_REFLECTION = 'N'
						AND [BUSINESS_DATE] >= '$sdate' AND  [BUSINESS_DATE] <= '$edate'
						AND SOURCE_PARTICIPANT_ID = 10
					)A
					WHERE (UD_SUBTYPE = 21 AND UD_SUBTYPE_22 IS NOT NULL AND UD_SUBTYPE_22 = 22)
					GROUP BY DEVICE_LOCATION_ID,STAFF_ID_DEX
				)st_Shif ON st_Shif.DEVICE_LOCATION_ID = A.ISSUE_LOC_ID AND A.STAFF_ID = st_Shif.STAFF_ID_DEX
				)A

		PIVOT (
		    Sum (AMT) FOR
		        [PASSENGER_ID] IN ([59],[60])

		) as PV
		ORDER BY [ISSUE_LOC_ID],STAFF_ID ASC


*/
