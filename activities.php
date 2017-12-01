<?php
require_once 'autoload.php';

if (!$user_online) {
	# code...
	header("Location:./login.php");
	exit();
}

$projectid = $_GET["project"];
$ownerid = $_GET["owner"];

$pj = $project->getProjectFromID($projectid);
$allact = $activity->countActivitiesFromProjectID($projectid);

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

<?php include_once 'header.php';?>

	<div class="container" >
		<div class="actcontent">
	<h2> <?php echo $pj['name'] ;?></h2>





<form class="" action="addactivity.php" method="post">

<label> เพิ่มกิจกรรม </label>
			<input type="text" name="activity_name" value="" class="input form-control input-md " placeholder="กรอกรายการกิจกรรม" required="" autofocus>
			<button type="submit" name="" value="" class="button btn btn-info "><i class="fa fa-plus-circle" aria-hidden="true"></i> เพิ่มกิจกรรมใหม่</button>
			<input type="hidden" name="project_id" value="<?php echo $pj['id']; ?>">

</form>
<?php



// echo "<br><br>projectid :".$projectid."<br>";
// echo "ownerid :".$ownerid;

?>
</div>

<div class="actdetail">

	<h4>รายงานสถานะทั้งหมด <?php echo $allact['n']; ?> กิจกรรม</h4>
		<table class="table table-hover">
			<thead>
				<tr>
					<th class="center no">ลำดับ</th>
					<th class="center">กิจกรรม</th>
					<th class="center w">สถานะ</th>
				</tr>

			</thead>
			<tbody>
				<tr>
					<?php

					$i=0;
					echo "<div style='color:#FFF'>Project => ". $pj["id"]."</div>";

					$act = $activity->getActFromProjectID($pj["id"]);
					foreach ($act as $key => $value) {
						$i++;

						echo "<tr> ";
						echo	"<td class='no center'>".$i."</td>";
						echo "<td> ";
						//echo "<a href='activities.php?project=".$value["id"]."&owner=".$value["owner"]."'>";
						echo $value['name'];
						echo " </td>";
						//echo "</a>";
						echo "<td class='center'>ดำเนินการ</td>";
						echo " </tr>";
					}

					?>
				</tr>

			</tbody>


		</table>

</div>
	</div>









<script type="text/javascript" src="js/lib/jquery-3.2.1.min.js"></script>
</body>
</html>
