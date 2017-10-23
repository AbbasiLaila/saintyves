<div class="content">
	<div class="container">
		  <?php $this->load->view('front/include/side');?>  
		<div class="content_sec">
			<h1 class="left_border_title"><?=$program->$title?></h1>
			<ul class="inline_info">
				<li><i class="fa fa-calendar"></i>Date: <?=$program->date?></li>
				<div class="clear"></div>
			</ul>
			<?=$program->$description?>


		</div>
	</div>
	<div class="clear"></div>
</div>
