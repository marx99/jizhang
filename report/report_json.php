<? require_once("../common.inc"); ?>


	<?php
		$conn = connect();
//print $_POST['sql']; exit();
		$sql = $_POST['sql']; //"SELECT date,sum(num) as jieyu FROM detail WHERE shouzhi='2' group by date";
		$result = $conn->query($sql);

		$data="";
	  $array= array();
	  class User{
		public $name;
		public $age;
		public $age1;
	  }
		if ($result) {

			// 输出每行数据
			while($row = $result->fetch_assoc()) {
				$user=new User();
				$user->name = $row['group_item'];
				$user->age = $row['num'];
				if ($_POST['flg']=='2'){
					$user->age1 = $row['num1'];
				}
				$array[]=$user;
			}

			$data=json_encode($array);
		  // echo "{".'"user"'.":".$data."}";
		  echo $data; 
		} else {
			echo "{}";
		}
		$conn->close();
	?>
