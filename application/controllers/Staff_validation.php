<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff_validation extends MX_Controller {

		function __construct()
		{
				parent::__construct();

				//$this->load->model('global_model');
				$this->load->library('encrypt');
				 $s_login = $this->session->userdata('s_login');
				if($s_login['login_status'] != "1")
				{
						redirect('login');
				}
		}

	public function index()
	{
		$data['content'] = 'StaffIssueTokenDiscount/welcome_message';
		$this->load->view('components/template_v', $data);
		//$this->load->view('components/template_v');
	}

	public function get_staft_test_para()
	{
		 $rs_date   = $this->input->post('rs_date');
		 $_array = explode("-", $rs_date);
		$sdate_array = explode("/", $_array[0]);
		$edate_array = explode("/", $_array[1]);

// ด ว ป
		$data['rs_date'] = $rs_date;
		$data['sdate'] = trim($sdate_array[2]).'-'.trim($sdate_array[0]).'-'.trim($sdate_array[1]);
		$data['edate'] = trim($edate_array[2]).'-'.trim($edate_array[0]).'-'.trim($edate_array[1]);
        echo json_encode($data);


	}

	public function get_staft_grid()
	{

		$rs_date          = $this->input->post('rs_date');
		$options          = $this->input->post('options');

		$_array = explode("-", $rs_date);
		$sdate_array = explode("/", $_array[0]);
		$edate_array = explode("/", $_array[1]);

		$sdate = trim($sdate_array[2]).'-'.trim($sdate_array[0]).'-'.trim($sdate_array[1]);
		$edate = trim($edate_array[2]).'-'.trim($edate_array[0]).'-'.trim($edate_array[1]);

		// ข้อมุลเฉลียเอาแค่ 3 เดือน สำหรับ WD
		$avg_sdate = date ("Y-m-d", strtotime("-3 month", strtotime($edate))); //date('Y-m-d', strtotime("-1 month"));
		$avg_edate = $edate;

    $avg_sdate_WE = date ("Y-m-d", strtotime("-12 month", strtotime($edate))); //date('Y-m-d', strtotime("-1 month"));

	/*	$data['name_station'] = array("101"=>'PP01',"102"=>'PP02',"103"=>'PP03',"104"=>'PP04',"105"=>'PP05',"106"=>'PP06',"107"=>'PP07',"108"=>'PP08'
									,"109"=>'PP09',"110"=>'PP10',"111"=>'PP11',"112"=>'PP12',"113"=>'PP13',"114"=>'PP14',"115"=>'PP15',"116"=>'PP16'
								);
	*/
		$data['name_station'] = array("101"=>'Khlong Bang Phai',"102"=>'Talad Bang Yai',"103"=>'Sam Yaek Bang Yai',"104"=>'Bang Phlu',"105"=>'Bang Phlu',"106"=>'Bang Rak Noi Tha It'
,"107"=>'Sai Ma',"108"=>'Phra Nang Klao Bridge',"109"=>'Yaek Nonthaburi 1',"110"=>'Bang Krasor',"111"=>'Nonthaburi Civic Center',"112"=>'Ministry of Public Health',"113"=>'Yaek Tiwanon'
,"114"=>'Wong Sawang',"115"=>'Bang Son',"116"=>'Tao Poon'
								);

		$data['data_of_week'] =array("1"=>'WeekDay',"2"=>'WeekEnd');


		$_data_of_week = 1;

		$strSQL = " SELECT PV.[ISSUE_LOC_ID]
		,PV.[STAFF_ID]
		,ISNULL(PV.[59],0) as Chi
		,ISNULL(PV.[60],0) as Se
		,ISNULL(PV.[60],0)+ISNULL(PV.[59],0) AS Sum_by_STAFF
		,ISNULL(AVG_AMT,10) AS AVG_AMT
		,Sum_Shift
		,Day_type
		FROM(
				SELECT A.ISSUE_LOC_ID,A.STAFF_ID,A.PASSENGER_ID,A.AMT ,AVG_BY_LOC.AVG_AMT,st_Shif.Sum_Shift,Day_type
				FROM (
					SELECT  Day_type,[ISSUE_LOC_ID],[STAFF_ID],[PASSENGER_ID],SUM([QTY]*1) AS AMT
					FROM AFCMIS.[AGG].[Staff_Issue_Senior_Child_Token] A
							LEFT JOIN AFCMIS.[AFCMIS].[Staffall3] B ON  A.STAFF_ID = B.ID
							LEFT JOIN [AFC_PPL_DEVELOP].[dbo].[DIM_DATE] C ON A.[BUSINESS_DATE] = C.DATE
					WHERE [BUSINESS_DATE] >= '$sdate' AND  [BUSINESS_DATE] <= '$edate'
					AND C.Day_type = 1
					GROUP BY Day_type,[STAFF_ID],[ISSUE_LOC_ID],[PASSENGER_ID]
				)A

				LEFT JOIN(


							SELECT  ISSUE_LOC_ID
								,AVG(AMT) *
									(SELECT COUNT(Day_type) FROM [AFC_PPL_DEVELOP].[dbo].[DIM_DATE]
										WHERE DATE BETWEEN '$sdate' AND '$edate'
										AND Day_type = 1
									) AS AVG_AMT
						FROM (
								SELECT  [BUSINESS_DATE],[ISSUE_LOC_ID],STAFF_ID
								,max([QTY]) AS AMT
								FROM AFCMIS.[AGG].[Staff_Issue_Senior_Child_Token] A
										LEFT JOIN AFCMIS.[AFCMIS].[Staffall3] B ON  A.STAFF_ID = B.ID
										LEFT JOIN [AFC_PPL_DEVELOP].[dbo].[DIM_DATE] C ON A.[BUSINESS_DATE] = C.DATE
								WHERE [BUSINESS_DATE] >= '$avg_sdate' AND  [BUSINESS_DATE] <= '$avg_edate'
								AND C.Day_type = 1
								AND B.DESCRIPTION = 'SO'
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

		) as PV ";

if($options == '1'){
	$strSQL .= "	WHERE PV.[60]+PV.[59] > AVG_AMT ";
}

$strSQL .= " Union all

SELECT PV.[ISSUE_LOC_ID]
		,PV.[STAFF_ID]
		,ISNULL(PV.[59],0) as Chi
		,ISNULL(PV.[60],0) as Se
		,ISNULL(PV.[60],0)+ISNULL(PV.[59],0) AS Sum_by_STAFF
		,ISNULL(AVG_AMT,10) AS AVG_AMT
		,Sum_Shift
		,Day_type
		FROM(
				SELECT A.ISSUE_LOC_ID,A.STAFF_ID,A.PASSENGER_ID,A.AMT ,AVG_BY_LOC.AVG_AMT,st_Shif.Sum_Shift,'2' as Day_type
				FROM (
					SELECT  Day_type,[ISSUE_LOC_ID],[STAFF_ID],[PASSENGER_ID],SUM([QTY]*1) AS AMT
					FROM AFCMIS.[AGG].[Staff_Issue_Senior_Child_Token] A
							LEFT JOIN AFCMIS.[AFCMIS].[Staffall3] B ON  A.STAFF_ID = B.ID
							LEFT JOIN [AFC_PPL_DEVELOP].[dbo].[DIM_DATE] C ON A.[BUSINESS_DATE] = C.DATE
					WHERE [BUSINESS_DATE] >= '$sdate' AND  [BUSINESS_DATE] <= '$edate'
					AND C.Day_type <> 1
					GROUP BY Day_type,[STAFF_ID],[ISSUE_LOC_ID],[PASSENGER_ID]
				)A

				LEFT JOIN(


							SELECT  ISSUE_LOC_ID
								,AVG(AMT) *
									(SELECT COUNT(Day_type) FROM [AFC_PPL_DEVELOP].[dbo].[DIM_DATE]
										WHERE DATE BETWEEN '$sdate' AND '$edate'
										AND Day_type <> 1
									) AS AVG_AMT
						FROM (
								SELECT  [BUSINESS_DATE],[ISSUE_LOC_ID],STAFF_ID
								,max([QTY]) AS AMT
								FROM AFCMIS.[AGG].[Staff_Issue_Senior_Child_Token] A
										LEFT JOIN AFCMIS.[AFCMIS].[Staffall3] B ON  A.STAFF_ID = B.ID
										LEFT JOIN [AFC_PPL_DEVELOP].[dbo].[DIM_DATE] C ON A.[BUSINESS_DATE] = C.DATE
								WHERE [BUSINESS_DATE] >= '$avg_sdate_WE' AND  [BUSINESS_DATE] <= '$avg_edate'
								AND C.Day_type <> 1
								AND B.DESCRIPTION = 'SO'
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

		";
		if($options == '1'){
			$strSQL .= "	WHERE PV.[60]+PV.[59] > AVG_AMT ";
		}

		$result = $this->db->query($strSQL)->result_array();
		$data['arrstaft'] = $result;

		$data['r_sdate'] = trim($sdate_array[1]).'-'.trim($sdate_array[0]).'-'.trim($sdate_array[2]);
		$data['r_edate'] = trim($edate_array[1]).'-'.trim($edate_array[0]).'-'.trim($edate_array[2]);

		$data['avg_sdate'] = $avg_sdate;
		$data['avg_edate'] = $avg_edate;

		$data['_data_of_week'] = $_data_of_week;


				//$data['strSQL'] = $strSQL;
        //echo json_encode($data);
        //$this->load->view('StaffIssueTokenDiscount/welcome_message_grid', $data);
				$j_data = $this->load->view('StaffIssueTokenDiscount/welcome_message_grid', $data);
				json_encode($j_data);

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
