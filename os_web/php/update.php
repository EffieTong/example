<?php
session_start();
require "../include/config.inc.php";

			$action=$_GET['action'];
			
			if($action == "infoEdit"){
				/*
				*update password
				*/
				$newPsw = $_POST['newPassword'];
				$sql = "update user set psw='".$newPsw."' where user_id='".$_SESSION['user_id']."'";
				$result = @mysql_query($sql);
				echo "<script>location.href='../html/home.php';</script>";
			}
			
			if($action == "updateAvatar"){
			
			//update avatar
				if(isset($_POST['updateAvatar'])){
					$basedir="../image/";
					//if update the avatar 
					$name=$_FILES['avatar']['name'];//���� IE��ʶ�� jpg �ļ������ͱ����� pjpeg������ FireFox�������� jpeg.
					//print_r("-----".$name);
					
					if($name != null){
						$type=strstr($name,'.');
						$size=$_FILES['avatar']['size'];
						/*
						���ƴ�С���ƺ�׺
						*/
					if($type!=".jpg" || $size>500000)
					{
						echo "<script>alert('ֻ�����ϴ�jpgͼƬ����СС��5MB.')</script>";
					}
					else
					{
						
						
						//print_r($_FILES['avatar']['tmp_name']);
						$dest_filename=$basedir.$_SESSION['user_id'].$type;
						//print_r($dest_filename);
						if (copy($_FILES['avatar']['tmp_name'],$dest_filename))
									{
										$sql="update user set avatar='../image/".$_SESSION['user_id'].$type."' where user_id='".$_SESSION['user_id']."'";
										mysql_query($sql);
										echo "<script>location.href='../html/home.php'; </script>";
									}
								else
									echo "<script>location.href='../html/home.php';</script>";	
							
							unset($_POST['updateInfo']);
							unset($_FILES);
							
					}
					
					}
					
					
					
				}	
							
			}
			
			
			
			
			
?>
