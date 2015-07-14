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
			<h1><?php echo lang('banners');?></h1>
		
		</div>
	</div>
	<div class="section_page_big">
		<?php $this->load->view('left_menu'); ?>
		<div class="art_cab_right">
			<!--<h3><?php echo lang('banners');?> <span>125x125</span></h3>
			<img src="/media/images/ban_150.jpg" alt="" />
			<p class="p_cod">&lt;a href="http://www.resource.ru" target="_blank" &gt;&lt;img src="http://www.your_site.ru/images/000000001.gif" border="0" width="468" height="63" alt="" /&gt;&lt;/a&gt;</p>
			<img src="/media/images/ban_150.jpg" alt="" />
			<p class="p_cod">&lt;a href="http://www.resource.ru" target="_blank" &gt;&lt;img src="http://www.your_site.ru/images/000000001.gif" border="0" width="468" height="63" alt="" /&gt;&lt;/a&gt;</p>
			<img src="/media/images/ban_150.jpg" alt="" />
			<p class="p_cod">&lt;a href="http://www.resource.ru" target="_blank" &gt;&lt;img src="http://www.your_site.ru/images/000000001.gif" border="0" width="468" height="63" alt="" /&gt;&lt;/a&gt;</p>
			<h3><?php echo lang('banners');?> <span>468X60</span></h3>
			<img src="/media/images/ban_468.jpg" alt="" />
			<p class="p_cod">&lt;a href="http://www.resource.ru" target="_blank" &gt;&lt;img src="http://www.your_site.ru/images/000000001.gif" border="0" width="468" height="63" alt="" /&gt;&lt;/a&gt;</p>
			<img src="/media/images/ban_468.jpg" alt="" />
			<p class="p_cod">&lt;a href="http://www.resource.ru" target="_blank" &gt;&lt;img src="http://www.your_site.ru/images/000000001.gif" border="0" width="468" height="63" alt="" /&gt;&lt;/a&gt;</p>
			<img src="/media/images/ban_468.jpg" alt="" />
			<p class="p_cod">&lt;a href="http://www.resource.ru" target="_blank" &gt;&lt;img src="http://www.your_site.ru/images/000000001.gif" border="0" width="468" height="63" alt="" /&gt;&lt;/a&gt;</p>
			<h3><?php echo lang('banners');?> <span>728х90</span></h3>
			<img src="/media/images/ban_728.jpg" alt="" />
			<p class="p_cod">&lt;a href="http://www.resource.ru" target="_blank" &gt;&lt;img src="http://www.your_site.ru/images/000000001.gif" border="0" width="468" height="63" alt="" /&gt;&lt;/a&gt;</p>
			<img src="/media/images/ban_728.jpg" alt="" />
			<p class="p_cod">&lt;a href="http://www.resource.ru" target="_blank" &gt;&lt;img src="http://www.your_site.ru/images/000000001.gif" border="0" width="468" height="63" alt="" /&gt;&lt;/a&gt;</p>
			<img src="/media/images/ban_728.jpg" alt="" />
			<p class="p_cod">&lt;a href="http://www.resource.ru" target="_blank" &gt;&lt;img src="http://www.your_site.ru/images/000000001.gif" border="0" width="468" height="63" alt="" /&gt;&lt;/a&gt;</p>
		--><?php echo $output;?></div>
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
<script type="text/javascript" src="/media/js/js.js"></script>
</body>
</html>
