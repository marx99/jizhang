<? require_once("common.inc"); ?>


	<?php
		$conn = connect();

		$sql = "SELECT date,sum(jieyu) as jieyu FROM jieyu group by date";
		$result = $conn->query($sql);

		$data="";
	  $array= array();
	  class User{
		public $name;
		public $age;
	  }
		if ($result) {

			// 输出每行数据
			while($row = $result->fetch_assoc()) {
				$user=new User();
				$user->name = $row['date'];
				$user->age = $row['jieyu'];
				$array[]=$user;
			}

			$data=json_encode($array);
		  // echo "{".'"user"'.":".$data."}";
		  echo $data; 
		} else {
			echo "0 个结果";
		}
		$conn->close();
	?>
