<div class="grid">
			课件下载<button id="button1">折叠 </button>
			<div class="line1">
			<?php 
			//print_r($_SESSION['user_id']);
			$sql = "select * from user_class,files where user_class.user_id = '".$_SESSION['user_id']."' and user_class.class_id = files.class_id";
			$result=@mysql_query($sql);
			$num=@mysql_num_rows($result);
			
			for($i=$num-1;$i>=0;$i--){
				//print_r("@@");
				$path = @mysql_result($result,$i,'path');
				$file_name = @mysql_result($result,$i,'file_name');
				$create_time = @mysql_result($result,$i,'create_time');
				?>
				<li><a href="../files/<? echo $path?>"><? echo $file_name?></a> 
				<? echo $create_time?>
				</li> 
				
				<?
				
			}
			
			
			?>
			
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
			上传作业<button id="button2">折叠 </button>
			<div>
			<?			
			include("../php/upload.php");	
			?>
			</div>
			<div class="line1">
			<? 
			$sql2 = "select * from homework where user_id = '".$user_id."'";
			$result2 = @mysql_query($sql2);
			$num2=@mysql_num_rows($result2);
			?>
			<p>dsfwwefw</p>
			<p>dsfwwefw</p>
			<p>dsfwwefw</p>
			<p>dsfwwefw</p>
			</div>
		
			<!--<table>
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
			