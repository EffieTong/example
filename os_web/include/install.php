<?
$sqlfile = 'web_database.sql';
$configfile = 'config.inc.php';
 
//������

if  ( mysql_select_db($db_name,$hd) )
{  echo "�Ѿ�����".$db_name."��������ѡ�����ݿ�����";
   exit;
}
else
{ $sql="create database ".$db_name.";";
  mysql_query($sql,$hd);
  if (!mysql_error())
     echo "���ݿ� {$db_name} �����ɹ�.<p>";
  else
  {
	  echo "���ݿ� {$db_name} ��������.<p>";
      echo mysql_error();
      exit;
  }
}

	//�򿪿�
		  $sql="use ".$db_name.";";
		  mysql_query($sql,$hd);
		  echo "<p>�����ݿ� {$db_name} <p>",mysql_error();
	
	//������
	
		$fp = fopen($sqlfile, 'rb');
		$sql = fread($fp, filesize($sqlfile));
		fclose($fp);
	
		//echo "<p>Ҫִ�е�sql���<p>",$sql;
		echo "<p>ִ��sql������<p>";
	
		$sqls= explode(";", trim($sql));

//	print_r($sqls);

	foreach ( $sqls as $query)
	{  
		mysql_query(trim($query),$hd);
	//   if (mysql_error())
	//	 echo $query,mysql_error();
		
	}
echo "<a href='../php/login.php'>������ҳ</a>";

?>

