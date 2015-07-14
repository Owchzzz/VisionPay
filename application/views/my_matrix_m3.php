<?php
	function my_create_pyramid($limit, $matrix_users, $login)
	{
		$matrix_element_counter = 0;
		$my_matrix_array = array();
		for($i = 0; $i <= $limit; $i++)
		{
			$number_of_stars = pow(2, $i);
			$string = '';
			for($j=1; $j<=$number_of_stars; $j++)
			{
				if(array_key_exists(($matrix_element_counter), $matrix_users))
				{
					if($login == $matrix_users[$matrix_element_counter]['login'])
					{
						$element[0] = $matrix_element_counter;
						$element[1] = ($element[0]*2)+1;
						$element[2] = $element[1]+1;
						$element[3] = ($element[1]*2)+1;
						$element[4] = $element[3]+1;
						$element[5] = $element[4]+1;
						$element[6] = $element[5]+1;
						
						for($a=0;$a<count($element);$a++)
						{
							if(array_key_exists($element[$a], $matrix_users))
							{
								$key = $element[$a];
								$my_matrix_array[$a] = $matrix_users[$key]['login'];
							}
						}
					}
				}
				$matrix_element_counter++;
			}
		}
		return $my_matrix_array;
	}// end of function my_create_pyramid($limit)
?>
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
					
			<h1><?php echo $matrix_name; ?></h1>
		</div>
	</div>
	<div class="section_page_big">
		<?php $this->load->view('left_menu'); ?>
		<div class="art_cab_right">
			
		<p class="p_login"><?php echo lang('your_login');?>: <span><?php echo $logged_in_user; ?></span><br />
<?php
	$my_pyramid = my_create_pyramid($limit, $matrix_users, $logged_in_user);
?>
		
		<div class="cnt">
		<img src="/media/images/logo_content.png" alt="" />
		<div class="ul_sponsor">
		
		<ul>
			<li><span><?php if(array_key_exists(0, $my_pyramid)) echo "<a href='http://visionclab.com/matrix/m3_other?login=".$my_pyramid[0]."'>".$my_pyramid[0]."</a>"; ?></span><?php 
if(array_key_exists(0, $my_pyramid)){
		$sponsor=get_sponsor($my_pyramid[0]);
		echo "<a href='http://visionclab.com/matrix/m3_other?login=$sponsor'>".$sponsor."</a>"; 
}	
		?></li>
		</ul>
		<ul>
			<li><span><?php if(array_key_exists(1, $my_pyramid)) echo "<a href='http://visionclab.com/matrix/m3_other?login=".$my_pyramid[1]."'>".$my_pyramid[1]."</a>"; ?></span><?php 
if(array_key_exists(1, $my_pyramid)){
		$sponsor=get_sponsor($my_pyramid[1]);
		echo "<a href='http://visionclab.com/matrix/m3_other?login=$sponsor'>".$sponsor."</a>"; 
} ?></li>
			<li><span><?php if(array_key_exists(2, $my_pyramid)) echo "<a href='http://visionclab.com/matrix/m3_other?login=".$my_pyramid[2]."'>".$my_pyramid[2]."</a>"; ?></span><?php 
if(array_key_exists(2, $my_pyramid)){
		$sponsor=get_sponsor($my_pyramid[2]);
		echo "<a href='http://visionclab.com/matrix/m3_other?login=$sponsor'>".$sponsor."</a>"; 
}				
?></li>
		</ul>
		<ul>
			<li><span><?php if(array_key_exists(3, $my_pyramid)) echo "<a href='http://visionclab.com/matrix/m3_other?login=".$my_pyramid[3]."'>".$my_pyramid[3]."</a>"; ?></span><?php 
				if(array_key_exists(3, $my_pyramid)){
		$sponsor=get_sponsor($my_pyramid[3]);
		echo "<a href='http://visionclab.com/matrix/m3_other?login=$sponsor'>".$sponsor."</a>"; 
}
				?></li>
			<li><span><?php if(array_key_exists(4, $my_pyramid)) echo "<a href='http://visionclab.com/matrix/m3_other?login=".$my_pyramid[4]."'>".$my_pyramid[4]."</a>"; ?></span><?php 
if(array_key_exists(4, $my_pyramid)){
		$sponsor=get_sponsor($my_pyramid[4]);
		echo "<a href='http://visionclab.com/matrix/m3_other?login=$sponsor'>".$sponsor."</a>"; 
}
				?></li>
			<li><span><?php if(array_key_exists(5, $my_pyramid)) echo "<a href='http://visionclab.com/matrix/m3_other?login=".$my_pyramid[5]."'>".$my_pyramid[5]."</a>"; ?></span><?php 
				if(array_key_exists(5, $my_pyramid)){
		$sponsor=get_sponsor($my_pyramid[5]);
		echo "<a href='http://visionclab.com/matrix/m3_other?login=$sponsor'>".$sponsor."</a>"; 
}
				?></li>
			<li><span><?php if(array_key_exists(6, $my_pyramid)) echo "<a href='http://visionclab.com/matrix/m3_other?login=".$my_pyramid[6]."'>".$my_pyramid[6]."</a>"; ?></span><?php 
				if(array_key_exists(6, $my_pyramid)){
		$sponsor=get_sponsor($my_pyramid[6]);
		echo "<a href='http://visionclab.com/matrix/m3_other?login=$sponsor'>".$sponsor."</a>"; 
}
				?></li>
		</ul>
	<form action="#" method="post" class="form_search">
	<input type="text" value="" />
	<input type="submit" value="Поиск логинов" />
	</form>
		</div>
		</div>
			<ul class="ul_global_2">
				<li><span>Уровень</span><span>Кол-во партнеров</span><span>Комисионные</span><span>Детали</span></li>
				<li><span>-</span><span>-</span><span>-</span><span><a href="#">-</a></span></li>
			
			</ul>
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
