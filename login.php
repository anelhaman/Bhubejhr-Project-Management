<?php
require_once 'autoload.php';
if($user_online){
	header('Location: index.php');
	die();
}

$signature 	= new Signature;
$currentPage = 'login';
?>

<!DOCTYPE html>
<html lang="en">

<!-- Meta Tag -->
<meta charset="utf-8">

<!-- Viewport (Responsive) -->
<meta name="viewport" content="width=device-width">
<meta name="viewport" content="user-scalable=no">
<meta name="viewport" content="initial-scale=1,maximum-scale=1">

<title>ลงทะเบียน</title>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel="stylesheet" type="text/css" href="plugin/font-awesome/css/font-awesome.min.css"/>
</head>
<body class="loginBG">
<div class="login">
	<div class="head">
		<div class="logo">
			<img src="image/logo.png" alt="">
		</div>
		<div class="text">
			<h1>Bhubejhr Project Management</h1>
			<p>Chaophya Abhaibhubejhr Hospital</p>
		</div>
	</div>

	<form class="form" action="javascript:login();">
		<label for="username">เบอร์โทรศัพท์</label>
		<input type="phone" class="inputtext" id="username" placeholder="เบอร์โทรศัพท์" autofocus>
		<label for="password">รหัสผ่าน</label>
		<input type="password" class="inputtext" id="password" placeholder="รหัสผ่าน">
		<input type="hidden" id="sign" name="sign" value="<?php echo $signature->generateSignature('login',SECRET_KEY);?>">

		<button type="btn">เข้าสู่ระบบ</button>
	</form>

	<div class="note">หากคุณยังไม่เคยเข้าใช้งาน กรุณาไปที่ <a href="register.php">ลงทะเบียนใหม่<i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>
</div>

<script type="text/javascript" src="js/lib/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/user.js"></script>
</body>
</html>