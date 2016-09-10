<?php 
    //$km = array('GM_BTB','DN_TNB','CK400','MF149I','VNPOST','CK500','CK300','MF199I','KN180','DN180','KN80','DN180');
    $pre = '/(GM_BTB|DN_TNB|MF149I|VNPOST|CK300|MF199I|KN180|DN180|DN180|KN80|S750|S650|S550|S417|TCB180|TCB210|TL02)/i';
    $pre_m120 = '/(CK500|CK400|CK800|CK1000|CK1200|CK1500|YMOBILE|S850|S3000|S3500|Bridge2)/i';
    $pre_not = '/(KN69|KN149|KN45|KN145|KM69|KM169)/i';
    preg_match($pre,$sms,$match); 
    if(!empty($match)) echo '<h1>Số '.$sdt.' có khuyến mai MIU </h1>';
    else{ preg_match($pre_m120,$sms,$match); 
        if(!empty($match)) echo '<h1>Số '.$sdt.' có khuyến mai data </h1>'; 
        else{
            preg_match($pre_not,$sms,$match);
            if(!empty($match)) echo '<h1>Số '.$sdt.' KHONG có khuyến mai data </h1>';
        }
    }
preg_match('/Goi cuoc MIU vua duoc gia han\.Gia goi 70000 dong\, khong gioi han dung luong\, 3672 MB/i',$sms,$miu3g);
if(!empty($miu3g)) echo '<h1>Khuyen mai miu 3g</h1>';
    
?>
<h4 style="color: red;"><p style="color: blue;">Thông báo: Cac ban nho kiem tra them DL goi hien tai. neu m120 ma duoc den 6gb la dang co KM</p>  
<p style="color: red;">CÁC BẠN LƯU Ý CÁC GÓI M10 M25 M50 , KT TRÊN TRANG WEB KO THẤY ĐC GÓI CƯỚC, PHẢI KT BẰNG TIN NHẮN ( NẰM Ở DƯỚI), VÀ HIỆN CÁC ĐẦU SỐ MỚI 089 , CŨNG KO KT ĐƯỢC, PHẢI CHAT MINH </p>
<p>Để cải thiện hệ thống tốt hơn, thông báo ngay cho minh nếu kt lâu ( >= 60s)</p>
        <!--<p style="color: green; text-transform: uppercase;">Hiện minh đang co viec bận đi cong viec. Các bạn cứ chat qa và gửi tn binh thường. tí minh kiem tra sau.</p>-->
</h4>
<p class="number"> Số điện thoại: <?=$sdt?></p> 
<p class="credit">Số tiền : <?=$inviewid?></p>
<table border=1px >
    <tr><th>SDT</th><th>Gói cước</th><th>ngày đk</th><th>ngày gh</th><th>DL xài</th><th>DL gói</th><th>DL con lại</th></tr>
    <?=$get;?>
</table>
<table border=1px>
    <tr><th>ngày ghi nhận</th><th>ngày phản hồi</th><th>sdt</th><th>Nguồn</th><th>User</th><th>đầu</th><th>yêu cầu gửi</th><th>map</th><th>phản hồi</th><th>mô tả</th></tr>
    <?=$sms;?>
</table>
