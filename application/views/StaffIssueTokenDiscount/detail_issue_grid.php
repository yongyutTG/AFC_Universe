<div class="card card-info">
              <div class="card-header">
                <div class="card-title">
                  <h3>
<img src='<?php echo 'data:image/png;base64,' . base64_encode(file_get_contents('\\\bmcl-s03\compu\HR\Picture\BMC'.substr($staff_id,1,4).'.JPG')); ?>' width="150" height="200">

<?php
$staff_count = 0;
        foreach ($arr_staftSQL as $key=>$r_staft){
          $staff_count = $staff_count+1;
            echo '&nbsp;&nbsp;&nbsp; รหัสพนักงาน '.substr($r_staft['ID'],1,4).' &nbsp;&nbsp;&nbsp;ชื่อพนักงาน &nbsp;&nbsp;'.$r_staft['NAME'].' &nbsp;&nbsp;&nbsp;ตำแหน่ง &nbsp;'.$r_staft['DESCRIPTION'];
        }
if($staff_count == 0 ){
 echo 'ไม่พบข้อมูลพนักงานใน ฐานข้อมูล AFCMIS.AFCMIS.Staffall3 รหัสผู้ใช้งาน &nbsp;&nbsp;'.$staff_id;
}
?>
</h3>
</div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- <table id="example1" class="table table-bordered table-striped"> -->
                <table id="issue_detai" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Shift</th>
                    <th>สถานีที่ออกเหรียญ</th>
                    <th>อุปกรณ์</th>
                    <th>Card S/N</th>
                    <th>สถานีปลายทาง</th>
                    <th>ISSUE Date/Time</th>
                    <th>มูลค่าเหรียญ</th>
                    <th>ประเภทเหรียญ</th>
                  </tr>
                  </thead>
                  <tbody>

<?php //echo $strSQL;
$i = 0;
        foreach ($arrdetailstaft as $key=>$r){  $i = $i+1;
?>

                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $r['SHIFT_NO'];  ?></td>
                    <td><?php echo substr($r['ISSUE_LOCATION'],0,3);?></td>
                    <td><?php echo $r['EQUIPMENT_NAME'];  ?></td>
                    <td><?php echo $r['CARD_SERIAL_NUMBER'];  ?></td>
                    <td><?php
                              $r_array = explode("-", $r['ISSUE_DESTINATION']);
                              $issue_des = trim($r_array[0]);
                              echo $issue_des;
                        ?>
                    </td>
                    <td><?php echo $r['DATE_TIME_ISSUE'];  ?></td>
                    <td><?php echo $r['VALUE_ISSUE'];  ?></td>
                    <td><?php echo $r['PASSENGER_TYPE'];  ?></td>
                  </tr>
<?php
}
if ($i == 0){
?>
              <tr>
                <td colspan="9">ไม่พบข้อมูลการทำรายการ</td>
              </tr>

<?php
}
?>


                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Shift</th>
                    <th>สถานีที่ออกเหรียญ</th>
                    <th>อุปกรณ์</th>
                    <th>Card S/N</th>
                    <th>สถานีปลายทาง</th>
                    <th>Txn Date/Time</th>
                    <th>มูลค่าเหรียญ</th>
                    <th>ประเภทเหรียญ</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
