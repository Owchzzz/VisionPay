<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<title><?php echo lang('debating_club');?></title>
<link href="/media/css/style.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,800&amp;subset=latin,cyrillic-ext' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="main_page">
	<div class="header">
		<div class="conteiner"> <a href="index.html"><img src="/media/images/logo.png" alt="" class="logo" /></a>
			<ul class="nav">
				<li><a href="index.html"><?php echo lang('dream_club');?></a></li>
				<li><a href="#"><?php echo lang('programs');?></a></li>
				<li><a href="#"><?php echo lang('news');?></a></li>
				<li><a href="faqs.html"><?php echo lang('question_and_answer');?></a></li>
				<li><a href="testimonials.html"><?php echo lang('reviews');?></a></li>
				<li><a href="contacts.html"><?php echo lang('contacts');?></a></li>
			</ul>
		</div>
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
			<h1><?php echo lang('withdrawal');?></h1>
		</div>
	</div>
	<div class="section_page_big">
	<div class="cnt">
	<p><?php echo lang('minimum_withdrawal');?> 30$.</p>
<p><?php echo lang('commission_for_the_withdrawal');?> </p>
<p><?php echo lang('withdrawals_will_be_carried');?>.</p>
	
	</div>
	</div>
	<div class="section_page">
	<p class="p_chet"><?php echo lang('purse');?> OKPAY: <span><?php echo $okpayinfo;?></span><em><?php echo lang('or');?></em><?php echo lang('purse ');?> ПМ:<span><?php echo $perfectmoneyinfo;?></span></p>
		<form action="/user/withdraw_finance/" method="post" class="form_finance">
			<label><?php echo lang('amount');?>:<span>*</span></label>
			<input type="text" value="" name="amt"/>
			<label><?php echo lang('financial_password');?>:<span>*</span></label>
			<input type="password" value="" name="financialpass"/>
			
			<p class="p_objaz">* <?php echo lang('required_fields');?></p>
			<input type="submit" value="<?php echo lang('submit');?>" />
		</form>
        
	<div class="section_page_big" style="margin-left:-250px;">
		<ul class="ul_finance_2">
<li><span><?php echo lang('date');?></span><span><?php echo lang('recipient');?></span><span><?php echo lang('amount ');?></span><span><?php echo lang('status');?></span></li>
<!--<li><span><?php echo lang('date');?></span><span><?php echo lang('recipient');?></span><span><?php echo lang('amount ');?></span><span><?php echo lang('status');?></span></li>
<li><span><?php echo lang('date');?></span><span><?php echo lang('recipient');?></span><span><?php echo lang('amount ');?></span><span><?php echo lang('status');?></span></li>
<li><span><?php echo lang('date');?></span><span><?php echo lang('recipient');?></span><span><?php echo lang('amount ');?></span><span><?php echo lang('status');?></span></li>
	--><?php echo $recent_transactions;?></ul>
	</div>
	<div class="hfooter"></div>
</div>
<!--main-->
<div class="footer">
<div class="foot_top">
</div>
<div class="foot_bottom">
	<div class="foot">
		<div class="foot_1"> <a href="index.html"><img src="/media/images/logo_f.png" alt="" /></a>
			<p class="copy">©2013 Все права защищены. </p>
			<ul class="ul_soc_f">
				<li><a href="#"></a></li>
				<li><a href="#"></a></li>
				<li><a href="#"></a></li>
				<li><a href="#"></a></li>
				<li><a href="#"></a></li>
				<li><a href="#"></a></li>
			</ul>
		</div>
		<div class="foot_1">
			<h3>Навигация</h3>
			<ul class="nav_f">
				<li><a href="#">Наш Клуб</a></li>
				<li><a href="faqs.html">Вопрос-ответ</a></li>
				<li><a href="#">Программы</a></li>
				<li><a href="testimonials.html">Отзывы</a></li>
				<li><a href="#">Новости</a></li>
				<li><a href="contacts.html">Контакты</a></li>
			</ul>
		</div>
		<div class="foot_2">
			<h3>Программы</h3>
			<ul class="ul_prog">
				<li><a href="#"><img src="/media/images/fot_pic_1.jpg"  alt="" /><span>Мечты сбываются</span></a></li>
				<li><a href="#"><img src="/media/images/fot_pic_2.jpg"  alt="" /><span>Шаг к<br /> Мечте</span></a></li>
			</ul>
		</div>
		<div class="foot_3"> <a href="#"><img src="/media/images/firma_1.png" alt="" /></a> <a href="#"><img src="/media/images/firma_2.png" alt="" /></a> </div>
	</div>
</div>
</div>
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
<script type="text/javascript" src="/media/js/js.js"></script>
</body>
</html>
