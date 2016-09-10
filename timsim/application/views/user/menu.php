<?php $loaicha = $this->Home_model->cacloai(); ?>
<div class="container">
			<div class="header">
				<div class="col-md-9 header-left">
				<div class="top-nav">
					<ul class="memenu skyblue">
                        <li class="active"><a href="<?=base_url()?>">Home</a></li>
                        <?php foreach($loaicha as $L) { 
                            $tenkodau = $this->Sanpham_model->changeTitle($L['tenloai'])
                            ?>
                        <li class="grid"><a href="<?=base_url().$tenkodau.'/'.$L['idloai']?>"><?=$L['tenloai']?></a>
                            <?php $idcha = $L['idloai']; $loaicon = $this->Home_model->cacloai($idcha); 
                                if(!empty($loaicon)){
                            ?>
                                <div class="mepanel">
    								<div class="row">
    									<div class="col1 me-one">
    										<h4><?=$L['tenloai']?></h4>
    										<ul>
                                            <?php foreach($loaicon as $C) { 
                                                $tenconkodau = $this->Sanpham_model->changeTitle($C['tenloai'])
                                                ?>
    											<li><a href="<?=base_url().$tenconkodau.'/'.$C['idloai']?>"><?=$C['tenloai']?></a></li>
                                            <?php } ?>
    										</ul>		
    									</div>
    								</div>
                                </div>
                            <?php } ?>
                        </li>
                        <?php } ?>
                        
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="col-md-3 header-right"> 
				<div class="search-bar">
                <form action="<?=base_url()?>home/timkiem/">
                        <input type="text" id="valuesearch" name="tukhoa" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}"/>
    					<input type="submit" name="btnsearch" id="btnsearch" value=""/>
                </form>
				</div>
			</div>
			<div class="clearfix"> </div>
			</div>
		</div>