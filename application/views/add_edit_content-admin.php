<?php $this->load->view('admin-header'); ?>

      <div class="container">
          <div class="row">
              <div class="span4">
                  <form class="form-horizontal" action="/admin/<?php echo $form_action; ?>" method="post" enctype="multipart/form-data">
                      <h3><?php echo $form_title; ?></h3>
					  <hr />
					  <?php echo $form_submit_message; ?>
                      <label><?php echo lang('title_content'); ?>: </label> 
					  <input type="text" name="title" id="title" size="100" maxlength="1000" value="<?= isset($terms_conditions->title) ? $terms_conditions->title : my_set_value('title') ?>" /><br /><br />
					  <label><?php echo lang('preview'); ?>: </label>
                      <textarea style="margin-left:35px;" name="preview" id="preview" rows="5" cols="185"><?= isset($terms_conditions->preview) ? $terms_conditions->preview : my_set_value('preview') ?></textarea><br /><br />
					  <label><?php echo lang('content'); ?>: </label>
                      <textarea style="margin-left:35px;" name="content" id="content" rows="5" cols="185"><?= isset($terms_conditions->content) ? $terms_conditions->content : my_set_value('content') ?></textarea><br /><br />
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