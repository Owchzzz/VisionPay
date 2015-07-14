<?php $this->load->view('header'); ?>
		<!--header--></div>
	<div class="div_lang">
		<ul>
			<li><?php $this->load->view('google_translate'); ?></li>
		</ul>
		<?php $this->load->view('userbar'); ?>
		<div class="section_head">
                    <div class="article_head">
			<h1><?php echo lang('my_office');?></h1>
			<p><?php echo lang('welcome1');?><?php echo $ownlogin;?><?php echo lang('welcome2');?></p>
                    </div>
                </div>
	<div class="section_page_big">
		
		<?php $this->load->view('left_menu'); ?>
		
		<div class="art_cab_right">
		<img src="/media/images/banner.jpg" alt="" class="banner" />
		<ul class="ul_link">
                    <?php echo $glob_butt_check;?>
			<li><?php echo lang('your_referral_link');?>: <a href="http://visionclab.com/sponsor?<?php echo $mylogin; ?>">http://visionclab.com/sponsor?<?php echo $mylogin; ?></a></li>
		<li><?php echo lang('your_sponsor');?>: <a href="#"><?php echo $sponsor; ?></a></li>
		<li><?php echo lang('email_sponsor');?>: <a href="mailto:viocomn@mail.ru">viocomn@mail.ru</a></li>
		<li><?php echo lang('your_balance');?>: $<?php echo $balance; ?></li>
			</ul>

		
		<ul class="ul_programm">
		<li><span>« <?php echo lang('dreams_come_true');?> »</span><span><?php echo lang('paid');?></span><span><?php echo lang('all_positions');?></span></li>
		<li <?php if(is_part_of_m1()) echo 'class="li_prog_yes"'; ?>><span>М1 - 750</span><span><img src="<?php if(is_part_of_m1()) echo '/media/images/programm_yes.png'; else echo '/media/images/programm_no.png'; ?>" alt="" /></span><span>
		
<?php
if(is_part_of_m1()){
$query = $this->db->query('SELECT COUNT(*) AS `total` FROM user_profiles up INNER JOIN m1 ON up.user_id=m1.login_id WHERE up.login LIKE "%'.$ownlogin.'%" ORDER BY m1.id ASC');
$row = $query->row();
$total=$row->total;
echo "$total";
}else{
	echo "-";
}
?>			
		</span></li>
		<li <?php if(is_part_of_m2()) echo 'class="li_prog_yes"'; ?>><span>М2 - 2200</span><span><img src="<?php if(is_part_of_m2()) echo '/media/images/programm_yes.png'; else echo '/media/images/programm_no.png'; ?>" alt="" /></span><span>
<?php
if(is_part_of_m2()){
$query = $this->db->query('SELECT COUNT(*) AS `total` FROM user_profiles up INNER JOIN m2 ON up.user_id=m2.login_id WHERE up.login LIKE "%'.$ownlogin.'%" ORDER BY m2.id ASC');
$row = $query->row();
$total=$row->total;
echo "$total";
}else{
	echo "-";
}
?>	
			</span></li>
		<li <?php if(is_part_of_m3()) echo 'class="li_prog_yes"'; ?>><span>М3 - 6600</span><span><img src="<?php if(is_part_of_m3()) echo '/media/images/programm_yes.png'; else echo '/media/images/programm_no.png'; ?>" alt="" /></span><span>
<?php
if(is_part_of_m3()){
$query = $this->db->query('SELECT COUNT(*) AS `total` FROM user_profiles up INNER JOIN m3 ON up.user_id=m3.login_id WHERE up.login LIKE "%'.$ownlogin.'%" ORDER BY m3.id ASC');
$row = $query->row();
$total=$row->total;
echo "$total";
}else{
	echo "-";
}
?>	
			
		</span></li>
		<li><span>М4 - 19800</span><span><img src="/media/images/programm_no.png" alt="" /></span><span>-</span></li>
		</ul>
		<ul class="ul_programm">
		<li><span>« <?php echo lang('step_towards_the_dream');?> »</span><span><?php echo lang('paid');?></span><span><?php echo lang('all_positions');?></span></li>
		<li><span>М1 - 270</span><span><img src="/media/images/programm_no.png" alt="" /></span><span>-</span></li>
		<li><span>М2 - 800</span><span><img src="/media/images/programm_no.png" alt="" /></span><span>-</span></li>
		<li><span>М3 - 2200</span><span><img src="/media/images/programm_no.png" alt="" /></span><span>-</span></li>
		<li><span>М4 - 6200</span><span><img src="/media/images/programm_no.png" alt="" /></span><span>-</span></li>
		<li><span>М4 - 17000</span><span><img src="/media/images/programm_no.png" alt="" /></span><span>-</span></li>
		</ul>
			<p class="p_global"><?php echo lang('global_matrix_paid');?><span>Login <?php if (!empty($pay_day)){ echo $pay_day; } ?></span></p>
		<h3><?php echo lang('statistics');?></h3>
		
		<ul class="ul_static">
		<li><span><?php echo lang('details');?></span><span><?php echo lang('commission');?></span><span><?php echo lang('date');?></span><span><?php echo lang('amount');?></span></li>
		<li><span><?php echo lang('more_details');?></span><span>0,5%</span><span>10.09.2013</span><span>&nbsp;</span></li>
		<li class="li_hover"><span><?php echo lang('received_from_the_login');?></span><span>ID5487365</span><span><?php echo lang('an_example_from_the_first_level');?></span><span>11.02.2011</span></li>
		
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
