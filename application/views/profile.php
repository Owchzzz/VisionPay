<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<title>Дискуссионный клуб</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,800&amp;subset=latin,cyrillic-ext' rel='stylesheet' type='text/css' />
<link href="/media/css/style.css" rel="stylesheet" type="text/css" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,800&amp;subset=latin,cyrillic-ext' rel='stylesheet' type='text/css' />
		<link rel="stylesheet" href="/media/css/validationEngine.jquery.css" type="text/css"/>
</head>

<body>
<div class="main_page">
	<!--<div class="header">
		<div class="conteiner"> <a href="index.html"><img src="/media/images/logo.png" alt="" class="logo" /></a>
			<ul class="nav">
				<li><a href="index.html">Клуб мечта</a></li>
				<li><a href="#">Программы</a></li>
				<li><a href="#">Новости</a></li>
				<li><a href="faqs.html">Вопрос-ответ</a></li>
				<li><a href="testimonials.html">Отзывы</a></li>
				<li><a href="contacts.html">Контакты</a></li>
			</ul>
		</div>
		</div>
	<div class="div_lang">
		<ul>
			<li><a href="#"><img src="/media/images/flag_r.jpg" alt="" /><span>русский</span></a></li>
			<li><a href="#"><img src="/media/images/flag_p.jpg" alt="" /><span>польский</span></a></li>
			<li><a href="#"><img src="/media/images/flag_i.jpg" alt="" /><span>итальянский</span></a></li>
			<li><a href="#"><img src="/media/images/flag_f.jpg" alt="" /><span>французский</span></a></li>
			<li><a href="#"><img src="/media/images/flag_r.jpg" alt="" /><span>немецкий</span></a></li>
		</ul>
		<span><a href="#" class="link_vchod"  style="display:none;"></a><a href="#" class="link_vuhod"></a></span> <span><a href="#" class="link_profil"></a><a href="#" class="link_registr"  style="display:none;"></a></span> 
		</div>
	
	<div class="section_head">
	<div class="article_head">
	<h1>Профиль</h1>
	</div>
	</div>-->
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
	
<form action="/user/profileupdate/<?php echo $user_id;?>" method="post" class="form_registr">
<div class="div_form_1 mr_138">
    
<label>Имя<span>*</span></label><input type="text" value="<?php echo $first_name;?>" name="f_name"/>
<label>Фамилия<span>*</span></label><input type="text" value="<?php echo $last_name;?>" name="l_name" />
<label>Электронная почта<span>&nbsp;&nbsp;</span></label><input type="text" value="<?php echo $email;?>" name="email" />
<label class="lab_2">Номер телефона<span>*</span><span>в межд. формате</span></label><input type="text" value="<?php echo $phone;?>" name="phone"/>
<label>Skype-логин<span>*</span></label><input type="text" value="<?php echo $skype;?>" name="skype"/>
<label>Страна<span>*</span></label><input type="text" value="<?php echo $country;?>" name="country" />
<label>Город<span>*</span></label><input type="text" value="<?php echo $city;?>" name="city"/>
<label>Улица<span>*</span></label><input type="text" value="<?php echo $street;?>" name="street"/>
</div>
<div class="div_form_1">
<label>Дом<span>*</span></label><input type="text" value="<?php echo $house;?>" name="house"/>
<label>Квартира<span>*</span></label><input type="text" value="<?php echo $flat?>" name="flat"/>
<label>Поч. индекс<span>*</span></label><input type="text" value="<?php echo $post_code;?>" name="post_code" />
<label>Логин спонсора<span>&nbsp;&nbsp;</span></label><input type="text" value="<?php echo $sponsor_login;?>" name="sponsor_login" />
<label>Ваш логин<span>&nbsp;&nbsp;</span></label><input type="text" value="<?php echo $login;?>" name="username" />
<div class="div_kochel">
<input type="radio" id="rad_1" name="radio_1" class="styled"/>
<label class="lab_2 cur_pointer" for="rad_1">Кошелек в OKPAY<span>*</span><span>Например: OK123456789</span></label><input type="text" value="<?php echo $ok_pay_wallet;?>" name="ok_pay_wallet" />
</div>
<span class="span_kochel">
или

</span>
<div class="div_kochel">
<input type="radio" id="rad_2" name="radio_1" class="styled" />
<label class="lab_2 cur_pointer" for="rad_2">Кошелек в ПМ<span>*</span><span>Например: U3251789</span></label><input type="text" value="<?php echo $pm_wallet;?>" name="pm_wallet" />
</div>
<div class="cL"></div>
<div class="cL"></div>
<p class="p_objaz">* поля обязательные для заполнения</p>

<input type="submit" value="Cохранить" />
</div>
</form>
	
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
<script type="text/javascript" src="js/jquery.js"></script> 
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
	<script src="js/test.js" type="text/javascript"></script>
<script type="text/javascript" src="js/js.js"></script>

<link rel="stylesheet" type="text/css" href="css/jquery.realperson.css"> 
<script type="text/javascript" src="js/jquery.realperson.js"></script>
<script>
    $(selector).realperson();
    </script>
</body>
</html>