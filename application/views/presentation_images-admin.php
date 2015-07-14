<?php $this->load->view('admin-header'); ?>

      <div class="container">
          <div class="row">
              <div class="span4">
				<?php	echo anchor('/admin/add_edit_presentation_image/0', lang('add_presentation_slide_image')); ?>
                  <table border="1" cellspacing="0" cellpadding="3">
                      <tr><th><?php echo lang('presentation_link');?>: <?php echo $presentation_act; if($presentation_act != ""){ echo ' | ';}?><a href="/admin/uploadnewpresentation/"><?php echo lang('upload_new');?></a></th>
					<tr>
						<th>ID</th>
						<th><?php echo lang('image_caption'); ?></th>
						<th><?php echo lang('presentation_slide_image'); ?></th>
						<th><?php echo lang('image_order'); ?></th>
						<th><?php echo lang('added_on'); ?></th>
						<th><?php echo lang('actions'); ?></th>
					</tr>
<?php
	if(count($presentation_images) > 0)
	{
		foreach($presentation_images as $presentation_image)
		{
?>
			<tr>
				<td><?php echo $presentation_image->image_id; ?></td>
				<td><?php echo $presentation_image->image_caption; ?></td>
				<td>
					<img src="<?php echo $presentation_image->image_path; ?>" class="thumb" alt="" width="123" height="123" />
				</td>
				<td><?php echo $presentation_image->image_order; ?></td>
				<td><?php echo date('d.m.Y H:i', strtotime($presentation_image->added_on)); ?></td>
				<td>
<?php
        $dl=lang('download');
        echo '<a href="'.$presentation_image->image_path.'" download="image">'.$dl,'</a> | ';
	echo anchor('/admin/add_edit_presentation_image/'.$presentation_image->image_id, lang('edit')).' | ';
	if($presentation_image->status == 0)
		echo anchor('/admin/presentation_image_set_status/'.$presentation_image->image_id.'/1', lang('show'), 'onclick="return confirm(\''.lang('msg_confim_show_presentation_image').'\');"');
	else
		echo anchor('/admin/presentation_image_set_status/'.$presentation_image->image_id.'/0', lang('hide'), 'onclick="return confirm(\''.lang('msg_confim_hide_presentation_image').'\');"');
?>
					| <?php echo anchor('/admin/presentation_image_delete/'.$presentation_image->image_id, lang('remove'), 'onclick="return confirm(\''.lang('msg_confim_remove_presentation_image').'\');"'); ?>
				</td>
			</tr>
<?php
		}
	}
	else
	{
?>
			<tr>
				<td colspan="6" align="center" valign="top"><?php echo lang('msg_no_presentation_slide_images'); ?></td>
			</tr>
<?php
	}
?>
				  </table>

              </div>
              
              
             
          </div>
      </div>
      
  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="/media/js/bootstrap.min.js"></script>
    <script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
  <script type="text/javascript">
tinymce.init({
    selector: "textarea"
 });
</script>
  </body>
</html>