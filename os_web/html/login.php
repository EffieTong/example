<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>操作系统教学网站</title>
<link href="../css/login_style.css" rel="stylesheet" type="text/css" />
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<script src="../js/jquery-1.10.2.js" language="javascript"></script>
<script src="../js/jquery.cookie.js" language="javascript"></script>
<script language="javascript">

//chrome 不支持本地cookie，firefox和IE 可以，验证
$(function(){
	if($.cookie("user_id")!= null && $.cookie("user_id")!= "null"){
		$("#user_id").val($.cookie("user_id"));
	}
	if($.cookie("psw")!= null && $.cookie("psw")!= "null"){
		$("#psw").val($.cookie("psw"));
	}
	
	$("#logon").click(function(){
			if(document.getElementById("remember").checked){
			//alert($("#user_id").value);
			$.cookie("user_id",$("#user_id").val(),{path:"/",expires:7});//7天有效，且被网站所有网页访问
			$.cookie("psw",$("#psw").val(),{path:"/",expires:7});
		}else{
			//alert($("#user_id").value);
			$.cookie("user_id",null,{path:"/"});
			$.cookie("psw",null,{path:"/"});
		}
	
	});

});
function Check1(){
	if (document.form.user_id.value=="")
	{
		var tip1 = document.getElementById("tip1");
		tip1.className = "tips";
		
	}else{
		var tip1 = document.getElementById("tip1");
		tip1.className = "notips";
	}
	
}

function Check2(){
	if (document.form.password.value=="")
	{
		var tip2 = document.getElementById("tip2");
		tip2.className = "tips";
		
	}else{
		var tip2 = document.getElementById("tip2");
		tip2.className = "notips";
	}
	
}

function CheckForm()
{
	
	if (document.form.user_id.value=="")
	{
		var tip1 = document.getElementById("tip1");
		tip1.className = "tips";
		return false;
	}

	if (document.form.password.value=="")
 	{
		var tip2 = document.getElementById("tip2");
		tip2.className = "tips";
		return false;
	}
				
	return true;
			
}

function Check3(){
	if (document.form2.user_id.value=="")
	{
		var tip3 = document.getElementById("tip3");
		tip3.className = "tips";
		
	}else{
		var tip3 = document.getElementById("tip3");
		tip3.className = "notips";
	}
	
}


function Check4(){
	if (document.form2.user_name.value=="")
	{
		var tip4 = document.getElementById("tip4");
		tip4.className = "tips";
		
	}else{
		var tip4 = document.getElementById("tip4");
		tip4.className = "notips";
	}
	
}

function Check5(){
	if (document.form2.password.value=="")
	{
		var tip5 = document.getElementById("tip5");
		tip5.className = "tips";
		
	}else{
		var tip5 = document.getElementById("tip5");
		tip5.className = "notips";
	}
	
}


function CheckForm2()
{
	
	var str="^[0-9]+$";//user_id must be number
	var reg=new RegExp(str);
	if (document.form2.user_id.value=="")
	{
		alert("请输入学号！");
		return false;
	}
	if (!reg.test(document.form2.user_id.value))
	{
		alert("学号不合要求！");
		return false;
	}
	if (document.form2.user_name.value=="")
	{
		alert("请输入姓名！");
		return false;
	}
	if (document.form2.password.value=="")
 	{
		alert("请输入密码！");
		return false;
	}
	if (document.form2.password.value != document.form2.confPassword.value)
 	{
		alert("两次密码不同！");
		return false;
	}
				
	return true;
			
}

 function checknumber(String)
  {
    var letters = "1234567890";
    var i;
    var c;
    for(i=0;i<String.length;i++)
    {
       c = String.charAt(i);
       if(letters.indexOf(c)==-1)
       {
         return true;
       }
    }
    return false;
  }
</Script>

</head>

<body>
<div id="container">
  <div id="header">空白处</div>
	  <div id="loginContent">
			<div id="box">
			
				<ul id="tab_nav">
					<li><a href="#login">登录</a></li>
					<li><a href="#register">注册</a></li>        
				</ul>	
				<div id="tab_content">
					<div id="login"><br />
						<div class="little_box">
						<form method="post" name="form" action="../php/login.php?action=login" >
						<table class="table" align="center">
							<tr>
								<td width="90px">学号：</td>
								<td width="155px"><input id="user_id" name="user_id" type="text" class="input" onblur="return Check1()"/></td>
								<td width="10px"><label id="tip1" class="notips">!</label></td>
								<td colspan="4" rowspan="4" width="50px" >
								<input id="logon" type="submit" value="GO" class="button_Round" onclick="return CheckForm()"/>
								
								</td>
							</tr>
							<tr>
								<td>密码：</td>
								<td><input id="psw" name="password" type="password" class="input" onblur="return Check2()"/></td>
								<td><label id="tip2" class="notips">!</label></td>
							</tr>
							<tr>
								<td></td>
								<td align="left">记住我：<input id="remember" name="remember" type="checkbox" checked="checked"/></td>
							</tr>
							
						</table>
						</form>
						</div>
					</div>
					<div id="register"><br />
					<div class="little_box">
						<form method="post" name="form2" action="../php/login.php?action=register" >
						<table class="table" align="center">
							<tr>
								<td width="90px">学号：</td>
								<td width="155px"><input name="user_id" type="text" class="input" placeholder="入学学号" onblur="return Check3()"/></td>
								<td width="10px"><label id="tip3" class="notips">!</label></td>
								<td colspan="4" rowspan="4" width="50px" ><input type="submit" value="GO" class="button_Round" onclick="return CheckForm2()"/></td>
							</tr>
							<tr>
								<td>姓名：</td>
								<td><input name="user_name" type="text" class="input" placeholder="真实姓名" / onblur="return Check4()"></td>
								<td width="10px"><label id="tip4" class="notips">!</label></td>
							</tr>
							<tr>
								<td>密码：</td>
								<td><input name="password" type="password" class="input" placeholder="6~20位数字、英文大小写" onblur="return Check5()"/></td>
								<td width="10px"><label id="tip5" class="notips">!</label></td>
							</tr>
							<tr>
								<td>重复密码：</td>
								<td><input name="confPassword" type="password" class="input" placeholder=""/></td>
							</tr>
							<tr>
								<td>身份：</td>
								<td>
								<select name="selectRole" class="input" >
								<option value="s"selected="selected">学生</option>
								<option value ="t">老师</option>
								<option value ="a">管理员</option>
								</select>
								</td>
							</tr> 
						</table>
						</form>
						</div>
					
					</div> 
				</div>
			</div>
		
	  </div>
  <div id="footer" align="center">Copyright GDUFS</div>
</div>



</body>
</html>
