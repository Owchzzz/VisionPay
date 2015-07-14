<?php
	function my_create_pyramid($limit, $matrix_users)
	{
		$matrix_element_counter = 0;
		for($i = 0; $i <= $limit; $i++)
		{
			$global_pad = pow(2, $limit);
			$number_of_stars = pow(2, $i);
			$string = '';
			for($j=1; $j<=$number_of_stars; $j++)
			{
				if(array_key_exists(($matrix_element_counter), $matrix_users))
				{
					$CI = get_instance();
					$query = $CI->db->query('SELECT * FROM  user_profiles WHERE login="'.$matrix_users[$matrix_element_counter]['login'].'";');
					$row = $query->row();
					$balance=$row->credit;
					
					$string = $string.'<td style="color:#FFFFFF; background-color:#0000FF;"><center>'.$matrix_users[$matrix_element_counter]['login'].'<br>($'.$balance.')</center></td>';
					$matrix_element_counter = $matrix_element_counter + 1;
				}
				else
					$string = $string.'<td style="color:#FFFFFF; background-color:#FF0000;">&nbsp;</td>';
				$string = $string.'<td>&nbsp;</td>';
			}
			
			$global_pad = $global_pad - pow(2, ($i));
			$number_of_spaces = $global_pad;
			$space = '';
			for($k = 1; $k <= $number_of_spaces; $k++)
			{
				$space = $space.'<td>&nbsp;</td>';
			}
			echo '<tr>';
			echo $space.$string.$space;
			echo '</tr>';
		}
	}// end of function my_create_pyramid($limit)
?>
<?php $this->load->view('admin-header'); ?>

      <div class="container">
          <div class="row">
              <div class="span12">
			  <h3><?php echo 'Global Matrix View'; ?></h3>
			  <hr />
<?php
	echo '<table border="0" cellspacing="5" cellpadding="4">' ;
	if(count($matrix_users) > 0)
		my_create_pyramid($limit, $matrix_users);
	echo '</table>';
?>
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