<form method="post" action="" name="form1" id="form1">
    <textarea name="sdt" style="width:500px; height:200px;"></textarea>
    <input type="hidden" name="<?=$this->security->get_csrf_token_name()?>" value="<?=$this->security->get_csrf_hash()?>" />
    <input type="submit" value="Thêm sdt" />
</form>