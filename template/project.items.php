<a class="project-items" href="project.php?id=<?php echo $var['project_id'];?>">
	<div class="detail">
		<h2><?php echo $var['project_name'];?></h2>
		<p>
			<span>รหัส <?php echo $var['project_id'];?></span>
			<span><?php echo $var['project_create_time'];?></span>
		</p>
		<p><?php echo $var['project_description'];?></p>
	</div>
	<div class="counter"><?php echo number_format($var['project_total_activity']);?></div>
</a>