<?php 
/*
 * Hàm hiển thị danh sách menu dạng list
 * Tham số truyền vào:
 *  - $menus: danh sách menu
 *  - $id_parent: mặc định, không cần truyền vào
 */
function showMenuLi($menus, $id_parent = 0) 
{
    # BƯỚC 1: LỌC DANH SÁCH MENU VÀ CHỌN RA NHỮNG MENU CÓ ID_PARENT = $id_parent
     
    // Biến lưu menu lặp ở bước đệ quy này
    $menu_tmp = array();
 
    foreach ($menus as $key => $item) {
        // Nếu có parent_id bằng với parrent id hiện tại
        if ($item['idcha'] ==  $id_parent) {
            $menu_tmp[] = $item;
            // Sau khi thêm vào biên lưu trữ menu ở bước lặp
            // thì unset nó ra khỏi danh sách menu ở các bước tiếp theo
            unset($menus[$key]);
        }
    }
    # BƯỚC 2: lẶP MENU THEO DANH SÁCH MENU Ở BƯỚC 1
     
    // Điều kiện dừng của đệ quy là cho tới khi menu không còn nữa
    if ($menu_tmp) 
    {
        //echo '<select>';
        foreach ($menu_tmp as $item) 
        {
            $tenloai = $item['TenLoai']; $idloai = $item['idLoai']; $idcha = $item['idcha'];
             if($idcha==0){
                $ten = $tenloai;
             }else $ten = '--'.$tenloai;
             echo '<option value='.$idloai.'>'.$ten.'</option>';
            // Gọi lại đệ quy
            // Truyền vào danh sách menu chưa lặp và id parent của menu hiện tại
            showMenuLi($menus, $item['idLoai']);
            //echo '</li>';
        }
        //echo '</select>';
    }
}
     
?>
<form action="<?php echo base_url(); ?>user/themloaisp" method="post" id="categories">
        <?php
        echo "<div class='mess_error'>";
        echo "<ul>";
            //$error = $this->session->flashdata('error');
            if( $this->session->flashdata('error'))    echo '<li>'. $this->session->flashdata('error').'</li>';
            if(validation_errors() != ''){
                echo "<li>".validation_errors()."</li>";
            }
        echo "</ul>";
        echo "</div>";
        ?>
    <fieldset class="show">
        <legend align="center">Nhập thông tin loại sản phẩm</legend>
        <label>Tên Loại:</label><input type="text" name="tenloai" size="28" class="input"/><br />
        <label>Ẩn Hiện:</label><select name="anhien">
            <option value="0"  >Ẩn</option>
            <option value="1" selected >Hiện</option>
        </select><br/>
        <label>Cha:</label><select name="idcha">
            <option value="0">Bỏ Trống</option>
            <?php showMenuLi($data); ?>
                    </select><br/>
        <label>Nổi bật:</label> <select name="noibat">
            <option value="0"  >Không </option>
            <option value="1" selected >Có</option>
        </select><br/>
        <label>Thứ Tự:</label><input type="text" name="thutu" size="28" class="input"/><br />
        <label>&nbsp;</label><input type="submit" name="ok" value="Add User" class="btn" />
    </fieldset>
 
</form>