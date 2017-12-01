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
	<?php if(count($projects) > 0){?>
	<h1>โครงการของคุณ <?php echo count($projects);?> รายการ</h1>
	<?php }?>

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
<script type="text/javascript" src="js/lib/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/init.js"></script>
</body>
</html>
