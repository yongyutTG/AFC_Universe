<!--
<div class="loadmsg" style=" width: 480px;">
    <font style='color:red;font-size: 18px;' >กำลังประมวลผลโปรดรอ สักครู่</font><br>
    <img src="<?php echo base_url() ?>img/loader.gif" style=" width: 80px;" alt="loading...">
</div> -->
<script>
    function loadding(){
        $('#myModalloadding').modal('show');
        $("body").append('<div class="loadmsg" style=" position: static;  width: 100%;   height: 100%;   top: 0;   left: 0%;  display: block;  line-height: @input-height-base; text-align: center;  pointer-events: none;">\
                   <div class="loadmsg"  style=" width: 480px; position: absolute; left: 48%; top: 42%; ">\
                    <font style="color:red;font-size: 18px;">กำลังประมวลผลโปรดรอ สักครู่...</font><br>\
                        <img src="<?php echo base_url() ?>img/loader.gif" style=" width: 40px;" alt="loading...">\
                   </div>\
                 </div>');
         
    }
</script>
<div class="hide modal-backdrop" data-keyboard="true" data-backdrop="static"  id="myModalloadding">         
</div>
<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2018-2019 <a href="https://KornDesign.io">KornDesign Studio</a>.</strong> All rights
    reserved.
  </footer>