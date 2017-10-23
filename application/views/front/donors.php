<div class="content">
	<div class="container">
		<div class="content_sec full_width_content">
			<div class="donors_list">
			<?php if(!empty($donors)){
            	foreach($donors as $item){ if($item['link']!=""){?>
            	<a class="donor" href="<?=prep_url($item['link'])?>" target="_blank"><img src="<?=base_url('uploads/'.$item['image'])?>"></a>
            	<?php } else{?>
					<div class="donor"><img src="<?=base_url('uploads/'.$item['image'])?>"></div>

            <?php } } }?>
            <div class="clear"></div>
            </div>
		</div>
	</div>
</div>