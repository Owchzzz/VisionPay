<?php
//checking for logging
$user_id=$this->session->userdata('user_id');
if ($user_id != ""){
	echo '
	<span><a href="/user/cabinet" class="link_profil"></a></span> 
	<span><a href="/user/logout" class="link_vuhod"></a></span> 
';	
}else{
	echo '
	<span><a href="/user/login" class="link_vchod" ></a></span> 
	<span><a href="/user/register" class="link_registr"></a></span>
';
}
?>
	
 </div>

