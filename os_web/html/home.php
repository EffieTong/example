<? 
session_start();
require "../include/config.inc.php";

$user_name=$_SESSION['user_name'];
$role=$_SESSION['role'];
$user_id=$_SESSION['user_id'];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>我的班级</title>
<link href="../css/home_style.css" rel="stylesheet" type="text/css" />
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<script src="../js/jquery-1.10.2.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
	$("#button1").click(function(){
		$(".line1").slideToggle(800);
	});
	$("#button2").click(function(){
		$(".line2").slideToggle(800);
	});

});

</script>
</head>
<body>
<div id="container">
	<div id="header"><a href="../php/logout.php">注销</a><? echo "Role: ".$role." Name:".$user_name  ?></div>
		
		<div class="navigationBox">
			<div class="navigationLeft"></div>
			<div class="navigation"><a href="">我的班级</a></div>
			<div class="navigation"><a href="">测试记录</a></div>
			<div class="navigation"><a href="">论坛</a></div>
		</div>
		
		<div id="mainContent">
		
		<div id="left">
			<div class="avatar">img</div>
			<p align="center" ><? echo $user_name ?></p>
			<p align="center">
			<button id="edit"> 编辑</button>
			
			</p>
			
		</div>
		<div id="right">
	
  
		<?  if($role == "s") { include("home_student.php"); }	
			if($role == "t"){ include("home_teacher.php"); }
		?>
		</div>
		
		<!--<div id="detail">
			<div class="tit"><i class="close">关闭</i></div>
			<pre>
				rerer
			</pre>
		</div>
		<script type="text/javascript">
			$("#t1").click(function(){
					popWin("detail");
			});
			
		</script>
		</div>-->
	
	
	<div id="footer" align="center">Copyright GDUFS</div>
	
</div>
</body>
</html>
