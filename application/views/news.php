<?php $this->load->view('header'); ?>
		<!--header--></div>
	<div class="div_lang">
		<ul>
			<li><a href="#"><img src="/media/images/flag_r.jpg" alt="" /><span><?php echo lang('russian');?></span></a></li>
			<li><a href="#"><img src="/media/images/flag_p.jpg" alt="" /><span><?php echo lang('polish');?></span></a></li>
			<li><a href="#"><img src="/media/images/flag_i.jpg" alt="" /><span><?php echo lang('italian');?></span></a></li>
			<li><a href="#"><img src="/media/images/flag_f.jpg" alt="" /><span><?php echo lang('french');?></span></a></li>
			<li><a href="#"><img src="/media/images/flag_r.jpg" alt="" /><span><?php echo lang('german');?></span></a></li>
		</ul>
		<?php $this->load->view('userbar'); ?>
	<div class="section_head">
	<div class="article_head">
	<h1><?php echo lang('news');?></h1>
	</div>
	</div>
	<div class="section_page_big">
	<ul class="ul_news" id="news_list">
	</ul>
		<div class="cnt">
		<ul class="page_nav" id="paginator">
		
		</ul>
		</div>
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
<script type="text/javascript">
        var news_arr = <?php echo $all_news;?>; 
        var tcount = <?php echo $totalnewscount;?>;
        load_page(0);
        function load_page(p_count){
            document.getElementById('news_list').innerHTML = "";
        load_paginator(p_count);
            var count = 0;
            var start_read=p_count*4;
            
            var op="";
            var id=-1;
            for(var i=start_read;i < news_arr.length;i++){
                if(count < 4){
                    id = news_arr[i];
                    $.ajax({
                        
                        type:"POST",
                        url:'/ajax/',
                        data: { "id":id },
                        datatype:"json",
                        success: function(data){
                            var origdata = document.getElementById('news_list').innerHTML;
                            document.getElementById('news_list').innerHTML = origdata + "" +data;
                        }
                    });
                    
                }
                count++;
            }
            document.getElementById('news_list').innerHTML = op;
        }
        
        function load_paginator(curr_page){
            var count=tcount;
            var totalpages=0;
            var paginator_arr=[];
            while(count > 0){
                totalpages++;
                count -=4;
            }
            var op="";
            for(var i=0;i<totalpages;i++){
                if(i == curr_page){
                    op +="<li><span>"+(curr_page+1)+"</span></li>";
                }
                if(i < curr_page){
                    if(i+3 >= curr_page){
                        op+="<li><a href=\"javascript:load_page("+i+")\">"+(i+1)+"</a></li>";
                    }
                }
                if(i > curr_page){
                    if(i-3 <= curr_page){
                        op+="<li><a href=\"javascript:load_page("+i+")\">"+(i+1)+"</a></li>";
                    }
                }
            }
            if(totalpages <=1){
            op="";
            }
            document.getElementById("paginator").innerHTML=op;
        }
    </script>
</body>
</html>
