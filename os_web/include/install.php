<?
$sqlfile = 'web_database.sql';
$configfile = 'config.inc.php';
 
//建立库

if  ( mysql_select_db($db_name,$hd) )
{  echo "已经存在".$db_name."，请重新选择数据库名。";
   exit;
}
else
{ $sql="create database ".$db_name.";";
  mysql_query($sql,$hd);
  if (!mysql_error())
     echo "数据库 {$db_name} 建立成功.<p>";
  else
  {
	  echo "数据库 {$db_name} 建立错误.<p>";
      echo mysql_error();
      exit;
  }
}

	//打开库
		  $sql="use ".$db_name.";";
		  mysql_query($sql,$hd);
		  echo "<p>打开数据库 {$db_name} <p>",mysql_error();
	
	//建立表
	
		$fp = fopen($sqlfile, 'rb');
		$sql = fread($fp, filesize($sqlfile));
		fclose($fp);
	
		//echo "<p>要执行的sql语句<p>",$sql;
		echo "<p>执行sql语句完毕<p>";
	
		$sqls= explode(";", trim($sql));

//	print_r($sqls);

	foreach ( $sqls as $query)
	{  
		mysql_query(trim($query),$hd);
	//   if (mysql_error())
	//	 echo $query,mysql_error();
		
	}
echo "<a href='../php/login.php'>进入主页</a>";

?>

