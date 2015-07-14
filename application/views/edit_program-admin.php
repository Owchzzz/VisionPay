<?php $this->load->view('admin-header'); ?>

      <div class="container">
          <div class="row">
              <div class="span4">
                  <form class="form-horizontal" action="/admin/edit_program/<?php echo $program_data->program_id;?>" method="post" enctype="multipart/form-data">
					  <input type="hidden" name="last_updated_on" id="last_updated_on" value="<?php echo date('Y-m-d H:i:s'); ?>" />
                      <h3>Edit Program</h3><hr />
                      <label><?php echo lang('program_title'); ?>: </label> 
					  <input type="text" name="program_title" id="program_title" size="100" maxlength="200" value="<?php echo my_set_value('program_title', $program_data->program_title); ?>"/><br /><br />
                      <label><?php echo lang('intro_image'); ?>: </label>
					  <img width="150" height="150" src="<?php echo $program_data->intro_image;?>" /> (to change thumbnail upload another photo): <br /><input type="file" name="intro_image" id="intro_image" /> <br /> <br />
					  <label><?php echo lang('program_intro'); ?>: </label>
                      <textarea style="margin-left:35px;" name="intro_text" id="intro_text" rows="5" cols="185"><?php echo my_set_value('intro_text', $program_data->intro_text); ?></textarea><br /><br />
					  <label><?php echo lang('program_details'); ?>: </label>
                      <textarea style="margin-left:35px;" name="detailed_text" id="detailed_text" rows="5" cols="185"><?php echo my_set_value('detailed_text', $program_data->detailed_text); ?></textarea><br /><br />
					  <label><?php echo lang('program_order'); ?>: </label> 
					  <input type="text" name="program_order" id="program_order" value="<?php echo my_set_value('program_order', $program_data->program_order); ?>"/><br /><br />
					  <label><?php echo lang('status'); ?>: </label>
					  <?php
						$options = array(
									  '1' => lang('show'),
									  '0' => lang('hide'),
									);
						$selected_value = isset($program_data->status) ? $program_data->status : my_set_value('status');
						echo form_dropdown('status', $options, $selected_value);
					  ?>
					  <br /><br />
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