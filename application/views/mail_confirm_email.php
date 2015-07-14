<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<title><?php echo lang('debating_club'); ?></title>
	<link href="<img src="<?php echo base_url(); ?>/media/css/style.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,800&amp;subset=latin,cyrillic-ext' rel='stylesheet' type='text/css'>
</head>
<body>
<table width="100%" cellspacing="0" cellpadding="0" border="0">
        <tr>
            <td align="center">
				<table width="586" height="399" cellpadding="0" cellspacing="0" border="0" style="border-collapse: collapse; background:url(<?php echo base_url(); ?>/media/images/bg_mail.jpg) no-repeat;">
                    <!--header line statrs-->
                    <tr>
                        <td height="117"><img src="<?php echo base_url(); ?>/media/images/logo_mail.jpg" alt=""/></td>
                       
                    </tr>
                    <!--header line end-->
                    <!--content statrs-->
                    <tr>
                        <td  align="center" >
                            <table width="396" height="225" cellpadding="0" cellspacing="0" valign="middle" border="0" style="border-collapse: collapse; background-color:#71CFE8;">
                                <tr>
                                    <td align="center" style="vertical-align:middle;">
									
										<p style="font-size:24px; font-weight:bold; font-family:Arial, Helvetica, sans-serif; color:#fff; border-bottom:1px solid #fff; padding-bottom:15px;">
											<?php echo lang('mail_salutation').' '.$first_name.' '.$last_name.','; ?>
										</p>
										<p style="font-size:16px; font-family:Arial, Helvetica, sans-serif; color:#fff; padding-top:15px;">
											
											<?php echo lang('mail_body_confirm_email_1'); ?>
											<br/><br/>
											<a href="<?php echo base_url('/user/confirm_email/'.md5($email)); ?>"><?php echo base_url('/user/confirm_email/'.md5($email)); ?></a>
											<br/><br/>
											<?php echo lang('mail_body_confirm_email_2'); ?>
											<br/><br/>
											<a href="<?php echo base_url('/user/cancel_account/'.md5($email)); ?>"><?php echo base_url('/user/cancel_account/'.md5($email)); ?></a>
										</p>
									</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
					<tr>
                        <td align="right" ><p style="font-size:14px; font-style:italic; font-family:Arial, Helvetica, sans-serif; color:#34c2e8; padding-right:42px;">С уважением, Администрация</p></td>
                    </tr>
                    <!--content end-->
                </table>
                <!--footer img starts-->
           
                <!--footer img end-->
            </td>
        </tr>
    </table> 



<!--footer-->

</body>
</html>
