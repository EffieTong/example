<?php 
session_start();
require "../include/config.inc.php";

$user_id=$_SESSION['user_id'];
$role=$_SESSION['role'];
$action=$_GET['action'];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>无标题文档</title>
</head>

<body>
</body>
</html>
<?php 
$title=$_POST['title'];
$content=$_POST['content'];
if($action == "add"){

$sql = "insert into forum(title,content,author_id,role) values('".$title."','".$content."',".$user_id.",'".$role."')";
//print_r($sql);
mysql_query($sql);
echo("<script type='text/javascript'> location.href='../html/forum.php';</script>");	

}

?>

