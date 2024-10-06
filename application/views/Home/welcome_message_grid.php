<div class="body">
<div class="row">
  <div class="col-2"></div>
  <div class="col-8">
        <div class="text-center">

           <p><h1>ข้อมูลการออกเหรียญลดหย่อนของพนักงานประจำสถานี</h1> </p>
           <p><h3>  <?php echo 'ประจำวันที่ '.$r_sdate.' ถึง '.$r_edate ?> </h3> </p>
<?php
//echo $avg_sdate.' ==== '.$avg_edate

?>
        </div>
  </div>

</div>

    <?php for ($st = 101; $st <= 116; $st++) { ?>
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title"><?php echo $st.'-'.$name_station[$st] ?></h3>
                </div>
              </div>
              <div class="card-body">

      <?php  for($daytype = 1; $daytype <= 2; $daytype++) { ?>
                <div class="position-relative mb-4">
                  <figure class="highcharts-figure">
                      <div id=container<?php echo $st.'_'.$daytype ?> ></div>
                  </figure>
                </div>
    <?php }   // END for($daytype = 1; $daytype <= 2; $daytype++)  ?>
            </div>
&nbsp;&nbsp;&nbsp;&nbsp; Last Refresh : <?php echo date("Y-m-d H:i:s"); ?>
          </div>
  <?php  }  //END for ($st = 101; $st <= 116; $st++)  ?>
</div>

<div class="modal fade" id="modal_xl">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">รายละเอียดการออกเหรียญ</h4>
      </div>
      <div class="modal-body">
        <div id="staftdetai"></div>
      </div>
      <div class="modal-footer justify-content-between">
        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
        <button type="button" class="btn btn-primary">ส่งรายชื่อเข้าระบบตรวจสอบของสถานี</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script type="text/javascript">
<?php
for ($st = 101; $st <= 116; $st++) {
$i = 0;
$x = 0;
$t = 0;
    for($daytype = 1; $daytype <= 2; $daytype++) {
?>
Highcharts.chart('container<?php echo $st.'_'.$daytype ?>',
{
    chart: {
        type: 'column'
    },


    title: {
        text: '<?php echo $data_of_week[$daytype]?>'
    },
    xAxis: {
        categories: [   <?php
                            foreach ($arrstaft as $name=>$r){
                                if($r['ISSUE_LOC_ID'] == $st && $r['Day_type'] == $daytype){ echo "".$r['STAFF_ID'].","; }
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
                        if($r['ISSUE_LOC_ID'] == $st && $r['Day_type'] == $daytype){ echo "".$r['Chi'].","; }
                    }
                ?>
            ],
        color: "#2a2a2b",
        point: {
            events: {
                click: function () {
                    var p = {};
                    p['staft_id'] = this.category;
                    p['r_sdate'] = '<?php echo $r_sdate; ?>';
                    p['r_edate'] = '<?php echo $r_edate; ?>';
                    p['daytype'] = '<?php echo $daytype; ?>';
                    $('#staftdetai').load("<?php echo site_url('staff_validation/getdetail_issue')?>",p);
                    $('#modal_xl').modal('show');

                }
            }
        }
    }, {
        name: 'Senior Token',
        data: [<?php
                    foreach ($arrstaft as $name=>$r){
                        if($r['ISSUE_LOC_ID'] == $st  && $r['Day_type'] == $daytype){ echo "".$r['Se'].","; }
                    }
                ?>
            ],
        color: "#6998f5",
        point: {
            events: {
                click: function () {
                    var p = {};
                    p['staft_id'] = this.category;
                    p['r_sdate'] = '<?php echo $r_sdate; ?>';
                    p['r_edate'] = '<?php echo $r_edate; ?>';
                    p['daytype'] = '<?php echo $daytype; ?>';
                    $('#staftdetai').load("<?php echo site_url('staff_validation/getdetail_issue')?>",p);
                    $('#modal_xl').modal('show');

                }
            }
        }


    },
{
        name: 'เส้นสังเกตการณ์',
        type: 'line',
        data: [<?php
                            foreach ($arrstaft as $name=>$r){
                                if($r['ISSUE_LOC_ID'] == $st  && $r['Day_type'] == $daytype){ echo "".number_format($r['AVG_AMT'],0).",";  }
                            }
                        ?>
                    ],
        color: "#ff0000",
        point: {
            events: {
                click: function () {
                    var p = {};
                    p['staft_id'] = this.category;
                    p['r_sdate'] = '<?php echo $r_sdate; ?>';
                    p['r_edate'] = '<?php echo $r_edate; ?>';
                    p['daytype'] = '<?php echo $daytype; ?>';
                    $('#staftdetai').load("<?php echo site_url('staff_validation/getdetail_issue')?>",p);
                    $('#modal_xl').modal('show');

                }
            }
        },
        dataLabels: {
                            enabled: false
        },
        marker: {
            enabled: false
        }



    },
  {  //Sum_Shift
            name: 'การเปิด Shift',
            type: 'line',
            data: [<?php
                                foreach ($arrstaft as $name=>$r){
                                    if($r['ISSUE_LOC_ID'] == $st  && $r['Day_type'] == $daytype){ echo "".number_format($r['Sum_Shift'],0).",";  }
                                }
                            ?>
                        ],
            color: "#ff00fb",
            point: {
                events: {
                    click: function () {
                        var p = {};
                        p['staft_id'] = this.category;
                        p['r_sdate'] = '<?php echo $r_sdate; ?>';
                        p['r_edate'] = '<?php echo $r_edate; ?>';
                        p['daytype'] = '<?php echo $daytype; ?>';
                        $('#staftdetai').load("<?php echo site_url('staff_validation/getdetail_issue')?>",p);
                        $('#modal_xl').modal('show');

                    }
                }
            },
            dataLabels: {
                                enabled: false
            }
    }]
});
<?php
    }
}
?>
</script>
