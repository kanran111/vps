
<table cellpadding="0" cellspacing="0" border="0" width="100%" id="list_cate" class="list">
    <tr>
         <td class="big" colspan="6" align="center"><a href="<?php echo base_url('user/add'); ?>">Thêm Người Dùng</a><br /></td>
     </tr>
    <tr>
        <th width="20">idDH</th>
        <th width="30">Số điện thoại</th>
        <th >Thành Phố</th>
        <th >Quận</th>
        <th >Phường</th>
        <th >Thời gian đặt hàng</th>
        <th >SỐ nhà</th>
        <th >Ghi chú</th>
        <th> Thao tác </th>
    </tr>
     
    <tr>
        <?php
            foreach($info as $item){
                
                echo "<tr>";
                    echo "<td class='admin'>".$item['idDH']."</td>";
                    echo "<td>".$item['SDT']."</td>";
                    echo "<td >".$item['thanhpho']."</td>";
                    echo "<td >".$item['loaiquan'].' '.$item['quan']."</td>";
                    echo "<td >".$item['loaiphuong'].' '.$item['phuong']."</td>";
                    echo "<td >".$item['Time']."</td>";
                    echo "<td >".$item['sonha']."</td>";
                    echo "<td >".$item['ghichu']."</td>";
                    echo "<td >Đa gọi"."</td>";
                echo "</tr>";
                     
            }
        ?>
    </tr>
     <tr>
         <td colspan="6" align="center">Có tổng cộng <?php
           ?> thành viên.<br /></td>
     </tr>
      
     
</table>