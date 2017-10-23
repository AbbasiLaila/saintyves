<div class="content">
	<div class="container">
		      <?php $this->load->view('front/include/side');?>  

		<div class="content_sec">
			<?php if(!empty($vacancies)){
            	foreach($vacancies as $item){?>
            	<div class="listItem borderd_list">
               	<a href="<?=base_url('about/vacancies/'.$item['id'])?>" class="circle_img" style="background-image: url(<?=base_url('uploads/'.$item['image'])?>);"></a>
               	<div class="item_content">
               		<a href="<?=base_url('about/vacancies/'.$item['id'])?>" class="title smaller_size"> <?=$item[$title]?></a>
               		<span class="smalltext"><?=$item['date']?></span>
                     <span class="smalltext"><?=lang($item['office'])?></span>
               		<div class="toggle_hidden"><?=$item[$description]?></div>
					      <a href="<?=base_url('about/vacancies/'.$item['id'])?>" class="more_link rightFloat">See More <span class="arrow"></span></a>
               	</div>
               
               	<div class="clear"></div>
               </div><!-- End listItem -->
            	<?php } } else{echo "Nothing Found.";}?>
		</div>
		<div class="clear"></div>
	</div>
</div>	
</div>