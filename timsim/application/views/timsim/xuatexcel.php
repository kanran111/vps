<?php 
$postdata = http_build_query(
    array(
        'myData' => $row,
    )
);

$opts = array('http' =>
    array(
        'method'  => 'POST',
        'header'  => 'Content-type: application/x-www-form-urlencoded',
        'content' => $postdata
    )
);

$context  = stream_context_create($opts);

$result = file_get_contents(base_url('/asset/file/export.php'), false, $context);
redirect(base_url("/asset/file/download.php?file=".$result));
?>