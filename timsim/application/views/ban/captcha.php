<img src="<?=base_url('Cban/createimages')?>" />
<script>
    $(document).ready(function(e){
        $(".img-con").click(function(e){
            $(this).load('<?=base_url('Cban/getimages')?>');
         });
    })
</script>