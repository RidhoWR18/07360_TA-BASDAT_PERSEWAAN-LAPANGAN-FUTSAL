<?php
session_start();
include 'page/koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width-device-width, initial-scale=1.0">
	<script src="page/js/bootstrap.js" type="text/javascript"></script>
	<link href="page/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Quicksand:500" rel="stylesheet">
	<title>login</title>

<style>

.bg {
	min-height: 100%;
    min-width: 1024px;
    width: 100%;
    height: auto;
    position: fixed;
    top: 0;
    left: 0;
	opacity: 0.6;
}

.logo {
	font-size: 22px;
	text-align: center;
	text-decoration: bold;
}

body {
	margin: 0;
	padding: 0;
	font-family: sans-serif;
}

.box {
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
	width: 400px;
	padding: 40px;
	background: rgba(255,255,255,.8);
	box-sizing: border-box;
	box-shadow: 5px 5px 20px 5px;
	border-radius: 10px;
}

.box h2 {
	margin: 0 0 30px;
	padding: 0;
	color: #000000;
	text-align: center;
}

.box .inputBox {
	position: relative;
}

.box .inputBox input {
	width: 100%;
	padding: 10px 0;
	font-size: 16px;
	color: #000000;
	letter-spacing: 1px;
	margin-bottom: 30px;
	border: none;
	border-bottom: 1px solid #000000;
	outline: none;
	background: transparent;
}

.box .inputBox label {
	position: absolute;
	top: 0;
	left: 0;
	letter-spacing: 1px;
	padding: 10px 0;
	font-size: 16px;
	color: #000000;
	pointer-events: none;
	transition: .5s;
}

.box .inputBox input:focus ~ label, .box .inputBox input:valid ~ label {
	top: -18px;
	left: 0;
	color: #03a9f4;
	font-size: 12px;
}

.box input[type="submit"] {
	background: transparent;
	border: none;
	outline: none;
	color: #fff;
	background: #03a9f4;
	padding: 10px 20px;
	cursor: pointer;
	border-radius: 5px;
	margin-right: 200px;
	margin-top: 15px;
	font-size: 18px;
}

@media (max-width: 768px) {
	.box {
		width: 350px;
	}
}
</style>
</head>
<body>
	<img class="bg" src="bg.jpg"/>
	<div class="box">
		<div class="logo">LOGIN ADMIN</div><br>
		<form action="login.php" method="POST">
			<div class="inputBox">
			<input type="text" name="nama_pegawai" autocomplete="off" required="">
			<label>Nama Pegawai</label>
			</div>
			<div class="inputBox">
			<input type="password" name="password" required="">
			<label>Password</label>
			</div>
			
			<input type="submit" name="login" value="Login">
		</form>
	</div>
</body>
</html>