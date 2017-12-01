<a class="project-items" href="project.php?id=<?php echo $var['project_id'];?>">
	<div class="detail">
		<h2><?php echo $var['project_name'];?></h2>
		<p>
			<span>รหัส <?php echo $var['project_id'];?></span>
			<span><?php echo $var['project_create_time'];?></span>
		</p>
		<p>ผ่านมาแล้วสำหรับ "เดือนพฤศจิกายน" ครบสี่เดือนพอดีกับการทำงาน Freelance เต้นกินรำกินบนเส้นสายงานออกแบบ</p>
	</div>
	<div class="counter"><?php echo number_format($var['project_total_activity']);?></div>
</a>