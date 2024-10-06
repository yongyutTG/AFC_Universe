    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
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

                <h5 class="widget-user-desc text-left">AFC Management Information System</h5>
            </div>
            <div class="row">
                <div class="col-md-12">
                  <?php
                    $path = $_SERVER['DOCUMENT_ROOT'].'/afc_aggregate/assets/images/bem.jpg';
                  ?>
                  <img src='<?php echo 'data:image/png;base64,' . base64_encode(file_get_contents($_SERVER['DOCUMENT_ROOT'].'/afc_aggregate/assets/images/bem.jpg')); ?>'>
                  <!-- <img src='<?php echo  base_url().'assets/images/bem.jpg' ; ?> ' > OK -->

                </div>
            </div>
          </div>
        </div>
  </div>
</div>
<div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Decision Support Report</h3>

                <div class="card-tools">

                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <!-- Widget: user widget style 1 -->
                    <div class="card card-widget widget-user">
                      <!-- Add the bg color to the header using any of the bg-* classes -->
                      <div class="widget-user-header text-white"
                           style="background: url('<?php echo 'data:image/png;base64,' . base64_encode(file_get_contents($_SERVER['DOCUMENT_ROOT'].'/afc_aggregate/assets/images/time_ppl.jpg')); ?>') center center;">
                        <h3 class="text-left">Ridership</h3>
                        <h5 class="widget-user-desc text-left">ข้อมูลการเดินทาง</h5>
                      </div>
                      <div class="card-body">
                        <ul class="nav flex-column">
                          <li class="nav-item">
                            <a href="addRidership.JS" class="nav-link text-center">
                              Add Ridership
                            </a>
<h6 class="text-center"> บันทึกข้อมูลจำนวนผู้โดยสาร </h6>
                          </li>
                          <li class="nav-item">
                            <a href="Ridership.JSframework" class="nav-link text-center">
                              Ridership
                            </a>
<h6 class="text-center">  </h6>
                          </li>
                          <li class="nav-item">
                            <a href="#" class="nav-link text-center">
                              M: AVG Ridership by Day Type
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="#" class="nav-link text-center">
                              M: AVG Ridership
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="#" class="nav-link text-center">
                            BM: AVG Ridership by Day (In/Out)
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="#" class="nav-link text-center">
                            M: Ridership Actual & Forecast
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="#" class="nav-link text-center">
                            BM: Trip Length Frequency by Day Type
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <!-- /.widget-user -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <!-- Widget: user widget style 1 -->
                    <div class="card card-widget widget-user">
                      <!-- Add the bg color to the header using any of the bg-* classes -->
                      <div class="widget-user-header text-white"
                           style="background: url('<?php echo 'data:image/png;base64,' . base64_encode(file_get_contents($_SERVER['DOCUMENT_ROOT'].'/afc_aggregate/assets/images/card_ppl.jpg')); ?>') center;">
                        <h3 class="text-left">Ridership by Ticket</h3>
                        <h5 class="widget-user-desc text-left">ข้อมูลการเดินทางตามประเภทบัตร</h5>
                      </div>
                      <div class="card-body">
                        <ul class="nav flex-column">
                          <li class="nav-item">
                            <a href="#" class="nav-link text-center">
                              Daily AVG Trip Length
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="#" class="nav-link text-center">
                              M: Monthly AVG Trip Length
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="#" class="nav-link text-center">
                              Daily Ridership by Ticket Group
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="#" class="nav-link text-center">
                             By M: Ridership by Ticket Group
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="#" class="nav-link text-center">
                              M: AVG Ridership by Ticket Group
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="#" class="nav-link text-center">
                              By M: AVG Ticket Ratio
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="#" class="nav-link text-center">
                              By M: Ridership Ticket Ratio
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="#" class="nav-link text-center">
                              D/M: Monthly Card Issuing
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="#" class="nav-link text-center">
                              D/M: Monthly Refund
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="#" class="nav-link text-center">
                              BM: Monthly Card Issuing Exclude Refund
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <!-- /.widget-user -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <!-- Widget: user widget style 1 -->
                    <div class="card card-widget widget-user">
                      <!-- Add the bg color to the header using any of the bg-* classes -->
                      <div class="widget-user-header text-white"
                           style="background: url('<?php echo 'data:image/png;base64,' . base64_encode(file_get_contents($_SERVER['DOCUMENT_ROOT'].'/afc_aggregate/assets/images/station_ppl.jpg')); ?>') center center;">
                        <h3 class="text-left">Ridership by Station</h3>
                        <h5 class="widget-user-desc text-left">ข้อมูลการเดินทางรายสถานี</h5>
                      </div>
                      <div class="card-body">
                        <ul class="nav flex-column">
                          <li class="nav-item ">
                            <a href="#" class="nav-link text-center">
                              Daily In/Out by Station
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="#" class="nav-link text-center">
                              BM: AVG In/Out by Station
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="#" class="nav-link text-center">
                              D: Daily Card Issuing by Station
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="#" class="nav-link text-center">
                              D: Daily Card Issuing by Station Exclude Refund
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="#" class="nav-link text-center">
                              M:  AVG Ridership OD Matrix @PPL
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <!-- /.widget-user -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
                <div class="row">
                  <div class="col-md-12">
                    <div class="card card-outline card-info">
                      <div class="card-header">
                        <h3 class="card-title">Transaction Report</h3>

                        <div class="card-tools">

                        </div>
                        <!-- /.card-tools -->
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-4">
                            <?php
                            $s_auth = $this->session->userdata('s_auth');
                            $s_login = $this->session->userdata('s_login');
                            var_dump($s_login);
                            echo '<br>';
                            var_dump($s_auth);
                            ?>
                          </div>
                        </div>
                        <!-- /.row -->
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
</div>
</section>
<!-- /.content -->

<script type="text/javascript">
</script>
