<?php
require_once '../autoload.php';
// header('Access-Control-Allow-Origin: *');
header("Content-type: text/json");

$returnObject = array(
	"apiVersion"  	=> 1.1,
	// "method" 		=> $_SERVER['REQUEST_METHOD'],
	"execute"     	=> floatval(round(microtime(true)-StTime,4)),
);

// if($user->permission != 'admin' || $user->status != 'active'){
// 	$returnObject['message'] = 'user permission error!';
// 	echo json_encode($returnObject);
// 	exit();
// }

$project = new Project();

switch ($_SERVER['REQUEST_METHOD']){
	case 'GET':
		switch ($_GET['request']){
			case 'get':
				$project_id = $_GET['project_id'];
				$dataset	 = $project->get($project_id);
				$returnObject['data'] = $dataset;
				$returnObject['message'] = 'get project data';
				break;
			default:
				$returnObject['message'] = 'GET API Not found!';
			break;
		}
    	break;
    case 'POST':
    	switch ($_POST['request']){
			// case 'create':
			// 	$name = $_POST['name'];
			// 	$category_id = $category->create($name);
			// 	$returnObject['category_id'] = $category_id;
			// 	$returnObject['message'] = 'Category created';
			// 	break;
			default:
				$returnObject['message'] = 'POST API Not found!';
			break;
		}
    	break;
    default:
    	$returnObject['message'] = 'METHOD API Not found!';
    	break;
}

echo json_encode($returnObject);
exit();
?>