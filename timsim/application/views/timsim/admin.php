<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title><?php echo $titlePage; ?></title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="author" content="Hasegawa Kaito" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/admin/css/style.css" charset="utf-8" />
        <script type="text/javascript" src="<?=base_url()?>asset/js/jquery-1.11.0.min.js"></script>
        <script language="javascript">
            function xacnhan() {
                if (!window.confirm('Thao tác nguy hiểm , nếu thêm thành công toàn bộ số cũ sẽ bị xóa ?')) {
                    return false;
                }
            }
        </script>
        <script type="text/javascript">
            $(document).ready(function(e){
                 $("#menu li").hover(function(e){
                    $(this).children('ul').show();
                 },function(e){
                    $(this).children('ul').hide(); 
                 });
            });
        </script>
        <style>
            #menu > li > ul {display:none;  position:absolute; float:left; width:100px;}
            .con {background-color: #CFCFCF;}
            .con > a {color:green!important;}
        </style>
    </head>
    <body id="manage">
    
        <div id="header">
            <ul id="menu">
                <li><a href="<?=base_url('/Timsim/adminthemsimso')?>" onclick="return xacnhan()">Thêm DS vào Sim</a>
                </li>
                <li><a href="<?=base_url('/Timsim/adminthemsimngay')?>">Thêm ngày Sinh vào DS</a>
                </li>
                <li><a target="_blank" href="<?=base_url('/Timsim/locsodep')?>">Lọc Số đẹp</a>
                </li>
            </ul>
            <p>
                <span><?php if($this->router->fetch_method()=='adminthemsimso') echo 'Thêm SDT';
                        elseif($this->router->fetch_method()=='adminthemsimngay') echo 'Thêm Ngày Sinh';
                 ?></span>
                <a href="<?=base_url('/Timsim')?>">[ Thoát ]</a>
            </p>
        </div><!-- End header -->
        <?php
        if(isset($mess) && $mess != ''){
            echo "<div class='mess_succ'>";
            echo "<ul>";
                echo "<li>$mess</li>";
            echo "</ul>";
            echo "</div>";
        }
    ?>
        <div id="content"><!-- =========== Begin #content ============= -->
            <?php echo $subview; ?>
        </div><!-- End #content -->
        <div id="footer">
            copyright &copy; by Lâm&reg;
        </div><!-- End #footer -->
    </body>
</html>