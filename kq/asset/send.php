<?php 
require('Pusher.php'); $sdt= $_GET['S'];
$options = array(
    'cluster' =>'ap1',
    'encrypted' => true
);
$pusher = new Pusher(
        '2d830cf3daba615834f5', '4fea9f86729c027079cf', '235389', $options
);
$data['name'] = 'Freetuts.net';
$data['message'] = $sdt;
$pusher->trigger('Freetuts', 'notice', $data);
//Freetuts la ten kenh ban dat la gi thuy
//notice la su kien ban dat gi cung duoc ban co the tao ra nhieu kenh
//data la du lieu gui di
?>