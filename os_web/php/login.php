<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
session_start();
require "../include/config.inc.php";

$action=$_GET['action'];
$user_id=$_POST['user_id'];
$password=$_POST['password'];


//print_r($user_id.$password.$role);

if($action=="login")
{
	
	$sql="select * from user where user_id='".$user_id."' and psw='".$password."'";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	
	if($row)
	{
		//status is approved then logon.
		if($row['status']=="approve"){
		 $_SESSION['user_name']=$row['user_name'];
		 $_SESSION['role']=$row['role'];
		 $_SESSION['user_id']=$user_id;	
		 //print_r($_SESSION);
			 if($_SESSION['role'] == "a"){
				echo ("<script type='text/javascript'> location.href='../html/admin.php';</script>");
			 }
			 else{
				echo("<script type='text/javascript'> location.href='../html/home.php';</script>");
			 }
		}else if($row['status']=="pending"){
		echo("<script type='text/javascript'> alert('账号正在审核中');location.href='../html/login.html';</script>");
		}else if($row['status']=="stop"){
		echo("<script type='text/javascript'> alert('账号已停止使用，请联系管理员');location.href='../html/login.html';</script>");
		}
		
	}
	else
	{
		echo("<script type='text/javascript'> location.href='../html/login.html';</script>");	
		
	}
}



if($action == "register"){
	$user_name=$_POST["user_name"];
	$role=$_POST['selectRole'];
	//print_r($role);
	$sql1="select * from user where user_id='".$user_id."'";
	$result1 = mysql_query($sql1);
	$row1=mysql_fetch_array($result1);
	
	if($row1){
		echo("<script type='text/javascript'> alert('该账号已注册！');location.href='../html/login.html#register';</script>");
	}else{
		$sql2 = "insert into user(user_id,user_name,role,status,psw) values ('".$user_id."','".$user_name."','".$role."','pending','".$password."')";
		$result2=mysql_query($sql2);
		echo("<script type='text/javascript'>alert('注册完成，请等待管理员审核！');location.href='../html/login.html';</script>");
	}
	
	

}

?>

