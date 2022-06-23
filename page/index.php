<?php
ob_start();
session_start();
include 'koneksi.php';
?>
<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/jquery-ui.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/responsive.css">
<link rel="stylesheet" href="datatables/dataTables.bootstrap.min.css"/>
<script src="jquery/jquery-3.5.1.js"></script>
<script src="datatables/jquery.dataTables.min.js"></script>
<script src="datatables/dataTables.bootstrap.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</head>
<body>
<div id="wrapper">
<?php
date_default_timezone_set("Asia/Jakarta");
include('koneksi.php');
include("admin-sidebar.php");
include("admin-navbar.php");
?>
<section id="content-wrapper">
        <?php 
			if (isset($_GET['hal']) && strlen($_GET['hal']) > 0) {
                $hal = str_replace(".", "/", $_GET['hal']) . ".php";
            } else {
                $hal = "dashboard.php";
            }
            if (file_exists($hal)) {
                include($hal);
            } else {
                include("dashboard.php");
            }
        ?>
</section>
</div>
<script type="text/javascript">
$(document).ready(function () {
    $('#example').DataTable();
});
</script>
</body>
</html>