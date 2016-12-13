<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>index</title>
 <link rel="stylesheet" href="common.css" type="text/css" />
</head>
 <body>
	<?php require_once("header.php");?>
	<?php
if (!function_exists('mysqli_init') && !extension_loaded('mysqli')) {
    echo 'We don\'t have mysqli!!!';
} else {
    echo 'Phew we have it!';
}
?>
 </body>
</html>
