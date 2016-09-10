<script type="text/javascript" src="<?=base_url()?>asset/ckeditor/ckeditor.js"></script>
<?php 
function showMenuLi($menus, $id_parent = 0) 
{
    
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
<form action="<?php echo base_url(); ?>user/themsp" method="post" style="800px" id="categories_baiviet">
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
        <legend align="center">Nhập thông tin sản phẩm</legend>
        <label>Tên Sản Phẩm:</label><input type="text" name="TenSP" size="28" class="input"/><br />
        <label>Loại sản phẩm:</label><select name="idLoai">
            <option value="0">Bỏ Trống</option>
            <?php showMenuLi($data); ?>
                    </select><br/>
        <label>Nổi bật:</label> <select name="NoiBat">
            <option value="0"  >Không </option>
            <option value="1" selected >Có</option>
        </select><br/>
        <label>Ẩn Hiện:</label><select name="AnHien">
            <option value="0"  >Ẩn</option>
            <option value="1" selected >Hiện</option>
        </select><br/>
        <label>Mô Tả:</label><input type="text" name="MoTa" size="42" class="input" /><br />
        <label>Giá Bán:</label><input type="text" name="Gia" size="20" class="input" /><br />
        <label>Url Hinh</label><input type="text" name="urlHinh" size="42" class="input" /><br />
        <label>Số Lượng Tồn Kho</label><input type="text" name="SoLuongTonKho" size="20" class="input" /><br />
        <label>Ghi Chú</label><input type="text" name="GhiChu" size="20" class="input" /><br />
        <textarea class="input" id="baiviet" name="baiviet"></textarea>
        <script type="text/javascript">
        var editor = CKEDITOR.replace( 'baiviet',{
        	uiColor : '#9AB8F3',
        	language:'vi',
        	skin:'moono'	 	
        	/*toolbar:[
        	['Source','-','Save','NewPage','Preview','-','Templates'],
        	['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print'],
        	['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
        	['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],
        	['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
        	['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
        	['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
        	['Link','Unlink','Anchor'],
        	['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],
        	['Styles','Format','Font','FontSize'],
        	['TextColor','BGColor'],
        	['Maximize', 'ShowBlocks','-','About']
        	]*/
        });
        </script>
        <br />
        <label>&nbsp;</label><input style="margin-left: 30%;" type="submit" name="ok" value="Add User" class="btn" />
    </fieldset>
 
</form>