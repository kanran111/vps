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
            <td>Lặp Đều 1</td>
            <td>Lặp Đều 2</td>
            <td>Lặp Đều 3</td>
            <td>Lặp Đuôi 1</td>
            <td>Lặp Đuôi 2</td>
            <td>Lặp Đuôi 3</td>
            <td>Lặp Đuôi 4</td>
            <td>Lặp Đuôi 5</td>
            <td>Dễ Nhớ 1</td>
            <td>Dễ Nhớ 2</td>
            <td>Cặp 1</td>
            <td>Cặp 2</td>
            <td>Cặp 3</td>
            <td>Cặp 4</td>
            <td>Đầu Ngực 1</td>
            <td>Đầu Ngực 2</td>
            <td>Đầu Đuôi 1</td>
            <td>Đầu Đuôi 2</td>
            <td>Tam Hoa 1</td>
            <td>Tam Hoa 2</td>
            <td>Tam Hoa 3</td>
            <td>Tam Hoa 4</td>
            <td>Tam Hoa 5</td>
            <td>Tam Hoa 6</td>
            <td>Tam Hoa 7</td>
        </tr>
    </thead>
    <tbody>
        <tr><td><?php foreach($row['lapdeu1'] as $value) {
            echo '<br />'.$value['sdt'];}?></td>
            <td><?php foreach($row['lapdeu2'] as $value) {
            echo '<br />'.$value['sdt'];}?></td>
            <td><?php foreach($row['lapdeu3'] as $value) {
            echo '<br />'.$value['sdt'];}?></td>
            <td><?php foreach($row['lapduoi1'] as $value) {
            echo '<br />'.$value['sdt'];}?></td>
            <td><?php foreach($row['lapduoi2'] as $value) {
            echo '<br />'.$value['sdt'];}?></td>
            <td><?php foreach($row['lapduoi3'] as $value) {
            echo '<br />'.$value['sdt'];}?></td>
            <td><?php foreach($row['lapduoi4'] as $value) {
            echo '<br />'.$value['sdt'];}?></td>
            <td><?php foreach($row['lapduoi5'] as $value) {
            echo '<br />'.$value['sdt'];}?></td>
            <td><?php foreach($row['denho1'] as $value) {
            echo '<br />'.$value['sdt'];}?></td>
            <td><?php foreach($row['denho2'] as $value) {
            echo '<br />'.$value['sdt'];}?></td>
            <td><?php foreach($row['cap1'] as $value) {
            echo '<br />'.$value['sdt'];}?></td>
            <td><?php foreach($row['cap2'] as $value) {
            echo '<br />'.$value['sdt'];}?></td>
            <td><?php foreach($row['cap3'] as $value) {
            echo '<br />'.$value['sdt'];}?></td>
            <td><?php foreach($row['cap4'] as $value) {
            echo '<br />'.$value['sdt'];}?></td>
            <td><?php foreach($row['daunguc1'] as $value) {
            echo '<br />'.$value['sdt'];}?></td>
            <td><?php foreach($row['daunguc2'] as $value) {
            echo '<br />'.$value['sdt'];}?></td>
            <td><?php foreach($row['dauduoi1'] as $value) {
            echo '<br />'.$value['sdt'];}?></td>
            <td><?php foreach($row['dauduoi2'] as $value) {
            echo '<br />'.$value['sdt'];}?></td>
            <td><?php foreach($row['tamhoa1'] as $value) {
            echo '<br />'.$value['sdt'];}?></td>
            <td><?php foreach($row['tamhoa2'] as $value) {
            echo '<br />'.$value['sdt'];}?></td>
            <td><?php foreach($row['tamhoa3'] as $value) {
            echo '<br />'.$value['sdt'];}?></td>
            <td><?php foreach($row['tamhoa4'] as $value) {
            echo '<br />'.$value['sdt'];}?></td>
            <td><?php foreach($row['tamhoa5'] as $value) {
            echo '<br />'.$value['sdt'];}?></td>
            <td><?php foreach($row['tamhoa6'] as $value) {
            echo '<br />'.$value['sdt'];}?></td>
            <td><?php foreach($row['tamhoa7'] as $value) {
            echo '<br />'.$value['sdt'];}?></td>
            </tr>
       
    </tbody>
</table>  
</div>

</body>
</html>