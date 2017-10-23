<div class="content">
	<div class="container">
		<div class="content_sec full_width_content">
			<div class="col-half">	
			<?php foreach ($offices as $office) {?>
			<div class="office">
				<img src="<?=base_url('assets/images/pin.png')?>">
				<ul class="contact_info">
					<li><?=$office[$name]?></li>
					<li><?=$office[$location]?></li>
					<li><?=$office[$box]?></li>
					<li><?=$office['email']?></li>
					<li><?=$office['phone']?></li>
					<li><?=$office['fax']?></li>
				</ul>
				<div class="clear"></div>
			</div>
			<?php }?>
			<?php if($contactInfo->pressContactEmail !==""){?>
				<div class="office">
					<img src="<?=base_url('assets/images/mailbox.png')?>">
					<ul class="contact_info">
						<li><?=$contactInfo->pressContactEmail?></li>

					</ul>
				<div class="clear"></div>
					
				</div>
			<?php } ?>
			</div>
			<div class="col-half">
				<h2 class="title">Send us a message ..</h2>
			<form class="form" id="contactusForm" method="post" enctype="multipart/form-data" action="">
		       <div class="form-group"> <input name="name" type="text" class="form-control" placeholder="Name" id="name"></div>
		       <div class="form-group"><input name="email" class="form-control" id="email" placeholder="Email address"></div>
		       <div class="form-group"><input name="phone" class="form-control" id="phone" placeholder="Phone number"></div>
		       <div class="form-group"><input name="phone" class="form-control" id="phone" placeholder="Organization or industry"></div>
		       
		       <div class="form-group"><textarea rows="5" name="msg" class="form-control" id="msg" placeholder="Your message"></textarea></div>
		       <div class="form-group text-center"><input type="submit" class="btn btn-form" value="Send"></div>
		       <div class="clear"></div>
   </form>
</div>
		</div>
	</div>
</div>