<html>
<head>
 <meta charset="utf-8"/>
 <meta name="viewport" content="width=device-width, initial-scale=1"/>

<script type="text/javascript" src="<?=base_url()?>asset/js/jquery-1.11.0.min.js"></script>
<script>
  /*(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-67046403-6', 'auto');
  ga('send', 'pageview');*/

</script>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '232217187175461',
      xfbml      : true,
      version    : 'v2.7'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/vi_VN/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

<script>
    $(document).ready(function(e){
        $("#btnxuat").hide();// đầu tiên ẩn
         $("#btnnhap").click(function(e){
            //$("#btnnhap").hide();//khi xuat ra roi phai an nhap di
            $(".loading1").show();
            var sdt = $("#sdt").val();
            var s = 7;
            $.ajax({
                url:'<?=base_url()?>server1/napdulieu/'+sdt,
                cache:false,success:function(d){
                    if(d==1){//alert('Thêm thành công đợi 10s nút xuất sẽ xuất hiện');
                        $("#btnnhap").hide();//khi xuat ra roi phai an nhap di
                        $(".loading1").show();
                        $("#content").html(' ');
                        interval = setInterval(function(){
                                s--; 
                                document.getElementById('time').innerText = s.toString();
                        },1000);
                        setTimeout(function(){
                            $("#btnxuat").show();// sau khi click 10 s sau hiện xuất ra\
                            $(".loading1").hide();
                            clearInterval(interval);
                            $.ajax({
                                url:'<?=base_url()?>server1/hienketqua/'+sdt,
                                cache:false,success:function(d){
                                    if(d==0){alert('dữ liệu đang xử ly.');}
                                    else if(d==2){alert('sdt nay sai hoac du lieu dang xu ly ( neu thoi gian xu ly lau hon 60s, lien he admin de thong bao loi nay xin cam on.  ');}
                                    else if(d==3){alert('dữ liệu đang xử ly ( neu thoi gian xu ly lau hon 60s, lien he admin de thong bao loi nay xin cam on. ');
                                        
                                    }else{
                                        $("#btnxuat").hide();$("#btnnhap").show();
                                        alert('xuất thành công');
                                        $("#content").html(d);
                                    }
                                } 
                            });
                        },7000);
                    }else if(d==2){ alert('du lieu trung'); $(".loading1").hide();
                    }else if(d==3){ alert('gọi 0901 887 889 để mở khóa hệ thống'); $(".loading1").hide();
                    }else{
                        $(".error").load('<?=base_url()?>server1/hienloi'); $(".loading1").hide();
                    }
                } 
            });
         });
         $("#btnxuat").click(function(e){
            $(".loading1").show();
            var sdt = $("#sdt").val();
            $.ajax({
                url:'<?=base_url()?>server1/hienketqua/'+sdt,
                cache:false,success:function(d){
                    if(d==0){alert('dữ liệu đang xử ly.'); $(".loading1").hide();}
                    else if(d==2){$(".loading1").hide();alert('số đt sai hoac du lieu dang xu ly ( neu thoi gian xu ly lau hon 60s, lien he admin de thong bao loi nay xin cam on. ');}
                    else if(d==3){$(".loading1").hide();alert('dữ liệu đang xử ly ( neu thoi gian xu ly lau hon 60s, lien he admin de thong bao loi nay xin cam on. ');
                    }else{
                        $(".loading1").hide();
                        $("#btnxuat").hide();$("#btnnhap").show();
                        //alert('xuất thành công');
                        $("#content").html(d);
                    }
                } 
            });
         });
         $('input').on('paste', function () {
            //$("#btnnhap").hide();//khi xuat ra roi phai an nhap di
            $(".loading1").show();
            var element = this;
            setTimeout(function () { 
                var sdt = $(element).val();
                var s = 7;
                $.ajax({
                    url:'<?=base_url()?>server1/napdulieu/'+sdt,
                    cache:false,success:function(d){
                        if(d==1){//alert('Thêm thành công đợi 10s nút xuất sẽ xuất hiện');
                            $("#btnnhap").hide();//khi xuat ra roi phai an nhap di
                            $(".loading1").show();
                            $("#content").html(' ');
                            interval = setInterval(function(){
                                    s--; 
                                    document.getElementById('time').innerText = s.toString();
                            },1000);
                            setTimeout(function(){
                                $("#btnxuat").show();// sau khi click 10 s sau hiện xuất ra\
                                $(".loading1").hide();
                                clearInterval(interval);
                                $.ajax({
                                    url:'<?=base_url()?>server1/hienketqua/'+sdt,
                                    cache:false,success:function(d){
                                        if(d==0){alert('dữ liệu đang xử ly.');}
                                        else if(d==2){alert('số đt sai hoac du lieu dang xu ly ( neu thoi gian xu ly lau hon 60s, lien he admin de thong bao loi nay xin cam on.');}
                                        else if(d==3){alert('dữ liệu đang xử ly ( neu thoi gian xu ly lau hon 60s, lien he admin de thong bao loi nay xin cam on.');
                                            
                                        }else{
                                            $("#btnxuat").hide();$("#btnnhap").show();
                                            alert('xuất thành công');
                                            $("#content").html(d);
                                        }
                                    } 
                                });
                            },7000);
                        }else if(d==2){ alert('du lieu trung'); $(".loading1").hide();
                        }else if(d==3){ alert('gọi 0901 887 889 để mở khóa hệ thống'); $(".loading1").hide(); 
                        }else{
                            $(".error").load('<?=base_url()?>server1/hienloi'); $(".loading1").hide();
                        }
                    } 
                });
            }, 100);
         });
    });
</script>
<style>
    table {border:1px;}
    td:nth-child(odd) { background-color:#EEE; }
    td {background-color: aqua;}
    .number{}
    .loading1 {width: 2000px; height: 2000px; 
    opacity: 0.4; background-color: black; z-index: 1000; position: fixed; top: 0;left: 0; padding-left: 45%;
    padding-top: 18%;}
    #thongbaotime{ color:#FFF; z-index:1001 }
    #sdt{margin: auto;
width: 30%;
height: 40px;
padding-left: 50px;
border-radius: 20px;
color: green;
font-size: 30px;}
    #btnnhap,#btnxuat{
border-radius: 10px;
width: 100px;
height: 30px;
margin: auto;
    }
    #btnnhap:hover,#btnxuat:hover{ color: red; text-transform: uppercase; cursor:pointer; background: wheat;}
    .thoat {float:right; font-size: 20px; text-decoration: none;}
    .thoat:hover {font-size:25px; color: yellowgreen;}
</style>
</head>
<body>


<div class="loading1" style="display:none;"><p id="thongbaotime">vui long cho <span id="time"></span> giay</p><img src="<?=base_url()?>asset/images/loading.gif" width="125" height="110"   /></div>
<span class="error"></span>
<input type="text" id="sdt" name="sdt" placeholder="Số điện thoại" />
<input type="button" id="btnnhap" name="btnnhap" value="Nạp" />
<input type="button" size=3 id="btnxuat" name="btnxuat" value="Xuất" />
<a class="thoat" href="<?=base_url()?>server1/thoat">Chào bạn <?=$this->session->userdata('tennv')?>, Thoát</a>
<div id="content"></div>
<div class="fb-comments" data-href="http://kq.sim090.net/server1/" data-numposts="5"></div>
</body>
</html>