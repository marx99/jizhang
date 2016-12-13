<? require_once("common.inc"); ?>

<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>Document</title>
 <link rel="stylesheet" href="common.css" type="text/css" />
</head>
 <body>
	<?php require_once("header.php");?>
	<div id="main">
	<?php
		$conn = connect();

		$sql = "SELECT item_id, item_no, item_name,status FROM master WHERE item_id=1";
		$result = $conn->query($sql);

		if ($result) {
			print '<h3>账户结余入力</h3>';
			print '<form name="form1" method="post" action="input_result.php">';
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
			print '</table>';
			print '<INPUT type="hidden" name="cnt" value="'.$x.'">';
			print '<p><INPUT type="submit" value="确认"></p>';
			print '</form>';
		} else {
			echo "0 个结果";
		}
		$conn->close();
	?>

	</div>
 </body>
</html>
