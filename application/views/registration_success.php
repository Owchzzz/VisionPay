<?php $this->load->view('header'); ?>
		<!--header-->
	</div>
	<div class="div_lang">
		<ul>
			<li><?php $this->load->view('google_translate'); ?></li>
		</ul>
		<span><a href="#" class="link_vchod"  style="display:none;"></a><a href="#" class="link_vuhod"></a></span> <span><a href="#" class="link_profil"></a><a href="#" class="link_registr"  style="display:none;"></a></span> </div>
	<div class="section_head">
		<div class="article_head">
			<h1><?php echo lang('registration');?></h1>
		</div>
	</div>
	<div class="section_page">
		<p>
			We have sent you a cofirmation email on: <b><?php echo $email ?></b>
			<br/>
			If you have not received any email, click on the button below to resend confirmation email
			<br/><br/>
			<a href="/user/resend_email/<?php echo md5($email); ?>">
				<button type="button">Resend Email</button>
			</a>
			<br/><br/>
			If the above email address is incorrect, please update it using the form below
		</p>
		<form action="/user/update_email/<?php echo md5($email); ?>" method="post" name="frm_change_email" id="frm_change_email">
		
			<?php echo validation_errors(); ?>
			<?php echo $form_submit_message; ?>
		
			<label><?php echo lang('email');?> <span>*</span></label>
			<input type="text" name="email" id="email" value="<?php echo my_set_value('email', $email); ?>" class="validate[required, custom[email], ajax[ajaxEmailCallPhp]]" />
			<p class="p_objaz">* <?php echo lang('required_fields');?></p>
			<input type="submit" value="<?php echo lang('save');?>" />
		</form>
	</div>
	<div class="hfooter"></div>
</div>
<!--main-->
<?php $this->load->view('footer'); ?>
<!--footer-->
<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<!-- <script type="text/javascript" src="/media/js/jquery.js"></script> -->
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
		$("#frm_change_email").validationEngine('attach');
	   });
</script>
<script type="text/javascript" src="/media/js/coin-slider.js"></script>
<script type="text/javascript">
$('#coin-slider').coinslider();
</script>
<script type="text/javascript" src="/media/js/jquery.jcarousel.js"></script>
<script type="text/javascript">
jQuery(document).ready(function() {
	jQuery('.d-carousel .carousel').jcarousel({
        scroll: 1
    });
	jQuery('.d-carousel .carousel_2').jcarousel({
        scroll: 1
    });
});
</script>
<script src="js/jquery.colorbox-min.js" type="text/javascript"></script>
<script type="text/javascript">
        $(document).ready(function () {
                  $(".carousel_2 a").colorbox();
        });
    </script>
<script type="text/javascript" src="/media/js/js.js"></script>
</body>
</html>
