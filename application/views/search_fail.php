<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<title>Дискуссионный клуб</title>
	<link href="/media/css/style.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,800&amp;subset=latin,cyrillic-ext' rel='stylesheet' type='text/css' />
</head>

<body>
<div class="main_page">
	<div class="header">
		<div class="conteiner"> <a href="index.html"><img src="/media/images/logo.png" alt="" class="logo" /></a>
			<ul class="nav">
				<li><a href="index.html">Клуб мечта</a></li>
				<li><a href="#">Программы</a></li>
				<li><a href="#">Новости</a></li>
				<li><a href="faqs.html">Вопрос-ответ</a></li>
				<li><a href="testimonials.html">Отзывы</a></li>
				<li><a href="contacts.html">Контакты</a></li>
			</ul>
		</div>
		<!--header--></div>
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
			<h1><?php echo lang('my_office');?></h1>
			<p><?php echo lang('welcome');?>. </p>
		</div>
	</div>
	<div class="section_page_big">
		<div class="art_cab_left">
			<ul class="ul_cab">
				<li>Мой кабинет</li>
				<li><a href="#">Профиль</a></li>
				<li><a href="#">Сменить пароль</a></li>
				<li><a href="#">Сменить <br />
					финансовый пароль</a></li>
				<li><a href="#">Платежные сиcтемы</a></li>
				<li><a href="#" class="left_link">« Мечты Сбываются »</a>
					<ul>
						<li><a href="#">М1 - 750</a></li>
						<li><a href="#">М2 - 2200</a></li>
						<li><a href="#">М3 - 6600</a></li>
						<li><a href="#">М4 - 19800</a></li>
					</ul>
				</li>
				<li><a href="#" class="left_link">« Шаг к Мечте »</a>
					<ul>
						<li><a href="#">М1 - 270</a></li>
						<li><a href="#">М2 - 800</a></li>
						<li><a href="#">М3 - 2200</a></li>
						<li><a href="#">М4 - 6200</a></li>
						<li><a href="#">М5 - 17000</a></li>
					</ul>
				</li>
				<li><a href="#">Глобальная матрица</a></li>
				<li><a href="#">Финансы</a></li>
				<li><a href="#">Вывод средств</a></li>
				<li><a href="#">Партнеры</a></li>
				<li><a href="#" class="left_link">Инструменты</a>
					<ul>
						<li><a href="#">Баннеры</a></li>
						<li><a href="#">Визитки</a></li>
						<li><a href="#">Текстовая реклама</a></li>
					</ul>
				</li>
				<li><a href="#">Выйти</a></li>
			</ul>
		</div>
		<div class="art_cab_right">
	<h3><?php echo lang('not_found');?></h3>
	<p><?php echo lang('please_check');?></p>
	<form action="#" method="post" class="form_search">
	<input type="text" value="" />
		
	<input type="submit" value="<?php echo lang('login_search');?>" />
	
	</form>
			
		</div>
	</div>
	<div class="hfooter"></div>
</div>
<!--main-->

<div class="footer">
	<div class="foot_top"> </div>
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
					<li><a href="#"><img src="/media/images/fot_pic_2.jpg"  alt="" /><span>Шаг к<br />
						Мечте</span></a></li>
				</ul>
			</div>
			<div class="foot_3"> <a href="#"><img src="/media/images/firma_1.png" alt="" /></a> <a href="#"><img src="images/firma_2.png" alt="" /></a> </div>
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
<script src="js/jquery.colorbox-min.js" type="text/javascript"></script> 
<script type="text/javascript">
        $(document).ready(function () {
                  $(".carousel_2 a").colorbox();
        });
    </script> 
<script type="text/javascript" src="/media/js/js.js"></script>
</body>
</html>
