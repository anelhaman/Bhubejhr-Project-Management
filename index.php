<?php
require_once 'autoload.php';

if (!$user_online) {
	# code...
	header("Location:./login.php");
	exit();
}

$project = new Project();
$projects = $project->listWithUser($user_id);
?>

<!DOCTYPE html>
<html lang="en">

<!-- Meta Tag -->
<meta charset="utf-8">

<!-- Viewport (Responsive) -->
<meta name="viewport" content="width=device-width">
<meta name="viewport" content="user-scalable=no">
<meta name="viewport" content="initial-scale=1,maximum-scale=1">

<title><?php echo TITLE;?></title>

<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel="stylesheet" type="text/css" href="plugin/font-awesome/css/font-awesome.min.css"/>
</head>
<body>
<?php include_once 'header.php';?>
<div class="list-container">
	<div class="head">
		<?php if(count($projects) > 0){?>
		<div class="text">โครงการของคุณ <?php echo count($projects);?> รายการ</div>
		<?php }?>
		<div class="btn" id="btnCreate"><i class="fa fa-plus" aria-hidden="true"></i>เพิ่มโครงการ</div>
	</div>

	<?php if(count($projects) > 0){?>
	<div class="list-content">
		<?php
		foreach ($projects as $var){
			include'template/project.items.php';
		}
		?>
	</div>
	<?php }else{?>
	<div class="empty">ไม่พบรายการ...</div>
	<?php }?>
</div>

<form action="project.process.php" class="form-dialog" id="dialogForm" method="POST" enctype="multipart/form-data">
	<div id="formProgress"></div>
	<div class="topic">
		<span class="text">โครงการ</span>
		<span class="btn-close-dialog" id="btnCloseDialog"><i class="fa fa-times" aria-hidden="true"></i></span>
	</div>

	<label for="name">ชื่อโครงการ</label>
	<input type="text" name="name" id="name" placeholder="Name">

	<label for="description">รายละเอียด</label>
	<input type="text" name="desc" id="desc" placeholder="Description">

	<input type="hidden" name="project_id" id="project_id">
	<button id="btnSubmit" type="submit">สร้างโครงการ</button>
</form>
<script type="text/javascript" src="js/lib/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/lib/jquery-form.min.js"></script>
<script type="text/javascript" src="js/lib/autosize.js"></script>
<script type="text/javascript" src="js/init.js"></script>
<script type="text/javascript" src="js/project.js"></script>
</body>
</html>
