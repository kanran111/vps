<?php 
    $arr = array('mausac' => array('do','xanh','tim','vang'),
                'giamgia' => array('0','10','20','30','40','50'), 
                'chatlieu' => array('hoa gia' , ' hoa thiet'),
                );
                
    //$dacdiem = json_decode($arr,true);
?>
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
					   <?php $rowloaicon = $this->Home_model->chitietloai($idloaisp);
                       $tenloaiconkodau = $this->Sanpham_model->changeTitle($rowloaicon[0]['TenLoai']);
                       if(!empty($rowloaicon[0]['idcha'])){ ?>
                            <?php $rowloaicha = $this->Home_model->chitietloai($rowloaicon[0]['idcha']); 
                            $tenloaichakodau = $this->Sanpham_model->changeTitle($rowloaicha[0]['TenLoai']);
                            ?>
                            <li class=""><a href="<?=base_url().$tenloaichakodau.'/'.$rowloaicha[0]['idLoai']?>"><?=$rowloaicha[0]['TenLoai']?></a></li>
                       <?php }?>
                       <li class="active"><a href="<?=base_url().$tenloaiconkodau.'/'.$rowloaicon[0]['idLoai']?>"><?=$rowloaicon[0]['TenLoai']?></a></li>
				</ol>
			</div>
		</div>
	</div>    
	<!--end-breadcrumbs-->
	<!--prdt-starts-->
	<div class="prdt"> 
		<div class="container">
			<div class="prdt-top">
				<div class="col-md-9 prdt-left">
                <?php if(!empty($loaisp)) { $tongsp = count($loaisp)?>
					<div class="product-one">
                    <?php if($tongsp>=3) $tonghang1 = 3; else $tonghang1 = $tongsp; ?>
                    <?php for($i = 0 ; $i<$tonghang1 ; $i++) {
                            $sp = $loaisp[$i];
                            if(!empty($sp['TenSP'])){
                            ?>
						<div class="col-md-4 product-left p-left">
							<div class="product-main simpleCart_shelfItem">
								<?php $tenspkodau = $this->Sanpham_model->changeTitle($sp['TenSP']); ?>
                                <a href="<?=base_url(),$tenspkodau,'-',$sp['idSP']?>.html" class="mask"><img class="img-responsive zoom-img" src="<?=base_url();?>asset/images/user/<?=$sp['urlHinh']?>" alt="" /></a>
								<div class="product-bottom">
									<h3><?=$sp['TenSP']?></h3>
									<p>Explore Now</p>
									<h4><a class="item_add" idSP=<?=$sp['idSP']?> href="#"><i></i></a> <span class=" item_price"><?=number_format($sp['Gia'])?></span></h4>
								</div>
								<div class="srch srch1">
									<span>-50%</span>
								</div>
							</div>
						</div>
                        <?php } ?>
                    <?php } ?>	
						<div class="clearfix"></div>
					</div>
                    <?php if($tongsp > 3) { $tonghang2 = $tongsp; ?>
                    <div class="product-one ">
                    <?php for($i = 3 ; $i<$tonghang2 ; $i++) {
                            $sp = $loaisp[$i]; 
                            if(!empty($sp['TenSP'])){
                            ?>
						<div class="col-md-4 product-left p-left">
							<div class="product-main simpleCart_shelfItem">
                            <?php $tenspkodau = $this->Sanpham_model->changeTitle($sp['TenSP']); ?>
								<a href="<?=base_url(),$tenspkodau,'-',$sp['idSP']?>.html" class="mask"><img class="img-responsive zoom-img" src="<?=base_url();?>asset/images/user/<?=$sp['urlHinh']?>" alt="" /></a>
								<div class="product-bottom">
									<h3><?=$sp['TenSP']?></h3>
									<p>Explore Now</p>
									<h4><a class="item_add" href="#"><i></i></a> <span class=" item_price"><?=number_format($sp['Gia'])?></span></h4>
								</div>
								<div class="srch srch1">
									<span>-50%</span>
								</div>
							</div>
						</div>
                        <?php } ?>
                    <?php } ?>
                    <div class="clearfix"></div>
					</div>
                    <?php }//neu tong sp lon hon 3 moi co no ?>	
						
                <?php }else { ?> 
                    <a href="<?=base_url()?>">Chua co san pham nao bam vào de quay lai trang chu</a>
                <?php } ?>
                    
                    <div class="col-md-offset-4 product-one phantrang-cha align-center">
                        <?=$this->pagination->create_links();?>
                        <div class="clearfix"></div>
    				</div>
                </div>	
				<div class="col-md-3 prdt-right">
					<div class="w_sidebar">
                    <?php foreach($arr as $key=>$value) { ?>
						<section  class="sky-form">
							<h4><?=$key?></h4>
							<?php if($key == 'mausac'){ ?>
                            <ul class="w_nav2">
                                <?php foreach($value as $mausac){ ?>
									<li><a class="<?=$mausac?>" href="#"></a></li>
									<?php } ?>
						      </ul>
                            <?php }else{ ?>
                            <div class="row1 scroll-pane">
								<div class="col col-4">
                                <?php foreach ($value as $chitiet){ ?>						
									<label class="checkbox"><input type="checkbox" name="checkbox"/><i></i><?=$chitiet?></label>
								<?php } ?>
                                </div>
							</div>
                            <?php } ?>
						</section>
                    <?php } ?>
					</div>
                    <div class="text-center"><button class="btn btn-default">Tìm Kiem</button></div>
				</div>
                
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--product-end-->