<div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
	<marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
	<?php
		$ads=$Ad->all(['sh'=>1]);
		foreach($ads as $ad){
			echo $ad['text'];
			echo "&nbsp;&nbsp;&nbsp;";
		}
		//echo q("SELECT *,GROUP_CONCAT('---',`text`) as 'ad' FROM `ad` where sh=1 group by sh;")[0]['ad'];
	;?>
	</marquee>
	<div style="height:32px; display:block;"></div>
	<!--正中央-->
	<div style="text-align:center;">
		<a class="bl" style="font-size:30px;" href="?do=meg&p=0">&lt;&nbsp;</a>
		<a class="bl" style="font-size:30px;" href="?do=meg&p=0">&nbsp;&gt;</a>
	</div>
</div>