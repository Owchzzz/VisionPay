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
			<h1><?php echo lang('contacts');?></h1>
		</div>
	</div>
	<div class="section_page_big">
		<div class="article_left">
			<h2><?php echo lang('please_contact_us_by_email');?></h2>
			<p><?php echo lang('technical_support');?>:<a href="mailto:<?php echo $settings['technical_support']; ?>"><?php echo $settings['technical_support']; ?></a></p>
			<p><?php echo lang('consultation_participants');?>:<a href="mailto:<?php echo $settings['consultation_participants']; ?>"><?php echo $settings['consultation_participants']; ?></a></p>
			<h2 class="h2_coz"><?php echo lang('social_networks');?></h2>
			<ul class="coz_page">
				<li <?php if($settings['facebook'] == '#' || $settings['facebook'] == '') echo 'style="display:none"'; ?>><a href="<?php echo $settings['facebook']; ?>"></a></li>
				<li <?php if($settings['twitter'] == '#' || $settings['twitter'] == '') echo 'style="display:none"'; ?>><a href="<?php echo $settings['twitter']; ?>"></a></li>
				<li <?php if($settings['google_plus'] == '#' || $settings['google_plus'] == '') echo 'style="display:none"'; ?>><a href="<?php echo $settings['google_plus']; ?>"></a></li>
				<li <?php if($settings['pinterest'] == '#' || $settings['pinterest'] == '') echo 'style="display:none"'; ?>><a href="<?php echo $settings['pinterest']; ?>"></a></li>
				<li <?php if($settings['youtube'] == '#' || $settings['youtube'] == '') echo 'style="display:none"'; ?>><a href="<?php echo $settings['youtube']; ?>"></a></li>
				<li <?php if($settings['myspace'] == '#' || $settings['myspace'] == '') echo 'style="display:none"'; ?>><a href="<?php echo $settings['myspace']; ?>"></a></li>
			</ul>
		</div>
		<div class="article_right">
			<h2><?php echo lang('email_us_your_question');?>!</h2>
			<form action="/contacts/" method="post" class="form_contact" name="frm_contact" id="frm_contact">
			
				<?php echo validation_errors(); ?>
				<?php echo $form_submit_message; ?>
			
				<label><?php echo lang('name');?><span>*</span></label>
				<input type="text" value="<?php echo my_set_value('name'); ?>" name="name" id="name" class="validate[required]" />
				<label class="lab_1"><?php echo lang('email');?><span>*</span></label>
				<input type="text" value="<?php echo my_set_value('email'); ?>" name="email" id="email" class="validate[required, custom[email]]" />
				<label><?php echo lang('text');?><span>*</span></label>
				<textarea cols="" rows="" name="message" id="message" class="validate[required]"><?php echo my_set_value('message'); ?></textarea>
				<p class="p_objaz">* <?php echo lang('required_fields');?></p>
				<input type="submit" value="<?php echo lang('submit');?>" />
			</form>
		</div>
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
		$("#frm_contact").validationEngine('attach');
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
