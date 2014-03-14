<?php
session_start();
require "../include/config.inc.php";
$user_name=$_SESSION['user_name'];
$role=$_SESSION['role'];
$user_id=$_SESSION['user_id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
$action = $_GET['action'];
$forum_id=$_GET['id'];
$comment = $_POST['comment'];
if($action == "add"){
$sql2 = "insert into reply (forum_id,replier_id,comment,role) values(".$forum_id.",'".$user_id."','".$comment."','".$role."')";
$sql3 = "update forum set reply_num = reply_num+1 where forum_id = ".$forum_id;
mysql_query($sql3);
mysql_query($sql2);
echo ("<script type='text/javascript'> location.href='../html/forum_detail.php?id=".$forum_id."';</script>");

}

?>