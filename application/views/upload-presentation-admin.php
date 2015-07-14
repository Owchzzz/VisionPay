<?php $this->load->view('admin-header'); ?>
<div class="container">
    <div class="row">
        <div class="span12">
            <form action="/admin/savepresentationupload2" method="post" enctype="multipart/form-data">
                <?php echo lang('filename');?>:<input type="file" name="file" />
                <input type="submit" />
            </form>
        </div>
    </div>
	</div>
</div>