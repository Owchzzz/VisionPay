<?php $this->load->view('admin-header'); ?>

      <div class="container">
          <div class="row">
              <div class="span4">
                  <form class="form-horizontal" action="/admin/add_edit_faqs/<?php echo $this->uri->segment(3);?>" method="post" enctype="multipart/form-data">
                      <h3>
						<?php
							if($this->uri->segment(3) == 0)
								echo 'Add Question';
							else
								echo 'Edit Question';
						?>
					  </h3><hr />
                      <label><?php echo lang('faq_question'); ?>: </label> 
					  <input type="text" name="question" id="question" size="100" maxlength="300" value="<?= isset($faq->question) ? $faq->question : my_set_value('question') ?>" /><br /><br />
					  <label><?php echo lang('faq_answer'); ?>: </label>
                      <textarea style="margin-left:35px;" name="answer" id="answer" rows="5" cols="185"><?= isset($faq->answer) ? $faq->answer : my_set_value('answer') ?></textarea><br /><br />
					  <label><?php echo lang('faq_order'); ?>: </label> 
					  <input type="text" name="order" id="order" value="<?= isset($faq->order) ? $faq->order : my_set_value('order') ?>" /><br /><br />
					  <label><?php echo lang('status'); ?>: </label> 
<?php
	$options = array(
                  '1' => lang('show'),
                  '0' => lang('hide'),
                );
	$selected_value = isset($faq->status) ? $faq->status : my_set_value('status');
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