<?php

// ******** update your personal settings ******** 
$servername = "127.0.0.1";
$username = "root";
$password = "123456";
$dbname = "db_final";

// Connecting to and selecting a MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $conn->error);
    exit();
}

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if (isset($_POST['StuName']) && isset($_POST['StuNum']) && isset($_POST['passwd']) && isset($_POST['gender'])) {
	$StuName = $_POST['StuName'];
	$StuNum = $_POST['StuNum'];
	$passwd = $_POST['passwd'];
	$gender = $_POST['gender'];
	$id = $_POST['id'];

	$update_sql = "UPDATE `student` SET `StuName`= '$StuName',`StuNum`= $StuNum,`passwd`= $passwd,`gender`= $gender WHERE `id` = $id"; // TODO

	if ($conn->query($update_sql) === TRUE) {
		echo "修改成功!!<br> <a href='index.php'>返回主頁</a>";
	} else {
		echo "<h2 align='center'><font color='antiquewith'>修改失敗!!</font></h2>";
	}

}else{
	echo "資料不完全";
}
				
?>