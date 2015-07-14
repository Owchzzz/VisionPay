<?php $this->load->view('header'); ?>
		<!--header--></div>
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
	<h2><?php echo lang('news');?></h2>
	</div>
	</div>
	<div class="section_page_big">
	<div class="news_1">
	<img src="<?php echo $image;?>" alt="" />
	<p class="p_date"><?php echo $date;?></p>
	<h1><?php echo $title;?></h1>
	<?php echo $content;?>.
	<a href="#" class="link_test"><?php echo lang('all_news');?></a>
	</div>
	
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
