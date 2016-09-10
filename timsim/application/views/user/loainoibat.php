<?php 
    function laymotvaitu($str,$sokitu=20){
        $mota = '';
        $str = strip_tags($str);
        $arr_str = explode(' ',$str);
        
        for($i = 0; $i<=$sokitu-2; $i++) $mota .= $arr_str[$i].' ';
        return $mota;
    }
?>
<?php //print_r($loainoibat); die; ?>
<div class="container">
			<div class="about-top grid-1">
            <?php foreach($loainoibat as $array) {  
                $idnoibat = $array['idloai']; 
                $chitiettin = $this->Sanpham_model->chitiettin($idnoibat);
                //print_r($chitiettin); die;
                if(empty($chitiettin)) continue; 
                if(empty($chitiettin[0]['urlHinh'])) $chitiettin[0]['urlHinh']='';
                $tenloaikodau = $this->Sanpham_model->changeTitle($array['tenloai']);
                ?>
				<div class="col-md-4 about-left">
					<figure class="effect-bubba">
						<img class="" height="250px" width="350px" src="<?=base_url()?>asset/images/user/<?=$chitiettin[0]['urlHinh']?>" alt=""/>
						<a href="<?=base_url(),$tenloaikodau,'/',$idnoibat?>"><figcaption>
							<h2><?=$array['tenloai']?></h2>
							<p><?=laymotvaitu($chitiettin[0]['MoTa']); ?></p>
                            	
						</figcaption></a>			
					</figure>
				</div>
            <?php } ?>
				<div class="clearfix"></div>
			</div>
		</div>