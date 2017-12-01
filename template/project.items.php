<div class="project-items" data-id="<?php echo $var['project_id'];?>">
	<a href="project.php?id=<?php echo $var['project_id'];?>" class="detail">
		<h2><?php echo $var['project_name'];?></h2>
		<p>
			<span>รหัส <?php echo $var['project_id'];?></span>
			<span><?php echo $var['project_create_time'];?></span>
		</p>
		<p><?php echo $var['project_description'];?></p>
	</a>
	<div class="counter"><?php echo number_format($var['project_total_activity']);?></div>
	<div class="edit">
		<i class="fa fa-ellipsis-v" aria-hidden="true"></i>

		<div class="edit-menu">
			<div class="items btn-editor" data-op="edit"><i class="fa fa-cog" aria-hidden="true"></i>แก้ไข</div>
			<div class="items btn-delete" data-op="delete"><i class="fa fa-times" aria-hidden="true"></i>ลบออก</div>
		</div>
	</div>
</div>