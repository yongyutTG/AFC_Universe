<?php
//$CI = &get_instance();
?>
<div class="card">
  <div class="card-body">
      <div class="card col-sm-12" height="200px">
        <div class="card-header">
          <h3 class="card-title">Daily Ridership From AFC Daily Report</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <?php
            //echo $res_ridership_ppl;
            //var_dump($res_ridership_ppl);

          ?>

          <table  id="example" width="100%" border="0" cellpadding="0" cellspacing="0" class="table table-light table-bordered">

            <thead bgcolor="#e6d5f0">
              <tr>
                  <th colspan="8" class="text-center" width="20px"> จำนวนเที่ยวโดยสาร ระบบ AFC
                    <input type="hidden" class="form-control text-right" name="ppl_rider_id" id="ppl_rider_id"   value="<?php
                        echo ($res_ridership_ppl->ridership_ppl_id != '') ? $encrypt->encode($res_ridership_ppl->ridership_ppl_id) : ''; ?>">
                    <input type="hidden" class="form-control text-right" name="businessDayID" id="businessDayID" value="<?php
                        echo ($res_ridership_ppl->BusinessDayID != '') ? $encrypt->encode($res_ridership_ppl->BusinessDayID) : ''; ?>">
                    <input type="hidden" class="form-control text-right" name="ppl_reson_id" id="ppl_reson_id"   value="<?php
                        echo ($res_ridership_ppl->reason_ppl_id != '') ? $encrypt->encode($res_ridership_ppl->reason_ppl_id) : ''; ?>">
                  </th>
              </tr>
                <tr>
                    <th rowspan="2" class="text-center" width="140px" bgcolor="#e6d5f0">วันที่</th>
                    <th colspan="3" class="text-center" bgcolor="#adc3f0"> จำนวนเที่ยวโดยสาร </th>
                    <th colspan="3" class="text-center" bgcolor="#f0d4ad"> ปรับปรุงจำนวนเที่ยวโดยสาร </th>
                </tr>
                <tr>
                    <th class="text-center" bgcolor="#adc3f0">PPL-PPL<br>(PP01 - PP16)</th><!--    เข้า-ออกในระบบ <> -->
                    <th class="text-center" bgcolor="#adc3f0">BL-PPL<br>(PP01 - PP15)</th><!--    เข้า-ออกข้ามระบบ <> -->
                    <th class="text-center" bgcolor="#adc3f0">IBL-BLE<br>(BL - PP16)</th><!--   เข้า-ออกในระบบ <>  -->

                    <th class="text-center" bgcolor="#f0d4ad">PPL-PPL<br>(PP01 - PP16)</th><!--    -->
                    <th class="text-center" bgcolor="#f0d4ad">BL-PPL<br>(PP01 - PP15)</th><!--    -->
                    <th class="text-center" bgcolor="#f0d4ad">IBL-BLE<br>(BL - PP16)</th><!--    -->
                </tr>
            </thead>
            <tbody>
              <tr>
                  <th class="text-center" bgcolor="#e6d5f0"> <?php echo $DateThai2->DateThai($res_ridership_ppl->Date); ?> </th><!--    เข้า-ออกในระบบ <br> -->
                  <th class="text-center" bgcolor="#adc3f0">
                    <div class="row" >
                      <div class="form-group clearfix col-sm-2">
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" id="checkboxPrimary1" name="checkboxPrimary1"  value="value1" checked>
                          <label for="checkboxPrimary1">
                          </label>
                        </div>
                      </div>
                      <div class="form-group col-sm-10">
                        <input type="text" class="form-control text-right"  name="ridership_ppl_PPL_PPL" id="ridership_ppl_PPL_PPL" value="<?php
                            echo ($res_ridership_ppl->PPL_PPL != '') ? number_format($res_ridership_ppl->PPL_PPL) : ''; ?>">
                      </div>
                    </div>
                  </th><!--    เข้า-ออกในระบบ <br> -->
                  <th class="text-center" bgcolor="#adc3f0">
                    <div class="row" >
                      <div class="form-group clearfix col-sm-2">
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" id="checkboxPrimary2" name="checkboxPrimary2"  value="value2" checked>
                          <label for="checkboxPrimary2">
                          </label>
                        </div>
                      </div>
                      <div class="form-group col-sm-10">
                        <input type="text" class="form-control text-right"  name="ridership_ppl_BL_PPL" id="ridership_ppl_BL_PPL" value="<?php
                            echo ($res_ridership_ppl->BL_PPL != '') ? number_format($res_ridership_ppl->BL_PPL) : ''; ?>" >
                      </div>
                    </div>
                  </th><!--    เข้า-ออกข้ามระบบ <br> -->
                  <th class="text-center" bgcolor="#adc3f0">
                    <div class="row" >
                      <div class="form-group clearfix col-sm-2">
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" id="checkboxPrimary3" name="checkboxPrimary3" value="value3" checked>
                          <label for="checkboxPrimary3">
                          </label>
                        </div>
                      </div>
                      <div class="form-group col-sm-10">
                        <input type="text" class="form-control text-right"  name="ridership_ppl_BL_PP16" id="ridership_ppl_BL_PP16" value="<?php
                            echo ($res_ridership_ppl->BL_PP16 != '') ? number_format($res_ridership_ppl->BL_PP16) : ''; ?>" >
                      </div>
                    </div>
                  </th><!--   เข้า-ออกในระบบ <br>  -->

                  <th class="text-center" bgcolor="#adc3f0">
                      <input type="text" class="form-control text-right"  name="ridership_ppl_update_PPL_PPL" id="ridership_ppl_update_PPL_PPL" value="<?php
                          echo ($res_ridership_ppl->update_PPL_PPL != '') ? number_format($res_ridership_ppl->update_PPL_PPL) :''; ?>">
                  </th><!--    เข้า-ออกในระบบ <br> -->
                  <th class="text-center" bgcolor="#adc3f0">
                      <input type="text" class="form-control text-right"  name="ridership_ppl_update_BL_PPL" id="ridership_ppl_update_BL_PPL" value="<?php
                          echo  ($res_ridership_ppl->update_BL_PPL != '') ? number_format($res_ridership_ppl->update_BL_PPL) : ''; ?>" >
                  </th><!--    เข้า-ออกข้ามระบบ <br> -->
                  <th class="text-center" bgcolor="#adc3f0">
                      <input type="text" class="form-control text-right"  name="ridership_ppl_update_BL_PP16" id="ridership_ppl_update_BL_PP16" value="<?php
                          echo ($res_ridership_ppl->update_BL_PP16 != '') ? number_format($res_ridership_ppl->update_BL_PP16) : ''; ?>" >
                  </th><!--   เข้า-ออกในระบบ <br>  -->
              </tr>

            </tbody>
          </table>
          *** หมายเหตุ
            <div class="icheck-primary d-inline">
              <input type="checkbox" id="checkboxPrimary_res" checked disabled/>
              <label for="checkboxPrimary_res">
                 หมายถึง ข้อมูลได้รับการยืนยันความถูกต้อง
              </label>
            </div>

          <hr>
          <table  id="example" width="100%" border="0" cellpadding="0" cellspacing="0" class="table table-light table-bordered">
            <thead bgcolor="#e6d5f0">
                <tr>
                    <th class="text-center" width="140px" bgcolor="#e6d5f0">วันที่</th>
                    <th class="text-center"  bgcolor="#e6d5f0">หมายเหตุ</th>
                </tr>
            </thead>
            <tbody>
              <tr>
                  <th class="text-center" bgcolor="#e6d5f0"> <?php echo $DateThai2->DateThai($res_ridership_ppl->Date); ?> </th><!--    เข้า-ออกในระบบ <br> -->
                  <th class="text-center" bgcolor="#adc3f0">
                      <input type="text" class="form-control text-left" name="ridership_ppl_reason_ppl" id="ridership_ppl_reason_ppl"
                      value = "<?php echo $res_ridership_ppl->reason_ppl; ?>">
                  </th>
              </tr>

            </tbody>
            <tfoot>
              <tr>
                  <td colspan="2" class="text-left" bgcolor="#e6d5f0">
                    <font style="color:red;">**** ตัวอย่าง **** </font><br>
                    - รายงานมีข้อมูลผิดปกติ : ข้อมูลของระบบ AFC สายสีน้ำเงิน ประมวลผลรายงานประจำวันไม่สมบูรณ์ อยู่ระหว่างการแก้ไขจาก EMTข้อมูลของระบบ BEATS ประมวลผลไม่สมบูรณ์ อยู่ระหว่างการแก้ไขจาก EMT <br>
                    - ปรับปรุงรายงาน (EMV PPL-PPL , BL-PPL),PPL-BL ส่งผลต่อจำนวนผู้โดยสารเพิ่มขึ้น<br>
                    - ปรับปรุงรายงาน (EMV PPL-PPL ),PPL-BL ส่งผลต่อจำนวนผู้โดยสารเพิ่มขึ้น<br>
                  </td>
              </tr>
              <tr>
                  <td colspan="2" class="text-left" bgcolor="#e6d5f0">
                  </td>
              </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- <button type="submit" class="btn btn-primary">บันทึก</button>-->
      <!-- /.card -->
</div>
</div>

<script type="text/javascript">

</script>
