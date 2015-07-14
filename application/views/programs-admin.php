<?php $this->load->view('admin-header'); ?>

      <div class="container">
          <div class="row">
              <div class="span4">
                  <table border="1" cellspacing="0" cellpadding="3">
					<tr>
						<th>ID</th>
						<th><?php echo lang('program_title'); ?></th>
						<th><?php echo lang('program_intro'); ?></th>
						<th><?php echo lang('intro_image'); ?></th>
						<th><?php echo lang('last_updated_on'); ?></th>
						<th><?php echo lang('actions'); ?></th>
					</tr>
<?php
	if(count($programs) > 0)
	{
		foreach($programs as $program)
		{
?>
			<tr>
				<td><?php echo $program->program_id; ?></td>
				<td><?php echo $program->program_title; ?></td>
				<td><?php echo $program->intro_text; ?></td>
				<td>
					<img src="<?php echo $program->intro_image; ?>" alt="" />
				</td>
				<td><?php echo date('d.m.Y H:i', strtotime($program->last_updated_on)); ?></td>
				<td>
<?php
	echo anchor('/admin/edit_program/'.$program->program_id, lang('edit')).' | ';
	if($program->status == 0)
		echo anchor('/admin/program_set_status/'.$program->program_id.'/1', lang('show'), 'onclick="return confirm(\''.lang('msg_show_program').'\');"');
	else
		echo anchor('/admin/program_set_status/'.$program->program_id.'/0', lang('hide'), 'onclick="return confirm(\''.lang('msg_hide_program').'\');"');
?>
				</td>
			</tr>
<?php
		}
	}
	else
	{
?>
			<tr>
				<td colspan="6" align="center" valign="top"><?php echo lang('msg_no_programs_found'); ?></td>
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