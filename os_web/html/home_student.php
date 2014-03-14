<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
$sql3 = "select * from user_class where user_id = '".$_SESSION['user_id']."'";
$result3 = @mysql_query($sql3);
$num3=@mysql_num_rows($result3);
if($num3 == 0){
	?>
	<div class="grid">
	<div class="title"><img src="../web_image/class.png" height="25px;" />班级选择</div>
		<div>
		<form action="../php/register_class.php" method="post">
			 <select data-placeholder="请选择班级" class="chosen-select" style="width:350px;" tabindex="2" name="class">
					
			<?php 
			$sql4 = "select * from class";
			$result4 = @mysql_query($sql4);
			
			while($row4 = mysql_fetch_array($result4)){
			?>
			<option value="<?php echo $row4['class_id']?>"><?php echo $row4['year'].$row4['class_name']?></option>
			
			<?php
			}
			?>		
			 </select>
			 <input type="submit" value="注册班级" class="button" />
		</form>	 
	 </div>
	</div>
					
			<script src="../js/chosen_v1.1.0/chosen.jquery.js" type="text/javascript"></script>
			<script type="text/javascript">
			//学生单选班级
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

	<?php 
	
}else{

?>

<div class="grid">
			<div class="title">
			<img src="../web_image/download.png" height="25px" />课件下载
			<div class="icon_min" id="button1" ></div>
			</div>
			<div class="clear"></div>
			<div id="line1">
			<table width="580px">
			<thead>
				<tr>
					<th width="400px" height="30px">课件名&nbsp;<img src="../web_image/sort.png" height="15px" /></th><th>上传时间&nbsp;<img src="../web_image/sort.png" height="15px" /></th>
				</tr>
			</thead>
			<tbody bgcolor="#D5E1FD">
			<?php 
			//print_r($_SESSION['user_id']);
			$sql = "select class_id from user_class where user_id = '".$_SESSION['user_id']."'";
			$result = mysql_query($sql);
			$row = mysql_fetch_array($result);
			$class = $row['class_id'];
			
			$sql2 = "select * from user_class,file where user_class.class_id = ".$class." and user_class.user_id = file.user_id order by create_time";
			$result2=@mysql_query($sql2);
			$num=@mysql_num_rows($result2);
			
			for($i=$num-1;$i>=0;$i--){
				//print_r("@@");
				$path = @mysql_result($result2,$i,'path');
				$file_name = @mysql_result($result2,$i,'file_name');
				$create_time = @mysql_result($result2,$i,'create_time');
				?>
				<tr height="30px">
				<td><a target="_blank" href="<?php echo $path?>"><?php echo $file_name?></a> </td>
				<td><?php echo $create_time?></td>
				</tr>
				
				<?php
				
			}
			
			
			?>
			</tbody>
			</table>
			</div>
			
			<!--<table id="table1">
				<tr>
				<td>1.########</td><td>2010.1.1</td>
				</tr>
				<tr>
				<td>2.########</td><td>2010.1.1</td>
				</tr>
				<tr>
				<td>3.########</td><td>2010.1.1</td>
				</tr>
				<tr>
				<td>4.########</td><td>2010.1.1</td>
				</tr>
			</table>	-->
			</div>
			
			<div class="grid">
			<div class="title">
			<img src="../web_image/upload.png" height="25px" />上传作业
			<div class="icon_min" id="button2" ></div>
			<!--<img src="../web_image/min-box.png" class="icon_min" id="button2" height="25px"/> -->			
			</div>
			
			
			<div class="clear"></div>
			<div id="line2">
			
			<div>
			<?php			
			include("../php/upload.php");	
			?>
			</div>
			<br />
			<table width="580px">
			<thead>
				<tr>
					<th width="400px" height="30px">作业名&nbsp;<img src="../web_image/sort.png" height="15px" /></th><th>上传时间&nbsp;<img src="../web_image/sort.png" height="15px" /></th>
				</tr>
			</thead>
			<tbody bgcolor="#D5E1FD">
			<?php 
			$sql2 = "select * from homework where user_id = '".$user_id."'order by create_time";
			$result2 = @mysql_query($sql2);
			$num2=@mysql_num_rows($result2);
			
			for($i=$num2-1;$i>=0;$i--){
				//print_r("@@");
				$path = @mysql_result($result2,$i,'path');
				$file_name = @mysql_result($result2,$i,'file_name');
				$create_time = @mysql_result($result2,$i,'create_time');
				$homework_id = @mysql_result($result2,$i,'id');
				?>
				
				<tr height="30px">
					<td><a target="_blank" href="<?php echo $path?>"><?php echo $file_name?></a> </td>
					<td><?php echo $create_time?></td>
				</tr>
				
				<?php
				
			}
			?>
			</tbody>
			</table>
			</div>
		
</div>
		<?php 
		}
		?>	