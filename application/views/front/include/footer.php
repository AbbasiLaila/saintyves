</div><footer>
	<div class="sitemap col-half">
		<div class="col-third">
		<ul>
	       <li><a href="<?=base_url('about')?>"><?=lang('about')?></a></li>
	       <?php foreach ($aboutPages as $page) {?>
	        <li><a href="<?php echo base_url('admin/page/'.$page['name'])?>"><?=$page['en_title']?></a></li>
	        <?php } ?>
        </ul>
        <ul>
        	<li><a href="">News</a></li>
        </ul>
       </div>
		<div class="col-third">
        <ul>
	       <li><a href="<?=base_url('work')?>"><?=lang('ourWork')?></a></li>
	       <?php foreach ($workPages as $page) {?>
	        <li><a href="<?php echo base_url('admin/page/'.$page['name'])?>"><?=$page['en_title']?></a></li>
	        <?php } ?>
        </ul>

        <ul>
	       <li><a href="<?=base_url('publications')?>"><?=lang('publications')?></a></li>
	        <li><a href="">Newsletter</a></li>
	        <li><a href="">Brouchores</a></li>
        </ul>
    </div>

    <div class="col-third">
      
        <ul>
	       <li><a href="<?=base_url('gallery')?>"><?=lang('gallery')?></a></li>
	        <li><a href="">Photos</a></li>
	        <li><a href="">Videos</a></li>
        </ul>
         <ul>
        	<li><a href="">Donors</a></li>
        </ul>
         <ul>
        	<li><a href="">FAQ</a></li>
        </ul>
         <ul>
        	<li><a href="">Contact Us</a></li>
        </ul>
    </div>



  <div class="clear"></div>
	</div>


	<div class="col-half">
		<div class="subscribe text-center">
			<h1 class="title white">Subscribe to our newsletters</h1>
			<form id="subscribeFrom">
				<div class="form-group"> <input name="first_name" type="text" class="form-control" placeholder="First Name" id="name"></div>
				<div class="form-group"> <input name="last_name" type="text" class="form-control" placeholder="Last Name" id="name"></div>
				<div class="form-group fullwidth"> <input name="email" type="text" class="form-control" placeholder="Email Address" id="email"></div>
				<div class="clear"></div>
				  <div class="text-center margin-top-20"><input type="submit" class="btn btn-reverse" value="<?=lang('readMore')?>"></div>

			</form>
			
		</div>
		<div class="social text-center">
			<h1 class="title white">Follow Us</h1>
			<ul>
				<li><a href="<?=prep_url($contactInfo->facebook)?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
				<li><a href="<?=prep_url($contactInfo->twitter)?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
				<li><a href="<?=prep_url($contactInfo->youtube)?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
			</ul>
		</div>
		
	</div>


  <div class="clear"></div>
<div class="footer_bottom">
	<p>Copy © 2017 St. Yves, All Rights Reserved</p>
	
</div>
</footer>