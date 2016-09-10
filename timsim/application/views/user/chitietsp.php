<script type="text/javascript">
	$(function() {
	
	    var menu_ul = $('.menu_drop > li > ul'),
	           menu_a  = $('.menu_drop > li > a');
	    
	    menu_ul.hide();
	
	    menu_a.click(function(e) {
	        e.preventDefault();
	        if(!$(this).hasClass('active')) {
	            menu_a.removeClass('active');
	            menu_ul.filter(':visible').slideUp('normal');
	            $(this).addClass('active').next().stop(true,true).slideDown('normal');
	        } else {
	            $(this).removeClass('active');
	            $(this).next().stop(true,true).slideUp('normal');
	        }
	    });
	
	});
</script>
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
<div class="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<li><a href="<?=base_url()?>">Home</a></li>
					   <?php $rowtin = $this->Sanpham_model->chitiettin($idsp);
                       $tenrowtinkodau = $this->Sanpham_model->changeTitle($rowtin[0]['TenSP']); 
                       $idloai = $rowtin[0]['idLoai']; $rowloaicon = $this->Home_model->chitietloai($idloai);
                       $tenrowconkodau = $this->Sanpham_model->changeTitle($rowtin[0]['TenSP']);
                       if(!empty($rowloaicon[0]['idcha'])){ ?>
                            <?php $rowloaicha = $this->Home_model->chitietloai($rowloaicon[0]['idcha']); 
                            $tenloaichakodau = $this->Sanpham_model->changeTitle($rowloaicha[0]['TenLoai']);
                            ?>
                            <li class=""><a href="<?=base_url().$tenloaichakodau.'/'.$rowloaicha[0]['idLoai']?>"><?=$rowloaicha[0]['TenLoai']?></a></li>
                       <?php }?>
                       <li><a href="<?=base_url().$tenrowconkodau.'/'.$rowloaicon[0]['idLoai']?>"><?=$rowloaicon['0']['TenLoai']?></a></li>
                       <li class="active"><a href="<?=base_url().$tenrowtinkodau.'-'.$idsp?>.html"><?=$rowtin[0]['TenSP']?></a></li>
				</ol>
			</div>
		</div>
	</div>    
	<!--end-breadcrumbs-->
	<!--start-single-->
	<div class="single contact">
		<div class="container">
			<div class="single-main">
				<div class="col-md-9 single-main-left">
				<div class="sngl-top">
					<div class="col-md-5 single-top-left">
                    <!-- hinh chi tiet hinh nho -->	
						<div class="flexslider">
							  <ul class="slides">
                            <?php if(!empty($dshinhcon)) {  // neu dshinh con ko rỗng
                              foreach($dshinhcon as $row ){ ?>
								<li data-thumb="<?=base_url()?>asset/images/user/hinhphusp/<?=$row['urlHinh']?>">
									<div class="thumb-image"> <img src="<?=base_url()?>asset/images/user/hinhphusp/<?=$row['urlHinh']?>" data-imagezoom="true" class="img-responsive" alt=""/> </div>
								</li>
                                <?php } ?>
                            <?php }else { ?>
                                <li data-thumb="<?=base_url()?>asset/images/user/hinhphusp/<?=$chitietsp[0]['urlHinh']?>">
									<div class="thumb-image"> <img src="<?=base_url()?>asset/images/user/<?=$chitietsp[0]['urlHinh']?>" data-imagezoom="true" class="img-responsive" alt=""/> </div>
								</li>
                            <?php } ?>
							  </ul>
						</div>
						<!-- FlexSlider -->
						<script src="<?=base_url()?>asset/js/imagezoom.js"></script>
						<script defer src="<?=base_url()?>asset/js/jquery.flexslider.js"></script>
						<link rel="stylesheet" href="<?=base_url()?>asset/css/flexslider.css" type="text/css" media="screen" />

						<script>
						// Can also be used with $(document).ready()
						$(document).ready(function(e){
						  $(window).load(function() {
						  $('.flexslider').flexslider({
							animation: "slide",
							controlNav: "thumbnails"
						  });
						});
						}); 
						</script>
					</div>	
					<div class="col-md-7 single-top-right">
						<div class="single-para simpleCart_shelfItem">
						<h2><?=$chitietsp[0]['TenSP']?></h2>
                        <!-- tab danh gia (se them khi lam phan admin) -->
							<div class="star-on">
								<ul class="star-footer">
										<li><a href="#"><i> </i></a></li>
										<li><a href="#"><i> </i></a></li>
										<li><a href="#"><i> </i></a></li>
										<li><a href="#"><i> </i></a></li>
										<li><a href="#"><i> </i></a></li>
									</ul>
								<div class="review">
									<a href="#"> 1 customer review </a>
									
								</div>
							<div class="clearfix"> </div>
							</div>
							<!--end danh gia -->
							<h5 class="item_price"><?=number_format($chitietsp[0]['Gia']);?></h5>
							<!-- mo ta sp -->
                            <p><?=$chitietsp[0]['MoTa']?></p>
							<!-- phan loai sp  se lam ( phan ad min)-->
                            <div class="available">
								<ul>
									<li>Color
										<select>
										<option>Silver</option>
										<option>Black</option>
										<option>Dark Black</option>
										<option>Red</option>
									</select></li>
								<li class="size-in">Size<select>
									<option>Large</option>
									<option>Medium</option>
									<option>small</option>
									<option>Large</option>
									<option>small</option>
								</select></li>
								<div class="clearfix"> </div>
							</ul>
						  </div><!-- end phan loai -->
							<!-- seo -->
                            <ul class="tag-men">
								<li><span>TAG</span>
								<span class="women1">: Women,</span></li>
								<li><span>SKU</span>
								<span class="women1">: CK09</span></li>
							</ul>
								<a href="#" class="add-cart item_add" idSP=<?=$chitietsp[0]['idSP']?> >ADD TO CART</a>
							
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="tabs">
					<ul class="menu_drop">
				<li class="item1"><a href="#"><img src="<?=base_url()?>asset/images/arrow.png" alt="">Description</a>
					<ul>
						<li class="subitem1"><a href="#"><?php //strip_tags($chitietsp[0]['MoTa'])?>.</a></li>
						<li class="subitem2"><a href="#"><?php //strip_tags($chitietsp[0]['baiviet'])?> </a></li>
						<li class="subitem3"><a href="#"><?php //($chitietsp[0]['GhiChu'])?></a></li>
					</ul>
				</li>
                
				<li class="item2"><a href="#"><img src="<?=base_url()?>asset/images/arrow.png" alt="">Ngày Cập Nhật</a>
					<ul>
					    <li class="subitem1"><a href="#"> <?=gmdate("d m Y",strtotime($chitietsp[0]['NgayCapNhat']) );?></a></li>
						
					</ul>
				</li>
				<li class="item3"><a href="#"><img src="<?=base_url()?>asset/images/arrow.png" alt="">Reviews (10)</a>
					<ul>
						<li class="subitem1"><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</a></li>
						<li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
						<li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>
					</ul>
				</li>
				<li class="item4"><a href="#"><img src="<?=base_url()?>asset/images/arrow.png" alt="">Số lượng con lại</a>
					<ul>
					    <li class="subitem2"><a href="#"> <?=$chitietsp[0]['SoLuongTonKho']?></a></li>
					</ul>
				</li>
	 		</ul>
				</div>
                <!-- sp ke tiep -->
				<div class="latestproducts">
					<div class="product-one">
                    <?php $idsp = $this->uri->segment(3); $dem=0; //print_r($spketiep[0]); die; 
                    ?>
                    <?php for($i=0;$i<4;$i++){ 
                            if($spketiep[$i]['idLoai'] == $idsp) {continue; echo ' 2 du lieu bang nhau';}
                            $dem++;
                            
                        ?>
						<div class="col-md-4 product-left p-left"> 
							<div class="product-main simpleCart_shelfItem">
                            <?php $urlsp = $this->Sanpham_model->changeTitle($spketiep[$i]['TenSP']) ?>
								<a href="<?=base_url().$urlsp.'-'.$spketiep[$i]['idSP']?>.html" class="mask"><img class="img-responsive zoom-img" src="<?=base_url()?>asset/images/user/<?=$spketiep[$i]['urlHinh']?>" alt="" /></a>
								<div class="product-bottom">
									<h3><?=$spketiep[$i]['TenSP']?></h3>
									<p>Explore Now <?=$dem?></p>
									<h4><a class="item_add" idSP=<?=$spketiep[$i]['idSP']?> href="#"><i></i></a> <span class=" item_price"><?=number_format($spketiep[$i]['Gia'])?></span></h4>
								</div>
								<div class="srch">
									<span>-50%</span>
								</div>
							</div>
						</div>
                        
                    <?php if($dem==3) break;} ?>
						<div class="clearfix"></div>
					</div>
				</div>
                <!-- end sp ke tiep -->
			</div>
				<div class="col-md-3 single-right">
					<div class="w_sidebar">
						<section  class="sky-form">
							<h4>Catogories</h4>
							<div class="row1 scroll-pane">
								<div class="col col-4">
									<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>All Accessories</label>
								</div>
								<div class="col col-4">								
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Women Watches</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Kids Watches</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Men Watches</label>			
								</div>
							</div>
						</section>
						<section  class="sky-form">
							<h4>Brand</h4>
							<div class="row1 row2 scroll-pane">
								<div class="col col-4">
									<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>kurtas</label>
								</div>
								<div class="col col-4">
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Sonata</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Titan</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Casio</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Omax</label>
									<label class="checkbox"><input type="checkbox" name="checkbox" ><i></i>shree</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Fastrack</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Sports</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Fossil</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Maxima</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Yepme</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Citizen</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Diesel</label>			
								</div>
							</div>
						</section>
						<section class="sky-form">
							<h4>Colour</h4>
								<ul class="w_nav2">
									<li><a class="color1" href="#"></a></li>
									<li><a class="color2" href="#"></a></li>
									<li><a class="color3" href="#"></a></li>
									<li><a class="color4" href="#"></a></li>
									<li><a class="color5" href="#"></a></li>
									<li><a class="color6" href="#"></a></li>
									<li><a class="color7" href="#"></a></li>
									<li><a class="color8" href="#"></a></li>
									<li><a class="color9" href="#"></a></li>
									<li><a class="color10" href="#"></a></li>
									<li><a class="color12" href="#"></a></li>
									<li><a class="color13" href="#"></a></li>
									<li><a class="color14" href="#"></a></li>
									<li><a class="color15" href="#"></a></li>
									<li><a class="color5" href="#"></a></li>
									<li><a class="color6" href="#"></a></li>
									<li><a class="color7" href="#"></a></li>
									<li><a class="color8" href="#"></a></li>
									<li><a class="color9" href="#"></a></li>
									<li><a class="color10" href="#"></a></li>
								</ul>
						</section>
						<section class="sky-form">
							<h4>discount</h4>
							<div class="row1 row2 scroll-pane">
								<div class="col col-4">
									<label class="radio"><input type="radio" name="radio" checked=""><i></i>60 % and above</label>
									<label class="radio"><input type="radio" name="radio"><i></i>50 % and above</label>
									<label class="radio"><input type="radio" name="radio"><i></i>40 % and above</label>
								</div>
								<div class="col col-4">
									<label class="radio"><input type="radio" name="radio"><i></i>30 % and above</label>
									<label class="radio"><input type="radio" name="radio"><i></i>20 % and above</label>
									<label class="radio"><input type="radio" name="radio"><i></i>10 % and above</label>
								</div>
							</div>						
						</section>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>