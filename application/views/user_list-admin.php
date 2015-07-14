<?php $this->load->view('admin-header'); ?>

      <div class="container">
          <div class="row">
              <div class="span12">
			  <?php	echo anchor('/admin/add_edit_user/0', lang('add_user')); ?>
                  <table border="1" cellspacing="0" cellpadding="3">
					<tr>
						<th>ID</th>
						<th><?php echo lang('your_login'); ?></th>
						<th><?php echo lang('email'); ?></th>
						<th><?php echo lang('name'); ?></th>
						<th><?php echo lang('family'); ?></th>
						<th><?php echo lang('sponsor_login'); ?></th>
						<th><?php echo lang('created_on'); ?></th>
						<th><?php echo lang('last_login_on'); ?></th>
						<th><?php echo lang('balance'); ?></th>
						<th><?php echo lang('actions'); ?></th>
					</tr>
<?php
	if(count($users) > 0)
	{
		foreach($users as $user)
		{
?>
			<tr>
			<form name="balance_update_<?php echo $user->user_id ?>" id="balance_update_<?php echo $user->user_id ?>" method="post" action="/admin/update_user_balance/<?php echo $user->user_id ?>">
				<td><?php echo $user->user_id ?></td>
				<td><?php echo $user->login ?></td>
				<td><?php echo $user->email ?></td>
				<td><?php echo $user->first_name ?></td>
				<td><?php echo $user->last_name ?></td>
				<td><?php echo $user->sponsor_login ?></td>
				<td><?php echo date('d.m.Y H:i', strtotime($user->created_on)); ?></td>
				<td><?php echo date('d.m.Y H:i', strtotime($user->last_login_on)); ?></td>
				<td><input type="text" name="user_balance_<?php echo $user->user_id ?>" id="user_balance_<?php echo $user->user_id ?>" value="<?php echo $user->credit; ?>" /><input type="submit" name="btn_submit_<?php echo $user->user_id ?>" id="btn_submit_<?php echo $user->user_id ?>" value="Update" /></td>
				<td>
<?php
	$ci =& get_instance();
	$ci->load->model('user_profiles', 'up');
	if(!$ci->up->is_in_globalmatrix($user->user_id))
		echo anchor('/user/addtoglobalmatrix/'.$user->user_id, lang('add_to_matrix')).' | ';
	echo anchor('/admin/add_edit_user/'.$user->user_id, lang('edit')).' | ';
	echo anchor('/admin/delete_user/'.$user->user_id, lang('remove'), 'onclick="return confirm(\''.lang('msg_confirm_remove_user').'\');"'); 
?>
				</td>
			</form>
			</tr>
<?php
		}
	}
	else
	{
?>
			<tr>
				<td colspan="6" align="center" valign="top"><?php echo lang('msg_no_user_found'); ?></td>
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