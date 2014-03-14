<?php
session_start();
require "../include/config.inc.php";
//学生只可以注册一个班级
if($_SESSION['role'] == "s"){
	print_r($_POST['class']);
	$sql1 = "insert into user_class(user_id,class_id,role) values('".$_SESSION['user_id']."',".$_POST['class'].",'".$_SESSION['role']."')";
	//print_r($sql1);
	mysql_query($sql1);
	?>
	<script type="text/javascript">location.href="../html/home.php";</script>
	<?php
}

//教师可以注册多个班级，不可以注册自己已经注册过的和其他老师已经注册过的班级
if($_SESSION['role'] == "t"){

	foreach($_POST['class'] as $value){
		print_r($value);
		$sql1 = "insert into user_class(user_id,class_id,role) values('".$_SESSION['user_id']."',".$value.",'".$_SESSION['role']."')";
		//print_r($sql1);
		mysql_query($sql1);
	}
	
	?>
	<script type="text/javascript">location.href="../html/home.php";</script>
	<?php
}
?>