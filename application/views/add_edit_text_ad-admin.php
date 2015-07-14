<?php $this->load->view('admin-header'); ?>

      <div class="container">
          <div class="row">
              <div class="span4">
                  <form class="form-horizontal" action="/admin/add_edit_text_ad/<?php echo $this->uri->segment(3);?>" method="post" enctype="multipart/form-data">
					  <input type="hidden" name="last_updated_on" id="last_updated_on" value="<?php echo date('Y-m-d H:i:s'); ?>" />
                      <h3>
						<?php
							if($this->uri->segment(3) == 0)
								echo 'Add Text Ad';
							else
								echo 'Edit Text Ad';
						?>
					  </h3><hr />
                      <label><?php echo lang('ad_title'); ?>: </label> 
					  <input type="text" name="title" id="title" size="100" maxlength="200" value="<?= isset($ad_details->title) ? $ad_details->title : my_set_value('title') ?>" /><br /><br />
					  <label><?php echo lang('ad_text'); ?>: </label>
                      <textarea style="margin-left:35px;" name="text" id="text" rows="5" cols="185"><?= isset($ad_details->text) ? $ad_details->text : my_set_value('text') ?></textarea><br /><br />
					  <label><?php echo lang('status'); ?>: </label> 
<?php
	$options = array(
                  '1' => lang('show'),
                  '0' => lang('hide'),
                );
	$selected_value = isset($ad_details->status) ? $ad_details->status : my_set_value('status');
	echo form_dropdown('status', $options, $selected_value);
?><br /><br />
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