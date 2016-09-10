<?php 
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="data.xls"');
header("Pragma: no-cache");
header("Expires: 0");
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
header ('Pragma: public'); // HTTP/1.0
header ('Content-Transfer-Encoding: binary');
?>
<meta charset="utf-8" />
<table border="1px">
    <thead>
        <tr>
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