<!-- Select2 -->
<?php
$s_login = $this->session->userdata('s_login');
$s_position= $this->session->userdata('s_position');
//var_dump($s_position);

?>
<link rel="stylesheet" href="<?php echo base_url();?>plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- Select2 -->
<script src="<?php echo base_url();?>plugins/select2/js/select2.full.min.js"></script>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>PPL Ridership </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url() ?>Decision_support_rpt/Ridership">Ridership</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<!-- Main content -->
<?php $data_Status = $this->session->flashdata('data_Status');
      $data_data_txt = $this->session->flashdata('data_txt');

                  if (!empty($data_Status)) { ?>
                      <script type="text/javascript">
                          $(function() {
                              const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                              });
                              Toast.fire({
                                icon: "<?php echo $data_Status?>",
                                title: "<?php echo $data_data_txt?>"
                              })
                            });
                      </script>

                   <?php } ?>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title"> &nbsp;&nbsp;&nbsp;</h3>
                <div class="card-tools">
                    <button  id="get_report" type="button" class="btn btn-block btn-outline-info"><i class="fas fa-play"></i> &nbsp;&nbsp;&nbsp; Query </button>
                </div>
                <div class="row">
                  <?php
                    $current_year = date('Y');
                    $current_mount = date('m');
                    $date_range = range($current_year, $current_year-2);
                    $thai_day_arr=array(1 => "อ.",2 => "จ.",3 => "อ.",4 => "พ.",5 => "พฤ.",6 => "ศ.",7 => "ส.");


                    //var_dump($current_mount);
                    //form_dropdown('year', array_combine($date_range, $date_range), set_value('year'));
                  ?>
                  <div class="col-12 col-sm-1">
                  <div class="form-group">
                    <div class="select2-green">
                      <select id="Year_Selectcombo" class="select"  data-dropdown-css-class="select2-green" style="width:100%;">
                        <?php foreach ($date_range as $datayear_report) : ?>
                            <option value="<?php echo $datayear_report?>" ><?php echo $datayear_report; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <!-- /.form-group -->
                </div>
                <!-- /.col -->
                  <div class="col-12 col-sm-1">
                  <div class="form-group">
                    <div class="select2-green">
                      <select id="Month_SelectCombo" class="select" data-dropdown-css-class="select2-green" style="width:100%;">
                        <option <?php echo ($current_mount == '01') ? 'selected' : ''; ?> >JAN</option>
                        <option <?php echo ($current_mount == '02') ? 'selected' : ''; ?> >FAB</option>
                        <option <?php echo ($current_mount == '03') ? 'selected' : ''; ?> >MAR</option>
                        <option <?php echo ($current_mount == '04') ? 'selected' : ''; ?> >APR</option>
                        <option <?php echo ($current_mount == '05') ? 'selected' : ''; ?> >MAY</option>
                        <option <?php echo ($current_mount == '06') ? 'selected' : ''; ?> >JUN</option>
                        <option <?php echo ($current_mount == '07') ? 'selected' : ''; ?> >JUL</option>
                        <option <?php echo ($current_mount == '08') ? 'selected' : ''; ?> >AUG</option>
                        <option <?php echo ($current_mount == '09') ? 'selected' : ''; ?> >SEP</option>
                        <option <?php echo ($current_mount == '10') ? 'selected' : ''; ?> >OCT</option>
                        <option <?php echo ($current_mount == '11') ? 'selected' : ''; ?> >NOV</option>
                        <option <?php echo ($current_mount == '12') ? 'selected' : ''; ?> >DEC</option>
                      </select>
                    </div>
                  </div>
                  <!-- /.form-group -->
                </div>
              <!-- /.col -->
                </div>
              </div>

              <div class="card-body pending">
                <div class="row" id="ridership">
                  <div class="col-md-8">
                        <div class="card-body">
                              <table  border="1" id="example2"  cellspacing="0" width="100%" class"table table-sm table-responsive" >
                                <!-- class="table table-responsive-sm"-->
                                  <thead bgcolor="#e6d5f0">
                                    <tr>
                                        <th colspan="14" class="text-center" width="20px"> จำนวนเที่ยวโดยสาร ระบบ AFC </th>
                                    </tr>
                                      <tr>
                                          <th rowspan="2" class="text-center" width="20px"> วัน </th>
                                          <th rowspan="2" class="text-center" width="120px">วันที่</th>
                                          <th rowspan="2" class="text-center">Day type</th>

                                          <th colspan="4" class="text-center"> จำนวนเที่ยวโดยสาร </th>
                                          <th rowspan="2" class="text-center">Total</th>
                                          <th colspan="4" class="text-center"> ปรับปรุงจำนวนเที่ยวโดยสาร </th>
                                          <th rowspan="2" class="text-center">Total</th>
                                          <th rowspan="2" class="text-center">เมนู</th>
                                      </tr>
                                      <tr>
                                          <th class="text-center">PPL-PPL<br>(PP01 - PP16)</th><!--    เข้า-ออกในระบบ <br> -->
                                          <th class="text-center">BL-PPL<br>(PP01 - PP15)</th><!--    เข้า-ออกข้ามระบบ <br> -->
                                          <th class="text-center">PPL-BL</th><!--    เข้า-ออกข้ามระบบ <br> -->
                                          <th class="text-center">IBL-BLE<br>(BL - PP16)</th><!--   เข้า-ออกในระบบ <br>  -->


                                          <th class="text-center">PPL-PPL<br>(PP01 - PP16)</th><!--    -->
                                          <th class="text-center">BL-PPL<br>(PP01 - PP15)</th><!--    -->
                                          <th class="text-center">PPL-BL</th><!--    -->
                                          <th class="text-center">IBL-BLE<br>(BL - PP16)</th><!--    -->
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php

                                      foreach ($arrdata_report as $name=>$r){
                                        //var_dump($DateThai[$r['FORMAT_DATE2']]);
                                        $_date_thai = $DateThai->DateThai($r['Date']);

                                        if ($r['Day_type2'] == 'SH'){
                                          $tr_bg = 'bgcolor="#f0f288" ';
                                        }else if ($r['Day_type2'] == 'WE'){
                                          $tr_bg = 'bgcolor="#83d665" ';
                                        }else{
                                          $tr_bg = '';
                                        }
                                        ?>

                                        <tr <?php echo $tr_bg; ?> >
                                            <th class="text-center"><?php echo $thai_day_arr[$r['WEEKOfDAY']]; ?></th>
                                            <th class="text-center"><?php echo $_date_thai; ?></th>
                                            <th class="text-center"><?php echo $r['Day_type2']; ?></th>

                                            <th class="text-center"><?php
                                                if($r['PPL_PPL_status'] == '' || $r['update_PPL_PPL'] != ''){
                                                  echo ($r['PPL_PPL'] != '') ? '<font color=red>'.number_format($r['PPL_PPL'],0).'</font>' : '';
                                                }else{
                                                  echo ($r['PPL_PPL'] != '') ? number_format($r['PPL_PPL'],0) : '';
                                                }

                                              ?>
                                            </th><!--   -->
                                            <th class="text-center"><?php echo ($r['BL_PPL'] != '') ? number_format($r['BL_PPL'],0) : '';?> </th><!--   -->
                                            <th class="text-center"><?php echo ($r['PPL_BL'] != '') ? number_format($r['PPL_BL'],0) : '';?> </th><!-- เอามาจาก BL  -->
                                            <th class="text-center"><?php echo ($r['BL_PP16'] != '') ? number_format($r['BL_PP16'],0) : '';?> </th><!--   -->

                                            <th class="text-center"><?php //  Total จำนวนเที่ยวโดยสาร ก่อนปรับปรุง
                                              echo ($r['PPL_PPL'] != '') ? number_format($r['PPL_PPL']+$r['BL_PPL']+$r['PPL_BL'],0) : '';?> </th><!-- Total  -->
                                            <!-- กรณีมีการปรับปรุงข้อมูล  -->
                                            <th class="text-center"><?php echo ($r['update_PPL_PPL'] != '') ? number_format($r['update_PPL_PPL'],0) : '';?> </th><!-- PL - BL  -->
                                            <th class="text-center"><?php echo ($r['update_BL_PPL'] != '') ? number_format($r['update_BL_PPL'],0) : '';?> </th><!-- BL - PPL  -->
                                            <th class="text-center"><?php echo ($r['update_PPL_BL'] != '') ? number_format($r['update_PPL_BL'],0) : '';?> </th><!-- BL - IBL  -->
                                            <th class="text-center"><?php echo ($r['update_BL_PP16'] != '') ? number_format($r['update_BL_PP16'],0) : '';?> </th><!-- BL - BLE  -->

                                            <th class="text-center"><?php //  Total จำนวนเที่ยวโดยสาร ปรับปรุง
                                                  if($r['update_PPL_PPL'] != "" ){ $_update_PPL_PPL = $r['update_PPL_PPL'];}
                                                  else{$_update_PPL_PPL = $r['PPL_PPL'];}

                                                  if($r['update_BL_PPL'] != "" ){ $_update_BL_PPL = $r['update_BL_PPL'];}
                                                  else{$_update_BL_PPL = $r['BL_PPL'];}

                                                  if($r['update_PPL_BL'] != "" ){ $_update_BL_PP16 = $r['update_PPL_BL'];}
                                                  else{$_update_BL_PP16 = $r['PPL_BL'];}

                                                  if($r['update_PPL_PPL'] != "" || $r['update_BL_PPL'] != "" || $r['update_PPL_BL'] != ""){
                                                    $_sum = $_update_PPL_PPL+$_update_BL_PPL+$_update_BL_PP16;
                                                  }else{
                                                    $_sum = '';
                                                  }

                                                echo ($_sum != '') ? number_format($_sum,0) : '';

                                                ?> </th><!-- Total  -->

                                            <th class="text-center">
                                              <?php
                                                $dataid =  $encrypt->encode( $r['Date'].",".$r['BusinessDayID']);
                                                echo '<a href="#" onclick="return add_edit_rider_afc(\''.$dataid.'\')"><i class="fa fa-edit"></i><span class="pull-right-container"></span></a>';
                                              ?>
                                          </th>
                                        </tr>
                                      <?php }

                                      ?>
                                  </tbody>
                              </table>
                        </div>
                  </div>

                  <div class="col-md-4">
                        <div class="card-body">
                              <table  border="1" id="example"  cellspacing="0" width="100%">
                                <!-- class="table table-responsive-sm"-->
                                  <thead bgcolor="#e6d5f0">
                                    <tr>
                                        <th colspan="8" class="text-center" width="20px"> จำนวนเที่ยวโดยสาร ระบบ EMV </th>
                                    </tr>
                                      <tr>
                                          <th colspan="6" class="text-center"> จำนวนเที่ยวโดยสาร </th>
                                          <th rowspan="2" class="text-center"><br> &nbsp;Total<br> &nbsp;</th>
                                           <th rowspan="2" class="text-center">เมนู</th>
                                      </tr>
                                      <tr>
                                          <th class="text-center"> วันที่</th>
                                          <th class="text-center">BL - IBL </th>
                                          <th class="text-center">BL - BLE</th>
                                          <th class="text-center">PPL - BL</th>
                                          <th class="text-center">BL - PPL</th>
                                          <th class="text-center">PPL - PPL</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                      $i = 0;
                                      //var_dump($arrdata_report);
                                      foreach ($arrdata_report as $name=>$row){
                                        $i++;
                                        //var_dump($DateThai[$r['FORMAT_DATE2']]);
                                        $_date_thai = $DateThai->DateThai($r['Date']);
                                        $pass_type = 'EMV';
                                        //$id =


                                        if ($row['Day_type2'] == 'SH'){
                                          $tr_bg = 'bgcolor="#f0f288" ';
                                        }else if ($row['Day_type2'] == 'WE'){
                                          $tr_bg = 'bgcolor="#83d665" ';
                                        }else{
                                          $tr_bg = '';
                                        }

                                        ?>

                                        <tr <?php echo $tr_bg; ?> >
                                          <th class="text-center"><?php echo $i;   ?></th>
                                            <th class="text-center"><?php echo ($r['PPL_PPL'] != '') ? number_format($r['PPL_PPL'],0) : '';?> </th>
                                            <th class="text-center"><?php echo ($r['PPL_PPL'] != '') ? number_format($r['PPL_PPL'],0) : '';?> </th>
                                            <th class="text-center"><?php echo ($r['PPL_PPL'] != '') ? number_format($r['PPL_PPL'],0) : '';?> </th>
                                            <th class="text-center"><?php echo ($r['PPL_PPL'] != '') ? number_format($r['PPL_PPL'],0) : '';?> </th>
                                            <th class="text-center"><?php echo ($r['PPL_PPL'] != '') ? number_format($r['PPL_PPL'],0) : '';?> </th>
                                            <th class="text-center"><?php echo ($r['PPL_PPL'] != '') ? number_format($r['PPL_PPL'],0) : '';?> </th>

                                            <th class="text-center">
                                              <?php
                                                echo '<a href="#" onclick="return add_edit_rider_emv(\''.$r['Date'].'\')"><i class="fa fa-edit"></i><span class="pull-right-container"></span></a>';
                                              ?>
                                          </th>

                                        </tr>
                                      <?php }
                                      ?>
                                  </tbody>
                              </table>
                        </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>

            <!-- /#wrap -->
            <div class="modal fade"  id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
               <div class="modal-dialog modal-xl" role="document" style="min-width: 80%;">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">addRidership</h5>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button> -->
                  </div>
                  <div class="modal-body">
                    <!-- <form action="Decision/create_rider_action" method="POST" enctype="multipart/form-data" id="create_rider_action"> -->
                    <?php echo form_open('Decision/create_rider_action',array('id'=>'create_rider_action','method'=>'post'));?>

            		      <div id="modalGridAdd"></div>

                    <?php echo form_close(); ?>

                  </div>
                  <div class="modal-footer">

                    <button id="save_rider_ppl" type="button" onclick="return save_rider_ppl();" class="btn btn-primary">บันทึก</button>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>




            <!-- /.card -->
      </div>

    </div>
  </div>
</section>
<!-- /.content -->

<!-- Select2 -->
<script type="text/javascript">
function save_rider_ppl(){
  var $modalDialog = $("#modal_overlay");
     $('#exampleModal').modal('hide');
     $modalDialog.modal('show');
     $('#create_rider_action').submit();
}
  $(function () {
    /*
    $('#example2').DataTable({
      'paging'      : false,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : false,
      'info'        : false,
      'autoWidth'   : false
    });
    */
  })
</script>

<script src="<?php echo base_url();?>plugins/select2/js/select2.full.min.js"></script>
<script type="text/javascript">
function add_edit_rider_afc(id){
  //alert(id);
  var $modalDialog = $("#modal_overlay");
  //$modalDialog.modal('show');

  var p= {};
  p['data_rider'] =  id;
  $("#exampleModal").modal('show');

  $('#modalGridAdd').load("<?php echo site_url('Decision/get_data_grid_add') ?>",p);   //get_staft_grid   get_staft_test_para
  //setTimeout(function(){$modalDialog.modal('hide');},600);

/*
  $.ajax({
      url:"<?php echo site_url('Decision/get_data_grid_add') ?>",
      type:'POST',
      dataType : "html",
      contentType: "application/x-www-form-urlencoded; charset=UTF-8",
      data : p,
      success: function(result){
              $('#modalGridAdd').html(result);
              //setTimeout(function(){$modalDialog.modal('hide');},600);

      },
      error:function(){
      }
  });
  */

}

$(function () {
$('.select2').select2()
$("#get_report").click(function() {
      var $modalDialog = $("#modal_overlay");
      $modalDialog.modal('show');
       var p= {};
          p['Year_SelectCombo'] =  $("#Year_SelectCombo").val();
          $.ajax({
            url:"<?php echo site_url('Decision_support_rpt/get_data_grid') ?>",
            type:'POST',
            dataType : "html",
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            data : p,
            success: function(result){
                    $('#staft_issue').html(result);
                    setTimeout(function(){$modalDialog.modal('hide');},600);

            },
            error:function(){
            }
        });
         // $.ajax
  });
});


</script>
