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
			<h1><?php echo lang('partners');?></h1>
		</div>
	</div>
	
	<div class="section_page_big">
		<ul class="ul_partner">
<li><span>№</span><span><?php echo lang('first_name_last_name');?></span><span><?php echo lang('your_username');?></span><span><?php echo lang('programs');?></span><span><?php echo lang('email');?></span><span>Skype</span></li>
<li><span>1</span><span>Сергей Антонов</span><span><a href="#"><?php echo lang('pay_for_1_line');?></a></span><span>« <?php echo lang('the_name_of_the_program');?> »</span><span><a href="mailto:antonov_s@mail.ru">antonov_s@mail.ru</a></span><span>antonov_s</span></li>
<li><span>2</span><span>Людмила Кононенко</span><span><a href="#"><?php echo lang('pay_for_1_line');?></a></span><span>« <?php echo lang('the_name_of_the_program');?> »</span><span><a href="mailto:liuytrdsa@gmail.com">liuytrdsa@gmail.com</a></span><span>liuytrdsa</span></li>
<li><span>3</span><span>Юрий Разинков</span><span><a href="#"><?php echo lang('pay_for_1_line');?></a></span><span>« <?php echo lang('the_name_of_the_program');?> »</span><span><a href="mailto:tonov_54@mail.ru">tonov_54@mail.ru</a></span><span>tonov54</span></li>
	</ul>
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
