<?php $this->load->view('admin-header'); ?>

      <div class="container">
          <div class="row">
              <div class="span4">
                  <form class="form-horizontal" action="/admin/add_edit_presentation_image/<?php echo $this->uri->segment(3);?>" method="post" enctype="multipart/form-data">
					  <input type="hidden" name="added_on" id="added_on" value="<?php echo date('Y-m-d H:i:s'); ?>" />
                      <h3>
						<?php
							if($this->uri->segment(3) == 0)
								echo 'Add Presentation Slide Image';
							else
								echo 'Edit Presentation Slide Image';
						?>
					  </h3><hr />
                      <label><?php echo lang('image_caption'); ?>: </label> 
					  <input type="text" name="image_caption" id="image_caption" size="100" maxlength="200" value="<?= isset($presentation_image->image_caption) ? $presentation_image->image_caption : my_set_value('image_caption') ?>" /><br /><br />
					  <label><?php echo lang('presentation_slide_image'); ?>: </label>
					  <img width="150" height="150" src="<?= isset($presentation_image->image_path) ? $presentation_image->image_path : '' ?>" class="thumb" /> (to change thumbnail upload another photo): <br /><input type="file" name="image_path" id="image_path" /> <br /> <br />
					  <label><?php echo lang('image_order'); ?>: </label> 
					  <input type="text" name="image_order" id="image_order" value="<?= isset($presentation_image->image_order) ? $presentation_image->image_order : my_set_value('image_order') ?>"/><br /><br />
					  <label><?php echo lang('status'); ?>: </label> 
<?php
	$options = array(
                  '1' => lang('show'),
                  '0' => lang('hide'),
                );
	$selected_value = isset($presentation_image->status) ? $presentation_image->status : my_set_value('status');
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