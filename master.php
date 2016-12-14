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
<form name="form1" method="post" action="master_result.php">
<?php

	$conn = connect();

	$sql = "SELECT item_id, item_no, item_name,status FROM master ORDER BY item_id,item_no";
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
	$sql = "SELECT item_id, max(item_no) as item_no FROM master group by item_id";
	$result = $conn->query($sql);

	if ($result) {
		// 输出每行数据
		while($row = $result->fetch_assoc()) {
			$item_no_max[$row["item_id"]] = $row["item_no"];
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
			print '<td><input type="text" style="width:30px;" name="item_no_'.$x.'_'.$i.'" value="'.$item_no[$x][$i].'" readonly=true></input></td>';
			print '<td><input type="text" name="item_name_'.$x.'_'.$i.'" value="'.$item_name[$x][$i].'"></input></td>';
			print '<td>'.$status[$x][$i].'</td>';
			print '</tr>';
			$i++;
		}
		print '</table>';
		print '<br>';
		if ($x==1){
			print '<p><input type="button" id="account_add" value="添加" ></input></p>';
		}
		elseif ($x==2){
			print '<p><input type="button" id="shouru_add" value="添加" ></input></p>';
		}
		elseif ($x==3){
			print '<p><input type="button" id="zhichu_add" value="添加" ></input></p>';
		}
		print '<br>';
		$x++;
	}
?>
<!-- 最大item_no取得，追加时使用 -->
<input type="hidden" name="max_1" id="max_1" value="<?= $item_no_max["1"] ?>"></input>
<input type="hidden" name="max_2" id="max_2" value="<?= $item_no_max["2"] ?>"></input>
<input type="hidden" name="max_3" id="max_3" value="<?= $item_no_max["3"] ?>"></input>
<p><input type="submit" id="add" style="width:60px;" value="登录" ></input></p>
</form>
</div>
 </body>
</html>
