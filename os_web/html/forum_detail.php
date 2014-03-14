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
<title>论坛</title>
<script type="text/javascript">
function check(){
if(document.getElementById("reply").value != ""){
document.getElementById("reply_button").removeAttribute('disabled');
}else if(document.getElementById("reply").value == ""){
document.getElementById("reply_button").disabled="disabled";
}
}
</script>
</head>

<body>
<?php 
$forum_id=$_GET['id'];
$sql = "select * from forum where forum_id=".$forum_id;
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)){
	echo $row['title'];
}

?>
<form action="../php/add_forum.php?action=add&id=<?php echo $forum_id?>" method="post">
<textarea  id="reply" cols="20" rows="3" onblur="return check()" name="comment"></textarea>
<input  id="reply_button" type="submit" value="回复" disabled="disabled"/>
</form>

<table border="1">
<thead>
<?php 
$sql0 = "select * from forum,user where forum_id=".$forum_id." and author_id=user_id";
$result0 = mysql_query($sql0);
while($row0 = mysql_fetch_array($result0)){
	echo "<th>".$row0['user_name']."</th>";
	echo "<th>".$row0['role']."</th>";
	echo "<th>".$row0['content']."</th>";
	echo "<th>".$row0['edit_time']."</th>";

}

?>
</thead>
<tbody>

<?php 


//print_r($forum_id);
$sql1 = "select * from forum,reply,user where forum.forum_id=".$forum_id." and forum.forum_id=reply.forum_id and reply.replier_id=user.user_id";
$result1 = mysql_query($sql1);
while($row1 = mysql_fetch_array($result1)){

?>

<tr>
<td><?php echo $row1['user_name']?></td>
<td><?php echo $row1['role']?></td>
<td><?php echo $row1['comment']?></td>
<td><?php echo $row1['reply_time']?></td>
</tr>

<?php
}
?>
</tbody>
</table>
</body>
</html>
