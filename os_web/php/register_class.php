<?php
session_start();
require "../include/config.inc.php";
//ѧ��ֻ����ע��һ���༶
if($_SESSION['role'] == "s"){
	print_r($_POST['class']);
	$sql1 = "insert into user_class(user_id,class_id,role) values('".$_SESSION['user_id']."',".$_POST['class'].",'".$_SESSION['role']."')";
	//print_r($sql1);
	mysql_query($sql1);
	?>
	<script type="text/javascript">location.href="../html/home.php";</script>
	<?php
}

//��ʦ����ע�����༶��������ע���Լ��Ѿ�ע����ĺ�������ʦ�Ѿ�ע����İ༶
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