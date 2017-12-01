<?php
require_once 'autoload.php';

if (!$user_online) {
	# code...
	header("Location:./login.php");
	exit();
}
$project_id = $_GET['id'];
$activity = new Activity();
$project = new Project();

$project_data = $project->get($project_id);
$activities = $activity->listAll($project_id);
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
<div class="headpage">
	<h1><?php echo $project_data['project_name'];?></h1>
	<p>Reporting and Analytics for Chaophya Abhaibhubejhr Hospital Prachinburi</p>
</div>

<div class="list-container">
	<?php if(count($activities) > 0){?>
	<h1><?php echo count($activities);?> กิจกรรม</h1>
	<?php }?>

	<?php if(count($activities) > 0){?>
	<div class="list-content">
		<?php
		foreach ($activities as $var){
			include'template/activity.items.php';
		}
		?>
	</div>
	<?php }else{?>
	<div class="empty">ไม่พบรายการ...</div>
	<?php }?>
</div>

<script type="text/javascript" src="js/lib/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/lib/jquery-form.min.js"></script>
<script type="text/javascript" src="js/lib/autosize.js"></script>
<script type="text/javascript" src="js/init.js"></script>
<script type="text/javascript" src="js/category.js"></script>
</body>
</html>
