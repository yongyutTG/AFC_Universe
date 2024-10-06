    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>การออกเหรียญลดหย่อน </h1>
          </div>
          <!--
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Discount Token</a></li>
            </ol>
          </div>
          -->

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
              <div class="col-md-3">
                <div class="form-group">
                  <label>Date range:</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" class="form-control " id="reservation">
                    </div>
                </div>
              </div>

              <!--<div class="col-md-4">
                <div class="form-group">
                    <label>&nbsp;&nbsp; สถานะ :&nbsp;&nbsp;</label>
                    <div class="input-group" data-toggle="buttons">
                      <label class="btn btn-info active" >
                        <input type="radio" name="options" id="option1" autocomplete="off" checked value="0" > ALL Staff
                      </label>
                      <label class="btn btn-info">
                        <input type="radio" name="options" id="option2" autocomplete="off" value="1"> Over Red Line
                      </label>
                    </div>
                </div>
              </div>-->

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

<script type="text/javascript">
    $(function () {
        //Date range picker
        $('#reservation').daterangepicker()

        $("#get_report").click(function() {
          var options = $('input[name=options]:checked').val();
          //alert(options);
          var $modalDialog = $("#modal_overlay");
          $modalDialog.modal('show');

             var p= {};
                p['rs_date'] =  $('#reservation').val();
                //p['options'] =  options;
                //$('#staft_issue').load("<?php echo site_url('staff_validation/get_staft_grid') ?>",p);   //get_staft_grid   get_staft_test_para
                //setTimeout(function() {$modalDialog.modal('hide');}, 600);

                $.ajax({
                  url:"<?php echo site_url('staff_validation/get_staft_grid') ?>",
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

        });
    });


</script>
