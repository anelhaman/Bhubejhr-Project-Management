<?php
require_once '../autoload.php';
header("Content-type: text/json");

$returnObject = array(
	"apiVersion"  	=> 1.0,
	"execute"     	=> floatval(round(microtime(true)-StTime,4)),
);

$signature 	= new Signature;

switch ($_SERVER['REQUEST_METHOD']){
	case 'GET':
		// switch ($_GET['request']){
		// 	case 'list':
		// 		$dataset = $app->listAll();

		// 		$returnObject['items'] = $dataset;
		// 		$returnObject['message'] = 'list all apps';
		// 		break;
		// 	default:
		// 		$returnObject['message'] = 'GET API Not found!';
		// 	break;
		// }
    	break;
    case 'POST':
    	switch ($_POST['request']){
    		case 'register':
				$fullname 	= $_POST['fullname'];
				$username 	= $_POST['username'];
				$password 	= $_POST['password'];
				$bio 		= $_POST['bio'];

				$user_id = $user->register($fullname,$username,$password,$bio);

				if(true){
					$state = $user->login($username,$password);
				}

				$returnObject['message'] 	= 'New Account Created!';
				$returnObject['account_id'] = $user_id;

				break;
			case 'login':
				$username = $_POST['username'];
				$password = $_POST['password'];

				$state = $user->login($_POST['username'],$_POST['password']);

				if($state == 1) $message = 'login success';
				else if($state == 1) $message = 'Login fail';
				else if($state == -1) $message = 'Account Locked';
				else $message = 'n/a';

				$returnObject['message'] 	= $message;
				$returnObject['state'] 		= $state;
				
				break;
			case 'edit_profile':
				$username 	= $_POST['username'];
				$email 		= $_POST['email'];
				$name 		= $_POST['name'];
				$company 	= $_POST['company'];
				$position 	= $_POST['position'];

				$user->editProfile($user->id,$username,$email,$name,$company,$position);

				$returnObject['message'] 	= 'Profile edited.';
				break;
			case 'change_password':
				$newpassword = $_POST['newpassword'];

				$user->changePassword($user->id,$newpassword);

				$returnObject['message'] 	= 'Password changed.';
				break;
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