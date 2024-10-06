<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url();?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<!-- BAR CHART -->
<div class="card">
<?php
var_dump($select);
var_dump($prev_sdate);
var_dump($select);
?>
  <div class="card-body">
      <div class="card">
        <div class="chart-responsive">
    			<canvas width="860px"  id="salesChart2" height="200px"> </canvas>
    		</div><!-- /.chart-responsive -->
      </div>
      <div class="card col-sm-4" height="200px">
              <div class="card-header">
                <h3 class="card-title">Daily Ridership</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Date</th>
                    <th>Day Type</th>
                    <th>Ridership</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php for($i = 1 ;$i < 31 ; $i++): ?>
                  <tr>
                    <td><?php echo  $i; ?></td>
                    <td>WD</td>
                    <td><?php echo(rand(25000,60000)); ?></td>
                  </tr>
                <?php endfor; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
</div>

<!-- ChartJS -->
<script src="<?php echo base_url();?>plugins/chart.js/Chart.min.js"></script>
<script>
/*
$('#example1').DataTable({
  "lengthChange": false,
  "searching": false,
  "ordering": false,
  "autoWidth": false,
  "responsive": false
});
*/
  //var ctx = document.getElementById("salesChart2");
          var myChart = new Chart($("#salesChart2"), {
              type: 'line',
              data: {
                  labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30'] ,
                  datasets: [
  		                        {
        		                    label: 'Daily Ridership',
        		                    data: [<?php for($i = 1 ;$i < 31 ; $i++):
                                                  if($i < 16 ){
                                                    echo(rand(25000,60000)).',';
                                                  }else{
                                                    echo '0,';
                                                  }
                              								 endfor;
                                        ?>
                								      ],
        		                    backgroundColor: [
        											               'rgba(221, 99, 255, 0.2)'
        		                    ],
        		                    borderColor: [
                                            'rgba(221, 99, 255, 1)'
                              ],
        		                    borderWidth: 2
          		                }
                          	]
                          	// datasets
                      },
                      options: {
                          scales: {
                              yAxes: [{
                                  ticks: {
                                      beginAtZero:true
                                  },
                              }],
                                   xAxes: [{
                                  ticks: {
                                      beginAtZero:true
                                  },

                              }]
                          },

                      }
                  });
  </script>
