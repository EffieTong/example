<? 
session_start();
require "../include/config.inc.php";

$action=$_GET['action'];
$user_id=$_POST['user_id'];
$password=$_POST['password'];


//print_r($user_id.$password.$role);

if($action=="login")
{
	
	$sql="select * from user where user_id='".$user_id."' and psw='".$password."'";
	$result=@mysql_query($sql);
	$row=@mysql_fetch_array($result);
	
	if($row)
	{
		//status is approved then logon.
		if($row[status]=="approve"){
		 $_SESSION['user_name']=$row[user_name];
		 $_SESSION['role']=$row[role];
		 $_SESSION['user_id']=$user_id;	
		 //print_r($_SESSION);
		 if($_SESSION['role'] == "a"){
		 echo ("<script type='text/javascript'> location.href='../html/admin.php';</script>");
		 }else{
		echo("<script type='text/javascript'> location.href='../html/home.php';</script>");
		}
		}else if($row[status]=="pending"){
		echo("<script type='text/javascript'> alert('账号正在审核中');location.href='../html/login.html';</script>");
		}else if($row[status]=="stop"){
		echo("<script type='text/javascript'> alert('账号已停止使用，请联系管理员');location.href='../html/login.html';</script>");
		}
		
	}
	else
	{
		echo("<script type='text/javascript'> location.href='../html/login.html';</script>");	
		
	}
}

$user_name=$_POST["user_name"];

if($action == "register"){
	$sql1="select * from user where user_id='".$user_id."'";
	$result1 = @mysql_query($sql1);
	$row=mysql_fetch_array($result1);
	
	if($row){
		echo("<script type='text/javascript'> alert('该账号已注册！');location.href='../html/login.html#register';</script>");
	}else{
		$sql2 = "insert into user(user_id,user_name,role,status,psw) values ('".$user_id."','".$user_name."','".$role."','pending','".$password."')";
		$result2=@mysql_query($sql2);
		echo("<script type='text/javascript'>location.href='../html/home.php';</script>");
	}
	
	

}

?>

