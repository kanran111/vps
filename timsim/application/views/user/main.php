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
                if (!window.confirm('Bạn muốn xóa ?')) {
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
                <li><a href="<?php echo base_url('user'); ?>">User</a>
                    <ul>
                        <li class="con"><a href="#">user-con</a></li>
                        <li class="con"><a href="#">user-con</a></li>
                        <li class="con"><a href="#">user-con</a></li>
                        <li class="con"><a href="#">user-con</a></li>
                    </ul>
                </li>
                
                <li><a href="<?=base_url('user/loaisp')?>">Loại Sản Phẩm</a>
                    <ul>
                        <li class="con"><a href="#">user-con</a></li>
                        <li class="con"><a href="#">user-con</a></li>
                        <li class="con"><a href="#">user-con</a></li>
                        <li class="con"><a href="#">user-con</a></li>
                    </ul>
                </li>
                <li><a href="#">Bài viết</a></li>
                <li><a href="#">Comment</a></li>
            </ul>
            <p>
                Xin chào <span>User login</span>
                <a href="#">[ Thoát ]</a>
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