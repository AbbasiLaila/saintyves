<div class="home-slider">
   <div class="swiper-container">
      <div class="swiper-wrapper">
         <?php foreach ($slides as $slide) {?>
         <div class="swiper-slide" style="background-image:url(<?=base_url('uploads/'.$slide['image'])?>)">
            <div class="flex_wrapper">
               <?php if(!empty($slide[$title])){
                  echo '<div class="shaded_bg slider_box"><h2>'.$slide[$title].'</h2></div>';
                  } ?>
               <?php if(!empty($slide[$description])){
                  echo '<div class="white_shaded_bg slider_box"><h2>'.character_limiter(strip_tags($slide[$description]), 200).'</h2></div>';
                  } ?>
               <?php if(!empty($slide['link'])){
                  echo '<a class="shaded_bg slider_box readMore" href="'.prep_url($slide['link']).'" target="_blank">'.lang('readMore').' <span class="triangle-right"></span></a>';
                  } ?>
            </div>
         </div>
         <?php }
            ?>	
      </div>
      <div class="swiper-pagination"></div>
   </div>
</div>
<!-- End home slider -->

<!-- About Section -->
<section class="start_content overview">
   <div class="container">
      <div class="col-half">
         <img class="med_icon" src="<?=base_url('assets/images/styves-logo.png')?>">
         <h1 class="title text-center">Overview</h1>
         <div class="outer borderLeftRight"></div>
         <div class="borderd_content">
            <div class="inner_borderd_content borderLeftRight">
               <p class="textContent"><?= character_limiter(strip_tags($overview->$description), 380)?></p>
               <div class="text-center margin-top-20"><a href="" class="btn"><?=lang('readMore')?></a></div>
            </div>
         </div>
         <div class="outer borderLeftRight"></div>
      </div>
      <div class="col-half">
         <img class="med_icon" src="<?=base_url('assets/images/mission.png')?>">
         <h1 class="title text-center">Our Mission & Vision</h1>
         <div class="outer borderLeftRight"></div>
         <div class="borderd_content">
            <div class="inner_borderd_content borderLeftRight">
               <p class="textContent"><?= character_limiter(strip_tags($mission->$description), 380)?></p>
               <div class="text-center margin-top-20"><a href="" class="btn"><?=lang('readMore')?></a></div>
            </div>
         </div>
         <div class="outer borderLeftRight"></div>
      </div>
      <div class="clear"></div>
   </div>
</section>
<!-- End About Section -->



<!-- Media Section -->
<section class="mediaSection greySection no-padding">
   <div class="container">
      <div class="col-third">
         <img class="med_icon" src="<?=base_url('assets/images/news.png')?>">
         <h1 class="title text-center">Recent News</h1>
         <div class="outer borderLeftRight"></div>
         <div class="borderd_content">
            <div class="inner_borderd_content borderLeftRight">
            	<?php if(!empty($latestNews)){
            	foreach($latestNews as $item){?>
            	<div class="listItem">
               	<a href="<?=base_url('news/'.$item['url'])?>" class="circle_img" style="background-image: url(<?=base_url('uploads/'.$item['image'])?>);"></a>
               	<div class="item_content">
               		<a href="<?=base_url('news/'.$item['url'])?>" class="title smaller_size"> <?= character_limiter(strip_tags($item[$title]),100)?></a>
               		<p><?= character_limiter(strip_tags($item[$description]),50)?></p>
               		<span class="date"><?=$item['date']?></span>
               	</div>
               	<a href="<?=base_url('news/'.$item['url'])?>" class="more_link rightFloat">See More <span class="arrow"></span></a>
               	<div class="clear"></div>
               </div><!-- End listItem -->
            	<?php } } else{echo "Nothing Found.";}?>
              
            </div>
         </div>
         <div class="outer borderLeftRight"></div>
          <div class="text-center margin-top-20"><a href="" class="btn"><?=lang('readMore')?></a></div>
      </div>
      <div class="col-third">
         <img class="med_icon" src="<?=base_url('assets/images/publications.png')?>">
         <h1 class="title text-center">Recent Publications</h1>
         <div class="outer borderLeftRight"></div>
         <div class="borderd_content">
            <div class="inner_borderd_content borderLeftRight">
            	<?php if(!empty($latestNews)){
            	foreach($latestNews as $item){?>
            	<div class="listItem">
               	<a href="<?=base_url('news/'.$item['url'])?>" class="circle_img" style="background-image: url(<?=base_url('uploads/'.$item['image'])?>);"></a>
               	<div class="item_content">
               		<a href="<?=base_url('news/'.$item['url'])?>" class="title smaller_size"> <?= character_limiter(strip_tags($item[$title]),100)?></a>
               		<span class="date"><?=$item['date']?></span>
               	</div>
               	<a href="<?=base_url('news/'.$item['url'])?>" class="more_link rightFloat">Check File <span class="download"></span></a>
               	<div class="clear"></div>
               </div><!-- End listItem -->
            	<?php } } else{echo "Nothing Found.";}?>
              
            </div>
         </div>
         <div class="outer borderLeftRight"></div>
          <div class="text-center margin-top-20"><a href="" class="btn"><?=lang('readMore')?></a></div>
      </div>

      <div class="col-third">
         <img class="med_icon" src="<?=base_url('assets/images/albums.png')?>">
         <h1 class="title text-center">Recent Albums</h1>
         <div class="outer borderLeftRight"></div>
         <div class="borderd_content">
            <div class="inner_borderd_content borderLeftRight">
               <a href="" class="album"><img src="<?=base_url('assets/images/test.jpg')?>">
               	<span class="overlay">
               		<div>	
               		<img src="<?=base_url('assets/images/eye.png')?>">
               		<h3 class="white">See More</h3>
               		</div>
               	</span>
               </a>
               <a href="" class="album"><img src="<?=base_url('assets/images/test.jpg')?>">
               <span class="overlay">
               		<div>	
               		<img src="<?=base_url('assets/images/eye.png')?>">
               		<h3 class="white">See More</h3>
               		</div>
               	</span></a>
               <a href="" class="album"><img src="<?=base_url('assets/images/test.jpg')?>">
               <span class="overlay">
               		<div>	
               		<img src="<?=base_url('assets/images/eye.png')?>">
               		<h3 class="white">See More</h3>
               		</div>
               	</span></a>
               <a href="" class="album"><img src="<?=base_url('assets/images/test.jpg')?>">
               <span class="overlay">
               		<div>	
               		<img src="<?=base_url('assets/images/eye.png')?>">
               		<h3 class="white">See More</h3>
               		</div>
               	</span></a>
            <div class="clear"></div>
            </div>
         </div>
         <div class="outer borderLeftRight"></div>
         <div class="text-center margin-top-20"><a href="" class="btn"><?=lang('readMore')?></a></div>

      </div>
      <div class="clear"></div>
   </div>
</section>
<!-- End Media Section -->
