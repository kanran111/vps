<html>
<head>
 <meta charset="utf-8"/>
 <meta name="viewport" content="width=device-width, initial-scale=1"/>
</head>
<body>
<h4 style="color: red;"><?php echo $this->session->flashdata('error'); ?> 
<?php 
    
    //echo $this->input->cookie('auth',true);
    if(validation_errors() != ''){
                    echo "".validation_errors()."";
}
?>
<?php 
/*$data=$this->session->all_userdata();
        echo "<pre>";
        print_r($data);
        echo "</pre>";    
        echo gmdate("Y-m-d H:i:s", $data['__ci_last_regenerate'] + 3600*(7+date("I")));*/
        ?>
</h4>

<form class="form" id="form" method="post" action="<?=base_url()?>server1/dangnhap1">
    <input type="text" placeholder="tài khoản" name="email" value="" />
    <input type="password" placeholder="mật khẩu" name="pass" value="" />
    <input type="submit" name="btnsubmit" value="Đăng Nhập" />
    <a target="_blank" href="http://sim090.net/vas/DKTV.php">Đăng kí thành viên . ( lưu y đk xong phải chat cho admin để kích hoạt) </a>
</form>

</body>
</html>