<?php $this->load->view('header'); ?>
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
	<h1>Программа “<?php echo $program_data->program_title; ?>”</h1>
	</div>
	</div>
	<div class="section_page_big">
	<div class="news_1">
	<img src="<?php echo $program_data->intro_image; ?>" alt="" />
<h2>Программа “<?php echo $program_data->program_title; ?>”</h2>

<?php echo $program_data->detailed_text; ?>
	
	</div>
<!--
	<div class="section_home_4">
		<div class="conteiner_home_4">
			<h3>Преимущества программы</h3>
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
-->
	
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
<script type="text/javascript" src="/media/js/js.js"></script>
</body>
</html>
