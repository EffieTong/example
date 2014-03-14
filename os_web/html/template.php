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
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>我的班级</title>
<link href="../css/home_style.css" rel="stylesheet" type="text/css" />
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link href="../js/chosen_v1.1.0/chosen.css" rel="stylesheet" />

<script src="../js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="../js/jquery.tablesorter.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
	
	$(function(){
		$("table").tablesorter();
	});
	
	$("#avatar").change(function(){
		var objUrl = getObjectURL(this.files[0]) ;
		console.log("objUrl = "+objUrl) ;
		if (objUrl) {
			$("#img0").attr("src", objUrl) ;
		}
	}) ;
	//建立一個可存取到該file的url
	function getObjectURL(file) {
		var url = null ; 
		if (window.createObjectURL!=undefined) { // basic
			url = window.createObjectURL(file) ;
		} else if (window.URL!=undefined) { // mozilla(firefox)
			url = window.URL.createObjectURL(file) ;
		} else if (window.webkitURL!=undefined) { // webkit or chrome
			url = window.webkitURL.createObjectURL(file) ;
		}
		return url ;
	}


	
});


function checkForm1(){
if(document.infoEdit.newPassword.value == "" || document.infoEdit.newPassword.value == null)
	{
		alert("密码不可以为空哦！");
		return false;
	}

if (document.infoEdit.newPassword.value != document.infoEdit.confNewPassword.value)
 	{
		alert("两次密码不同！");
		return false;
	}
}

function checkForm2(){
if(document.updateAvatar.avatar.value == "" || document.updateAvatar.avatar.value == null)
	{
		alert("请选择图片");
		return false;
	}
}


</script>
<script type="text/javascript">
//遮罩
//判断浏览器ie6创建的div样式和非ie6创建的div样式
//创建div
function showPanel(idname){
var isIE = (document.all) ? true : false;
var isIE6 = isIE && ([/MSIE (\d)\.0/i.exec(navigator.userAgent)][0][1] == 6);
var newbox=document.getElementById(idname);
newbox.style.zIndex="9999";
newbox.style.display="block"
newbox.style.position = !isIE6 ? "fixed" : "absolute";
newbox.style.top =newbox.style.left = "50%";
newbox.style.marginTop = - newbox.offsetHeight / 2 + "px";
newbox.style.marginLeft = - newbox.offsetWidth / 2 + "px";
var layer=document.createElement("div");
layer.id="layer";
layer.style.width=layer.style.height="100%";
layer.style.position= !isIE6 ? "fixed" : "absolute";
layer.style.top=layer.style.left=0;
layer.style.backgroundColor="#000";
layer.style.zIndex="9998";
layer.style.opacity="0.6";
document.body.appendChild(layer);
var sel=document.getElementsByTagName("select");
for(var i=0;i<sel.length;i++){
sel[i].style.visibility="hidden";
}
function layer_iestyle(){
layer.style.width=Math.max(document.documentElement.scrollWidth, document.documentElement.clientWidth)
+ "px";
layer.style.height= Math.max(document.documentElement.scrollHeight, document.documentElement.clientHeight) +
"px";
}
function newbox_iestyle(){
newbox.style.marginTop = document.documentElement.scrollTop - newbox.offsetHeight / 2 + "px";
newbox.style.marginLeft = document.documentElement.scrollLeft - newbox.offsetWidth / 2 + "px";
}
if(isIE){layer.style.filter ="alpha(opacity=60)";}
if(isIE6){
layer_iestyle()
newbox_iestyle();
window.attachEvent("onscroll",function(){
newbox_iestyle();
})
window.attachEvent("onresize",layer_iestyle)
} 
layer.onclick=function(){newbox.style.display="none";layer.style.display="none";for(var i=0;i<sel.length;i++){
sel[i].style.visibility="visible";
}}
}




</script>
</head>
<body>
<div id="container">
	<div id="header"><a href="../php/logout.php">注销</a><?php echo "Role: ".$role." User ID :".$user_id  ?></div>
		
		<div class="navigationBox">
			<div class="navigationLeft"></div>
			<div class="navigation"><a href="home.php">我的班级</a></div>
			<div class="navigation"><a href="test.php">测试记录</a></div>
			<div class="navigation"><a href="forum.php">论坛</a></div>
		</div>
		
		<div id="mainContent">
		
		<div id="left">
			<div class="avatar"><img name="avatar" src="../image/<?php echo $_SESSION['user_id'] ?>.jpg" height="100px" width="100px" /></div>
			<p align="center" ><?php echo $user_name ?></p>
			<p align="center">
			<input type="button" class="button" id="showbtn" name="showbtn" onclick="showPanel('infoPanel');" value="编辑" /></p>
			<div id="infoPanel" style="display:none;">			
			<p><b>修改个人信息</b></p>
			<div class="line">
			
			  <table width="360px" >
			  <form  name="infoEdit" action="../php/update.php?action=infoEdit" method="post">
			  <tr>
			  <td width="160px">姓名:</td>
				<td width="200px"><label><?php  echo $_SESSION['user_name'] ?></label></td>
			  </tr>
			  <tr>
				<td>新密码：</td>
				<td><input type="password" name="newPassword" /></td>
		      </tr>
			  <tr>
				<td>重复密码：</td>
				<td><input type="password" name="confNewPassword" /></td>
		      </tr>
			  <tr>
				<td></td>
				<td><input type="submit" class="button" name="updateInfo" value="保存新密码" onclick="return checkForm1()"/></td>
			  </tr>
			  </form>
			  <tr>
			  <form name="updateAvatar" action="../php/update.php?action=updateAvatar" method="post" enctype="multipart/form-data" ><!-- 一定要写enctype="multipart/form-data"这个，否则传不了file name-->
				<td><img src="../image/<?php echo $_SESSION['user_id']; ?>.jpg" id="img0" width="100px" height="100px"  /></td>
				<td>
				<input type="file" name="avatar" id="avatar"  />
				<input type="submit" class="button" value="更新头像" name="updateAvatar" onclick="return checkForm2();">
				</td>
				</form>
			  	
			  </tr>
			  
			  
			</table>
			
			
			
			</div>
			</div>

			</p>
			
		</div>
		<div id="right">
	
  
		
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
