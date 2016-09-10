<link href='//fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
<link href="<?=base_url()?>asset/timsim/css/wickedpicker.css" rel="stylesheet" type="text/css" media="all">        
<link href="<?=base_url()?>asset/timsim/css/style.css" rel="stylesheet" type="text/css" media="all">

<!-- js <script src="js/jquery.min.js"></script>-->
<script type="text/javascript" src="<?=base_url()?>asset/timsim/js/move-top.js"></script>
<script type="text/javascript" src="<?=base_url()?>asset/timsim/js/easing.js"></script>
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


<?php $thongbao = $this->session->flashdata('error');
    if(!empty($thongbao)){?>
    <script>alert('<?=$thongbao?>')</script>
    <?php } ?>

<div style="position:fixed; top:0px; z-index:10001; opacity:1" class="banner-top">

				<h2>Tim sim theo y muốn</h2>
                
				<div class="banner-bottom">
                    <h2>DẠNG SIM <?=$tukhoa?></h2>
                    <?php $tukhoa= preg_replace('/[\W]/i','',$tukhoa);
                        $tukhoa_rep = '</p><p style="color:#00ff2d">'.$tukhoa.'</p><p>';
                     ?>
					<div class="bnr-one">
						<?php foreach($row as $sdt){
						      $sdt['sdt'] = '<p>'.$sdt['sdt'].'</p>';
						      $sdt['sdt'] = str_replace($tukhoa,$tukhoa_rep,$sdt['sdt']);
						      $sdt_one = $sdt['sdt'];
                          ?>
                            <span><?=$sdt_one;?></span>
                        <?php } ?>
					</div>
				</div>
               
</div>
<div style="display: none;" class="footer">
	<p>© 2016 Elite Hotel Booking. All Rights Reserved | Design by <a href="http://w3layouts.com" target="_blank">W3layouts</a></p>
</div>