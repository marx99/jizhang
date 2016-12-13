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
		$cnt = $_POST["cnt"];
		//print $cnt;
		$conn = connect();

		$x=0;
		$sql ="";
		while($x < $cnt){
			$sql .= "INSERT INTO jieyu VALUES('".date("Ymd")."','".$_POST["item_no_".$x]."',".$_POST["item_num_".$x].",'',now());";
			$x++;
		}
		//print $sql;

		if ($conn->multi_query($sql) === TRUE) {
			echo "新记录插入成功";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
	?>

	</div>
 </body>
</html>
