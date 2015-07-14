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
	<h1>Программы</h1>
	</div>
	</div>
	<div class="section_page_big">
	<div class="news_1">
<?php
	if(count($programs) > 0)
	{
		foreach($programs as $program)
		{
?>
	<div class="div_prog">
	<img src="<?php echo $program->intro_image; ?>" alt="" />
<h2>Программа “<?php echo $program->program_title; ?>”</h2>
<?php echo $program->intro_text; ?>
<p><a href="/programs/details/<?php echo $program->program_id; ?>">Подробнее</a></p>
</div>
<?php
		}
	}
	else
	{
		echo '<p style="color:#FF0000; font-weight:bold;">'.lang('msg_no_programs_found').'</p>';
	}
?>
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
<script type="text/javascript" src="/media/js/js.js"></script>
</body>
</html>
