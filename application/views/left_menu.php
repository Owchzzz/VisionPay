<?php $this->load->helper('matrix_helper'); ?>
<div class="art_cab_left">
			<ul class="ul_cab">
				<li><?php echo lang('my_office');?></li>
				<li><a href="/user/profile"><?php echo lang('profile');?></a></li>
				<li><a href="<?php echo base_url('/user/change_password'); ?>"><?php echo lang('change_your_password');?></a></li>
				<li><a href="<?php echo base_url('/user/change_fin_password'); ?>"><?php echo lang('change');?><br />
					<?php echo lang('financial_password');?></a></li>
				<li><a href="<?php echo base_url('/user/change_fin_system'); ?>"><?php echo lang('payment_systems');?></a></li>
				<li><a class="left_link">« <?php echo lang('dreams_come_true');?> »</a>
					<ul>
						<li><a href="/matrix/m1_750">М1 - 750</a></li>
				<?php
					if(is_part_of_m2())
					{
				?>
						<li><a href="/matrix/m2_2200">М2 - 2200</a></li>
				<?php
					}
					if(is_part_of_m3())
					{
				?>
						<li><a href="/matrix/m3_6600">М3 - 6600</a></li>
				<?php
					}
				?>
						
						<!-- <li><a>М4 - 19800</a></li> -->
					</ul>
				</li>
				<li><a class="left_link">« <?php echo lang('step_towards_the_dream');?> »</a>
					<ul>
						<li><a >М1 - 270</a></li>
						<li><a >М2 - 800</a></li>
						<li><a >М3 - 2200</a></li>
						<li><a >М4 - 6200</a></li>
						<li><a >М5 - 17000</a></li>
					</ul>
				</li>
				<li><a href="/matrix/global_matrix"><?php echo lang('global_matrix');?></a></li>
				<li><a href="#"><?php echo lang('finance');?></a></li>
				<li><a href="/user/output_finance/"><?php echo lang('withdrawal');?></a></li>
				<li><a href="#"><?php echo lang('partners');?></a></li>
				<li><a href="#" class="left_link"><?php echo lang('tools');?></a>
					<ul>
						<li><a href="/templates/banners"><?php echo lang('banners');?></a></li>
						<li><a href="#"><?php echo lang('business_cards');?></a></li>
						<li><a href="/text_advertising/"><?php echo lang('text_advertising');?></a></li>
						<li><a href="/presentation/"><?php echo lang('presentation');?></a></li>
					</ul>
				</li>
				<li><a href="<?php echo base_url('/user/logout'); ?>"><?php echo lang('out');?></a></li>
			</ul>
		</div>