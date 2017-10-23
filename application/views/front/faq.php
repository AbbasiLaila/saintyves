<div class="content">
	<div class="container">
		<div class="content_sec full_width_content">
			<?php if(!empty($faq)){$i=0;
            	foreach($faq as $item){ $i++;?>
            	<div class="faq bordered">
		               <a href="#" class="question"> <span class="boldQ">Q<?=$i?>: </span><?= strip_tags($item[$question])?></a>
		               <div class="answer"><?= $item[$answer]?></div>
		         </div>
        
            <?php } }?>
			
		</div>
	</div>
</div>