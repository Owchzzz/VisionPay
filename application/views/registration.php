<?php
$this->load->view('header'); ?>
<!--header-->
	</div>
	<div class="div_lang">
		<ul>
			<li><?php $this->load->view('google_translate'); ?></li>
		</ul>
		<?php $this->load->view('userbar'); ?>
	
	<div class="section_head">
	<div class="article_head">
	<h1><?php echo lang('registration');?></h1>
	</div>
	</div>
	<div class="section_page_big">
	
<form id="registration-form" action="/user/register" method="post" class="form_registr">

<?php echo validation_errors(); ?>
<?php echo $form_submit_message; ?>
<?php //print_r($_POST); ?>

<div class="div_form_1 mr_138">
<label><?php echo lang('name');?><span>*</span></label><input type="text" name="first_name" id="first_name" value="<?php echo my_set_value('first_name'); ?>" class="validate[required]" />
<label><?php echo lang('family');?><span>*</span></label><input type="text" name="last_name" id="last_name" value="<?php echo my_set_value('last_name'); ?>" class="validate[required]" />
<label><?php echo lang('email');?><span>*</span></label><input type="text" name="email" id="email" value="<?php echo my_set_value('email'); ?>" class="validate[required, custom[email], ajax[ajaxEmailCallPhp]]" />
<label class="lab_2"><?php echo lang('phone_number');?><span>*</span><span><?php echo lang('in_international_format'); ?></span></label><input type="text" name="phone" id="phone" value="<?php echo my_set_value('phone'); ?>" class="validate[required, custom[phone]]" />
<label>Skype<span>&nbsp;&nbsp;</span></label><input type="text" name="skype" id="skype" value="<?php echo my_set_value('skype'); ?>" />
<label><?php echo lang('country');?><span>*</span></label><input type="text" name="country" id="country" value="<?php echo my_set_value('country'); ?>" class="validate[required]" />
<label><?php echo lang('city');?><span>*</span></label><input type="text" name="city" id="city" value="<?php echo my_set_value('city'); ?>" class="validate[required]" />
<label><?php echo lang('street');?><span>*</span></label><input type="text" name="street" id="street" value="<?php echo my_set_value('street'); ?>" class="validate[required]" />
</div>
<div class="div_form_1">
<label><?php echo lang('house');?><span>*</span></label><input type="text" name="house" id="house" value="<?php echo my_set_value('house'); ?>" class="validate[required]" />
<label><?php echo lang('flat');?><span>&nbsp;&nbsp;</span></label><input type="text" name="flat" id="flat" value="<?php echo my_set_value('flat'); ?>" />
<label><?php echo lang('post_code');?><span>*</span></label><input type="text" name="post_code" id="post_code" value="<?php echo my_set_value('post_code'); ?>" class="validate[required]" />
<?php
	if($sponsor_login == null)
	{
?>
<label><?php echo lang('sponsor_login');?><span>*</span></label><input type="text" name="sponsor_login" id="sponsor_login" value="<?php echo my_set_value('sponsor_login'); ?>" class="validate[required, ajax[ajaxSponsorAvailablePhp]]" />
<?php
	}
	else
	{
?>
<label><?php echo lang('sponsor_login');?><span>*</span></label><input type="text" name="sponsor_login" id="sponsor_login" readonly="readonly" value="<?php echo $sponsor_login; ?>" />
<?php
	}
?>
<label><?php echo lang('your_login');?><span>*</span></label><input type="text" name="login" id="login" value="<?php echo my_set_value('login'); ?>" class="validate[required, ajax[ajaxUserCallPhp]]" />
<label><?php echo lang('password');?><span>*</span></label><input type="password" name="password" id="password" class="validate[required]" />
<label><?php echo lang('confirm_password');?><span>*</span></label><input type="password" name="confirm_password" id="confirm_password" class="validate[required, equals[password]]" />
<label><?php echo lang('financial_password');?><span>*</span></label><input type="password" name="fin_password" id="fin_password" class="validate[required]" />
<label><?php echo lang('confirm_password');?><span>*</span></label><input type="password" name="confirm_fin_password" id="confirm_fin_password" class="validate[required, equals[fin_password]]" />
<label class="lab_2"><?php echo lang('okpay_wallet');?><span>*</span><span><?php echo lang('example');?>: OK123456789</span></label><input type="text" name="ok_pay_wallet" id="ok_pay_wallet" value="<?php echo my_set_value('ok_pay_wallet'); ?>" class="validate[required]" />
<label class="lab_2"><?php echo lang('pm_wallet');?><span>*</span><span><?php echo lang('example');?>: U3251789</span></label><input type="text" name="pm_wallet" id="pm_wallet" value="<?php echo my_set_value('pm_wallet'); ?>" class="validate[required]" />
<div class="cL"></div>
<input type="checkbox" id="check1" name="check1" class="styled" /><label for="check1" class="lab_10">Полностью согласен с <a href="/user/terms_conditions" target="_blank">Условиями</a> 
участия в Клубе</label>
<div class="cL"></div>
<p class="p_objaz">* <?php echo lang('required_fields'); ?></p>
<input type="submit" value="<?php echo lang('become_partner');?>"/>
</div>
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
		$("#registration-form").validationEngine('attach');
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
<script src="/media/js/jquery.colorbox-min.js" type="text/javascript"></script>
<script type="text/javascript">
        $(document).ready(function () {
                  $(".carousel_2 a").colorbox();
        });
    </script>
	<script type="text/javascript" src="/media/js/test.js"></script>
<script type="text/javascript" src="/media/js/js.js"></script>
</body>
</html>
