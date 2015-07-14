<?php $this->load->view('header'); ?>
		<!--header-->
	</div>
	<div class="div_lang">
		<ul>
			<li><a href="#"><img src="/media/images/flag_r.jpg" alt="" /><span>русский</span></a></li>
			<li><a href="#"><img src="/media/images/flag_p.jpg" alt="" /><span>польский</span></a></li>
			<li><a href="#"><img src="/media/images/flag_i.jpg" alt="" /><span>итальянский</span></a></li>
			<li><a href="#"><img src="/media/images/flag_f.jpg" alt="" /><span>французский</span></a></li>
			<li><a href="#"><img src="/media/images/flag_r.jpg" alt="" /><span>немецкий</span></a></li>
		</ul>
		<?php $this->load->view('userbar'); ?>
		<div class="section_head">
		<div class="article_head">
			<h1><?php echo lang('payment_enter');?></h1>
		</div>
	</div>
	<div class="section_page">
		<div class="section_paym">
		
		<div>
		<h3><?php echo lang('dreams_come_true');?></h3>
		<p><?php echo lang('savings_program');?></p>
		<p>$ <b><?php echo program1_fee; ?></b></p>
<form action="/user/methodpay/prog1/<?php echo $email;?>" method="post" class="form_paym">
	<select  class="selectBlock" name="paymentmethod">
			<option value="0">PerfectMoney</option>
			<option value="1">OKPay</option>
</select>
    <input type="hidden" name="type" value="0" />
<input type="submit" value="<?php echo lang('pay');?>" />
</form>
</div>
<div><h3> <?php echo lang('step_towards_the_dream');?></h3>
		<p><?php echo lang('matrix_sex');?></p>
<form action="/user/methodpay/prog2/<?php echo $email;?>" method="post" class="form_paym">
<select  class="selectBlock" name="type">
		<option value="0">М1 - <?php echo program2_fee_0; ?></option>
			<option value="1">М2 - <?php echo program2_fee_1; ?></option>
			<option value="2">М3 - <?php echo program2_fee_2; ?></option>
			<option value="3">М4 - <?php echo program2_fee_3; ?></option>
			<option value="4">М5 - <?php echo program2_fee_4; ?></option>
</select>
	
<select  class="selectBlock" name="paymentmethod">
			<option value="0">PerfectMoney</option>
			<option value="1">OKPay</option>
</select>	
<input type="submit" value="<?php echo lang('pay');?>" />
</form>
</div>
		</div>
		
		</div>
	
	<div class="hfooter"></div>
</div>
<!--main-->
<?php $this->load->view('footer'); ?>
<!--footer-->
<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="/media/js/jquery.js"></script>
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
	<script type="text/javascript" src="/media/js/select.js"></script>
<script type="text/javascript">$(document).ready(function(){$('.selectBlock').sSelect();});</script>
<script type="text/javascript" src="/media/js/js.js"></script>
</body>
</html>