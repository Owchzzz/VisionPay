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
	<h1>Вопрос-Ответ</h1>
	</div>
	</div>
	<div class="section_page_big">
<?php
	if(count($faqs_data) > 0)
	{
?>
		<ul class="ul_faqs">
<?php
		foreach($faqs_data as $faq)
		{
?>
			<li>
				<h4><?php echo $faq->question; ?></h4>
				<span><?php echo $faq->answer; ?></span>
			</li>
<?php
		}
?>
		</ul>
<?php
	}
	else
	{
		echo '<p style="color:#FF0000; font-weight:bold;">'.lang('msg_no_faqs_found').'</p>';
	}
?>
	
	
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
