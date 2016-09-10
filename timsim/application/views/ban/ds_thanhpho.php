<?php 
    
    if($this->router->fetch_method()=='index' || $this->router->fetch_method()=='thanhpho'){
        foreach($array as $row){?>
            <option  class="rm" value="<?=$row['idTP']?>"><?=$row['Ten']?></option>
        <?php }
    }elseif($this->router->fetch_method()=='quanhuyen'){?>
            <option class="rm" value="0">Chọn Quận/Huyện</option>
            <?php
        foreach($array as $row){?>
            <option  class="rm" value="<?=$row['idQ']?>"><?=$row['Loai'].' '.$row['Ten']?></option>
        <?php }
    }elseif($this->router->fetch_method()=='phuongxa'){?>
            <option class="rm" value="0">Chọn Phường/Xa</option>
    <?php
        foreach($array as $row){?>
            <option  class="rm" value="<?=$row['idP']?>"><?=$row['Loai'].' '.$row['Ten']?></option>
        <?php }
    }
    
?>