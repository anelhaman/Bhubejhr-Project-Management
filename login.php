<?php
require_once 'autoload.php';
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
<body class="registerBG">
<div class="register">
	<div class="head">
		<div class="logo">
			<img src="image/logo.png" alt="">
		</div>
		<div class="text">
			<h1>Bhubejhr Project Management</h1>
			<p>Chaophya Abhaibhubejhr Hospital</p>
		</div>
	</div>

	<div class="form">
		<label for="phone">เบอร์โทรศัพท์</label>
		<input type="text" id="phone" placeholder="เบอร์โทรศัพท์" autofocus>
		<label for="password">รหัสผ่าน</label>
		<input type="text" id="password" placeholder="รหัสผ่าน">

		<button type="btn">เข้าสู่ระบบ</button>
	</div>

	<div class="note">หากคุณยังไม่เคยเข้าใช้งาน กรุณาไปที่ <a href="register.php">ลงทะเบียนใหม่<i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>
</div>
</body>
</html>