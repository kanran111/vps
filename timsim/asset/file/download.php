<?php
$file = $_GET['file'];
$filename = $file;
  $url = $filename;
  $mimetype="application/force-download";
  $filesize = filesize($url);
  //ấn định http header
  header("Content-Type: $mimetype");
  header("Content-Disposition: attachment; filename=\"$filename\"");
  header("Content-Length: " . $filesize);
  //đọc file
  set_time_limit(0);
  $file = fopen($url,"rb");
  if ($file) {
	while(!feof($file)) { print(fread($file, 1024*8)); flush();	}
	fclose($file);
    unlink($filename);
  }
?>