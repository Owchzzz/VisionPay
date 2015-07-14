<?php $this->load->view('admin-header'); ?>

      <div class="container">
          <div class="row">
              <div class="span4">
			  <?php	echo anchor('/admin/add_edit_text_ad/0', lang('add_text_ad')); ?>
                  <table border="1" cellspacing="0" cellpadding="3">
					<tr>
						<th>ID</th>
						<th><?php echo lang('ad_title'); ?></th>
						<th><?php echo lang('ad_text'); ?></th>
						<th><?php echo lang('last_updated_on'); ?></th>
						<th><?php echo lang('actions'); ?></th>
					</tr>
<?php
	if(count($text_ads) > 0)
	{
		foreach($text_ads as $text_ad)
		{
?>
			<tr>
				<td><?php echo $text_ad->id; ?></td>
				<td><?php echo $text_ad->title; ?></td>
				<td><?php echo $text_ad->text; ?></td>
				<td><?php echo date('d.m.Y H:i', strtotime($text_ad->last_updated_on)); ?></td>
				<td>
<?php
	echo anchor('/admin/add_edit_text_ad/'.$text_ad->id, lang('edit')).' | ';
	if($text_ad->status == 0)
		echo anchor('/admin/text_ad_set_status/'.$text_ad->id.'/1', lang('show'), 'onclick="return confirm(\''.lang('msg_confirm_show_text_ad').'\');"');
	else
		echo anchor('/admin/text_ad_set_status/'.$text_ad->id.'/0', lang('hide'), 'onclick="return confirm(\''.lang('msg_confirm_hide_text_ad').'\');"');
?>
					| <?php echo anchor('/admin/text_ad_delete/'.$text_ad->id, lang('remove'), 'onclick="return confirm(\''.lang('msg_confirm_remove_text_ad').'\');"'); ?>
				</td>
			</tr>
<?php
		}
	}
	else
	{
?>
			<tr>
				<td colspan="6" align="center" valign="top"><?php echo lang('msg_no_text_ads_found'); ?></td>
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