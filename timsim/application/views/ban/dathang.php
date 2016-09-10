<link href='//fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
<link href="<?=base_url()?>asset/ban/css/wickedpicker.css" rel="stylesheet" type="text/css" media="all">        
<link href="<?=base_url()?>asset/ban/css/style.css" rel="stylesheet" type="text/css" media="all">

<!-- js <script src="js/jquery.min.js"></script>-->
<script type="text/javascript" src="<?=base_url()?>asset/ban/js/move-top.js"></script>
<script type="text/javascript" src="<?=base_url()?>asset/ban/js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<style>
    .alert-danger { position:fixed; top:0px; z-index:10001; opacity:0.7 }
    .con-bnr-right > input {
    float: left;
    padding: 0px;
    width: 50%!important;}
    .img-con > img {
        float:left
    }
    .img-con > img:hover {cursor: pointer;}
</style>
<?php if(validation_errors() != ''){?>
<div class="alert alert-danger fade in">
    <a class="close" href="#" data-dismiss="alert" aria-label="close">×</a>
    <strong>Lỗi!!!</strong>
<?php echo validation_errors();?>
</div>
<?php } ?>
<?php $thongbao = $this->session->flashdata('error');
    if(!empty($thongbao)){?>
    <script>alert('<?=$thongbao?>')</script>
    <?php } ?>

<div style="display: none;" class="banner-top">

				<h2>Đặt Hàng Sim F500</h2>
                <form id="form1" name="form1" method="POST" action="<?=base_url()?>Cban/index">
				<div class="banner-bottom">
					<div class="bnr-one">
						<div class="bnr-left">
							<p>SDT Của Bạn</p>
						</div>
						<div class="bnr-right">
							<input  type="text" name="sdt" value="<?=set_value('sdt')?>" />
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="bnr-one">
						<div class="bnr-left">
							<p>Chọn địa chỉ</p>
						</div>
						<div class="bnr-right">
							<select id="thanhpho_dh" name="thanhpho">
								<option  class="rm" value="0">Chọn thành phố</option>
								<?=$ds_thanhpho?>
							</select>
                            <select id="quanhuyen_dh" name="quanhuyen">
								<option  class="rm" value="0">Chọn Quận</option>
							</select>
                            <select id="phuongxa_dh" name="phuongxa">
								<option  class="rm" value="0">Chọn Phường</option>
							</select>
						</div>
						<div class="clearfix"></div>
					</div>
                    <div class="bnr-one">
						<div class="bnr-left">
							<p>Đường / Số nhà</p>
						</div>
						<div class="bnr-right">
							<input type="text" name="duong" value="<?=set_value('duong')?>" />
						</div>
						<div class="clearfix"></div>
					</div>
                    <div class="bnr-one">
						<div class="bnr-left">
							<p>Mã Xác Nhận</p>
						</div>
						<div class="bnr-right">
							<div class="con-bnr-right">
                                <div class="img-con"> <img src="<?=base_url('Cban/createimages')?>" /> </div> <input  name="captcha" type="text" />
                            </div>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="bnr-btn">
							<input type="submit" value="ĐẶT HÀNG"/>
					</div>
                    <input type="hidden" name="<?=$this->security->get_csrf_token_name()?>" value="<?=$this->security->get_csrf_hash()?>" />
				</div>
                </form>
</div>
<div style="display: none;" class="footer">
	<p>© 2016 Elite Hotel Booking. All Rights Reserved | Design by <a href="http://w3layouts.com" target="_blank">W3layouts</a></p>
</div>
<script type="text/javascript">
    $(document).ready(function(e){
         $("#thanhpho_dh").change(function(tp){
            var matp = $(this).val();
            $("#quanhuyen_dh").load('<?=base_url()?>Cban/quanhuyen/'+matp);
         });
         $("#quanhuyen_dh").change(function(tp){
            var matp = $(this).val();
            $("#phuongxa_dh").load('<?=base_url()?>Cban/phuongxa/'+matp);
         });
         
    });
</script>