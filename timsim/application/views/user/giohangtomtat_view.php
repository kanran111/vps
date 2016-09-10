<script>
    $(document).ready(function(e){
        $(".simpleCart_empty").click(function(e){
            $.ajax({
                url:'<?=base_url();?>home/giohang',data:'action=xoaall',cache:false,
                success:function(d){
                    $("#giohangtomtat").load('<?=base_url()?>home/giohangtomtat'); 
                }
            }); 
        });
    });
</script>
<?php if($this->router->fetch_method()=='giohangtomtat') { ?>
    
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <script src="<?=base_url()?>asset/js/jquery.easydropdown.js"></script>
<?php } ?>
<div class="container">
			<div class="top-header-main">
				<div class="col-md-6 top-header-left">
					<div class="drop">
						<div class="box">
							<select tabindex="4" class="dropdown drop">
								<option value="" class="label">Đơn Vị :</option>
								<option value="1">Dollar</option>
								<option value="2">Việt Nam</option>
							</select>
						</div>
						<div class="box1">
							<select tabindex="4" class="dropdown">
								<option value="" class="label">Ngôn Ngữ </option>
								<option value="1">English</option>
								<option value="2">Việt</option>
							</select>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="col-md-6 top-header-left">
                    <div class="box_2">
                        <a href="<?=base_url().'account.html'?>">Đăng Nhập</a>
                        <a href="<?=base_url().'account.html'?>">Liên Hệ</a>
                    </div>
					<div class="cart box_1">
						<a href="<?=base_url().'giohang.html'?>">
							 <div class="total">
								<span class="simpleCart_total"><?=number_format($this->cart->total())?> $</span></div>
								<img src="<?=base_url()?>asset/images/cart-1.png" alt="" />
						</a>
						<p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
