<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>學生資料庫管理系統</title>
</head>

<body>
<h1 align="center">修改學生資料</h1>
	<form action="doupdate.php" method="post">	
	  <table width="500" border="1" bgcolor="#cccccc" align="center">

	  	<!-- TODO 
		1. 在 index.php 對某筆資料按下`修改`後，會把該筆資料的內容帶入到 `update.php` 表格上
		2. 新增 `ID` 欄位，且屬性為 `唯讀`
		3. 帶入資料時，在`性別`欄位，若該筆資料為男性，則會自動選擇男性選項，否則為女性

		hint : 在index.php對某筆資料按下`修改`後，會把該筆資料的 `id`帶到 `update.php`，
			用該 id 去資料庫做搜尋，再把搜尋到的資料填入到html表單中。
		
		-->

		<?php
			$servername = "127.0.0.1";
			$username = "root";
			$password = "123456";
			$dbname = "db_final";

            // Connect MySQL server
            $conn = new mysqli($servername, $username, $password, $dbname);
            
            // set up char set
            if (!$conn->set_charset("utf8")) {
                printf("Error loading character set utf8: %s\n", $conn->error);
                exit();
            }

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } 
			
			$id = $_GET['id'];
			$sql = "SELECT `StuName`, `StuNum`, `passwd`, `gender` FROM student WHERE `id` = $id"; // set up your sql query
            $result = $conn->query($sql);	// Send SQL Query
			$row = mysqli_fetch_array ( $result, MYSQLI_ASSOC);
			
			echo '<tr>';
			echo '<th>ID</th>';
			echo '<td bgcolor="#FFFFFF"><input type="text" name="id" value="' .$id. '" readonly/></td>';
			echo '</tr>';

			echo '<tr>';
			echo '<th>姓名</th>';
			echo '<td bgcolor="#FFFFFF"><input type="text" name="StuName" value="' .$row['StuName']. '" /></td>';
			echo '</tr>';
			
			echo '<tr>';
			echo '<th>學號 <input type="hidden" name="id" value="" /></th>';
			echo '<td bgcolor="#FFFFFF"><input type="text" name="StuNum" value="' .$row['StuNum']. '" /></td>';
			echo '</tr>';
			
			echo '<tr>';
			echo '<th>密碼</th>';
			echo '<td bgcolor="#FFFFFF"><input type="text" name="passwd" value="' .$row['passwd']. '" /></td>';
			echo '</tr>';
			
			echo '<tr>';
			echo '<th>性別</th>';
			if ($row['gender'] == 1) { // gender = male
				echo '<td bgcolor="#FFFFFF"><input type="radio" name="gender" value="1" checked>男 </input> <input type="radio" name="gender" value="0">女 </input></td>';
			}
			else { // gender = female
				echo '<td bgcolor="#FFFFFF"><input type="radio" name="gender" value="1">男 </input> <input type="radio" name="gender" value="0" checked>女 </input></td>';
			}
			echo '</tr>';
			
			echo '<tr>';
			echo '<th colspan="2"><input type="submit" value="更新"/></th>';
			echo '</tr>';
			//  pass id to doupdate.php
			echo '<input type="hidden" name="id" value="' .$id. '" />';
		?>
	  </table>
	</form>
</body>
</html>