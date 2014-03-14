<?php
session_start();
require_once "../include/config.inc.php";

$user_name=$_SESSION['user_name'];
$role=$_SESSION['role'];
$user_id=$_SESSION['user_id'];

$typeId=$_POST['type'];
$title=$_POST['title'];
$optionA=$_POST['optA'];
$optionB=$_POST['optB'];
$optionC=$_POST['optC'];
$optionD=$_POST['optD'];
$answer=$_POST['answer'];
echo "123";
if(isset($typeId)!=null){
$q="insert into test(type_id,content,A,B,C,D,answer,user_id) values('".$typeId."','".$title."','".$optionA."','".$optionB."','".$optionC."','".$optionD."','".$answer."','".$user_id."')";
echo $q;
$r = mysql_query ($q, $hd) or trigger_error ("Query:$q\n<br />MySQL Error:" . mysql_error ($hd));
echo "success";
}
?>