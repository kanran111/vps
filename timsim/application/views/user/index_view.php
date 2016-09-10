
<table cellpadding="0" cellspacing="0" border="0" width="100%" id="list_cate" class="list">
    <tr>
         <td class="big" colspan="6" align="center"><a href="<?php echo base_url('user/add'); ?>">Thêm Người Dùng</a><br /></td>
     </tr>
    <tr>
        <th width="20">STT</th>
        <th width="30">idUser</th>
        <th width="80">Họ Tên</th>
        <th width="80">Địa Chỉ</th>
        <th width="10">Edit</th>
        <th width="10">Delete</th>
    </tr>
     
    <tr>
        <?php
            $stt=0;
            foreach($info as $item){
                $stt++;
                echo "<tr>";
                    echo "<td>$stt</td>";
                    echo "<td class='admin'>".$item['idUser']."</td>";
                    echo "<td>".$item['HoTen']."</td>";
                    echo "<td >".$item['DiaChi']."</td>";
                    echo "<td><a href=".base_url()."user/edit/".$item['idUser'].">Sửa</a></td>";
                    echo "<td><a href=".base_url()."user/del/".$item['idUser']."  onclick='return xacnhan();'>Xóa</a></td>";
                echo "</tr>";
                     
            }
        ?>
    </tr>
     <tr>
         <td colspan="6" align="center">Có tổng cộng <?php
          echo $total; ?> thành viên.<br /></td>
     </tr>
      
     
</table>