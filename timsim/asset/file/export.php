<?php 

//luu cac thong tin vao file excel
require_once 'Classes/PHPExcel.php';
$row=$_POST['myData'];
$objPHPExcel = new PHPExcel();
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('A1', 'SDT')
->setCellValue('B1', 'Giống Đầu')
->setCellValue('C1', 'Giống Đuôi');

//set gia tri cho cac cot du lieu
if(empty($row)) die;
$d = 2;
foreach ($row as $key=>$value)
{
    $listdau = '';
    $demdau = count($value['dau']);
    for($i=0;$i<$demdau;$i++){
        $listdau.=' '.$value['dau'][$i];
    }
    $listduoi = '';
    $demduoi = count($value['duoi']);
    for($i=0;$i<$demduoi;$i++){
        $listduoi.=' '.$value['duoi'][$i];
    }
    
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('A'.$d, $key)
->setCellValue('B'.$d, $listdau)
->setCellValue('C'.$d, $listduoi);
$d++;
}
$rand = substr(md5(rand(1,99999)),rand(1,5),4);
//ghi du lieu vao file,định dạng file excel 2007
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$full_path = 'data'.$rand.'.xlsx';//duong dan file
$objWriter->save($full_path);
echo $full_path;

?>