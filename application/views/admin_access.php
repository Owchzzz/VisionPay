<div class='container'>
    <div class='span12'>
        <form class="form-horizontal" method='post' action='/admin/changeuserpass/'>
<fieldset>

<!-- Form Name -->
<legend><?php echo lang('administration');?></legend>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="login"><?php echo lang('login');?></label>
  <div class="controls">
    <input id="login" name="login" type="text" placeholder="" value='<?php echo $login;?>'class="input-xlarge">
    
  </div>
</div>

<!-- Password input-->
<div class="control-group">
  <label class="control-label" for="password"><?php echo lang('password');?></label>
  <div class="controls">
    <input id="password" name="pass" type="password" placeholder="" value='<?php echo $password;?>'class="input-xlarge" required="">
    
  </div>
</div>
<button type='submit' class='btn btn-warning'><?php echo lang('submit');?></button>
</fieldset>
</form>

    </div>
</div>