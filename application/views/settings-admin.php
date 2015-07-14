<?php $this->load->view('admin-header'); ?>

      <div class="container">
          <div class="row">
              <div class="span4">
                  <form class="form-horizontal" action="/admin/site_settings" method="post">
                      <h3>Site Settings</h3><hr />
					  <?php echo $form_submit_message; ?>
					  <table border="0" cellspacing="0" cellpadding="4">
<?php
	foreach($settings as $key => $value)
	{
?>
						<tr>
							<th><?php echo $key; ?>:&nbsp;</th>
							<td><input type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>" size="100" maxlength="300" value="<?php echo $value; ?>" /></td>
						</tr>
<?php
	}
?>
						</table>
						<br/><br/>
                      <button style="margin-left:1090px;" type="submit" class="btn btn-warning"/>Submit</button>
                  </form>

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