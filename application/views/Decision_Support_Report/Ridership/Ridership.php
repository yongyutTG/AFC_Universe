<!-- Select2 -->
<link rel="stylesheet" href="<?php echo base_url();?>plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- Select2 -->
<script src="<?php echo base_url();?>plugins/select2/js/select2.full.min.js"></script>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ridership Report</h1>
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
              <div class="col-12 col-sm-2">
              <div class="form-group">
                <label>Year  &nbsp;&nbsp;&nbsp;
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="Year_checkbox">
                        <label for="Year_checkbox">
                        </label>
                      </div> all</label>
                <div class="select2-green">
                  <select id="Year_SelectCombo" class="select2" multiple="multiple" data-placeholder="Select a Year" data-dropdown-css-class="select2-green" style="width: 100%;">
                    <option value="2020" selected>2020</option>
                    <option>2019</option>
                    <option>2018</option>
                    <option>2017</option>
                    <option>2016</option>
                  </select>
                </div>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
              <div class="col-12 col-sm-4">
              <div class="form-group">
                <label>Month  &nbsp;&nbsp;&nbsp;
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="Month_checkbox">
                        <label for="Month_checkbox">
                        </label>
                      </div> all</label>
                <div class="select2-green">
                  <select id="Month_SelectCombo" class="select2" multiple="multiple" data-placeholder="Select a Month" data-dropdown-css-class="select2-green" style="width: 100%;">
                    <option>JAN</option>
                    <option>FAB</option>
                    <option>MAR</option>
                    <option>APR</option>
                    <option>MAY</option>
                    <option selected>JUN</option>
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
              <div class="col-12 col-sm-4">
              <div class="form-group">
                <label>Station  &nbsp;&nbsp;&nbsp;
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="Station_checkbox" checked>
                        <label for="Station_checkbox">
                        </label>
                      </div> all</label>
                <div class="select2-purple">
                  <select id="Station_SelectCombo" class="select2" multiple="multiple" data-placeholder="Select a Station" data-dropdown-css-class="select2-purple" style="width: 100%;">
                    <option selected>PP01</option>
                    <option selected>PP02</option>
                    <option selected>PP03</option>
                    <option selected>PP04</option>
                    <option selected>PP05</option>
                    <option selected>PP06</option>
                    <option selected>PP07</option>
                    <option selected>PP08</option>
                    <option selected>PP09</option>
                    <option selected>PP10</option>
                    <option selected>PP11</option>
                    <option selected>PP12</option>
                    <option selected>PP13</option>
                    <option selected>PP14</option>
                    <option selected>PP15</option>
                    <option selected>PP16</option>
                  </select>
                </div>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-2">
            <div class="form-group">
              <label>CSC-CST  &nbsp;&nbsp;&nbsp;
                    <div class="icheck-primary d-inline">
                      <input type="checkbox" id="CSC_CST_checkbox" checked>
                      <label for="CSC_CST_checkbox">
                      </label>
                    </div> all</label>
              <div class="select2-orange">
                <select id="CSC_CST_SelectCombo" class="select2" multiple="multiple" data-placeholder="Select a Card" data-dropdown-css-class="select2-orange" style="width: 50%;">
                  <option selected>CSC</option>
                  <option selected>CSC</option>
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
                        <div id="staft_issue"></div>
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
