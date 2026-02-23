




<style type="text/css">
    img{border:1px solid #f00; float:left; margin:3px; cursor:pointer; border-radius:5px;}
</style>
<script type="text/javascript">

    var controller = 'ajax_data';
    var base_url = '<?php echo base_url(); ?>';

    function load_data_ajax(type) {
        $("#container").html('<img src="' + base_url + 'icon/animation_processing.gif" style=" border:none;" />');
        $.ajax({
            'url': base_url + 'admin/' + controller + '/index',
            'type': 'POST', //the way you want to send data to your URL
            'data': {'type': type},
            'success': function (data) {
                $("#container").html(data);
            }
        });
    }


</script>

<!--<fieldset style="background:#6782B1;">
    <label>
        <form action="javascript:load_data_ajax(document.getElementById('image_name').value)">
            <input type="text" name="image_name" id="image_name" placeholder="Enter Image Name">
            <input type="button" value="Search" onclick="load_data_ajax(document.getElementById('image_name').value)" />
        </form>
    </label>
</fieldset>-->
<script type="text/javascript"> document.getElementById('image_name').focus();</script>

<div id="container" style="min-height:530px; background:#FFF;">
    <?php
    
    foreach ($images as $image) {
        
        
        ?>
    <img src="<?php echo base_url(); ?>assets/uploads/jobs/<?php echo $image->pic?>" height="100" onerror="this.style.display='none'" width="100" onclick="sendValue('<?php echo $image->pic?>')" title="<?php echo $image->pic?>" />
        <?php
    }
    ?>
</div>


<script>
function sendValue(s)
	{
	
	window.opener.document.getElementById('lib_file_selected').value = s;
	window.close();
	}
</script>
