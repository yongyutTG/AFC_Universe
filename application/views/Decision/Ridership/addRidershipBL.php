<!-- Select2 -->
<?php
$s_login = $this->session->userdata('s_login');
$s_position= $this->session->userdata('s_position');
var_dump($s_position);



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
            <h1>addRidership</h1>
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
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title"> &nbsp;&nbsp;&nbsp;</h3>
                <div class="card-tools">
                    <button  id="get_report" type="button" class="btn btn-block btn-outline-info"><i class="fas fa-play"></i> &nbsp;&nbsp;&nbsp; ดูรายงาน </button>
                </div>
                <div class="row">
                  <?php
                    $current_year = date('Y');
                    $date_range = range($current_year, $current_year-2);
                    //var_dump($date_range);
                    //form_dropdown('year', array_combine($date_range, $date_range), set_value('year'));
                  ?>
                  <div class="col-12 col-sm-1">
                  <div class="form-group">
                    <div class="select2-green">
                      <select id="Year_Selectcombo" class="select"  data-dropdown-css-class="select2-green" style="width:100%;">
                        <?php foreach ($date_range as $datayear_report) : ?>
                            <option value="<?php echo $datayear_report?>"><?php echo $datayear_report; ?></option>
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
                        <option>JAN</option>
                        <option>FAB</option>
                        <option>MAR</option>
                        <option>APR</option>
                        <option>MAY</option>
                        <option>JUN</option>
                        <option>JUL</option>
                        <option>AUG</option>
                        <option>SEP</option>
                        <option>OCT</option>
                        <option>NOV</option>
                        <option>APR</option>
                        <option>DEC</option>
                      </select>
                    </div>
                  </div>
                  <!-- /.form-group -->
                </div>
              <!-- /.col -->
                </div>
              </div>

              <div class="card-body pending">
                <div class="row">
                  <div class="col-md-12">
                        <div class="card-body">
                              <table id="example" class="table table-responsive-sm" cellspacing="0" width="100%">
                                  <thead>
                                      <tr>
                                          <th rowspan="2" class="text-center"> วัน </th>
                                          <th rowspan="2" class="text-center">วันที่</th>
                                          <th rowspan="2" class="text-center">Day type</th>
                                          <th colspan="4" class="text-center"> จำนวนเที่ยวโดยสาร </th>
                                          <th rowspan="2" class="text-center">Total</th>
                                          <th colspan="4" class="text-center"> ปรับปรุงจำนวนเที่ยวโดยสาร </th>
                                          <th rowspan="2" class="text-center">Total</th>
                                      </tr>
                                      <tr>
                                          <th class="text-center">BL - IBL</th>
                                          <th class="text-center">BL - BLE</th>
                                          <th class="text-center">PPL - BL</th>
                                          <th class="text-center">BL - PPL</th>
                                          <th class="text-center">BL - IBL</th>
                                          <th class="text-center">BL - BLE</th>
                                          <th class="text-center">PPL - BL</th>
                                          <th class="text-center">BL - PPL</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <tr>
                                          <th class="text-center">ศ.</th>
                                          <th class="text-center">1 เม.ย. 22</th>
                                          <th class="text-center">WD</th>
                                          <th class="text-center">154,076</th>
                                          <th class="text-center">56,895</th>
                                          <th class="text-center">14,715</th>
                                          <th class="text-center">14,789</th>
                                          <th class="text-center">240,475</th>
                                          <th class="text-center">155,021</th>
                                          <th class="text-center">56,907</th>
                                          <th class="text-center">14,734</th>
                                          <th class="text-center">14,790</th>
                                          <th class="text-center">241,452</th>
                                      </tr>
                                  </tbody>
                              </table>
                        </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->

            </div>
            <!-- /.card -->
      </div>

    </div>
  </div>
</section>
<!-- /.content -->

<!-- Select2 -->
<script src="<?php echo base_url();?>plugins/select2/js/select2.full.min.js"></script>
<script type="text/javascript">
$(function () {

  var editor; // use a global for the submit and return data rendering in the examples

$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        ajax: "../php/staff.php",
        table: "#example",
        fields: [ {
                label: "First name:",
                name: "first_name"
            }, {
                label: "Last name:",
                name: "last_name"
            }, {
                label: "Position:",
                name: "position"
            }, {
                label: "Office:",
                name: "office"
            }, {
                label: "Extension:",
                name: "extn"
            }, {
                label: "Start date:",
                name: "start_date",
                type: "datetime"
            }, {
                label: "Salary:",
                name: "salary"
            }
        ]
    } );

    var table = $('#example').DataTable( {
        dom: "Bfrtip",
        ajax: "Decision/set_ridership",
        columns: [
            {
                data: null,
                defaultContent: '',
                className: 'select-checkbox',
                orderable: false
            },
            { data: "first_name" },
            { data: "last_name" },
            { data: "position" },
            { data: "office" },
            { data: "start_date" },
            { data: "salary", render: $.fn.dataTable.render.number( ',', '.', 0 ) }
        ],
        order: [[1, 'asc']],
        keys: {
            columns: ':not(:first-child)',
            editor:  editor
        },
        select: {
            style:    'os',
            selector: 'td:first-child',
            blurable: true
        },
        buttons: [
            { extend: "create", editor: editor },
            { extend: "edit",   editor: editor },
            { extend: "remove", editor: editor }
        ]
    } );
} );
  //Initialize Select2 Elements
  //Year_SelectCombo  Month_SelectCombo Station_SelectCombo CSC_CST_SelectCombo
  //Year_checkbox Month_checkbox Station_checkbox CSC_CST_checkbox
$('.select2').select2()

$("#Year_checkbox").click(function(){
    if($("#Year_checkbox").is(':checked') ){
        $("#Year_SelectCombo > option").prop("selected","selected");// Select All Options
        $("#Year_SelectCombo").trigger("change");// Trigger change to select 2
    }else{
        $("#Year_SelectCombo > option").removeAttr("selected");
        $("#Year_SelectCombo").trigger("change");// Trigger change to select 2
     }
});
$("#Month_checkbox").click(function(){
    if($("#Month_checkbox").is(':checked') ){
        $("#Month_SelectCombo > option").prop("selected","selected");// Select All Options
        $("#Month_SelectCombo").trigger("change");// Trigger change to select 2
    }else{
        $("#Month_SelectCombo > option").removeAttr("selected");
        $("#Month_SelectCombo").trigger("change");// Trigger change to select 2
     }
});
$("#Station_checkbox").click(function(){
    if($("#Station_checkbox").is(':checked') ){
        $("#Station_SelectCombo > option").prop("selected","selected");// Select All Options
        $("#Station_SelectCombo").trigger("change");// Trigger change to select 2
    }else{
        $("#Station_SelectCombo > option").removeAttr("selected");
        $("#Station_SelectCombo").trigger("change");// Trigger change to select 2
     }
});
$("#CSC_CST_checkbox").click(function(){
    if($("#CSC_CST_checkbox").is(':checked') ){
        $("#CSC_CST_SelectCombo > option").prop("selected","selected");// Select All Options
        $("#CSC_CST_SelectCombo").trigger("change");// Trigger change to select 2
    }else{
        $("#CSC_CST_SelectCombo > option").removeAttr("selected");
        $("#CSC_CST_SelectCombo").trigger("change");// Trigger change to select 2
     }
});



  $("#get_report").click(function() {

      var $modalDialog = $("#modal_overlay");
      $modalDialog.modal('show');

       var p= {};
          p['Year_SelectCombo'] =  $("#Year_SelectCombo").val();
          //p['input'] =  $('#select2').val();
          //$('#staft_issue').load("<?php echo site_url('Decision_support_rpt/get_data_grid') ?>",p);   //get_staft_grid   get_staft_test_para

          $.ajax({
            url:"<?php echo site_url('Decision_support_rpt/get_data_grid') ?>",
            type:'POST',
            dataType : "html",
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            data : p,
            success: function(result){
                    $('#staft_issue').html(result);
                    setTimeout(function() {
                      $modalDialog.modal('hide');
                    }, 600);

            },
            error:function(){
            }
        });
         // $.ajax


  });

});
</script>
