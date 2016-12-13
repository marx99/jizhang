<? require_once("common.inc"); ?>

<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>master</title>
 <link rel="stylesheet" href="common.css" type="text/css" />
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/js_master.js"></script>
</head>
 <body>
	<?php require_once("header.php");?>

<div id="main">
	<?php
	/*
$servername = "localhost";
$username = "root";
$password = "1";
$dbname = "jizhang";

// 创建连接
$conn = new mysqli($servername, $username, $password,$dbname);
 
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 
//echo "连接成功";
//exit();
*/
	$conn = connect();

	$sql = "SELECT item_id, item_no, item_name,status FROM master";
	$result = $conn->query($sql);

	if ($result) {
		// 输出每行数据
		while($row = $result->fetch_assoc()) {
			//echo "<br> item_id: ". $row["item_id"]. " - item_no: ". $row["item_no"]. " " . $row["item_name"];
			$item_no[$row["item_id"]][] = $row["item_no"];
			$item_name[$row["item_id"]][] = $row["item_name"];
			$status[$row["item_id"]][] = $row["status"];
		}
	} else {
		echo "0 个结果";exit();
	}
	$conn->close();

	$x=1;
	while($x<=3){
		if ($x==1){
			print '<h3>账户设定</h3>';
			print '<table id="account_tb">';
		}
		elseif ($x==2){
			print '<h3>收入分类</h3>';
			print '<table id="shouru_tb">';
		}
		elseif ($x==3){
			print '<h3>支出分类</h3>';
			print '<table id="zhichu_tb">';
		}
		$i=0;
		while($i < count($item_no[$x])){
			print '<tr>';
			print '<td class="display-none">'.$item_no[$x][$i].'</td>';
			print '<td><input type="text" name="item_name" value="'.$item_name[$x][$i].'"></input></td>';
			print '<td>'.$status[$x][$i].'</td>';
			print '</tr>';
			$i++;
		}
		print '</table>';
		print '<br>';
		if ($x==1){
			print '<p><input type="button" id="account_add" value="添加" onclick="account_add();"></input></p>';
		}
		elseif ($x==2){
			print '<p><input type="button" id="shouru_add" value="添加" onclick="shouru_add();"></input></p>';
		}
		elseif ($x==3){
			print '<p><input type="button" id="zhichu_add" value="添加" onclick="zhichu_add();"></input></p>';
		}
		print '<br>';
		$x++;
	}
?>
</div>
 </body>
</html>
