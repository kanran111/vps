<script>
    $(document).ready(function(e){
        $(".item_add").click(function(c){
            var idsp = $(this).attr('idSP');
            var qty = 1;
            $.ajax({
                 url:'<?=base_url()?>home/giohang/'+idsp+'/'+qty,
                 cache:false,data:'action=them',
                 success:function(k){
                    $("#giohangtomtat").load('<?=base_url()?>home/giohangtomtat');   
                 },
            });
        });
    });
</script>

<div class="container">
			<div class="product-top">
                <div class="product-one">
                <?php foreach ($spbt as $sp){  ?>
					<div class="col-md-3 product-left">
						<div class="product-main simpleCart_shelfItem">
                        <?php $tenspkodau = $this->Sanpham_model->changeTitle($sp['TenSP']); ?>
							<a href="<?=base_url(),$tenspkodau,'-',$sp['idSP']?>.html" class="mask"><img class="img-responsive zoom-img" src="<?=base_url()?>asset/images/user/<?=$sp['urlHinh']?>" alt="" /></a>
							<div class="product-bottom">
								<h3><?=$sp['TenSP']?></h3>
								<p>Giam gia</p>
								<h4><span class="item_add" idSP="<?=$sp['idSP']?>" ><i></i></span><span class="item_price"><?=number_format($sp['Gia'])?></span></h4>
							</div>
							<div class="srch">
								<span>-50%</span>
							</div>
						</div>
					</div>
				<?php } ?>  
                 <div class="clearfix"></div> 
                </div>
                <div class="product-one">
                <?php foreach ($spnoibat as $sp){  ?>
					<div class="col-md-3 product-left">
						<div class="product-main simpleCart_shelfItem">
                        <?php $tenspkodau = $this->Sanpham_model->changeTitle($sp['TenSP']); ?>
							<a href="<?=base_url(),$tenspkodau,'-',$sp['idSP']?>.html" class="mask"><img class="img-responsive zoom-img" src="<?=base_url()?>asset/images/user/<?=$sp['urlHinh']?>" alt="" /></a>
							<div class="product-bottom">
								<h3><?=$sp['TenSP']?></h3>
								<p>Giam gia</p>
								<h4><span class="item_add" idSP="<?=$sp['idSP']?>"><i></i></span> <span class=" item_price"><?=number_format($sp['Gia'])?></span></h4>
							</div>
							<div class="srch">
								<span>-50%</span>
							</div>
						</div>
					</div>
				<?php } ?>  
                 <div class="clearfix"></div> 
                </div>
			</div>
		</div>