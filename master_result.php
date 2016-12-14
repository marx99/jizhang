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
		$sql ="DELETE FROM master WHERE item_id IN ('1','2','3');";
		$i = 1 ;
		while($i<=3){
			$cnt = $_POST["max_".$i];
			//print $cnt;
			$conn = connect();

			$x=0;
			while($x < $cnt){
				if ($_POST["item_name_".$i."_".$x] != ""){
					$sql .= "INSERT INTO master VALUES('".$i."','".$_POST["item_no_".$i."_".$x]."','".$_POST["item_name_".$i."_".$x]."','');";
				}
				$x++;
			}
			$i++;
		}
		print $sql;//exit();

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
