<?php $this->load->view('admin-header'); ?>

      <div class="container">
		<form class="form-horizontal" action="/admin/add_edit_user/<?php echo $this->uri->segment(3);?>" method="post" name="registration-form" id="registration-form">
			<input type="hidden" name="last_update_on" id="last_update_on" value="<?php echo date('Y-m-d H:i:s') ?>" />
	<?php
		if($this->uri->segment(3) == 0)
		{
	?>
			<input type="hidden" name="created_on" id="created_on" value="<?php echo date('Y-m-d H:i:s') ?>" />
			<input type="hidden" name="email_verified" id="email_verified" value="1" />
	<?php
		}
	?>
		  <div class="row">
			  <div class="span12">
				  <h3>
					<?php
						if($this->uri->segment(3) == 0)
							echo 'Add User';
						else
							echo 'Edit User';
					?>
				  </h3>
				  <hr />
				  <?php echo validation_errors(); ?>
				  <?php echo $form_submit_message; ?>
			  </div>
		  </div>
          <div class="row">
			
              <div class="span12">
				<table border="0" cellpadding="4" cellspacing="0">
					<tr>
						<th><?php echo lang('name');?><span>*</span></th>
						<td><input type="text" name="first_name" id="first_name" value="<?= isset($user_data->first_name) ? $user_data->first_name : my_set_value('first_name') ?>" class="validate[required]" /></td>
						<th><?php echo lang('house');?><span>*</span></th>
						<td><input type="text" name="house" id="house" value="<?= isset($user_data->house) ? $user_data->house : my_set_value('house') ?>" class="validate[required]" /></td>
					</tr>
					<tr>
						<th><?php echo lang('family');?><span>*</span></th>
						<td><input type="text" name="last_name" id="last_name" value="<?= isset($user_data->last_name) ? $user_data->last_name : my_set_value('last_name') ?>" class="validate[required]" /></td>
						<th><?php echo lang('flat');?><span>&nbsp;&nbsp;</span></th>
						<td><input type="text" name="flat" id="flat" value="<?= isset($user_data->flat) ? $user_data->flat : my_set_value('flat') ?>" /></td>
					</tr>
					<tr>
						<th><?php echo lang('email');?><span>*</span></th>
						<td><input type="text" name="email" id="email" value="<?= isset($user_data->email) ? $user_data->email : my_set_value('email') ?>" class="validate[required, custom[email], ajax[ajaxEmailCallPhp]]" /></td>
						<th><?php echo lang('post_code');?><span>*</span></th>
						<td><input type="text" name="post_code" id="post_code" value="<?= isset($user_data->post_code) ? $user_data->post_code : my_set_value('post_code') ?>" class="validate[required]" /></td>
					</tr>
					<tr>
						<th><?php echo lang('phone_number');?><span>*</span><span><?php echo lang('in_international_format'); ?></span></th>
						<td><input type="text" name="phone" id="phone" value="<?= isset($user_data->phone) ? $user_data->phone : my_set_value('phone') ?>" class="validate[required, custom[phone]]" /></td>
						<th><?php echo lang('sponsor_login');?><span>*</span></th>
						<td><input type="text" name="sponsor_login" id="sponsor_login" value="<?= isset($user_data->sponsor_login) ? $user_data->sponsor_login : my_set_value('sponsor_login') ?>" class="validate[required, ajax[ajaxSponsorAvailablePhp]]" /></td>
					</tr>
					<tr>
						<th>Skype<span>&nbsp;&nbsp;</span></th>
						<td><input type="text" name="skype" id="skype" value="<?= isset($user_data->skype) ? $user_data->skype : my_set_value('skype') ?>" /></td>
						<th><?php echo lang('your_login');?><span>*</span></th>
						<td><input type="text" name="login" id="login" value="<?= isset($user_data->login) ? $user_data->login : my_set_value('login') ?>" class="validate[required, ajax[ajaxUserCallPhp]]" /></td>
					</tr>
					<tr>
						<th><?php echo lang('country');?><span>*</span></th>
						<td><input type="text" name="country" id="country" value="<?= isset($user_data->country) ? $user_data->country : my_set_value('country') ?>" class="validate[required]" /></td>
						<th><?php echo lang('password');?><span>*</span></th>
						<td><input type="password" name="password" id="password" class="validate[required]" /></td>
					</tr>
					<tr>
						<th><?php echo lang('city');?><span>*</span></th>
						<td><input type="text" name="city" id="city" value="<?= isset($user_data->city) ? $user_data->city : my_set_value('city') ?>" class="validate[required]" /></td>
						<th><?php echo lang('confirm_password');?><span>*</span></th>
						<td><input type="password" name="confirm_password" id="confirm_password" class="validate[required, equals[password]]" /></td>
					</tr>
					<tr>
						<th><?php echo lang('street');?><span>*</span></th>
						<td><input type="text" name="street" id="street" value="<?= isset($user_data->street) ? $user_data->street : my_set_value('street') ?>" class="validate[required]" /></td>
						<th><?php echo lang('financial_password');?><span>*</span></th>
						<td><input type="password" name="fin_password" id="fin_password" class="validate[required]" /></td>
					</tr>
					<tr>
						<th>&nbsp;</th>
						<td>&nbsp;</td>
						<th><?php echo lang('confirm_financial_password');?><span>*</span></th>
						<td><input type="password" name="confirm_fin_password" id="confirm_fin_password" class="validate[required, equals[fin_password]]" /></td>
					</tr>
					<tr>
						<th>&nbsp;</th>
						<td>&nbsp;</td>
						<th><?php echo lang('okpay_wallet');?><span>*</span><span><?php echo lang('example');?>: OK123456789</span></th>
						<td><input type="text" name="ok_pay_wallet" id="ok_pay_wallet" value="<?= isset($user_data->ok_pay_wallet) ? $user_data->ok_pay_wallet : my_set_value('ok_pay_wallet') ?>" class="validate[required]" /></td>
					</tr>
					<tr>
						<th>&nbsp;</th>
						<td>&nbsp;</td>
						<th><?php echo lang('pm_wallet');?><span>*</span><span><?php echo lang('example');?>: U3251789</span></th>
						<td><input type="text" name="pm_wallet" id="pm_wallet" value="<?= isset($user_data->pm_wallet) ? $user_data->pm_wallet : my_set_value('pm_wallet') ?>" class="validate[required]" /></td>
					</tr>
					<tr>
						<td colspan="4" align="center"><button style="margin-left:1090px;" type="submit" class="btn btn-warning"/>Submit</button></td>
					</tr>
				</table>
			  </div>
             
              
             
          </div>
		</form> 
      </div>
      
  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<?php
	$ci =& get_instance();
	if(strtolower($ci->config->item('language')) == 'english')
	{
?>
<script src="/media/js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<?php
	}
	else
	{
?>
<script src="/media/js/jquery.validationEngine-ru.js" type="text/javascript" charset="utf-8"></script>
<?php
	}
?>
<script src="/media/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script>
	$(document).ready(function(){
		//$("#registration-form").validationEngine('attach');
	   });
</script>
    <script src="/media/js/bootstrap.min.js"></script>
    <script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
  <script type="text/javascript">
tinymce.init({
    selector: "textarea"
 });
</script>
  </body>
</html>