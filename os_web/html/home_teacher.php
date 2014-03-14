<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<div class="grid">
	 <div class="title">
	 <img src="../web_image/class.png" height="25px" />班级选择
	 </div>
	 <div>
	 <form action="../php/register_class.php" method="post" name="checkClass">
	 	 <select data-placeholder="请选择您任教的班级" class="chosen-select" multiple style="width:350px;" tabindex="4" name="class[]" id="selectClass" onchange="return checkClass1();">
            		
			<?php 
			$sql4 = "select * from class";
			$result4 = @mysql_query($sql4);
			
			while($row4 = mysql_fetch_array($result4)){
			
			$sql5 = "select * from user_class where role = 't' and class_id = ".$row4['class_id'];
			$result5 = @mysql_query($sql5);
			$row5=mysql_fetch_array($result5);
			
				if($row5){
				?>
					 <option value="<?php echo $row4['class_id']?>" disabled="disabled" ><?php echo $row4['year'].$row4['class_name']?></option>
				<?php
				}else{
				?>
				
				<option value="<?php echo $row4['class_id']?>" ><?php echo $row4['year'].$row4['class_name']?></option>
				
				<?php
				}
			}
			?>
          </select>
		   <input type="submit" value="注册班级" class="button_disabled"  id="register_class_button" disabled="disabled"  />
	 </form>
	 </div>
	</div>
					
			<script src="../js/chosen_v1.1.0/chosen.jquery.js" type="text/javascript"></script>
            <script type="text/javascript" src="../js/class.js"></script>
			<script type="text/javascript">
			//老师多选选班级
			var config = {
			  '.chosen-select'           : {},
			  '.chosen-select-deselect'  : {allow_single_deselect:true},
			  '.chosen-select-no-single' : {disable_search_threshold:10},
			  '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
			  '.chosen-select-width'     : {width:"95%"}
			}
			for (var selector in config) {
			  $(selector).chosen(config[selector]);
			}
		  </script>

<div class="grid">
		<div class="title">
			<img src="../web_image/upload.png" height="25px" />上传课件
			<div class="icon_min" id="button2" ></div>
			</div>
			<div class="clear"></div>
			<div id="line2">
			<div>
			<?php			
			include("../php/upload.php");	
			?>
			</div>
			
			<?php 
			$sql3 = "select * from file where user_id = '".$user_id."'order by create_time";
			$result3 = mysql_query($sql3);
			
			?>
			<table width="580px">
				<thead>
					<tr>
<th width="400px" height="30px">课件名&nbsp;<img src="../web_image/sort.png" height="15px" /></th><th>上传时间&nbsp;<img src="../web_image/sort.png" height="15px" /></th>					</tr>
				</thead>
				<tbody bgcolor="#D5E1FD">
			
			<?php
			while($row3 = mysql_fetch_array($result3)){
				?>
				<tr height="30px">
					<?php /*?><td>
					<input type="checkbox" id="<?php echo $row3['id']?>" />
					</td><?php */?>
					<td>
					<?php echo $row3['file_name']?>
					</td>
					<td>
					<?php echo $row3['create_time']?>
					</td>
				</tr>
				
			<?php					
			}
		 	?>
			</tbody>
			</table>
			</div>
		
</div>
			

<div class="grid">

			<div class="title">
			<img src="../web_image/download.png" height="25px" />学生作业
			<div class="icon_min" id="button1" ></div>
			</div>
			<div class="clear"></div>
			<div id="line1">
			
			<?php 
			$sql1 = "select * from user_class,class where user_id='".$_SESSION['user_id']."' and class.class_id=user_class.class_id order by class.class_id";
			$result1 = @mysql_query($sql1);
			
			while($row = mysql_fetch_array($result1)){
				$sql2 = "select * from class,user_class, homework,user where user_class.class_id = '".$row['class_id']."' and user_class.role = 's' and user_class.user_id = homework.user_id and homework.user_id = user.user_id and class.class_id=user_class.class_id";
				$result2 = @mysql_query($sql2);
				echo "<p>班级：".$row['year'].$row['class_name']."<input type='button' value='X' onclick='class.remove(".$row['class_id'].")'></p>";
				echo "";
				?>
				<table width="580px">
				<thead>
					<tr>
						<th width="100px" height="25px">学号&nbsp;<img src="../web_image/sort.png" height="15px" /></th><th width="100">姓名&nbsp;<img src="../web_image/sort.png" height="15px" /></th><th width="250">作业名&nbsp;<img src="../web_image/sort.png" height="15px" /></th>
					</tr>
				</thead>
				<tbody bgcolor="#D5E1FD">
			<?php
				while ($row2 = mysql_fetch_array($result2)){
				
				
				?>
				<tr height="30px">
					<td><?php echo $row2['user_id']?></td>
					<td><?php echo $row2['user_name']?></td>
					<td><a href="<?php echo $row2['path']?>" target="_blank"><?php echo $row2['file_name']?></a></td>
				</tr>
				<?php
				}
				?>
				</tbody>
				</table>
				<?php
				echo "<br />";
			
			}
			?>			
			</div>
			
</div>
			
