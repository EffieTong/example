<?	  
//�����ļ�

$user_id=$_SESSION['user_id'];
$role=$_SESSION['role'];
if($role== "s"){
	
	$basedir='../homework/'.$user_id.'/';
	if(!file_exists($basedir)){
		mkdir($basedir);
	}
	if (isset($_POST['upload']))
	{  
		$name=$_FILES['uploadFile']['name'];
		$type=strstr($name,'.');
		$size=$_FILES['uploadFile']['size'];
		//�����ƴ�С
		//print_r($size);
	//	print_r($type);
	//	print_r($name);
		//�����ƺ�׺
		
			if (($_FILES['uploadFile']['tmp_name']=="")||($_FILES['uploadFile']['tmp_name']=="none"))
			{	 
				 echo "<script>alert('Please choose a file.')</script>";
			}
			else
			{	
				
				$dest_filename=$basedir.$_FILES["uploadFile"]["name"];
				
				if (copy($_FILES['uploadFile']['tmp_name'],$dest_filename))
					{
					
						echo "<script>alert('",$_FILES["uploadFile"]["name"]," �ϴ��ɹ�!')</script>";
						echo "<script>location.Reload();</script>";
						$sql = "insert into homework(user_id,file_name,path) values ('".$user_id."','".$name."','".$basedir.$name."')";
						//print_r($sql);
						$result=@mysql_query($sql);
					}
				else
					{
					echo "<script>alert('",$_FILES["uploadFile"]["name"],"�ϴ�ʧ�ܣ�')</script>";	
					}
			}
			
				unset($_POST['submitup']);
				unset($_FILES);
				
		
	}
	
	
			?>
			
			<form enctype="multipart/form-data" action="" method="post">
					��ѡ���ļ���
					<input name="uploadFile" type="file">
					<input type="submit" value="�ϴ��ļ�" name="upload">
				</form>
<?				
}

if($role=="t"){
	print_r("hahah");
	}
?>

