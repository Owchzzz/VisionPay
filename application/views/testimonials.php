<?php $this->load->view('header'); ?>
		<!--header-->
	</div>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="/media/js/jquery.thumbs.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".thumb").thumbs();
	});
</script>
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
			<h1>Отзывы</h1>
		</div>
	</div>
	<div class="section_page_big">
	<?php echo $form_submit_message; ?>
	<?php echo validation_errors(); ?>
<?php
	if(count($testimonials) > 0)
	{
?>
		<ul class="ul_testimonials">
<?php
		foreach($testimonials as $testimonial)
		{
?>
			<li>
				<img src="<?php echo $testimonial->picture; ?>" class="thumb" alt="" width="123" height="123" />
				<h4><?php echo $testimonial->first_name.' '.$testimonial->last_name; ?> <span><?php echo date('d.m.Y H:i', strtotime($testimonial->added_on)); ?></span></h4>
				<span>
					<?php echo $testimonial->testimonial; ?>
				</span> 
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
		
		<div class="cnt">
			<?php echo $paging_links; ?>
		</div>

<script type="text/javascript">
	function add_a_review()
	{
		if ( $( "#add_review_div" ).is( ":hidden" ) ) 
		{
			$( "#add_review_div" ).slideDown( "slow" );
		}
		else
		{
			$( "#add_review_div" ).slideUp( "slow" );
		}
	}
</script>
		<div class="cnt"> <span class="link_test" onclick="add_a_review();">ДОБАВИТЬ ОТЗыВ</span> </div>
	</div>
	<div class="section_home_4 form_testimonials" id="add_review_div">
		<div class="conteiner_home_4">
			<div class="form_test">
				<form action="/testimonials/" method="post" class="form_test" name="frm_add_testimonial" id="frm_add_testimonial" enctype="multipart/form-data">
					
					<label>Имя:</label>
					<input type="text" value="<?php echo my_set_value('first_name'); ?>" name="first_name" id="first_name" class="validate[required]" />
					<label>Фамилия:</label>
					<input type="text" value="<?php echo my_set_value('last_name'); ?>" name="last_name" id="last_name" class="validate[required]" />
					<label>Отзыв:</label>
					<textarea cols="" rows="" name="testimonial" id="testimonial" class="validate[required]"><?php echo my_set_value('testimonial'); ?></textarea>
					
					<input type="file" name="picture" id="picture" class="validate[required, custom[validateMIME[image/jpeg|image/png|image/gif|image/bmp]]]" style="opacity: 0;" />
					<input type="submit" value="Отправить" />
					<a href="#" id="file_upload_link">Загрузить фото</a>
				</form>
<script type="text/javascript">
$('#file_upload_link').click(function(e)
{
    $('#picture').click();
    e.preventDefault();
});
</script>
			</div>
		</div>
	</div>
	<div class="hfooter"></div>
</div>
<!--main-->
<?php $this->load->view('footer'); ?>
<!--footer-->
<!-- <script type="text/javascript" src="/media/js/jquery.js"></script> -->
<?php
	$ci =& get_instance();
	if(strtolower($ci->config->item('language')) == 'english')
	{
?>
<script src="/media/js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<?php
	}
	else
	{
?>
<script src="/media/js/jquery.validationEngine-ru.js" type="text/javascript" charset="utf-8"></script>
<?php
	}
?>
<script src="/media/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script>
	$(document).ready(function(){
		$("#frm_add_testimonial").validationEngine('attach');
	   });
</script>
<script type="text/javascript" src="js/coin-slider.js"></script>
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
<script type="text/javascript" src="js/js.js"></script>
</body>
</html>
