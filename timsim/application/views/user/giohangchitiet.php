<?php 
    $content = $this->cart->contents();
    //echo '<pre>';
    //print_r($content); die;
?>
<!--start-breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<li><a href="<?=base_url($_SERVER['REQUEST_URI'])?>">Home</a></li>
					<li class="active">Checkout</li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--start-ckeckout-->
	<div class="ckeckout">
		<div class="container">
			<div class="ckeck-top heading">
				<h2>CHECKOUT</h2>
			</div>
			<div class="ckeckout-top">
			<div class="cart-items">
			 <h3>My Shopping Bag (<?=$this->cart->total_items()?>)</h3>
				<script>$(document).ready(function(c) {
    				    $(".close1").click(function(e){
    				        $(this).parent().fadeOut('slow', function(c){
    				            $(this).remove();
    				        });
                            var idsp = $(this).attr('idsp');
                            $.ajax({
                                url:'<?=base_url()?>home/giohang/'+idsp+'/1',cache:false,data:'action=xoa',
                                success:function(d){
                                    $("#giohangtomtat").load('<?=base_url()?>home/giohangtomtat');
                                    $(".in-check").load('<?=base_url()?>home/giohangchitiet_sp');
                                }
                            });
    				    });
                        $(".qty").on('change', function(obj){
                            var idsp = $(this).parent().parent().parent().find('.close1').attr('idsp');
                            var qty = $(this).val();
                            $.ajax({
                                url:'<?=base_url()?>home/giohang/'+idsp+'/'+qty,
                                cache:false,data:'action=capnhat',
                                success:function(d){
                                    $("#giohangtomtat").load('<?=base_url()?>home/giohangtomtat');
                                    $(".in-check").load('<?=base_url()?>home/giohangchitiet_sp');
                                    
                                } 
                            });
                        });
					});//document
			   </script>
			<script>/*$(document).ready(function(c) {
					$('.close2').on('click', function(c){
						$('.cart-header1').fadeOut('slow', function(c){
							$('.cart-header1').remove();
						});
						});	  
					});*/
			   </script>
			   <script>/*$(document).ready(function(c) {
					$('.close3').on('click', function(c){
						$('.cart-header2').fadeOut('slow', function(c){
							$('.cart-header2').remove();
						});
						});	  
					});*/
			   </script>
				
			<div class="in-check" >
            
				<ul class="unit">
					<li><span>Sản Phẩm</span></li>
					<li><span>Tên Sản Phảm</span></li>		
					<li><span>Giá Tiền</span></li>
					<li><span>Thành Tiền</span></li>
					<li> </li>
					<div class="clearfix"> </div>
				</ul>
                <?php foreach($content as $item){ $tenitemkodau = $this->Sanpham_model->changeTitle($item['name']); ?>
				<ul class="cart-header">
					<div class="close1" idsp="<?=$item['id']?>"> </div>
						<li class="ring-in"><a href="<?=base_url().$tenitemkodau.'-'.$item['id']?>.html" ><img width="50px" height="50px" src="<?=base_url('asset/images/user')?>/<?=$item['urlHinh']?>" class="img-responsive" alt=""></a>
						</li>
						<li><span class="name"><?=$item['name']?></span></li>
						<li><span class=""><?=number_format($item['price'])?></span>
                            <p>Số lượng <input type="text" size="1" class="qty" value="<?=$item['qty']?>" /></p>
                            </li>
						<li><span class="cost"><?=number_format($item['subtotal'])?></span></li>
					<div class="clearfix"> </div>
				</ul>
                <?php } ?>
                <ul class="unit">
					<li><span>Item</span></li>
					<li><span>Product Name</span></li>		
					<li><span>Unit Price</span></li>
					<li><span class=""><?=number_format($this->cart->total())?></span></li>
					<li> </li>
					<div class="clearfix"> </div>
				</ul>
			</div>
			</div>  
		 </div>
		</div>
	</div>