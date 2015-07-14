<?php $this->load->view('admin-header'); ?>
</div>
      <div class="container">
          <div class="row">
              <div class="span4">
                  <table border="1" cellspacing="0" cellpadding="3">
					<tr>
						<th>ID</th>
						<th><?php echo lang('name'); ?></th>
						<th><?php echo lang('family'); ?></th>
						<th><?php echo lang('testimonial'); ?></th>
						<th><?php echo lang('picture'); ?></th>
						<th><?php echo lang('date_time'); ?></th>
						<th><?php echo lang('actions'); ?></th>
					</tr>
<?php
	if(count($testimonials) > 0)
	{
		foreach($testimonials as $testimonial)
		{
?>
			<tr>
				<td><?php echo $testimonial->testimonial_id; ?></td>
				<td><?php echo $testimonial->first_name; ?></td>
				<td><?php echo $testimonial->last_name; ?></td>
				<td><?php echo $testimonial->testimonial; ?></td>
				<td>
					<img src="<?php echo $testimonial->picture; ?>" class="thumb" alt="" width="123" height="123" />
				</td>
				<td><?php echo date('d.m.Y H:i', strtotime($testimonial->added_on)); ?></td>
				<td>
<?php
	if($testimonial->status == 0)
		echo anchor('/admin/testimonial_set_status/'.$testimonial->testimonial_id.'/1', lang('approve'), 'onclick="return confirm(\''.lang('msg_confirm_approve_testimonial').'\');"');
	else
		echo anchor('/admin/testimonial_set_status/'.$testimonial->testimonial_id.'/0', lang('disapprove'), 'onclick="return confirm(\''.lang('msg_confirm_disapprove_testimonial').'\');"');
?>
					| <?php echo anchor('/admin/testimonial_delete/'.$testimonial->testimonial_id, lang('remove'), 'onclick="return confirm(\''.lang('msg_confirm_remove_testimonial').'\');"'); ?>
				</td>
			</tr>
<?php
		}
	}
	else
	{
?>
			<tr>
				<td colspan="6" align="center" valign="top"><?php echo lang('msg_no_testimonials_found'); ?></td>
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