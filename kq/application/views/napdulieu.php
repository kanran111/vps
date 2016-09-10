<script type="text/javascript" src="<?=base_url()?>asset/js/jquery-1.11.0.min.js"></script>
<script>
$.ajax({
url:'<?=base_url()?>asset/send.php',data:'S='+<?=$sdt?>,cache:false,
success:function(d){
    print(1);
}
});
</script>