<form action="<?php echo base_url(); ?>user/add" method="post" id="categories">
        <?php
        echo "<div class='mess_error'>";
        echo "<ul>";
            if(validation_errors() != ''){
                echo "<li>".validation_errors()."</li>";
            }
        echo "</ul>";
        echo "</div>";
        ?>
    <fieldset class="show">
        <legend align="center">NHập thông tin user</legend>
        <label>Email:</label><input type="text" name="email" size="28" class="input"/>
        <label>Password:</label><input type="password" name="password" size="28" class="input"/>
        <label>Re-Pass:</label><input type="password" name="password2" size="28" class="input"/>
        <label>Họ Tên:</label><input type="text" name="hoten" size="28" class="input" />
        <label>Địa Chỉ:</label><input type="text" name="diachi" size="28" class="input" />
        <label>Điện Thoại:</label><input type="text" name="dienthoai" size="28" class="input" /><br />
        <label>Level:</label><select name="level">
            <option value="0" selected >Member</option>
            <option value="1" >Administrator</option>
        </select><br/>
        
        <label>&nbsp;</label><input type="submit" name="ok" value="Add User" class="btn" />
    </fieldset>
 
</form>