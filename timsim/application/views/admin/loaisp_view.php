
<table cellpadding="0" cellspacing="0" border="0" width="100%" id="list_cate" class="list">
    <tr>
         <td class="big" colspan="6" align="center"><a href="<?php echo base_url('user/themloaisp'); ?>">Thêm Người Dùng</a><br /></td>
     </tr>
    <tr>
        <th >idLoai</th>
        <th >Tên Loại</th>
        <th >Thứ tự</th>
        <th >Ẩn Hiện</th>
        <th >idcha</th>
        <th >Nổi Bật</th>
        <th >Edit</th>
        <th >Delete</th>
    </tr>
     
    <tr>
        <?php
            foreach($info as $item){
                echo "<tr>";
                    echo "<td class='admin'>".$item['idLoai']."</td>";
                    echo "<td>".'<input type="text" class="TenLoai" value="'.$item['TenLoai'].'"/></td>';
                    echo "<td >".'<input type="text" class="ThuTu" size="2" value="'.$item['ThuTu'].'"></td>';
                    echo "<td >".'<input type="text" class="AnHien" size="2" value="'.$item['AnHien'].'"></td>';
                    echo "<td >".'<input type="text" class="idcha" size=2 value="'.$item['idcha'].'"></td>';
                    echo "<td >".'<input type="text" class="NoiBat" size=2 value="'.$item['NoiBat'].'"></td>';
                    echo "<td><span class='loaisp_sua' idLoai=".$item['idLoai'].">Sửa</span></td>";
                    echo "<td><span class='idLoai' idLoai=".$item['idLoai']."  onclick='return xacnhan();'>Xóa</a></td>";
                echo "</tr>";
                     
            }
        ?>
    </tr>
     <tr>
        <td><?=$this->pagination->create_links();?></td>
         <td colspan="6" align="center">Có tổng cộng <?php echo $total; ?> loại sản phẩm.<br /></td>
     </tr>
      
     
</table>
<script>$(document).ready(function(e){
    $('.loaisp_sua').click(function(loaisp){
        var idLoai = $(this).attr('idLoai');
        var TenLoai = $(this).parent().parent().find('.TenLoai').val();
        var ThuTu = $(this).parent().parent().find('.ThuTu').val();
        var AnHien = $(this).parent().parent().find('.AnHien').val();
        var idcha = $(this).parent().parent().find('.idcha').val();
        var NoiBat = $(this).parent().parent().find('.NoiBat').val();
        var data1 = 'tenloai='+TenLoai+'&thutu='+ThuTu+'&anhien='+AnHien+'&idcha='+idcha+'&noibat='+NoiBat;
        $.ajax({
            url:'<?=base_url()?>user/sualoaisp/'+idLoai,cache:false,
            type:"POST",
            data:data1,
            success:function(d){
                if(d==1){
                alert('Sửa thành công');
                }else{
                    alert('xay ra loi');
                }
            }
        });
    }); 
});
</script>