<?php if($action!='timsim'){ ?><form class="form-inline" id="form1" method="post" name="form1" <?php 
    if($action=='xuat') { $place = ' copy dãy số excel vào, hoặc copy 1 số';
?> action="<?=base_url('/Timsim/timsimgiong/'.$action)?>" <?php }elseif($action=='hiensimgiong'){ $place='copy dãy số excel vào, hoặc copy 1 số'; ?>
action="<?=base_url('/Timsim/timsimgiong/'.$action)?>" <?php }   ?> > <?php }else{$place=' kí tự * đại diện số bất ki` nhập *8 nếu muốn kiếm 8 đuôi ';} ?>
    <input type="text" name="sdt_tim" class="form-control" size="50" placeholder="<?=$place?>" required>
    <input type="submit"  class="btn btn-success btn-lg" value="Tim Kiếm" />
    <?php if($action=='timsim'){?>
    <input type="button" class="btn btn-lg timso" value="Tim Kiếm" />
    <?php } ?>
    <input type="button" onclick="window.location='<?=base_url('/Timsim')?>'" class="btn btn-alert btn-lg" value="Tải lại web" />
    <input type="hidden" name="<?=$this->security->get_csrf_token_name()?>" value="<?= $this->security->get_csrf_hash() ?>" />
  <?php if($action!='timsim'){ ?></form><?php } ?>
  <script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  <?php if($action=='timsim'){?>
  $(".btn-success").hide();
  $(".timso").click(function(e){
        var kitu = $(".sdt_tim").val();
        window.location.href='<?=base_url('Timsim/timsodep/')?>/' + kitu + '/';
  });
   <?php } ?>
  $(".btn-alert").hide();
  $(".btn-success").click(function(e){
        $(".btn-success").hide();
        $(".btn-alert").show(0,function(){
            alert("Bấm Ok rùi chờ hệ thống tải file ( lưu y ko thoát web lúc này)");
        });
  });
  
})// document
</script>