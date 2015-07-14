<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta name="okpay-verification" content="f4f65518-1301-48cd-b9de-a4ca3a32d59a" />
<title><?php echo lang('debating_club');?></title>
<link href="/media/css/style.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,800&amp;subset=latin,cyrillic-ext' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="main">
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
	
	<div class="slayd">
		<div class="sliderContainer">
			<div class="slayd_bg"></div>
			<div id="coin-slider"> <img src="/media/images/slayd_1.jpg" alt=""  /> <span><span class="span_head"><?php echo lang('believe_in_the_dream');?>!</span><span><?php echo lang('lovely_feature');?> – <span><?php echo lang('come_true');?>!</span></span></span> <img src="/media/images/slayd_2.jpg" alt=""  /> <span><span class="span_head"><?php echo lang('dreams_become_reality');?></span><span><?php echo lang('when_thoughts_turn');?><span><?php echo lang('action_in');?>!</span></span></span> </div>
		</div>
	</div>
	<div class="section_home">
		<div class="conteiner_home_1"> <img src="/media/images/pic_1.jpg" alt="" class="pic_home"/>
			<h2><?php echo lang('our_club');?></h2>
			<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feug</p>
			<a href="#"><?php echo lang('more_details');?></a> </div>
	</div>
	<div class="home_bg_1"></div>
	<div class="section_home_2">
		<div class="conteiner_home_2">
			<h2><?php echo lang('news');?><a href="news.html"><?php echo lang('all_news');?></a></h2>
			<div id="wrapper">
				<div class="d-carousel">
					<ul class="carousel">
						<!--<li> <span class="span_date">21 Окт<br />
							2012</span>
							<h4><a href="#"><?php echo lang('great_new');?>!</a></h4>
							<span>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id </span></li>
						<li> <span class="span_date">21 Окт<br />
							2012</span>
							<h4><a href="#"><?php echo lang('great_new');?>!</a></h4>
							<span>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id </span></li>
						<li> <span class="span_date">21 Окт<br />
							2012</span>
							<h4><a href="#"><?php echo lang('great_new');?>!</a></h4>
							<span>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id </span></li>
						<li> <span class="span_date">21 Окт<br />
							2012</span>
							<h4><a href="#"><?php echo lang('great_new');?>!</a></h4>
							<span>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id </span></li>
						<li> <span class="span_date">21 Окт<br />
							2012</span>
							<h4><a href="#"><?php echo lang('great_new');?>!</a></h4>
							<span>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id </span></li>
						<li> <span class="span_date">21 Окт<br />
							2012</span>
							<h4><a href="#"><?php echo lang('great_new');?>!</a></h4>
							<span>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id </span></li>
					--><?php echo $news;?></ul>
				</div>
			</div>
		</div>
	</div>
	<div class="home_bg_2"></div>
	<div class="conteiner_home_3">
		<h2><?php echo lang('reviews');?><a href="/testimonials/"><?php echo lang('all_reviews');?></a></h2>
<?php
	if(count($testimonials) > 0)
	{
?>
		<ul class="ul_testim">
<?php
		foreach($testimonials as $testimonial)
		{
?>
			<li>
				<img src="<?php echo $testimonial->picture; ?>" alt="" />
				<h5><?php echo $testimonial->first_name.' '.$testimonial->last_name; ?></h5>
				<span>"<?php echo substr($testimonial->testimonial, 0, 76).'...'; ?>"</span> 
			</li>
<?php
		}
?>
		</ul>
<?php
	}
	else
	{
		echo '<p style="color:#FF0000; font-weight:bold;">'.lang('msg_no_testimonials_found').'</p>';
	}
?>
			<li><img src="/media/images/test_home_2.jpg" alt="" />
				<h5>Александра Милс</h5>
				<span>"Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequ..."</span> </li>
			<li><img src="/media/images/test_home_3.jpg" alt="" />
				<h5>Юрий Кондратюк</h5>
				<span>"Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh..." euismod</span> </li>
		</ul>
	</div>
	<div class="section_home_4">
		<div class="conteiner_home_4">
			<h2><?php echo lang('benefits_club');?></h2>
			<p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigataus dolore te feug</p>
			<div id="wrapper_2">
				<div class="d-carousel">
					<ul class="carousel_2">
						<li><a href="/media/images/rpeim_home_1.jpg"  rel="colorbox"><img src="/media/images/rpeim_home_1.jpg" alt="" /></a></li>
						<li><a href="/media/images/rpeim_home_1.jpg"  rel="colorbox"><img src="/media/images/rpeim_home_2.jpg" alt="" /></a> </li>
						<li><a href="/media/images/rpeim_home_1.jpg"  rel="colorbox"><img src="/media/images/rpeim_home_3.jpg" alt="" /></a> </li>
						<li><a href="/media/images/rpeim_home_1.jpg"  rel="colorbox"><img src="/media/images/rpeim_home_4.jpg" alt="" /></a> </li>
						<li><a href="/media/images/rpeim_home_1.jpg"  rel="colorbox"><img src="/media/images/rpeim_home_1.jpg" alt="" /></a> </li>
						<li><a href="/media/images/rpeim_home_1.jpg"  rel="colorbox"><img src="/media/images/rpeim_home_2.jpg" alt="" /></a> </li>
						<li><a href="/media/images/rpeim_home_1.jpg"  rel="colorbox"><img src="/media/images/rpeim_home_3.jpg" alt="" /></a> </li>
						<li><a href="/media/images/rpeim_home_1.jpg"  rel="colorbox"><img src="/media/images/rpeim_home_4.jpg" alt="" /></a> </li>
					</ul>
				</div>
			</div>
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
