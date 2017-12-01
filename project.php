<?php
require_once 'autoload.php';

if (!$user_online) {
	# code...
	header("Location:./login.php");
	exit();
}
$project_id = $_GET['id'];
$activity = new Activity();
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
<link rel="stylesheet" type="text/css" href="css/test.css"/>

<link rel="stylesheet" type="text/css" href="plugin/font-awesome/css/font-awesome.min.css"/>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<pre><?php print_r($activities); ?></pre>
<script type="text/javascript" src="js/lib/jquery-3.2.1.min.js"></script>
</body>
</html>
