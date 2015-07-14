<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv=“pragma” content=“no-cache” />
<meta http-equiv=“Expires” content=”-1” />
<meta http-equiv=“CACHE-CONTROL” content=“NO-CACHE” />
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">
    <style>
        table{
            border-collapse:collapse;
            width:100%;
        }
        table td{   
            white-space: nowrap;
        }
        table th{ 
            font-weight: bold;
            font-size: 16;
            white-space: nowrap;
        }
        table tr{
            border-bottom:1px solid #ececec;
        }
        table tr th#tabletitle{
            font-size:22pt;
            font-weight:bold;
        }
        
        table tr#tabletitle{
            background-color:#F0F5F5;
        }
    </style>
    <title>VisionClab AdminPanel</title>

    <!-- Bootstrap core CSS -->
	  <link href="/media/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/media/css/navbar-static-top.css" rel="stylesheet">

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
          <a class="navbar-brand" href="#">VisionClab</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="/admin/news/"/>News</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Site Editing <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
               
                <li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
			  <li><a href="/admin/logout">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

      <div class="container">
          <div class="row">
              <div class="span4">
                  <form class="form-horizontal" action="/admin/newseditsave?id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
                      <h3>Edit News</h3><hr />
                      <label>Title: </label> <input type="text" name="title" value="<?php echo $title;?>"/><br /><br />
                      <label>Thumbnail: </label> <img width="150" height="150" src="<?php echo $image;?>" /> (to change thumbnail upload another photo): <br /><input type="file" name="file" /> <br /> <br />
                      <textarea style="margin-left:35px;" name="content" rows="5" cols="185"><?php echo $content;?></textarea><br /><br />
                      <button style="margin-left:1090px;" type="submit" class="btn btn-warning"/>Submit</button>
                  </form>

              </div>
              
              
             
          </div>
      </div>
      
  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="/media/js/bootstrap.min.js"></script>
    <script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
  <script type="text/javascript">
tinymce.init({
    selector: "textarea"
 });
</script>
  </body>
</html>