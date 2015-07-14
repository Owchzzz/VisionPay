<?php $this->load->view('header'); ?>
		<!--header-->
	</div>
	<div class="div_lang">
		<ul>
			<li><?php $this->load->view('google_translate'); ?></li>
		</ul>
		<?php $this->load->view('userbar'); ?>
		<div class="section_head">
		<div class="article_head">
			<h1><?php echo lang('edit_payment_systems');?></h1>
		</div>
	</div>
	<div class="section_page">
		<form action="/user/change_fin_system" method="post" name="frm_change_fin_system" id="frm_change_fin_system">
		
			<?php echo validation_errors(); ?>
			<?php echo $form_submit_message; ?>
		
			<label><?php echo lang('current_financial_password');?><span>*</span></label>
			<input type="password" name="fin_password" id="fin_password" class="validate[required]" />
			<label><?php echo lang('purse');?> OKPAY<span>*</span></label>
			<input type="text" name="ok_pay_wallet" id="ok_pay_wallet" value="<?php echo my_set_value('ok_pay_wallet', $ok_pay_wallet); ?>" class="validate[required]" />
			<label><?php echo lang('purse');?> ПМ <span>*</span></label>
			<input type="text" name="pm_wallet" id="pm_wallet" value="<?php echo my_set_value('pm_wallet', $pm_wallet); ?>" class="validate[required]" />
			<p class="p_objaz">* <?php echo lang('required_fields');?></p>
			<input type="submit" value="<?php echo lang('save');?>" />
		</form>
		<div class="div_warning">
			<h6><?php echo lang('attention');?>! <?php echo lang('must_be_confirmed');?>!</h6>
			<em><?php echo lang('letter_sent_with_a_link');?>!</em> </div>
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
		$("#frm_change_fin_system").validationEngine('attach');
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
