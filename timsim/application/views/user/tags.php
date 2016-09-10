<div id="pages" class="pages">
    <div class="container">
        <div class="typo-top heading"><h2>Tim kiếm</h2></div>
        <div class="typo-bottom">
            <table class="table">
                <thead>Kiếm được <?=$totalrows?> dong</thead>
                <tbody>
                    <?php if(!empty($totalrows)) { ?>
                    <?php foreach($dstimkiem as $row){ $TenSP=$this->Sanpham_model->changeTitle($row['TenSP']);?>
                        <tr><td><a href="<?=base_url().$TenSP.'-'.$row['idSP']?>.html"><img src="<?=base_url().'asset/images/user/'.$row['urlHinh']?>" width="150px" height="150px" class="img-responsive" /></a></td>
                        <td>
                            <h3><a href="<?=base_url().$TenSP.'-'.$row['idSP']?>.html"><?=$row['TenSP'];?></a></h3>
                            <div class="simpleCart_shelfItem">
                                <div class="product-bottom">
        				            <h4><a class="item_add" href="#"><i></i></a> <span class=" item_price"><?=number_format($row['Gia'])?></span></h4>
        				        </div>
                            </div>
                            <p>1 loài hoa thực sự thơm hơn các loài hoa khác ko bao giờ tàn, tượng trưng cho sự bền bỉ, sắc đẹp</p>
                        </td></tr>
                    <?php } ?>
                    <tr><td></td><td>
                            <nav><ul class="pagination"><?=$this->pagination->create_links();?></ul></nav>
                        </td></tr>
                    <?php }else{?>
                        <tr><td></td><td>Không tim thấy kết quả.</td></tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>