<? require_once("common.inc"); ?>

<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>Detail</title>
 <link rel="stylesheet" href="common.css" type="text/css" />
    <script src="js/echarts.js"></script>
    <script src="js/jquery-1.10.2.min.js"></script>
</head>
 <body>
	<?php require_once("header.php");?>
	<div id="main">
	<?php
		$conn = connect();

		$sql = "SELECT d.*,m.item_name FROM detail d left join master m on d.fenlei = m.item_no and d.shouzhi = m.item_id order by d.date desc,d.shouzhi";
		$result = $conn->query($sql);

		if ($result) {
			print '<h3>明细一览</h3>';
			print '<table border="1" cellpadding="3" cellspacing="0" class="data" bordercolor="#C0C0C0">';
			print '<tr>';
			print '<th style="width:60px;">收支</th>';
			print '<th style="width:80px;">时间</th>';
			print '<th style="width:80px;">分类</th>';
			print '<th style="width:80px;">数额</th>';
			print '<th style="width:150px;">备注</th>';
			print '</tr>';

			// 输出每行数据
			$x=0;
			$flag = True;
			$date_temp = "";
			while($row = $result->fetch_assoc()) {
				if ($date_temp != $row["date"]){
					$date_temp = $row["date"];
					$flag = !$flag;
				}
				if ($flag){
					$back_color = "#F9FA7D";
				}else{
					$back_color = "#";
				}

				if ($row["shouzhi"]==2){
					print '<tr style="background-color:'.$back_color.';color:red;">';
					print '<td style="text-align:center;">收入</td>';
				}else{
					print '<tr style="background-color:'.$back_color.';color:green;">';
					print '<td style="text-align:center;">支出</td>';
				}
				
				print '<td style="text-align:center;">'.$row["date"].'</td>';
				//print '<td style="text-align:center;">'.$row["shouzhi"].'</td>';
				print '<td >'.$row["item_name"].'</td>';
				print '<td style="text-align:right;">'.$row["num"].'</td>';
				print '<td>&nbsp;'.$row["mark"].'</td>';
				print '</tr>';
				$x++;
			}
			print '</table>';
			print '<INPUT type="hidden" name="cnt" value="'.$x.'">';
			print '</form>';
		} else {
			echo "0 个结果";
		}
		$conn->close();

	    //require_once("list_echarts_2.php");exit();
	?>

 </body>
</html>
