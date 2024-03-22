<!DOCTYPE html>
<html lang="en">
<head>
<title>PHP Object Oriented Programming</title>
<!-- Unicode Vietnamese -->
<meta charset="utf-8">
<meta name="author" content="HuynhThaiHung.com" />
<!-- css definition file -->
<link href="style.css" rel="stylesheet" />
</head>

<body>
<div id="wrapper">
<div class="row">
<?php
require_once("thanhvien.php");
// Tạo đối tượng member
$sv = new member("Nguyen Van A", "email1@gmail.com");
// In thông tin của đối tượng member
echo "<h2>-- Member information --</h2>";
echo "Code: ".$sv -> get_id()."<br/>";
echo "Fullname: ".$sv -> get_fullname()."<br/>";
echo "Email: ".$sv -> get_email()."<br/>";
?>
<?php
// Tạo đối tượng member khác
$sv2 = new member("Tran Van B", "email2@gmail.com");
echo "<h2>---More information--</h2>";
echo "Code: ".$sv2 -> get_id()."<br/>";
echo "Fullname: ".$sv2 -> get_fullname()."<br/>";
echo "Email: ".$sv2 -> get_email()."<br/>";
?>
<?php
// Include file staff.php
include("staff.php");
// Tạo đối tượng character
$character = new character("Nguyen Van A", 5678);
echo "<h2>--- Add: Object Oriented PHP --</h2>";
echo "Full name: ".$character -> get_fullname()."<br/>";
echo "Country code: ".$character -> get_countrycode()."<br/>";
?>
<?php
// Tạo đối tượng staff
$staff = new staff("Nguyen Van B", 1234, "Guard");
echo "<h2>---Staff--</h2>";
echo "Id Staff: ".$staff -> getStaffCode() ."<br/>";
echo "Fullname: ".$staff -> get_fullname()."<br/>";
echo "ID QG: ".$staff -> get_countrycode()."<br/>";
echo "Gruad: ".$staff -> getPart()."<br/>";
?>
</div>
<footer>
<p>Trendemy: <a href="trendemy.com">trendemy@gmail.com</a>.</p>
</footer>
</div>
</body>
</html>
