<? require_once("common.inc"); ?>

<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>账户一览</title>
 <link rel="stylesheet" href="common.css" type="text/css" />
    <script src="js/echarts.min.js"></script>
    <script src="js/jquery-1.10.2.min.js"></script>
  <script src='js/report_echarts.js'></script>
</head>
 <body>
	<?php require_once("header.php");?>
	<div id="main">
	<?php
		$conn = connect();

		$sql = "SELECT CONCAT(left(j.date,4) , '-' , substring(j.date,5,2) , '-' , right(j.date,2)) as date,";
		$sql .= "(select jieyu from jieyu where account='1' and date  = j.date) as a1,";
		$sql .= "(select jieyu from jieyu where account='2' and date  = j.date) as a2,";
		$sql .= "(select jieyu from jieyu where account='3' and date  = j.date) as a3,";
		$sql .= "(select jieyu from jieyu where account='4' and date  = j.date) as a4,";
		$sql .= "(select jieyu from jieyu where account='5' and date  = j.date) as a5,";
		$sql .= "(select jieyu from jieyu where account='6' and date  = j.date) as a6,";
		$sql .= "(select jieyu from jieyu where account='7' and date  = j.date) as a7,";
		$sql .= "sum(j.jieyu) as jieyu ";
		$sql .= "FROM jieyu j group by j.date order by j.date ";
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
			print '<th style="width:80px;">时间</th>';
			print '<th style="width:80px;">中国银行</th>';
			print '<th style="width:80px;">工商银行</th>';
			print '<th style="width:80px;">浦发银行</th>';
			print '<th style="width:80px;">招商银行</th>';
			print '<th style="width:80px;">支付宝</th>';
			print '<th style="width:80px;">现金</th>';
			print '<th style="width:80px;">股票</th>';
			print '<th style="width:80px;">总余额</th>';
			print '</tr>';
			print '</table>';
			
			print '<div class="div-overflow-scroll">';
			print '<table border="1" cellpadding="3" cellspacing="0" class="data" bordercolor="#C0C0C0">';
			// 输出每行数据
			$x=0;
			while($row = $result->fetch_assoc()) {
				print '<tr>';
				print '<td style="width:80px;text-align:center;">'.$row["date"].'</td>';
				print '<td style="width:80px;text-align:right;">'.$row["a1"].'</td>';
				print '<td style="width:80px;text-align:right;">'.$row["a2"].'</td>';
				print '<td style="width:80px;text-align:right;">'.$row["a3"].'</td>';
				print '<td style="width:80px;text-align:right;">'.$row["a4"].'</td>';
				print '<td style="width:80px;text-align:right;">'.$row["a5"].'</td>';
				print '<td style="width:80px;text-align:right;">'.$row["a6"].'</td>';
				print '<td style="width:80px;text-align:right;">'.$row["a7"].'</td>';
				print '<td style="width:80px;text-align:right;"><b>'.$row["jieyu"].'</b></td>';
				print '</tr>';
				$x++;

				$user=new User();
				$user->date = $row['date'];
				$user->jieyu = $row['jieyu'];
				$array[]=$user;
			}
			print '</table>';
			print '</div>';
			print '<INPUT type="hidden" name="cnt" value="'.$x.'">';
			print '</form>';
		} else {
			echo "0 个结果";
		}
		$conn->close();

	    //require_once("list_echarts_2.php");exit();
	?>
	<br>
    <!-- 为ECharts准备一个具备大小（宽高）的Dom -->
    <div id="main_charts" style="width:800px;height:400px"></div>
	<script type="text/javascript">
		var sql = "SELECT date as group_item,sum(jieyu) as num FROM jieyu group by date order by date ";
		SetChart('main_charts',sql,'帐户余额一览','本月余额');
	</script>
 </body>
</html>
