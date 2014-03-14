<?php
require_once '../include/config.inc.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div class="grid">
		<div class="title">
		<img src="../web_image/record.png" height="25px" />试卷记录
		</div>
</div>

<div class="grid">
		<div class="title">
		<img src="../web_image/edit.png" height="25px"/>在线出卷
		</div>
		<div>
		<p> <input type="button" class="button" onClick="showPanel('testPanel');" value="题库选题" /></p>
		</div>
		
		<div id="testPanel" style="display:none;">
		<p><b>题库选题</b></p>
		</div>
		
		
		<div>
		<p> <input type="button" class="button" onClick="showPanel('addTestPanel');" value="自主出题" /></p>
		
		
		<div id="addTestPanel" style="display:none;">
		<p><b>新题目</b></p>
			<form method="post">
			<table width="400" border="0">
			  <tr>
			  	<td width="70">题型:</td>
				<td width="10"></td>
				<td>
				<select id="selectType" onchange="return checkSelect()" >
				<option value=""></option>
			<?php 
			$sql1 = "select * from test_type";
			$result1 = mysql_query($sql1);
			while($row1 = mysql_fetch_array($result1)){
			?>
			<option id="type<?php echo $row1['type_id']?>" value="<?php echo $row1['type_id']?>"><?php echo $row1['type']?></option>			
			<?php
			}
			?>
				</select>
				</td>
			  </tr>
			  <tr>
				<td>题目内容:</td>
				<td></td>
				<td><textarea id="textcontent" placeholder="请输入题目内容" rows="6" cols="40" ></textarea></td>
			  </tr>
			 </table>
			 <table id="choice" style="display:none">
			  <tr>
				<td width="70">单选选项：</td>
				<td width="10">A</td>
				<td><textarea id="opta" rows="1" cols="40" name="choice1" ></textarea></td>
			  </tr>
			  <tr>
				<td>&nbsp;</td>
				<td>B</td>
				<td><textarea id="optb" rows="1" cols="40" name="choice2"></textarea></td>
			  </tr>
			  <tr>
				<td>&nbsp;</td>
				<td>C</td>
				<td><textarea id="optc" rows="1" cols="40" name="choice3"></textarea></td>
			  </tr>
			  <tr>
				<td>&nbsp;</td>
				<td>D</td>
				<td><textarea id="optd" rows="1" cols="40" name="choice4"></textarea></td>
			  </tr>
			  <tr>
				<td>答案</td>
				<td></td>
				<td>A<input type="radio" name="choice" value="A" /> B<input type="radio" name="choice" value="B" /> C<input type="radio" name="choice" value="C" /> D<input type="radio" name="choice" value="D" /></td>
			  </tr>
			 </table>
			 <table id="judge" style="display:none">
			   <tr>
				<td width="70">答案：</td>
				<td width="10"></td>
				<td><input type="radio" name="judge" value="T" />T <input type="radio" name="judge" value="F" />F</td>			  
			  </tr>
			  </table>
			  <table id="answer" style="display:none">
			   <tr>
				<td width="70">答案：</td>
				<td width="10"></td>
				<td><textarea id="textfield" rows="1" cols="40" placeholder="必须和参考答案一致才算正确"></textarea></td>
			  </tr>
			</table>
			<p align="center">
			<input type="button" name="addTest" value="确认" class="button" href="javascript:;" onclick="test.newtest()"/>
			<input type="reset" name="clear" value="清空" class="button" /></p>
            <a id="myDiv"></a>
			</form>
            
		<script type="text/javascript" src="../js/test.js">
		</script>
		<script type="text/javascript">
		
		function checkSelect(){
		if(jQuery("#selectType option:selected").text() == "选择"){		
			document.getElementById("choice").style.display="block";
			document.getElementById("answer").style.display="none";
			document.getElementById("judge").style.display="none";		
		}
		else if(jQuery("#selectType option:selected").text() == "填空"){
			document.getElementById("choice").style.display="none";
			document.getElementById("answer").style.display="block";
			document.getElementById("judge").style.display="none";			
		}
		else if(jQuery("#selectType option:selected").text() == "判断"){
			document.getElementById("choice").style.display="none";
			document.getElementById("answer").style.display="none";
			document.getElementById("judge").style.display="block";		
		}else{
			document.getElementById("choice").style.display="none";
			document.getElementById("answer").style.display="none";
			document.getElementById("judge").style.display="none";	
		}
		}
		</script>
		
		</div>
</div>