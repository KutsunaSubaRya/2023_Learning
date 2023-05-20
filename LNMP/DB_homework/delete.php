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

$id = $_GET['id'];

if (isset($id)) {
    $delete_sql = "DELETE FROM `student` WHERE `id` = $id"; // TODO

	if ($conn->query($delete_sql) === TRUE) {
        echo "刪除成功!<a href='index.php'>返回主頁</a>";
    }else{
        echo "刪除失敗!";
	}

}else{
	echo "資料不完全";
}
				
?>