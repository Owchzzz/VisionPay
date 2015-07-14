<?php $this->load->view('header'); ?>
		<!--header-->
	</div>
	<div class="div_lang">
		<ul>
			<li><a href="#"><img src="/media/images/flag_r.jpg" alt="" /><span><?php echo lang('russian');?></span></a></li>
			<li><a href="#"><img src="/media/images/flag_p.jpg" alt="" /><span><?php echo lang('polish');?></span></a></li>
			<li><a href="#"><img src="/media/images/flag_i.jpg" alt="" /><span><?php echo lang('italian');?></span></a></li>
			<li><a href="#"><img src="/media/images/flag_f.jpg" alt="" /><span><?php echo lang('french');?></span></a></li>
			<li><a href="#"><img src="/media/images/flag_r.jpg" alt="" /><span><?php echo lang('german');?></span></a></li>
		</ul>
		<?php $this->load->view('userbar'); ?>
		<div class="section_head">
		<div class="article_head">
			<h1><?php echo lang('financial_change_password');?></h1>
		</div>
	</div>
	<div class="section_page">
		<form action="/user/change_fin_password" method="post" name="frm_change_fin_password" id="frm_change_fin_password">
			
			<?php echo validation_errors(); ?>
			<?php echo $form_submit_message; ?>
			
			<label><?php echo lang('current_financial_password');?><span>*</span></label>
			<input type="password" name="fin_password" id="fin_password" class="validate[required]" />
			<label><?php echo lang('new_financial_password');?><span>*</span></label>
			<input type="password" name="new_fin_password" id="new_fin_password" class="validate[required]" />
			<label><?php echo lang('repeat_new_password_financial');?> <span>*</span></label>
			<input type="password" name="confirm_fin_password" id="confirm_fin_password" class="validate[required, equals[new_fin_password]]" />
			<label><?php echo lang('password_entry');?><span>*</span></label>
			<input type="password" name="password" id="password" class="validate[required]" />
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
		$("#frm_change_fin_password").validationEngine('attach');
	   });
</script>
<script type="text/javascript" src="/media/js/coin-slider.js"></script>
<script type="text/javascript">
$('#coin-slider').coinslider();
</script>
<script type="text/javascript" src="js/jquery.jcarousel.js"></script>
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
