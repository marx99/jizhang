<? require_once("common.inc"); ?>

<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>input</title>
 <link rel="stylesheet" href="common.css" type="text/css" />
</head>
 <body>
	<?php require_once("header.php");?>
	<div id="main">
	<form name="form1" method="post" action="input_result.php">
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

		$sql = "SELECT item_id, item_no, item_name,status FROM master WHERE item_id=1 ORDER BY item_no";
		$result = $conn->query($sql);

		if ($result) {
			print '<h3>账户结余入力</h3>';
			//print '<form name="form1" method="post" action="input_result.php">';
			print '<table border="1" cellpadding="3" cellspacing="0" class="data" bordercolor="#C0C0C0">';
			print '<tr>';
			print '<th class="td-width-200">账户</th>';
			print '<th>余额</th>';
			print '<th>状态</th>';
			print '<th>时间</th>';
			print '</tr>';

			// 输出每行数据
			$x=0;
			while($row = $result->fetch_assoc()) {
				print '<tr>';
				print '<td class="td-width-200">'.$row["item_name"].'</td>';
				print '<td><input type="text" class="width-100" name="item_num_'.$x.'" value=""></input></td>';
				print '<td>'.$row["status"].'</td>';
				print '<td>'.date("Y-m-d").'</td>';
				print '</tr>';
				print '<INPUT type="hidden" name="item_no_'.$x.'" value="'.$row["item_no"].'">';
				$x++;
			}
			print '</table><br>';
			print '<INPUT type="hidden" name="cnt" value="'.$x.'">';
			//print '<p><INPUT type="submit" value="确认"></p>';
			//print '</form>';
		} else {
			echo "0 个结果";
		}
		$conn->close();
		
		//收支
		$x=2;
		while($x<=3){
			if ($x==2){
				print '<h3>主要收入</h3>';
				print '<table id="shouru_tb">';
			}
			elseif ($x==3){
				print '<h3>主要支出</h3>';
				print '<table id="zhichu_tb">';
			}
			print '<tr><th>No.</th><th>时间</th><th>分类</th><th>数额</th><th>备注</th></tr>';
			$i=0;
			while($i < count($item_no[$x])){
				print '<tr>';
				print '<td>'.($i+1).'</td>';
				print '<td>'.date("Y-m-d").'</td>';

				print '<td><select style="width:80px;" name="item_fenlei_'.$x.'_'.$i.'">';
				$u =0;
				while($u < count($item_no[$x])){
					print '<option value="'.$item_no[$x][$u].'">'.$item_name[$x][$u].'</option>';
					$u++;
				}
				print '</select></td>';

				print '<td><input type="text" style="width:80px;" name="item_num_'.$x.'_'.$i.'" value="" ></input></td>';
				print '<td><input type="text" name="item_mark_'.$x.'_'.$i.'" value=""></input></td>';
				print '</tr>';
				$i++;
				print '<input type="hidden" name="max_'.$x.'" value="'.$i.'">';
			}
			print '</table>';
			print '<br>';
			$x++;
		}
	?>
	<p>	<input type="text" name="date_input" value="<?= date('Ymd') ?>">
	<INPUT type="submit" style="width:80px;" value="确认"></p>
	</form>
	</div>
 </body>
</html>
