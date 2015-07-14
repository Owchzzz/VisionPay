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
			<h1><?php echo lang('presentation');?></h1>
		</div>
	</div>
	<div class="section_page_big">
		<?php $this->load->view('left_menu'); ?>
		<div class="art_cab_right">
			<p><?php echo lang('presentation_desc');?></p>
<div id="showcase" class="showcase">
<?php
	if(count($presentation_images) > 0)
	{
		foreach($presentation_images as $presentation_image)
		{
?>
		<div class="showcase-slide">
			<!-- Put the slide content in a div with the class .showcase-content. -->
			<div class="showcase-content">
				<img src="<?php echo $presentation_image->image_path; ?>" alt="01" />
			</div>
			<!-- Put the thumbnail content in a div with the class .showcase-thumbnail -->
			<div class="showcase-thumbnail">
				<img src="<?php echo $presentation_image->image_path; ?>" alt="01" width="188px" />
				<!-- The div below with the class .showcase-thumbnail-caption contains the thumbnail caption. -->
				<div class="showcase-thumbnail-caption"><?php echo $presentation_image->image_caption; ?></div>
				<!-- The div below with the class .showcase-thumbnail-cover is used for the thumbnails active state. -->
				<div class="showcase-thumbnail-cover"></div>
			</div>
			<!-- Put the caption content in a div with the class .showcase-caption -->
			<div class="showcase-caption">
		
			</div>
		</div>
<?php
		}
	}// end of if(count($presentation_images) > 0)
	else
	{
		echo '<p style="color:#FF0000; font-weight:bold;">'.lang('msg_no_presentation_slide_images').'</p>';
	}// end of else of if(count($presentation_images) > 0)
?>
</div>
			
<a class="link_test_2"><?php echo lang('download_presentaion');?></a>


		</div>
		
	</div>

	<div class="hfooter"></div>
</div>
<!--main-->

<?php $this->load->view('footer'); ?>
<!--footer--> 

<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.1.min.js"></script> 
<script type="text/javascript" src="/media/js/jquery.js"></script> 




	<script type="text/javascript" src="/media/js/jquery.aw-showcase.js"></script> 
<script type="text/javascript">

$(document).ready(function()
{
	$("#showcase").awShowcase(
	{
		content_width:			607,
		content_height:			367,
		hundred_percent:		false,
		auto:					true,
		interval:				3000,
		continuous:				true,
		loading:				true,
		tooltip_width:			400,
		tooltip_icon_width:		32,
		tooltip_icon_height:	32,
		tooltip_offsetx:		18,
		tooltip_offsety:		0,
		arrows:					true,
		buttons:				true,
		btn_numbers:			true,
		keybord_keys:			true,
		mousetrace:				false,
		pauseonover:			true,
		transition:				'hslide', /* hslide/vslide/fade */
		transition_delay:		300,
		transition_speed:		500,
		show_caption:			'onhover', /* onload/onhover/show */
		thumbnails:				true,
		thumbnails_position:	'outside-last', /* outside-last/outside-first/inside-last/inside-first */
		thumbnails_direction:	'horizontal', /* vertical/horizontal */
		thumbnails_slidex:		0, /* 0 = auto / 1 = slide one thumbnail / 2 = slide two thumbnails / etc. */
		dynamic_height:			false,
		speed_change:			true,
		viewline:				false
	});
});

</script>
<script type="text/javascript" src="/media/js/js.js"></script>
</body>
</html>
