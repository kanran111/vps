<!DOCTYPE html>
<html lang="vi">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Tim sim</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="keywords" content="sim trả sau mobifone, tim số đẹp , kiếm sim tra sau" />
  <meta name="description" content="trang web tìm kiếm sim trả sau mobifone .">
  <link rel="stylesheet" href="<?=base_url()?>asset/css/bootstrap.min.css"/>
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css"/>
  <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css"/>
  <script src="<?=base_url()?>asset/js/jquery-1.11.0.min.js"></script>
  <script src="<?=base_url()?>asset/js/bootstrap.min.js"></script>
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-67046403-9', 'auto');
  ga('send', 'pageview');

</script>
  <link rel="stylesheet" href="<?=base_url()?>asset/css/style_timsim.css"/>
  <style> video:hover { cursor:pointer; } 
    .wizard > div.wizard-inner {
        position: relative;
        }
    .wizard .nav-tabs, .nav-tabs.nav-justified {
    background-color: transparent;
    }
    .wizard .nav-tabs > li.active {
    background-color: transparent;
}
.wizard .nav-tabs > li {
    width: 25%;
    white-space: nowrap;
    }
    .wizard .nav-tabs > li {
    border-right: 1px solid #bbb;}
    .nav-tabs > li {
    text-align: center;
    margin-bottom: 0;}
    .nav-tabs > li {
    float: left;
    margin-bottom: -1px;
}
.nav > li {
    position: relative;
    display: block;
    }
    .wizard .nav-tabs > li:first-child > a {
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px;
}
.wizard .nav-tabs > li.active > a, .wizard .nav-tabs > li.active > a:hover, .wizard .nav-tabs > li.active > a:focus {
	color: #fff;
	cursor: default;
	background-image: -moz-linear-gradient(90deg, #09f 0%, #4db8ff 100%);
	background-image: -webkit-linear-gradient(90deg, #09f 0%, #4db8ff 100%);
	background-image: -ms-linear-gradient(90deg, #09f 0%, #4db8ff 100%);
	border: none;
}
.wizard .nav-tabs > li > a {
	margin-right: 0px;
	line-height: 1.42857143;
	color: #fff;
	font-size: 20px;
	padding: 15px 0;
	background-color: rgba(0,0,0,0.549);
	border: none;
}
  </style>
</head>
<body  id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60" class="">

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
        <li><a href="#about">TÌM SIM</a></li>
        <li><a href="#services">TRẢ SAU</a></li>
        <li><a href="#pricing">SỐ ĐẸP</a></li>
        <li><a href="#contact">LIÊN HỆ</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="jumbotron text-center lammo">
  <h1 ><a href="#">TÌM SIM SỐ ĐẸP</a> </h1> 
  <p></p> 
  <div class="wizard">
      <div class="wizard-inner">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a class="btn4" href="#step4" class="" data-toggle="tab" aria-controls="complete" role="tab" title="Nhập số muốn kiếm dạng 9*8" style="text-transform: uppercase;">Tìm Số Yêu Thích</a>
                </li>
                <li role="presentation" >
                    <a class="btn1" href="#form1" data-toggle="tab" aria-controls="step1" role="tab" title="Copy toàn bộ dong excel cần kiếm vào khung dưới để xuất excel" aria-expanded="true" style="text-transform: uppercase;">Xuất Gần Giống</a>
                </li>
                <li role="presentation" class="">
                    <a class="btn2" href="#form2" data-toggle="tab" aria-controls="step2" role="tab" title="Copy toàn bộ dong excel cần kiếm vào khung dưới để hiện ra" aria-expanded="false" style="text-transform: uppercase;">Hiện Sim Gần Giống</a>
                </li>
                <li role="presentation">
                    <a class="btn3" href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Click vào hệ thống sẽ xuất ra các số đẹp hôm nay" style="text-transform: uppercase;">Số Đẹp Hôm Nay</a>
                </li>
                
            </ul>
        </div>
  </div>
  <div id="form" class="form-inline">
    <input type="text" name="sdt_tim" class="form-control sdt_tim" size="50" placeholder=" kí tự * đại diện số bất ki` nhập *8 nếu muốn kiếm 8 đuôi" required>
    
    <input type="button" class="btn btn-lg timso" value="Tim Kiếm" />
    
    <input type="hidden" name="<?=$this->security->get_csrf_token_name()?>" value="<?= $this->security->get_csrf_hash() ?>" />
  </div>
</div>
  <div id="crolltop"> <a href="#myPage" title="To Top">
        <span class="glyphicon glyphicon-chevron-up"></span>
    </a>
  </div>
  
  <?php if($this->router->fetch_method()=='timsodep') {echo $timsimdep; ?>
  <div id="baove" style=" position:fixed; top:0; width: 5000px; height:5000px; background-color: black; opacity: 0.5;"></div>
  <?php }  ?>
<script>
$(document).ready(function(){
  
  $(".btn-alert").hide(); $(".btn-success").hide();
  $(".timso").click(function(e){
        var kitu = $(".sdt_tim").val();
        window.location.href='<?=base_url('/Timsim/timsodep/')?>/' + kitu + '/';
  });
  $(".btn1").click(function(e){
        $("#form").load("<?=base_url('/Timsim/loadform/xuat')?>");
  });
  $(".btn2").click(function(e){
        $("#form").load("<?=base_url('/Timsim/loadform/hiensimgiong')?>");
  });
  $(".btn3").click(function(e){
        window.location.href = '<?=base_url('/Timsim/sodeptoday')?>';
  });
  $(".btn4").click(function(e){
        $("#form").load("<?=base_url('/Timsim/loadform/timsim/')?>");
  });
  $("#baove").click(function(e){
        $("#baove").hide();
        $(".banner-top").hide();
  });
})// document
</script>

</body>
</html>
