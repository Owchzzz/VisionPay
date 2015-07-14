<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title>VisionClab AdminPanel</title>

    <!-- Bootstrap core CSS -->
	  <link href="/media/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/media/css/navbar-static-top.css" rel="stylesheet">
	<link rel="stylesheet" href="/media/css/validationEngine.jquery.css" type="text/css"/>

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Static navbar -->
    <div class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
			<a class="navbar-brand" href="/">VisionClab</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
			  <li class="active"><a href="/admin"><?php echo lang('home'); ?></a></li>
                          <li><a href="/admin/pending_transacts"><?php echo lang('pending_transactions');?></a></li>
           <li><a href="/admin/news/"/><?php echo lang('news'); ?></a></li>
		   <li><a href="/admin/testimonials"/><?php echo lang('testimonials'); ?></a></li>
		   <li><a href="/admin/programs"/><?php echo lang('programs'); ?></a></li>
		   <li><a href="/admin/text_advertising"/><?php echo lang('text_advertising'); ?></a></li>
		   <li><a href="/admin/presentation_images"/><?php echo lang('presentation'); ?></a></li>
		   <li class="dropdown-menu">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo lang('global_matrix'); ?> <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="/admin/global_matrix_view"/><?php echo lang('global_matrix'); ?></a></li>
					<li><a href="/admin/global_matrix_view_m1"/><?php echo 'M1 - 750'; ?></a></li>
					<li><a href="/admin/global_matrix_view_m2"/><?php echo 'M2 - 2200'; ?></a></li>
					<li><a href="/admin/global_matrix_view_m3"/><?php echo 'M3 - 6600'; ?></a></li>
				</ul>
		   </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo lang('site_editing'); ?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="/admin/site_settings"><?php echo lang('site_settings'); ?></a></li>
				<li><a href="/admin/user_list"><?php echo lang('user_list'); ?></a></li>
				<li><a href="/admin/terms_conditions"><?php echo lang('terms_conditions'); ?></a></li>
				<li><a href="/admin/faqs"><?php echo 'FAQs'; ?></a></li>
                                <li><a href="/admin/site_access"><?php echo lang('site_access');?></a></li>
<?php
	$ci =& get_instance();
	if(strtolower($ci->config->item('language')) == 'english')
	{
?>
				<li><a href="/set_language/?lang=rus">Установить Язык - русский</a></li>
<?php
	}
	else
	{
?>
				<li><a href="/set_language/?lang=en">Set Language - English</a></li>
<?php
	}
?>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
			  <li><a href="/admin/logout"><?php echo lang('logout'); ?></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>