<?php $this->load->view('admin-header'); ?>

      <div class="container">
          <div class="row">
              <div class="span4">
			  <?php	echo anchor('/admin/add_edit_faqs/0', lang('add_faq')); ?>
                  <table border="1" cellspacing="0" cellpadding="3">
					<tr>
						<th>ID</th>
						<th><?php echo lang('faq_question'); ?></th>
						<th><?php echo lang('faq_answer'); ?></th>
						<th><?php echo lang('faq_order'); ?></th>
						<th><?php echo lang('actions'); ?></th>
					</tr>
<?php
	if(count($faqs_data) > 0)
	{
		foreach($faqs_data as $faq)
		{
?>
			<tr>
				<td><?php echo $faq->faq_id; ?></td>
				<td><?php echo $faq->question; ?></td>
				<td><?php echo $faq->answer; ?></td>
				<td><?php echo $faq->order ?></td>
				<td>
<?php
	echo anchor('/admin/add_edit_faqs/'.$faq->faq_id, lang('edit')).' | ';
	if($faq->status == 0)
		echo anchor('/admin/faqs_set_status/'.$faq->faq_id.'/1', lang('show'), 'onclick="return confirm(\''.lang('msg_confirm_show_faq').'\');"');
	else
		echo anchor('/admin/faqs_set_status/'.$faq->faq_id.'/0', lang('hide'), 'onclick="return confirm(\''.lang('msg_confirm_hide_faq').'\');"');
?>
					| <?php echo anchor('/admin/delete_faqs/'.$faq->faq_id, lang('remove'), 'onclick="return confirm(\''.lang('msg_confirm_remove_faq').'\');"'); ?>
				</td>
			</tr>
<?php
		}
	}
	else
	{
?>
			<tr>
				<td colspan="6" align="center" valign="top"><?php echo lang('msg_no_faqs_found'); ?></td>
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