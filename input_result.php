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
	<?php
		$cnt = $_POST["cnt"];
		//print $cnt;
		$conn = connect();
		//帐户全额
		$x=0;
		$sql ="DELETE FROM jieyu WHERE date='".$_POST["date_input"]."';";
		while($x < $cnt){
			if ($_POST["item_num_".$x] != ""){
				$sql .= "INSERT INTO jieyu VALUES('".$_POST["date_input"]."','".$_POST["item_no_".$x]."',".$_POST["item_num_".$x].",'',now());";
			}
			$x++;
		}
		print $sql;

		if ($conn->multi_query($sql) === TRUE) {
			echo "帐户全额插入成功<br>";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

		//收支明细
		$i = 2 ;
		$sql ="DELETE FROM detail WHERE date='".$_POST["date_input"]."';";
		while($i<=3){
			$cnt = $_POST["max_".$i];
			//print $cnt;
			$conn = connect();

			$x=0;
			while($x < $cnt){
				if ($_POST["item_num_".$i."_".$x] != ""){
					$sql .= "INSERT INTO detail VALUES('".$_POST["date_input"]."','".$i."','".$_POST["item_fenlei_".$i."_".$x]."','".$_POST["item_num_".$i."_".$x]."','".$_POST["item_mark_".$i."_".$x]."',now());";
				}
				$x++;
			}
			$i++;
		}
		print $sql;//exit();

		if ($conn->multi_query($sql) === TRUE) {
			echo "收支明细插入成功<br>";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
	?>

	</div>
 </body>
</html>
