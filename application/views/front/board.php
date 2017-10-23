<div class="content">
	<div class="container">
		      <?php $this->load->view('front/include/side');?>  

		<div class="content_sec">
			<?php if(!empty($directors)){
            	foreach($directors as $item){?>
            	<div class="listItem borderd_list">
               	<div class="circle_img" style="background-image: url(<?=base_url('uploads/'.$item['image'])?>);"></div>
               	<div class="item_content">
               		<h2 class="title smaller_size"> <?= $item[$name]?></h2>
               		<span class="smalltext"><?=$item[$position]?></span>
               		<div class="toggle_hidden"><?=$item[$description]?></div>
					<a href="#" class="more_link toggle_hidden_action rightFloat">See More <span class="arrow"></span></a>
               	</div>
               
               	<div class="clear"></div>
               </div><!-- End listItem -->
            	<?php } } else{echo "Nothing Found.";}?>
		</div>
		<div class="clear"></div>
	</div>
</div>	
</div>