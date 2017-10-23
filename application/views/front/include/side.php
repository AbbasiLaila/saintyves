<div class="side_menu">
			<div class="outer borderLeftRight"></div>
         <div class="borderd_content">
            <div class="inner_borderd_content borderLeftRight"><ul>
            	<?php $selectedClass=""; foreach ($menuItems as $item) { if($item['name']==$sub_page->name){$selectedClass="active";}else{$selectedClass="";}?>
            		<li><a class="<?=$selectedClass?>" href="<?=base_url($seo->name.'/'.$item['name'])?>"><?=$item[$title]?></a></li>
            	<?php } ?></ul>
            </div>
        </div> 
        <div class="outer borderLeftRight"></div>
			
		</div>