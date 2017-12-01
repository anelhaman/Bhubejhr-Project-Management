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
		<label for="fullname">ชื่อ-นามสกุล</label>
		<input type="text" id="fullname" placeholder="ชื่อ-นามสกุล" autofocus>
		<label for="phone">เบอร์โทรศัพท์</label>
		<input type="text" id="phone" placeholder="เบอร์โทรศัพท์">
		<label for="info">ชื่อฝ่ายและแผนก</label>
		<textarea id="info" placeholder="ชื่อฝ่ายและแผนก"></textarea>
		<label for="password">รหัสผ่าน</label>
		<input type="text" id="password" placeholder="รหัสผ่าน">

		<button type="btn">ลงทะเบียน</button>
	</div>

	<div class="note">หากคุณเคยลงทะเบียน ไปที่ <a href="login.php">เข้าสู่ระบบ</a></div>
</div>
</body>
</html>
