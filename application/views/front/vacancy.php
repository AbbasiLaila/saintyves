<div class="content">
	<div class="container">
		  <?php $this->load->view('front/include/side');?>  
		<div class="content_sec">
			
			<h1 class="left_border_title"><?=$vacancy->$title?></h1>
			<ul class="inline_info">
				<li><i class="fa fa-calendar"></i>Date Published: <?=$vacancy->date?></li>
				<li><i class="fa fa-hourglass-end"></i>Deadline: <?=$vacancy->deadline?></li>
				<li><i class="fa fa-map-marker"></i>Due Station: <?=$vacancy->office?></li>
				<div class="clear"></div>
			</ul>
			<?=$vacancy->$description?>


		</div>
	</div>
	<div class="clear"></div>
</div>
