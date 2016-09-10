<!DOCTYPE html>
<html lang="vi">
<head>
  <title>Tim Sim Số Đẹp</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?=base_url()?>asset/css/bootstrap.min.css"/>
  <script src="<?=base_url('/asset/js/jquery-1.11.0.min.js')?>"></script>
  <script src="<?=base_url('/asset/js/bootstrap.min.js')?>"></script>
  <link rel="stylesheet" href="<?=base_url()?>asset/css/style_timsim.css"/>
  <style>.table-condensed{
    margin-top: 50px;
    position: absolute;
    }</style>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60" class="">
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="<?=base_url()?>">THÀNH NHÂN</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#about">SIM</a></li>
        <li><a href="#services">SỐ</a></li>
        <li><a href="#pricing">ĐẸP</a></li>
        <li><a href="#contact">TRẢ SAU</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="table-condensed">
<table class="table table-striped table-bordered ">
    <thead>
        <tr class="text-uppercase success">
            <td>SỐ ĐIỆN THOẠI KH</td>
            <td>Giống Đầu</td>
            <td>Giống Đuôi</td>
            <td>Năm Sinh</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($row as $key=>$value):?>
        <?php $listdau = '';
    $demdau = count($value['dau']);
    for($i=0;$i<$demdau;$i++){
        $listdau.='<br />'.$value['dau'][$i];
    }
    $listduoi = '';
    $demduoi = count($value['duoi']);
    for($i=0;$i<$demduoi;$i++){
        $listduoi.='<br />'.$value['duoi'][$i];
    }
    $listns = '';
    $demns = count($value['ngaysinh']);
    for($i=0;$i<$demns;$i++){
        $listns.='<br />'.$value['ngaysinh'][$i];
    }?>
        <tr>
            <td><?=$key?></td>
            <td><?=$listdau?></td>
            <td><?=$listduoi?></td>
            <td><?=$listns?></td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>   
</div>

</body>
</html>
 