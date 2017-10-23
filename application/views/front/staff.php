<div class="content">
	<div class="container">
		  <?php $this->load->view('front/include/side');?>  
		<div class="content_sec">
			<?php if(!empty($departments)){
            	foreach($departments as $department){ if(!empty($department->members)){?>
              <div class="marginbtm_20">
              <h1 class="left_border_title"><?=$department->$name?></h1>
              <?php foreach ($department->members as $member) {?>
             
             <div class="listItem borderd_list">
               	<div class="circle_img" style="background-image: url(<?=base_url('uploads/'.$member['image'])?>);"></div>
               	<div class="item_content">
               		<h2 class="title smaller_size"> <?= character_limiter(strip_tags($member[$name]),100)?></h2>
               		<span class="smalltext"><?=$member[$position]?></span>
                  <?php if(!empty($member[$description])){?>

               		<div class="toggle_hidden"><?=$member[$description]?></div>
					<a href="#" class="more_link toggle_hidden_action rightFloat">See More <span class="arrow"></span></a><?php } ?>
               	</div>
               
               	<div class="clear"></div>
               </div><!-- End listItem --> 
            	<?php  }?></div><?php }}} else{echo "Nothing Found.";}?>
		</div>
		<div class="clear"></div>
	</div>
</div>	
</div>