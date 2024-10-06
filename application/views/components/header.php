<?php 
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
      WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-04-30 00:00:00'
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
            WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-04-30 00:00:00'
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
                WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-04-30 00:00:00'
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
            WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-04-30 00:00:00'
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
                WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-04-30 00:00:00'
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
            WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-04-30 00:00:00'
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
                WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-04-30 00:00:00'
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
            WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-04-30 00:00:00'
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
                WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-04-30 00:00:00'
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
            WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-04-30 00:00:00'
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
                WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-04-30 00:00:00'
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
            WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-04-30 00:00:00'
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
                WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-04-30 00:00:00'
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
            WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-04-30 00:00:00'
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
                WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-04-30 00:00:00'
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
            WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-04-30 00:00:00'
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
                WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-04-30 00:00:00'
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
            WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-04-30 00:00:00'
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
                WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-04-30 00:00:00'
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
            WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-04-30 00:00:00'
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
                WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-04-30 00:00:00'
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
            WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-04-30 00:00:00'
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
                WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-04-30 00:00:00'
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
            WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-04-30 00:00:00'
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
                WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-04-30 00:00:00'
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
            WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-04-30 00:00:00'
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
                WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-04-30 00:00:00'
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
            WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-04-30 00:00:00'
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
                WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-04-30 00:00:00'
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
            WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-04-30 00:00:00'
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
                WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-04-30 00:00:00'
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
            WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-04-30 00:00:00'
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
                WHERE [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-04-30 00:00:00'
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
        AND [BUSINESS_DATE] >= '2020-01-01 00:00:00' AND  [BUSINESS_DATE] <= '2020-04-30 00:00:00'
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
<!-- begin::Body -->
<body class="kt-page--loading-enabled kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header--minimize-topbar kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent" style="">

<!-- begin::Page loader -->
<!-- end::Page Loader -->
      <!-- begin:: Page -->
  <!-- begin:: Header Mobile -->
<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
  <div class="kt-header-mobile__logo">
    <a href="#/preview/demo2/index.html">
      <img alt="Logo" src="<?php echo base_url() ?>Template/img/logo-2-sm.png">
    </a>
  </div>
  <div class="kt-header-mobile__toolbar">

    <button class="kt-header-mobile__toolbar-toggler" id="kt_header_mobile_toggler"><span></span></button>
    <button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more-1"></i></button>
  </div>
</div>
<!-- end:: Header Mobile -->
<div class="kt-grid kt-grid--hor kt-grid--root">
  <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
        <!-- begin:: Header -->
<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed " data-ktheader-minimize="on">
  <div class="kt-header__top">
    <div class="kt-container ">
      <!-- begin:: Brand -->
<div class="kt-header__brand   kt-grid__item" id="kt_header_brand">
  <div class="kt-header__brand-logo">
    <a href="#/preview/demo2/index.html#">
      <img alt="Logo" src="<?php echo base_url() ?>Template/img/logo-2.png" class="kt-header__brand-logo-default">
      <img alt="Logo" src="<?php echo base_url() ?>Template/img/logo-2-sm.png" class="kt-header__brand-logo-sticky">
    </a>
  </div>
  <div class="kt-header__brand-nav">
    <div class="dropdown">
      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        SAAS Customers
      </button>
      <div class="dropdown-menu dropdown-menu-md">
        <ul class="kt-nav kt-nav--bold kt-nav--md-space">
          <li class="kt-nav__item">
            <a class="kt-nav__link active" href="#">
              <span class="kt-nav__link-icon"><i class="flaticon2-user"></i></span>
              <span class="kt-nav__link-text">Human Resources</span>
            </a>
          </li>
          <li class="kt-nav__item">
            <a class="kt-nav__link" href="#">
              <span class="kt-nav__link-icon"><i class="flaticon-feed"></i></span>
              <span class="kt-nav__link-text">Customer Relationship</span>
            </a>
          </li>
          <li class="kt-nav__item">
            <a class="kt-nav__link" href="#">
              <span class="kt-nav__link-icon"><i class="flaticon2-settings"></i></span>
              <span class="kt-nav__link-text">Order Processing</span>
            </a>
          </li>
          <li class="kt-nav__item">
            <a class="kt-nav__link" href="#">
              <span class="kt-nav__link-icon"><i class="flaticon2-chart2"></i></span>
              <span class="kt-nav__link-text">Accounting</span>
            </a>
          </li>
          <li class="kt-nav__separator"></li>
          <li class="kt-nav__item">
            <a class="kt-nav__link" href="#">
              <span class="kt-nav__link-icon"><i class="flaticon-security"></i></span>
              <span class="kt-nav__link-text">Finance</span>
            </a>
          </li>
          <li class="kt-nav__item">
            <a class="kt-nav__link" href="#">
              <span class="kt-nav__link-icon"><i class="flaticon2-cup"></i></span>
              <span class="kt-nav__link-text">Administration</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- end:: Brand -->      
<!-- begin:: Header Topbar -->
<div class="kt-header__topbar">
  <!--begin: Search -->
  <div class="kt-header__topbar-item kt-header__topbar-item--search dropdown kt-hidden-desktop" id="kt_quick_search_toggle">
    <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,10px">
      <span class="kt-header__topbar-icon">
              <!--<i class="flaticon2-search-1"></i>-->
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--info">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <rect x="0" y="0" width="24" height="24"></rect>
                      <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                      <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"></path>
                  </g>
              </svg>
      </span>
    </div>
    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-lg">
      <div class="kt-quick-search kt-quick-search--dropdown kt-quick-search--result-compact" id="kt_quick_search_dropdown">
          <form method="get" class="kt-quick-search__form">
              <div class="input-group">
                  <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-search-1"></i></span></div>
                  <input type="text" class="form-control kt-quick-search__input" placeholder="Search...">
                  <div class="input-group-append"><span class="input-group-text"><i class="la la-close kt-quick-search__close"></i></span></div>
              </div>
          </form>
          <div class="kt-quick-search__wrapper kt-scroll" data-scroll="true" data-height="325" data-mobile-height="200" style="height: 200px; overflow: auto;">
          </div>
      </div>
    </div>
  </div>
  <!--end: Search -->

  <!--begin: Notifications -->
  <div class="kt-header__topbar-item dropdown">
    <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,10px">
      <span class="kt-header__topbar-icon  kt-pulse kt-pulse--warning">
        <!--<i class="flaticon2-bell-alarm-symbol"></i>-->
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--warning">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24">
          
        </rect>
        <path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" fill="#000000" opacity="0.3"></path>
        <path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" fill="#000000"></path>
    </g>
</svg>        <span class="kt-pulse__ring"></span>
      </span>
    </div>
    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">
      <form>
                <!--begin: Head -->
    <div class="kt-head kt-head--skin-dark kt-head--fit-x kt-head--fit-b" style="background-image: url(/metronic/themes/metronic/theme/default/demo2/dist/assets/media/misc/bg-1.jpg)">
        <h3 class="kt-head__title">
            User Notifications
            &nbsp;
            <span class="btn btn-success btn-sm btn-bold btn-font-md">23 new</span>
        </h3>

        <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-success kt-notification-item-padding-x" role="tablist">
            <li class="nav-item">
                <a class="nav-link active show" data-toggle="tab" href="#topbar_notifications_notifications" role="tab" aria-selected="true">Alerts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#topbar_notifications_events" role="tab" aria-selected="false">Events</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#topbar_notifications_logs" role="tab" aria-selected="false">Logs</a>
            </li>
        </ul>
    </div>
<!--end: Head -->

<div class="tab-content">
    <div class="tab-pane active show" id="topbar_notifications_notifications" role="tabpanel">
        <div class="kt-notification kt-margin-t-10 kt-margin-b-10 kt-scroll" data-scroll="true" data-height="300" data-mobile-height="200" style="height: 200px; overflow: auto;">
            <a href="#" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                    <i class="flaticon2-line-chart kt-font-success"></i>
                </div>
                <div class="kt-notification__item-details">
                    <div class="kt-notification__item-title">
                        New order has been received
                    </div>
                    <div class="kt-notification__item-time">
                        2 hrs ago
                    </div>
                </div>
            </a>
            <a href="#" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                    <i class="flaticon2-box-1 kt-font-brand"></i>
                </div>
                <div class="kt-notification__item-details">
                    <div class="kt-notification__item-title">
                        New customer is registered
                    </div>
                    <div class="kt-notification__item-time">
                        3 hrs ago
                    </div>
                </div>
            </a>
            <a href="#" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                    <i class="flaticon2-chart2 kt-font-danger"></i>
                </div>
                <div class="kt-notification__item-details">
                    <div class="kt-notification__item-title">
                        Application has been approved
                    </div>
                    <div class="kt-notification__item-time">
                        3 hrs ago
                    </div>
                </div>
            </a>
            <a href="#" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                    <i class="flaticon2-image-file kt-font-warning"></i>
                </div>
                <div class="kt-notification__item-details">
                    <div class="kt-notification__item-title">
                        New file has been uploaded
                    </div>
                    <div class="kt-notification__item-time">
                        5 hrs ago
                    </div>
                </div>
            </a>
            <a href="#" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                    <i class="flaticon2-drop kt-font-info"></i>
                </div>
                <div class="kt-notification__item-details">
                    <div class="kt-notification__item-title">
                        New user feedback received
                    </div>
                    <div class="kt-notification__item-time">
                        8 hrs ago
                    </div>
                </div>
            </a>
            <a href="#" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                    <i class="flaticon2-pie-chart-2 kt-font-success"></i>
                </div>
                <div class="kt-notification__item-details">
                    <div class="kt-notification__item-title">
                        System reboot has been successfully completed
                    </div>
                    <div class="kt-notification__item-time">
                        12 hrs ago
                    </div>
                </div>
            </a>
            <a href="#" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                    <i class="flaticon2-favourite kt-font-danger"></i>
                </div>
                <div class="kt-notification__item-details">
                    <div class="kt-notification__item-title">
                        New order has been placed
                    </div>
                    <div class="kt-notification__item-time">
                        15 hrs ago
                    </div>
                </div>
            </a>
            <a href="#" class="kt-notification__item kt-notification__item--read">
                <div class="kt-notification__item-icon">
                    <i class="flaticon2-safe kt-font-primary"></i>
                </div>
                <div class="kt-notification__item-details">
                    <div class="kt-notification__item-title">
                        Company meeting canceled
                    </div>
                    <div class="kt-notification__item-time">
                        19 hrs ago
                    </div>
                </div>
            </a>
            <a href="#" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                    <i class="flaticon2-psd kt-font-success"></i>
                </div>
                <div class="kt-notification__item-details">
                    <div class="kt-notification__item-title">
                        New report has been received
                    </div>
                    <div class="kt-notification__item-time">
                        23 hrs ago
                    </div>
                </div>
            </a>
            <a href="#" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                    <i class="flaticon-download-1 kt-font-danger"></i>
                </div>
                <div class="kt-notification__item-details">
                    <div class="kt-notification__item-title">
                        Finance report has been generated
                    </div>
                    <div class="kt-notification__item-time">
                        25 hrs ago
                    </div>
                </div>
            </a>
            <a href="#" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                    <i class="flaticon-security kt-font-warning"></i>
                </div>
                <div class="kt-notification__item-details">
                    <div class="kt-notification__item-title">
                        New customer comment recieved
                    </div>
                    <div class="kt-notification__item-time">
                        2 days ago
                    </div>
                </div>
            </a>
            <a href="#" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                    <i class="flaticon2-pie-chart kt-font-success"></i>
                </div>
                <div class="kt-notification__item-details">
                    <div class="kt-notification__item-title">
                        New customer is registered
                    </div>
                    <div class="kt-notification__item-time">
                        3 days ago
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="tab-pane" id="topbar_notifications_events" role="tabpanel">
        <div class="kt-notification kt-margin-t-10 kt-margin-b-10 kt-scroll" data-scroll="true" data-height="300" data-mobile-height="200" style="height: 200px; overflow: auto;">
            <a href="#" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                    <i class="flaticon2-psd kt-font-success"></i>
                </div>
                <div class="kt-notification__item-details">
                    <div class="kt-notification__item-title">
                        New report has been received
                    </div>
                    <div class="kt-notification__item-time">
                        23 hrs ago
                    </div>
                </div>
            </a>
            <a href="#" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                    <i class="flaticon-download-1 kt-font-danger"></i>
                </div>
                <div class="kt-notification__item-details">
                    <div class="kt-notification__item-title">
                        Finance report has been generated
                    </div>
                    <div class="kt-notification__item-time">
                        25 hrs ago
                    </div>
                </div>
            </a>
            <a href="#" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                    <i class="flaticon2-line-chart kt-font-success"></i>
                </div>
                <div class="kt-notification__item-details">
                    <div class="kt-notification__item-title">
                        New order has been received
                    </div>
                    <div class="kt-notification__item-time">
                        2 hrs ago
                    </div>
                </div>
            </a>
            <a href="#" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                    <i class="flaticon2-box-1 kt-font-brand"></i>
                </div>
                <div class="kt-notification__item-details">
                    <div class="kt-notification__item-title">
                        New customer is registered
                    </div>
                    <div class="kt-notification__item-time">
                        3 hrs ago
                    </div>
                </div>
            </a>
            <a href="#" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                    <i class="flaticon2-chart2 kt-font-danger"></i>
                </div>
                <div class="kt-notification__item-details">
                    <div class="kt-notification__item-title">
                        Application has been approved
                    </div>
                    <div class="kt-notification__item-time">
                        3 hrs ago
                    </div>
                </div>
            </a>
            <a href="#" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                    <i class="flaticon2-image-file kt-font-warning"></i>
                </div>
                <div class="kt-notification__item-details">
                    <div class="kt-notification__item-title">
                        New file has been uploaded
                    </div>
                    <div class="kt-notification__item-time">
                        5 hrs ago
                    </div>
                </div>
            </a>
            <a href="#" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                    <i class="flaticon2-drop kt-font-info"></i>
                </div>
                <div class="kt-notification__item-details">
                    <div class="kt-notification__item-title">
                        New user feedback received
                    </div>
                    <div class="kt-notification__item-time">
                        8 hrs ago
                    </div>
                </div>
            </a>
            <a href="#" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                    <i class="flaticon2-pie-chart-2 kt-font-success"></i>
                </div>
                <div class="kt-notification__item-details">
                    <div class="kt-notification__item-title">
                        System reboot has been successfully completed
                    </div>
                    <div class="kt-notification__item-time">
                        12 hrs ago
                    </div>
                </div>
            </a>
            <a href="#" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                    <i class="flaticon2-favourite kt-font-brand"></i>
                </div>
                <div class="kt-notification__item-details">
                    <div class="kt-notification__item-title">
                        New order has been placed
                    </div>
                    <div class="kt-notification__item-time">
                        15 hrs ago
                    </div>
                </div>
            </a>
            <a href="#" class="kt-notification__item kt-notification__item--read">
                <div class="kt-notification__item-icon">
                    <i class="flaticon2-safe kt-font-primary"></i>
                </div>
                <div class="kt-notification__item-details">
                    <div class="kt-notification__item-title">
                        Company meeting canceled
                    </div>
                    <div class="kt-notification__item-time">
                        19 hrs ago
                    </div>
                </div>
            </a>
            <a href="#" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                    <i class="flaticon2-psd kt-font-success"></i>
                </div>
                <div class="kt-notification__item-details">
                    <div class="kt-notification__item-title">
                        New report has been received
                    </div>
                    <div class="kt-notification__item-time">
                        23 hrs ago
                    </div>
                </div>
            </a>
            <a href="#" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                    <i class="flaticon-download-1 kt-font-danger"></i>
                </div>
                <div class="kt-notification__item-details">
                    <div class="kt-notification__item-title">
                        Finance report has been generated
                    </div>
                    <div class="kt-notification__item-time">
                        25 hrs ago
                    </div>
                </div>
            </a>
            <a href="#" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                    <i class="flaticon-security kt-font-warning"></i>
                </div>
                <div class="kt-notification__item-details">
                    <div class="kt-notification__item-title">
                        New customer comment recieved
                    </div>
                    <div class="kt-notification__item-time">
                        2 days ago
                    </div>
                </div>
            </a>
            <a href="#" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                    <i class="flaticon2-pie-chart kt-font-success"></i>
                </div>
                <div class="kt-notification__item-details">
                    <div class="kt-notification__item-title">
                        New customer is registered
                    </div>
                    <div class="kt-notification__item-time">
                        3 days ago
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="tab-pane" id="topbar_notifications_logs" role="tabpanel">
        <div class="kt-grid kt-grid--ver" style="min-height: 200px;">
            <div class="kt-grid kt-grid--hor kt-grid__item kt-grid__item--fluid kt-grid__item--middle">
                <div class="kt-grid__item kt-grid__item--middle kt-align-center">
                    All caught up!
                    <br>No new notifications.
                </div>
            </div>
        </div>
    </div>
</div>
            </form>
    </div>
  </div>
  <!--end: Notifications -->

  <!--begin: Language bar -->
  <div class="kt-header__topbar-item kt-header__topbar-item--langs">
    <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,10px">
      <span class="kt-header__topbar-icon">
        <img class="" src="<?php echo base_url() ?>Template/svg" alt="">
      </span>
    </div>
    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim">
      <ul class="kt-nav kt-margin-t-10 kt-margin-b-10">
    <li class="kt-nav__item kt-nav__item--active">
        <a href="#" class="kt-nav__link">
            <span class="kt-nav__link-icon"><img src="<?php echo base_url() ?>Template/svg/226-united-states.svg" alt=""></span>
            <span class="kt-nav__link-text">English</span>
        </a>
    </li>
    <li class="kt-nav__item">
        <a href="#" class="kt-nav__link">
            <span class="kt-nav__link-icon"><img src="<?php echo base_url() ?>Template/svg/128-spain.svg" alt=""></span>
            <span class="kt-nav__link-text">Spanish</span>
        </a>
    </li>
    <li class="kt-nav__item">
        <a href="#" class="kt-nav__link">
            <span class="kt-nav__link-icon"><img src="<?php echo base_url() ?>Template/svg/162-germany.svg" alt=""></span>
            <span class="kt-nav__link-text">German</span>
        </a>
    </li>
</ul>   </div>
  </div>
  <!--end: Language bar -->

  <!--begin: User bar -->
  <div class="kt-header__topbar-item kt-header__topbar-item--user">
    <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,10px" aria-expanded="false">
      <span class="kt-header__topbar-welcome">Hi,</span>
      <span class="kt-header__topbar-username">Sean</span>
      <img class="kt-hidden" alt="Pic" src="<?php echo base_url() ?>Template/img/300_21.jpg">

      <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
        <span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold kt-hidden-">S</span>
    </div>
    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">
      <!--begin: Head -->
    <div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background-image: url(/metronic/themes/metronic/theme/default/demo2/dist/assets/media/misc/bg-1.jpg)">
        <div class="kt-user-card__avatar">
            <img class="kt-hidden" alt="Pic" src="<?php echo base_url() ?>Template/img/300_25.jpg">
            <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
            <span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success">S</span>
        </div>
        <div class="kt-user-card__name">
            Sean Stone
        </div>
        <div class="kt-user-card__badge">
            <span class="btn btn-success btn-sm btn-bold btn-font-md">23 messages</span>
        </div>
    </div>
<!--end: Head -->

<!--begin: Navigation -->
<div class="kt-notification">
    <a href="#/preview/demo2/custom/apps/user/profile-1/personal-information.html" class="kt-notification__item">
        <div class="kt-notification__item-icon">
            <i class="flaticon2-calendar-3 kt-font-success"></i>
        </div>
        <div class="kt-notification__item-details">
            <div class="kt-notification__item-title kt-font-bold">
                My Profile
            </div>
            <div class="kt-notification__item-time">
                Account settings and more
            </div>
        </div>
    </a>
    <a href="#/preview/demo2/custom/apps/user/profile-3.html" class="kt-notification__item">
        <div class="kt-notification__item-icon">
            <i class="flaticon2-mail kt-font-warning"></i>
        </div>
        <div class="kt-notification__item-details">
            <div class="kt-notification__item-title kt-font-bold">
                My Messages
            </div>
            <div class="kt-notification__item-time">
                Inbox and tasks
            </div>
        </div>
    </a>
    <a href="#/preview/demo2/custom/apps/user/profile-2.html" class="kt-notification__item">
        <div class="kt-notification__item-icon">
            <i class="flaticon2-rocket-1 kt-font-danger"></i>
        </div>
        <div class="kt-notification__item-details">
            <div class="kt-notification__item-title kt-font-bold">
                My Activities
            </div>
            <div class="kt-notification__item-time">
                Logs and notifications
            </div>
        </div>
    </a>
    <a href="#/preview/demo2/custom/apps/user/profile-3.html" class="kt-notification__item">
        <div class="kt-notification__item-icon">
            <i class="flaticon2-hourglass kt-font-brand"></i>
        </div>
        <div class="kt-notification__item-details">
            <div class="kt-notification__item-title kt-font-bold">
                My Tasks
            </div>
            <div class="kt-notification__item-time">
                latest tasks and projects
            </div>
        </div>
    </a>

    <a href="#" class="kt-notification__item">
        <div class="kt-notification__item-icon">
            <i class="flaticon2-cardiogram kt-font-warning"></i>
        </div>
        <div class="kt-notification__item-details">
            <div class="kt-notification__item-title kt-font-bold">
                Billing
            </div>
            <div class="kt-notification__item-time">
                billing &amp; statements <span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--pill kt-badge--rounded">2 pending</span>
            </div>
        </div>
    </a>
    <div class="kt-notification__custom kt-space-between">
        <a href="#/preview/demo2/custom/user/login-v2.html" target="_blank" class="btn btn-label btn-label-brand btn-sm btn-bold">Sign Out</a>

        <a href="#/preview/demo2/custom/user/login-v2.html" target="_blank" class="btn btn-clean btn-sm btn-bold">Upgrade Plan</a>
    </div>
</div>
<!--end: Navigation -->
    </div>
  </div>
  <!--end: User bar -->
</div>
<!-- end:: Header Topbar -->
    </div>
  </div>
  <div class="kt-header__bottom">
    <div class="kt-container ">

    </div>
  </div>
<!-- end: Header Menu -->
    </div>
  </div>
</div>
<!-- end:: Header -->
<div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
  <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

<!-- begin:: Content Head -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-container ">
        <div class="kt-subheader__main">

            <h3 class="kt-subheader__title">Dashboard</h3>

            <span class="kt-subheader__separator kt-subheader__separator--v"></span>

        </div>
    </div>
</div>
<!-- end:: Content Head -->
<!-- begin:: Content -->
<div class="kt-container  kt-grid__item kt-grid__item--fluid">
<!--Begin::Dashboard 2-->
<!--Begin::Row-->
<div class="row">
<div class="col-xl-12 col-lg-12">
    <div>
      <?php 
        for ($st = 101; $st <= 116; $st++) { ?>
            <figure class="highcharts-figure">
              <div id=container<?php echo $st ?> ></div>
            </figure>
      <?php }  ?>
    </div>

</div>
</div>
<!--End::Row-->
<!--End::Dashboard 2-->
</div>
<!-- end:: Content -->
</div>
</div>

        <!-- begin:: Footer -->
<div class="kt-footer  kt-footer--extended  kt-grid__item" id="kt_footer">
      <div class="kt-footer__top">
      <div class="kt-container ">
        <div class="row">
        </div>
      </div>
    </div>
    <div class="kt-footer__bottom">
    <div class="kt-container ">
      <div class="kt-footer__wrapper">
        <div class="kt-footer__logo">
          <a href="#/preview/demo2/index.html">
            <img alt="Logo" src="<?php echo base_url() ?>Template/img/logo-2-sm.png">
          </a>
          <div class="kt-footer__copyright">
            2020&nbsp;©&nbsp;
            <a href="" target="_blank">KornDesign Studio</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end:: Footer -->     
</div>
</div>
</div>
<!--begin::Global Theme Bundle(used by all pages) -->
<!--<script src="<?php echo base_url() ?>Template/js/plugins.bundle.js" type="text/javascript"></script> 
<script src="<?php echo base_url() ?>Template/js/scripts.bundle.js" type="text/javascript"></script>-->
<!--end::Global Theme Bundle -->
<!--begin::Page Vendors(used by this page)-->
<script src="<?php echo base_url() ?>Template/js/fullcalendar.bundle.js" type="text/javascript"></script>
<!--end::Page Vendors -->
<!--begin::Page Scripts(used by this page) 
<script src="<?php echo base_url() ?>Template/js/dashboard.js" type="text/javascript"></script>-->
<!--end::Page Scripts -->

<!-- end::Body -->
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
