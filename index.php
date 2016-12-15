<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>index</title>
 <link rel="stylesheet" href="common.css" type="text/css" />
  <script src="js/jquery-1.10.2.min.js"></script>
  <script src="js/echarts.min.js"></script>
  <script src='js/report_echarts.js'></script>
</head>
 <body>
	<?php require_once("header.php");?>
	<div id="main_charts2" style="width:1000px;height:290px"></div>
	<div id="main_charts3" style="width:800px;height:290px"></div>
	<div id="main_charts4" style="width:800px;height:290px"></div>

	<script type="text/javascript">
		/*var sql = "SELECT date as group_item,sum(num) as num FROM detail WHERE shouzhi='2' group by date";
		SetChart('main_charts1',sql,'每月账户收入','本月收入');*/
		var sql = "SELECT d.date as group_item," 
			+ "(select sum(num) from detail where date = d.date and shouzhi='2') as num," 
			+ "(select sum(num) from detail where date = d.date and shouzhi='3') as num1 " 
			+ "FROM detail d group by d.date";
		SetDoubleChart('main_charts2',sql,'每月收支统计','本月收入','本月支出');

		sql = "SELECT CONCAT(m.item_name,' ',d.mark) as group_item,sum(d.num) as num FROM detail d left join master m on d.shouzhi = m.item_id and d.fenlei = m.item_no WHERE d.shouzhi='2' group by d.fenlei,d.mark order by num desc";
		SetChart('main_charts3',sql,'收入分类','收入');

		sql = "SELECT CONCAT(m.item_name,' ',d.mark) as group_item,sum(d.num) as num FROM detail d left join master m on d.shouzhi = m.item_id and d.fenlei = m.item_no WHERE d.shouzhi='3' group by d.fenlei,d.mark order by num desc";
		SetChart('main_charts4',sql,'支出分类','支出');
	</script>
 </body>
</html>
