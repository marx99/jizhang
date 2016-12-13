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
    <script src="js/echarts.min.js"></script>
    <script src="js/jquery-1.10.2.min.js"></script>
</head>
 <body>
	<?php require_once("header.php");?>
	<div id="main">
	<?php
		$conn = connect();

		$sql = "SELECT date,sum(jieyu) as jieyu FROM jieyu group by date order by date desc";
		$result = $conn->query($sql);

		$data="";
	  $array= array();
	  class User{
		public $date;
		public $jieyu;
	  }
		if ($result) {
			print '<h3>账户一览</h3>';
			print '<form name="form1" method="post" action="input_result.php">';
			print '<table border="1" cellpadding="3" cellspacing="0" class="data" bordercolor="#C0C0C0">';
			print '<tr>';
			print '<th>时间</th>';
			print '<th>余额</th>';
			print '</tr>';

			// 输出每行数据
			$x=0;
			while($row = $result->fetch_assoc()) {
				print '<tr>';
				print '<td style="width:80px;text-align:center;">'.$row["date"].'</td>';
				print '<td style="width:80px;text-align:right;">'.$row["jieyu"].'</td>';
				print '</tr>';
				$x++;

				$user=new User();
				$user->date = $row['date'];
				$user->jieyu = $row['jieyu'];
				$array[]=$user;
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

    <!-- 为ECharts准备一个具备大小（宽高）的Dom -->
    <div id="main_charts" style="width:800px;height:400px"></div>
    <script src='js/list_echarts.js'></script>
 </body>
</html>
