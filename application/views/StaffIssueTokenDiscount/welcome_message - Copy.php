<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$uid = "RAPPLAdmin";   
$pwd = "P@55w0rd_System2012";  

$numberOfRecords  =0;
$objConnect = odbc_connect("Driver={SQL Server Native Client 11.0};Server=BEMAFC02;Database=AFC_PPL_DEVELOP;", $uid, $pwd);

$strSQL = "

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
			WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-01-10 00:00:00'
			AND B.Delete_Flag = 'N'
			--AND B.DESCRIPTION NOT Like '%SC/DSC'
			AND C.Day_type = 1
			GROUP BY [STAFF_ID],[ISSUE_LOC_ID],[PASSENGER_ID]
		)A

		LEFT JOIN(

/************************ 101 *************************************/
				SELECT ISSUE_LOC_ID,AVG(AMT) AS AVG_AMT
				FROM  (
						SELECT  [ISSUE_LOC_ID],[STAFF_ID]
						,SUM([QTY]*1) AS AMT  

						FROM AFCMIS.[AGG].[Staff_Issue_Senior_Child_Token] A
								LEFT JOIN AFCMIS.[AFCMIS].[Staffall3] B ON  A.STAFF_ID = B.ID
								LEFT JOIN [AFC_PPL_DEVELOP].[dbo].[DIM_DATE] C ON A.[BUSINESS_DATE] = C.DATE
						WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-01-10 00:00:00'
						AND B.Delete_Flag = 'N'
						AND C.Day_type = 1
						AND B.DESCRIPTION NOT Like 'SC/DSC'
						AND A.[ISSUE_LOC_ID] = 101
						GROUP BY [STAFF_ID],[ISSUE_LOC_ID]
						Having SUM([QTY]*1) > (
							SELECT AVG(AMT) AS AVG_AMT
							FROM  (
								SELECT  [ISSUE_LOC_ID],[STAFF_ID],
								SUM([QTY]*1) AS AMT  
								FROM AFCMIS.[AGG].[Staff_Issue_Senior_Child_Token] A
										LEFT JOIN AFCMIS.[AFCMIS].[Staffall3] B ON  A.STAFF_ID = B.ID
										LEFT JOIN [AFC_PPL_DEVELOP].[dbo].[DIM_DATE] C ON A.[BUSINESS_DATE] = C.DATE
								WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-01-10 00:00:00'
								AND B.Delete_Flag = 'N'
								AND C.Day_type = 1
								AND A.[ISSUE_LOC_ID] = 101
								--AND B.DESCRIPTION NOT Like '%SC/DSC'
								GROUP BY [STAFF_ID],[ISSUE_LOC_ID]
								) as SALEREPORT_BY_CustType_Desc 
							GROUP BY ISSUE_LOC_ID
						)
					) as SALEREPORT_BY_CustType_Desc 
				GROUP BY ISSUE_LOC_ID
UNION ALL 
 /************************ 102 *************************************/
				SELECT ISSUE_LOC_ID,AVG(AMT) AS AVG_AMT
				FROM  (
						SELECT  [ISSUE_LOC_ID],[STAFF_ID]
						,SUM([QTY]*1) AS AMT  

						FROM AFCMIS.[AGG].[Staff_Issue_Senior_Child_Token] A
								LEFT JOIN AFCMIS.[AFCMIS].[Staffall3] B ON  A.STAFF_ID = B.ID
								LEFT JOIN [AFC_PPL_DEVELOP].[dbo].[DIM_DATE] C ON A.[BUSINESS_DATE] = C.DATE
						WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-01-10 00:00:00'
						AND B.Delete_Flag = 'N'
						AND C.Day_type = 1
						AND B.DESCRIPTION NOT Like 'SC/DSC'
						AND A.[ISSUE_LOC_ID] = 102
						GROUP BY [STAFF_ID],[ISSUE_LOC_ID]
						Having SUM([QTY]*1) > (
							SELECT AVG(AMT) AS AVG_AMT
							FROM  (
								SELECT  [ISSUE_LOC_ID],[STAFF_ID],
								SUM([QTY]*1) AS AMT  
								FROM AFCMIS.[AGG].[Staff_Issue_Senior_Child_Token] A
										LEFT JOIN AFCMIS.[AFCMIS].[Staffall3] B ON  A.STAFF_ID = B.ID
										LEFT JOIN [AFC_PPL_DEVELOP].[dbo].[DIM_DATE] C ON A.[BUSINESS_DATE] = C.DATE
								WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-01-10 00:00:00'
								AND B.Delete_Flag = 'N'
								AND C.Day_type = 1
								AND A.[ISSUE_LOC_ID] = 102
								--AND B.DESCRIPTION NOT Like '%SC/DSC'
								GROUP BY [STAFF_ID],[ISSUE_LOC_ID]
								) as SALEREPORT_BY_CustType_Desc 
							GROUP BY ISSUE_LOC_ID
						)
					) as SALEREPORT_BY_CustType_Desc 
				GROUP BY ISSUE_LOC_ID
UNION ALL 
 /************************ 103 *************************************/
				SELECT ISSUE_LOC_ID,AVG(AMT) AS AVG_AMT
				FROM  (
						SELECT  [ISSUE_LOC_ID],[STAFF_ID]
						,SUM([QTY]*1) AS AMT  

						FROM AFCMIS.[AGG].[Staff_Issue_Senior_Child_Token] A
								LEFT JOIN AFCMIS.[AFCMIS].[Staffall3] B ON  A.STAFF_ID = B.ID
								LEFT JOIN [AFC_PPL_DEVELOP].[dbo].[DIM_DATE] C ON A.[BUSINESS_DATE] = C.DATE
						WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-01-10 00:00:00'
						AND B.Delete_Flag = 'N'
						AND C.Day_type = 1
						AND B.DESCRIPTION NOT Like 'SC/DSC'
						AND A.[ISSUE_LOC_ID] = 103
						GROUP BY [STAFF_ID],[ISSUE_LOC_ID]
						Having SUM([QTY]*1) > (
							SELECT AVG(AMT) AS AVG_AMT
							FROM  (
								SELECT  [ISSUE_LOC_ID],[STAFF_ID],
								SUM([QTY]*1) AS AMT  
								FROM AFCMIS.[AGG].[Staff_Issue_Senior_Child_Token] A
										LEFT JOIN AFCMIS.[AFCMIS].[Staffall3] B ON  A.STAFF_ID = B.ID
										LEFT JOIN [AFC_PPL_DEVELOP].[dbo].[DIM_DATE] C ON A.[BUSINESS_DATE] = C.DATE
								WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-01-10 00:00:00'
								AND B.Delete_Flag = 'N'
								AND C.Day_type = 1
								AND A.[ISSUE_LOC_ID] = 103
								--AND B.DESCRIPTION NOT Like '%SC/DSC'
								GROUP BY [STAFF_ID],[ISSUE_LOC_ID]
								) as SALEREPORT_BY_CustType_Desc 
							GROUP BY ISSUE_LOC_ID
						)
					) as SALEREPORT_BY_CustType_Desc 
				GROUP BY ISSUE_LOC_ID
UNION ALL 
 /************************ 104 *************************************/
				SELECT ISSUE_LOC_ID,AVG(AMT) AS AVG_AMT
				FROM  (
						SELECT  [ISSUE_LOC_ID],[STAFF_ID]
						,SUM([QTY]*1) AS AMT  

						FROM AFCMIS.[AGG].[Staff_Issue_Senior_Child_Token] A
								LEFT JOIN AFCMIS.[AFCMIS].[Staffall3] B ON  A.STAFF_ID = B.ID
								LEFT JOIN [AFC_PPL_DEVELOP].[dbo].[DIM_DATE] C ON A.[BUSINESS_DATE] = C.DATE
						WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-01-10 00:00:00'
						AND B.Delete_Flag = 'N'
						AND C.Day_type = 1
						AND B.DESCRIPTION NOT Like 'SC/DSC'
						AND A.[ISSUE_LOC_ID] = 104
						GROUP BY [STAFF_ID],[ISSUE_LOC_ID]
						Having SUM([QTY]*1) > (
							SELECT AVG(AMT) AS AVG_AMT
							FROM  (
								SELECT  [ISSUE_LOC_ID],[STAFF_ID],
								SUM([QTY]*1) AS AMT  
								FROM AFCMIS.[AGG].[Staff_Issue_Senior_Child_Token] A
										LEFT JOIN AFCMIS.[AFCMIS].[Staffall3] B ON  A.STAFF_ID = B.ID
										LEFT JOIN [AFC_PPL_DEVELOP].[dbo].[DIM_DATE] C ON A.[BUSINESS_DATE] = C.DATE
								WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-01-10 00:00:00'
								AND B.Delete_Flag = 'N'
								AND C.Day_type = 1
								AND A.[ISSUE_LOC_ID] = 104
								--AND B.DESCRIPTION NOT Like '%SC/DSC'
								GROUP BY [STAFF_ID],[ISSUE_LOC_ID]
								) as SALEREPORT_BY_CustType_Desc 
							GROUP BY ISSUE_LOC_ID
						)
					) as SALEREPORT_BY_CustType_Desc 
				GROUP BY ISSUE_LOC_ID
UNION ALL 
 /************************ 105 *************************************/
				SELECT ISSUE_LOC_ID,AVG(AMT) AS AVG_AMT
				FROM  (
						SELECT  [ISSUE_LOC_ID],[STAFF_ID]
						,SUM([QTY]*1) AS AMT  

						FROM AFCMIS.[AGG].[Staff_Issue_Senior_Child_Token] A
								LEFT JOIN AFCMIS.[AFCMIS].[Staffall3] B ON  A.STAFF_ID = B.ID
								LEFT JOIN [AFC_PPL_DEVELOP].[dbo].[DIM_DATE] C ON A.[BUSINESS_DATE] = C.DATE
						WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-01-10 00:00:00'
						AND B.Delete_Flag = 'N'
						AND C.Day_type = 1
						AND B.DESCRIPTION NOT Like 'SC/DSC'
						AND A.[ISSUE_LOC_ID] = 105
						GROUP BY [STAFF_ID],[ISSUE_LOC_ID]
						Having SUM([QTY]*1) > (
							SELECT AVG(AMT) AS AVG_AMT
							FROM  (
								SELECT  [ISSUE_LOC_ID],[STAFF_ID],
								SUM([QTY]*1) AS AMT  
								FROM AFCMIS.[AGG].[Staff_Issue_Senior_Child_Token] A
										LEFT JOIN AFCMIS.[AFCMIS].[Staffall3] B ON  A.STAFF_ID = B.ID
										LEFT JOIN [AFC_PPL_DEVELOP].[dbo].[DIM_DATE] C ON A.[BUSINESS_DATE] = C.DATE
								WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-01-10 00:00:00'
								AND B.Delete_Flag = 'N'
								AND C.Day_type = 1
								AND A.[ISSUE_LOC_ID] = 105
								--AND B.DESCRIPTION NOT Like '%SC/DSC'
								GROUP BY [STAFF_ID],[ISSUE_LOC_ID]
								) as SALEREPORT_BY_CustType_Desc 
							GROUP BY ISSUE_LOC_ID
						)
					) as SALEREPORT_BY_CustType_Desc 
				GROUP BY ISSUE_LOC_ID
UNION ALL 
 /************************ 106 *************************************/
				SELECT ISSUE_LOC_ID,AVG(AMT) AS AVG_AMT
				FROM  (
						SELECT  [ISSUE_LOC_ID],[STAFF_ID]
						,SUM([QTY]*1) AS AMT  

						FROM AFCMIS.[AGG].[Staff_Issue_Senior_Child_Token] A
								LEFT JOIN AFCMIS.[AFCMIS].[Staffall3] B ON  A.STAFF_ID = B.ID
								LEFT JOIN [AFC_PPL_DEVELOP].[dbo].[DIM_DATE] C ON A.[BUSINESS_DATE] = C.DATE
						WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-01-10 00:00:00'
						AND B.Delete_Flag = 'N'
						AND C.Day_type = 1
						AND B.DESCRIPTION NOT Like 'SC/DSC'
						AND A.[ISSUE_LOC_ID] = 106
						GROUP BY [STAFF_ID],[ISSUE_LOC_ID]
						Having SUM([QTY]*1) > (
							SELECT AVG(AMT) AS AVG_AMT
							FROM  (
								SELECT  [ISSUE_LOC_ID],[STAFF_ID],
								SUM([QTY]*1) AS AMT  
								FROM AFCMIS.[AGG].[Staff_Issue_Senior_Child_Token] A
										LEFT JOIN AFCMIS.[AFCMIS].[Staffall3] B ON  A.STAFF_ID = B.ID
										LEFT JOIN [AFC_PPL_DEVELOP].[dbo].[DIM_DATE] C ON A.[BUSINESS_DATE] = C.DATE
								WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-01-10 00:00:00'
								AND B.Delete_Flag = 'N'
								AND C.Day_type = 1
								AND A.[ISSUE_LOC_ID] = 106
								--AND B.DESCRIPTION NOT Like '%SC/DSC'
								GROUP BY [STAFF_ID],[ISSUE_LOC_ID]
								) as SALEREPORT_BY_CustType_Desc 
							GROUP BY ISSUE_LOC_ID
						)
					) as SALEREPORT_BY_CustType_Desc 
				GROUP BY ISSUE_LOC_ID
UNION ALL 
 /************************ 107 *************************************/
				SELECT ISSUE_LOC_ID,AVG(AMT) AS AVG_AMT
				FROM  (
						SELECT  [ISSUE_LOC_ID],[STAFF_ID]
						,SUM([QTY]*1) AS AMT  

						FROM AFCMIS.[AGG].[Staff_Issue_Senior_Child_Token] A
								LEFT JOIN AFCMIS.[AFCMIS].[Staffall3] B ON  A.STAFF_ID = B.ID
								LEFT JOIN [AFC_PPL_DEVELOP].[dbo].[DIM_DATE] C ON A.[BUSINESS_DATE] = C.DATE
						WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-01-10 00:00:00'
						AND B.Delete_Flag = 'N'
						AND C.Day_type = 1
						AND B.DESCRIPTION NOT Like 'SC/DSC'
						AND A.[ISSUE_LOC_ID] = 107
						GROUP BY [STAFF_ID],[ISSUE_LOC_ID]
						Having SUM([QTY]*1) > (
							SELECT AVG(AMT) AS AVG_AMT
							FROM  (
								SELECT  [ISSUE_LOC_ID],[STAFF_ID],
								SUM([QTY]*1) AS AMT  
								FROM AFCMIS.[AGG].[Staff_Issue_Senior_Child_Token] A
										LEFT JOIN AFCMIS.[AFCMIS].[Staffall3] B ON  A.STAFF_ID = B.ID
										LEFT JOIN [AFC_PPL_DEVELOP].[dbo].[DIM_DATE] C ON A.[BUSINESS_DATE] = C.DATE
								WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-01-10 00:00:00'
								AND B.Delete_Flag = 'N'
								AND C.Day_type = 1
								AND A.[ISSUE_LOC_ID] = 107
								--AND B.DESCRIPTION NOT Like '%SC/DSC'
								GROUP BY [STAFF_ID],[ISSUE_LOC_ID]
								) as SALEREPORT_BY_CustType_Desc 
							GROUP BY ISSUE_LOC_ID
						)
					) as SALEREPORT_BY_CustType_Desc 
				GROUP BY ISSUE_LOC_ID
UNION ALL 
 /************************ 108 *************************************/
				SELECT ISSUE_LOC_ID,AVG(AMT) AS AVG_AMT
				FROM  (
						SELECT  [ISSUE_LOC_ID],[STAFF_ID]
						,SUM([QTY]*1) AS AMT  

						FROM AFCMIS.[AGG].[Staff_Issue_Senior_Child_Token] A
								LEFT JOIN AFCMIS.[AFCMIS].[Staffall3] B ON  A.STAFF_ID = B.ID
								LEFT JOIN [AFC_PPL_DEVELOP].[dbo].[DIM_DATE] C ON A.[BUSINESS_DATE] = C.DATE
						WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-01-10 00:00:00'
						AND B.Delete_Flag = 'N'
						AND C.Day_type = 1
						AND B.DESCRIPTION NOT Like 'SC/DSC'
						AND A.[ISSUE_LOC_ID] = 108
						GROUP BY [STAFF_ID],[ISSUE_LOC_ID]
						Having SUM([QTY]*1) > (
							SELECT AVG(AMT) AS AVG_AMT
							FROM  (
								SELECT  [ISSUE_LOC_ID],[STAFF_ID],
								SUM([QTY]*1) AS AMT  
								FROM AFCMIS.[AGG].[Staff_Issue_Senior_Child_Token] A
										LEFT JOIN AFCMIS.[AFCMIS].[Staffall3] B ON  A.STAFF_ID = B.ID
										LEFT JOIN [AFC_PPL_DEVELOP].[dbo].[DIM_DATE] C ON A.[BUSINESS_DATE] = C.DATE
								WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-01-10 00:00:00'
								AND B.Delete_Flag = 'N'
								AND C.Day_type = 1
								AND A.[ISSUE_LOC_ID] = 108
								--AND B.DESCRIPTION NOT Like '%SC/DSC'
								GROUP BY [STAFF_ID],[ISSUE_LOC_ID]
								) as SALEREPORT_BY_CustType_Desc 
							GROUP BY ISSUE_LOC_ID
						)
					) as SALEREPORT_BY_CustType_Desc 
				GROUP BY ISSUE_LOC_ID
UNION ALL 
 /************************ 109 *************************************/
				SELECT ISSUE_LOC_ID,AVG(AMT) AS AVG_AMT
				FROM  (
						SELECT  [ISSUE_LOC_ID],[STAFF_ID]
						,SUM([QTY]*1) AS AMT  

						FROM AFCMIS.[AGG].[Staff_Issue_Senior_Child_Token] A
								LEFT JOIN AFCMIS.[AFCMIS].[Staffall3] B ON  A.STAFF_ID = B.ID
								LEFT JOIN [AFC_PPL_DEVELOP].[dbo].[DIM_DATE] C ON A.[BUSINESS_DATE] = C.DATE
						WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-01-10 00:00:00'
						AND B.Delete_Flag = 'N'
						AND C.Day_type = 1
						AND B.DESCRIPTION NOT Like 'SC/DSC'
						AND A.[ISSUE_LOC_ID] = 109
						GROUP BY [STAFF_ID],[ISSUE_LOC_ID]
						Having SUM([QTY]*1) > (
							SELECT AVG(AMT) AS AVG_AMT
							FROM  (
								SELECT  [ISSUE_LOC_ID],[STAFF_ID],
								SUM([QTY]*1) AS AMT  
								FROM AFCMIS.[AGG].[Staff_Issue_Senior_Child_Token] A
										LEFT JOIN AFCMIS.[AFCMIS].[Staffall3] B ON  A.STAFF_ID = B.ID
										LEFT JOIN [AFC_PPL_DEVELOP].[dbo].[DIM_DATE] C ON A.[BUSINESS_DATE] = C.DATE
								WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-01-10 00:00:00'
								AND B.Delete_Flag = 'N'
								AND C.Day_type = 1
								AND A.[ISSUE_LOC_ID] = 109
								--AND B.DESCRIPTION NOT Like '%SC/DSC'
								GROUP BY [STAFF_ID],[ISSUE_LOC_ID]
								) as SALEREPORT_BY_CustType_Desc 
							GROUP BY ISSUE_LOC_ID
						)
					) as SALEREPORT_BY_CustType_Desc 
				GROUP BY ISSUE_LOC_ID
UNION ALL 
 /************************ 110 *************************************/
				SELECT ISSUE_LOC_ID,AVG(AMT) AS AVG_AMT
				FROM  (
						SELECT  [ISSUE_LOC_ID],[STAFF_ID]
						,SUM([QTY]*1) AS AMT  

						FROM AFCMIS.[AGG].[Staff_Issue_Senior_Child_Token] A
								LEFT JOIN AFCMIS.[AFCMIS].[Staffall3] B ON  A.STAFF_ID = B.ID
								LEFT JOIN [AFC_PPL_DEVELOP].[dbo].[DIM_DATE] C ON A.[BUSINESS_DATE] = C.DATE
						WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-01-10 00:00:00'
						AND B.Delete_Flag = 'N'
						AND C.Day_type = 1
						AND B.DESCRIPTION NOT Like 'SC/DSC'
						AND A.[ISSUE_LOC_ID] = 110
						GROUP BY [STAFF_ID],[ISSUE_LOC_ID]
						Having SUM([QTY]*1) > (
							SELECT AVG(AMT) AS AVG_AMT
							FROM  (
								SELECT  [ISSUE_LOC_ID],[STAFF_ID],
								SUM([QTY]*1) AS AMT  
								FROM AFCMIS.[AGG].[Staff_Issue_Senior_Child_Token] A
										LEFT JOIN AFCMIS.[AFCMIS].[Staffall3] B ON  A.STAFF_ID = B.ID
										LEFT JOIN [AFC_PPL_DEVELOP].[dbo].[DIM_DATE] C ON A.[BUSINESS_DATE] = C.DATE
								WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-01-10 00:00:00'
								AND B.Delete_Flag = 'N'
								AND C.Day_type = 1
								AND A.[ISSUE_LOC_ID] = 110
								--AND B.DESCRIPTION NOT Like '%SC/DSC'
								GROUP BY [STAFF_ID],[ISSUE_LOC_ID]
								) as SALEREPORT_BY_CustType_Desc 
							GROUP BY ISSUE_LOC_ID
						)
					) as SALEREPORT_BY_CustType_Desc 
				GROUP BY ISSUE_LOC_ID
UNION ALL 
 /************************ 111 *************************************/
				SELECT ISSUE_LOC_ID,AVG(AMT) AS AVG_AMT
				FROM  (
						SELECT  [ISSUE_LOC_ID],[STAFF_ID]
						,SUM([QTY]*1) AS AMT  

						FROM AFCMIS.[AGG].[Staff_Issue_Senior_Child_Token] A
								LEFT JOIN AFCMIS.[AFCMIS].[Staffall3] B ON  A.STAFF_ID = B.ID
								LEFT JOIN [AFC_PPL_DEVELOP].[dbo].[DIM_DATE] C ON A.[BUSINESS_DATE] = C.DATE
						WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-01-10 00:00:00'
						AND B.Delete_Flag = 'N'
						AND C.Day_type = 1
						AND B.DESCRIPTION NOT Like 'SC/DSC'
						AND A.[ISSUE_LOC_ID] = 111
						GROUP BY [STAFF_ID],[ISSUE_LOC_ID]
						Having SUM([QTY]*1) > (
							SELECT AVG(AMT) AS AVG_AMT
							FROM  (
								SELECT  [ISSUE_LOC_ID],[STAFF_ID],
								SUM([QTY]*1) AS AMT  
								FROM AFCMIS.[AGG].[Staff_Issue_Senior_Child_Token] A
										LEFT JOIN AFCMIS.[AFCMIS].[Staffall3] B ON  A.STAFF_ID = B.ID
										LEFT JOIN [AFC_PPL_DEVELOP].[dbo].[DIM_DATE] C ON A.[BUSINESS_DATE] = C.DATE
								WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-01-10 00:00:00'
								AND B.Delete_Flag = 'N'
								AND C.Day_type = 1
								AND A.[ISSUE_LOC_ID] = 111
								--AND B.DESCRIPTION NOT Like '%SC/DSC'
								GROUP BY [STAFF_ID],[ISSUE_LOC_ID]
								) as SALEREPORT_BY_CustType_Desc 
							GROUP BY ISSUE_LOC_ID
						)
					) as SALEREPORT_BY_CustType_Desc 
				GROUP BY ISSUE_LOC_ID
UNION ALL 
 /************************ 112 *************************************/
				SELECT ISSUE_LOC_ID,AVG(AMT) AS AVG_AMT
				FROM  (
						SELECT  [ISSUE_LOC_ID],[STAFF_ID]
						,SUM([QTY]*1) AS AMT  

						FROM AFCMIS.[AGG].[Staff_Issue_Senior_Child_Token] A
								LEFT JOIN AFCMIS.[AFCMIS].[Staffall3] B ON  A.STAFF_ID = B.ID
								LEFT JOIN [AFC_PPL_DEVELOP].[dbo].[DIM_DATE] C ON A.[BUSINESS_DATE] = C.DATE
						WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-01-10 00:00:00'
						AND B.Delete_Flag = 'N'
						AND C.Day_type = 1
						AND B.DESCRIPTION NOT Like 'SC/DSC'
						AND A.[ISSUE_LOC_ID] = 112
						GROUP BY [STAFF_ID],[ISSUE_LOC_ID]
						Having SUM([QTY]*1) > (
							SELECT AVG(AMT) AS AVG_AMT
							FROM  (
								SELECT  [ISSUE_LOC_ID],[STAFF_ID],
								SUM([QTY]*1) AS AMT  
								FROM AFCMIS.[AGG].[Staff_Issue_Senior_Child_Token] A
										LEFT JOIN AFCMIS.[AFCMIS].[Staffall3] B ON  A.STAFF_ID = B.ID
										LEFT JOIN [AFC_PPL_DEVELOP].[dbo].[DIM_DATE] C ON A.[BUSINESS_DATE] = C.DATE
								WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-01-10 00:00:00'
								AND B.Delete_Flag = 'N'
								AND C.Day_type = 1
								AND A.[ISSUE_LOC_ID] = 112
								--AND B.DESCRIPTION NOT Like '%SC/DSC'
								GROUP BY [STAFF_ID],[ISSUE_LOC_ID]
								) as SALEREPORT_BY_CustType_Desc 
							GROUP BY ISSUE_LOC_ID
						)
					) as SALEREPORT_BY_CustType_Desc 
				GROUP BY ISSUE_LOC_ID
UNION ALL 
 /************************ 113 *************************************/
				SELECT ISSUE_LOC_ID,AVG(AMT) AS AVG_AMT
				FROM  (
						SELECT  [ISSUE_LOC_ID],[STAFF_ID]
						,SUM([QTY]*1) AS AMT  

						FROM AFCMIS.[AGG].[Staff_Issue_Senior_Child_Token] A
								LEFT JOIN AFCMIS.[AFCMIS].[Staffall3] B ON  A.STAFF_ID = B.ID
								LEFT JOIN [AFC_PPL_DEVELOP].[dbo].[DIM_DATE] C ON A.[BUSINESS_DATE] = C.DATE
						WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-01-10 00:00:00'
						AND B.Delete_Flag = 'N'
						AND C.Day_type = 1
						AND B.DESCRIPTION NOT Like 'SC/DSC'
						AND A.[ISSUE_LOC_ID] = 113
						GROUP BY [STAFF_ID],[ISSUE_LOC_ID]
						Having SUM([QTY]*1) > (
							SELECT AVG(AMT) AS AVG_AMT
							FROM  (
								SELECT  [ISSUE_LOC_ID],[STAFF_ID],
								SUM([QTY]*1) AS AMT  
								FROM AFCMIS.[AGG].[Staff_Issue_Senior_Child_Token] A
										LEFT JOIN AFCMIS.[AFCMIS].[Staffall3] B ON  A.STAFF_ID = B.ID
										LEFT JOIN [AFC_PPL_DEVELOP].[dbo].[DIM_DATE] C ON A.[BUSINESS_DATE] = C.DATE
								WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-01-10 00:00:00'
								AND B.Delete_Flag = 'N'
								AND C.Day_type = 1
								AND A.[ISSUE_LOC_ID] = 113
								--AND B.DESCRIPTION NOT Like '%SC/DSC'
								GROUP BY [STAFF_ID],[ISSUE_LOC_ID]
								) as SALEREPORT_BY_CustType_Desc 
							GROUP BY ISSUE_LOC_ID
						)
					) as SALEREPORT_BY_CustType_Desc 
				GROUP BY ISSUE_LOC_ID
UNION ALL 
 /************************ 114 *************************************/
				SELECT ISSUE_LOC_ID,AVG(AMT) AS AVG_AMT
				FROM  (
						SELECT  [ISSUE_LOC_ID],[STAFF_ID]
						,SUM([QTY]*1) AS AMT  

						FROM AFCMIS.[AGG].[Staff_Issue_Senior_Child_Token] A
								LEFT JOIN AFCMIS.[AFCMIS].[Staffall3] B ON  A.STAFF_ID = B.ID
								LEFT JOIN [AFC_PPL_DEVELOP].[dbo].[DIM_DATE] C ON A.[BUSINESS_DATE] = C.DATE
						WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-01-10 00:00:00'
						AND B.Delete_Flag = 'N'
						AND C.Day_type = 1
						AND B.DESCRIPTION NOT Like 'SC/DSC'
						AND A.[ISSUE_LOC_ID] = 114
						GROUP BY [STAFF_ID],[ISSUE_LOC_ID]
						Having SUM([QTY]*1) > (
							SELECT AVG(AMT) AS AVG_AMT
							FROM  (
								SELECT  [ISSUE_LOC_ID],[STAFF_ID],
								SUM([QTY]*1) AS AMT  
								FROM AFCMIS.[AGG].[Staff_Issue_Senior_Child_Token] A
										LEFT JOIN AFCMIS.[AFCMIS].[Staffall3] B ON  A.STAFF_ID = B.ID
										LEFT JOIN [AFC_PPL_DEVELOP].[dbo].[DIM_DATE] C ON A.[BUSINESS_DATE] = C.DATE
								WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-01-10 00:00:00'
								AND B.Delete_Flag = 'N'
								AND C.Day_type = 1
								AND A.[ISSUE_LOC_ID] = 114
								--AND B.DESCRIPTION NOT Like '%SC/DSC'
								GROUP BY [STAFF_ID],[ISSUE_LOC_ID]
								) as SALEREPORT_BY_CustType_Desc 
							GROUP BY ISSUE_LOC_ID
						)
					) as SALEREPORT_BY_CustType_Desc 
				GROUP BY ISSUE_LOC_ID
UNION ALL 
 /************************ 115 *************************************/
				SELECT ISSUE_LOC_ID,AVG(AMT) AS AVG_AMT
				FROM  (
						SELECT  [ISSUE_LOC_ID],[STAFF_ID]
						,SUM([QTY]*1) AS AMT  

						FROM AFCMIS.[AGG].[Staff_Issue_Senior_Child_Token] A
								LEFT JOIN AFCMIS.[AFCMIS].[Staffall3] B ON  A.STAFF_ID = B.ID
								LEFT JOIN [AFC_PPL_DEVELOP].[dbo].[DIM_DATE] C ON A.[BUSINESS_DATE] = C.DATE
						WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-01-10 00:00:00'
						AND B.Delete_Flag = 'N'
						AND C.Day_type = 1
						AND B.DESCRIPTION NOT Like 'SC/DSC'
						AND A.[ISSUE_LOC_ID] = 115
						GROUP BY [STAFF_ID],[ISSUE_LOC_ID]
						Having SUM([QTY]*1) > (
							SELECT AVG(AMT) AS AVG_AMT
							FROM  (
								SELECT  [ISSUE_LOC_ID],[STAFF_ID],
								SUM([QTY]*1) AS AMT  
								FROM AFCMIS.[AGG].[Staff_Issue_Senior_Child_Token] A
										LEFT JOIN AFCMIS.[AFCMIS].[Staffall3] B ON  A.STAFF_ID = B.ID
										LEFT JOIN [AFC_PPL_DEVELOP].[dbo].[DIM_DATE] C ON A.[BUSINESS_DATE] = C.DATE
								WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-01-10 00:00:00'
								AND B.Delete_Flag = 'N'
								AND C.Day_type = 1
								AND A.[ISSUE_LOC_ID] = 115
								--AND B.DESCRIPTION NOT Like '%SC/DSC'
								GROUP BY [STAFF_ID],[ISSUE_LOC_ID]
								) as SALEREPORT_BY_CustType_Desc 
							GROUP BY ISSUE_LOC_ID
						)
					) as SALEREPORT_BY_CustType_Desc 
				GROUP BY ISSUE_LOC_ID
UNION ALL 
 /************************ 116 *************************************/
				SELECT ISSUE_LOC_ID,AVG(AMT) AS AVG_AMT
				FROM  (
						SELECT  [ISSUE_LOC_ID],[STAFF_ID]
						,SUM([QTY]*1) AS AMT  

						FROM AFCMIS.[AGG].[Staff_Issue_Senior_Child_Token] A
								LEFT JOIN AFCMIS.[AFCMIS].[Staffall3] B ON  A.STAFF_ID = B.ID
								LEFT JOIN [AFC_PPL_DEVELOP].[dbo].[DIM_DATE] C ON A.[BUSINESS_DATE] = C.DATE
						WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-01-10 00:00:00'
						AND B.Delete_Flag = 'N'
						AND C.Day_type = 1
						AND B.DESCRIPTION NOT Like 'SC/DSC'
						AND A.[ISSUE_LOC_ID] = 116
						GROUP BY [STAFF_ID],[ISSUE_LOC_ID]
						Having SUM([QTY]*1) > (
							SELECT AVG(AMT) AS AVG_AMT
							FROM  (
								SELECT  [ISSUE_LOC_ID],[STAFF_ID],
								SUM([QTY]*1) AS AMT  
								FROM AFCMIS.[AGG].[Staff_Issue_Senior_Child_Token] A
										LEFT JOIN AFCMIS.[AFCMIS].[Staffall3] B ON  A.STAFF_ID = B.ID
										LEFT JOIN [AFC_PPL_DEVELOP].[dbo].[DIM_DATE] C ON A.[BUSINESS_DATE] = C.DATE
								WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-01-10 00:00:00'
								AND B.Delete_Flag = 'N'
								AND C.Day_type = 1
								AND A.[ISSUE_LOC_ID] = 116
								--AND B.DESCRIPTION NOT Like '%SC/DSC'
								GROUP BY [STAFF_ID],[ISSUE_LOC_ID]
								) as SALEREPORT_BY_CustType_Desc 
							GROUP BY ISSUE_LOC_ID
						)
					) as SALEREPORT_BY_CustType_Desc 
				GROUP BY ISSUE_LOC_ID
/*************************************************************/
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
				AND [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-01-10 00:00:00'
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
";

//ORDER BY [ISSUE_LOC_ID],STAFF_ID,Sum_by_STAFF ASC   
$objarray = odbc_exec($objConnect, $strSQL) or die ("Error Execute [".$strSQL."]");
/*
$objExec = odbc_exec($objConnect, $strSQL) or die ("Error Execute [".$strSQL."]");
$objSe=odbc_exec($objConnect, $strSQL) or die ("Error Execute [".$strSQL."]");
$objChi=odbc_exec($objConnect, $strSQL) or die ("Error Execute [".$strSQL."]");

*/
$name_station[101]    =    'คลองบางไผ่';
$name_station[102]    =    'ตลาดบางใหญ่';
$name_station[103]    =    'สามแยกบางใหญ่';
$name_station[104]    =    'บางพลู';
$name_station[105]    =    'บางรักใหญ่';
$name_station[106]    =    'บางรักน้อยท่าอิฐ';
$name_station[107]    =    'ไทรม้า';
$name_station[108]    =    'สะพานพระนั่งเกล้า';
$name_station[109]    =    'แยกนนทบุรี 1 ';
$name_station[110]    =    'บางกระสอ';
$name_station[111]    =    'ศูนย์ราชการนนทบุรี';
$name_station[112]    =    'กระทรวงสาธารณสุข';
$name_station[113]    =    'แยกติวานน';
$name_station[114]    =    'วงสว่าง';
$name_station[115]    =    'บางซ่อน';
$name_station[116]    =    'เตาปูน';



while($objResult = odbc_fetch_array($objarray))
{
 $arrstaft[] = $objResult;
}  

//var_dump($arrstaft);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" media="screen" href="<?php echo base_url();?>css/highcharts.css" type="text/css"/>

    <script src="<?php echo base_url();?>js/highcharts.js"></script>
    <script src="<?php echo base_url();?>js/highcharts.js.map"></script>
    <script src="<?php echo base_url();?>js/exporting.js"></script>
    <script src="<?php echo base_url();?>js/exporting.js.map"></script>
	<script src="<?php echo base_url();?>js/export-data.js"></script>
	<script src="<?php echo base_url();?>js/accessibility.js"></script>
	<title></title>
	<style type="text/css">
	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 5px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	.body {
		margin: 0 0px 0 0px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	.container {
		margin: 5px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>

</head>
<body>
<div class="container">
	<h1>Welcome to CodeIgniter with HMVC!
<?php 

    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $domainName = $_SERVER['HTTP_HOST'] . '/';
    echo $protocol . $domainName;

?>
	</h1>
	<div class="body">
		<?php 
		for ($st = 101; $st <= 116; $st++) {
		?>
		    <figure class="highcharts-figure">
		        <div id=container<?php echo $st ?> ></div>
		    </figure>
		<?php
		}
		?>
	</div>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  ' KornDesign Studio Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>

		

</div>
<script type="text/javascript">
<?php for ($st = 101; $st <= 116; $st++) {
$i = 0;
$x = 0;
$t = 0;

?>
Highcharts.chart('container<?php echo $st ?>', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'จำนวนการ ISSUE เหรียญลดหย่อนของสถานี <?php echo $name_station[$st]?>'
    },
    xAxis: {
        categories: [   <?php 
                            foreach ($arrstaft as $name=>$r){
                                if($r['ISSUE_LOC_ID'] == $st){ echo "".substr($r['STAFF_ID'], -4).","; }
                            } 
                        ?>
                    ]
    },
    yAxis: {
        min: 0,
        title: {
            text: 'จำนวนเหรียญ'
        },
        stackLabels: {
            enabled: true,
            style: {
                fontWeight: 'bold',
                color: ( // theme
                    Highcharts.defaultOptions.title.style &&
                    Highcharts.defaultOptions.title.style.color
                ) || 'blue'
            }
        }


    },
    plotOptions: {
        column: {
            stacking: 'normal',
            borderWidth: 0,
            dataLabels: {
                    enabled: false,
                    color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
                    style: {
                        textShadow: '0 0 3px black, 0 0 3px black'
                    }
                }
        },
        series: {
            dataLabels: {
                enabled: true,
                borderColor: '#AAA',
                y: -6
            }
        }
    },
    series: [{
        name: 'Child Token',
        data:  [<?php 
                    foreach ($arrstaft as $name=>$r){
                        if($r['ISSUE_LOC_ID'] == $st){ echo "".$r['Chi'].","; }
                    } 
                ?>
            ],
        color: "#2a2a2b"

    }, {
        name: 'Senior Token',
        data: [<?php 
                    foreach ($arrstaft as $name=>$r){
                        if($r['ISSUE_LOC_ID'] == $st){ echo "".$r['Se'].","; }
                    } 
                ?>
            ],
        color: "#6998f5"

    }, {  
        name: 'เส้นสังเกตการณ์',
        type: 'line',
        data: [<?php 
                            foreach ($arrstaft as $name=>$r){
                                if($r['ISSUE_LOC_ID'] == $st){ echo "".number_format($r['AVG_AMT'],0).",";  }
                            } 
                        ?>
                    ],
        color: "#ff0000",
        dataLabels: {
                            enabled: false
        },
        marker: {
        	enabled: false
        }



	}, {  //Sum_Shift
	        name: 'การเปิด Shift',
	        type: 'line',
	        data: [<?php 
	                            foreach ($arrstaft as $name=>$r){
	                                if($r['ISSUE_LOC_ID'] == $st){ echo "".number_format($r['Sum_Shift'],0).",";  }
	                            } 
	                        ?>
	                    ],
	        color: "#ff00fb",
	        dataLabels: {
	                            enabled: false
	        }
	}]
});
<?php
}
?>
</script>
</body>
</html>