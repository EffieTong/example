<?php
 $server="localhost";  //mysql��������ַ
 $user="root";         //��½mysql���û���
 $pass="";          //��½mysql������
 $db_name="os_web";   //mysql��Ҫ���������ݿ���
 
 $hd=mysql_connect($server,$user,$pass) or die("��Ǹ���޷�����,�������ӵ��û���������");
 $db=mysql_select_db($db_name,$hd) or die("��Ǹ���޷�����,�������ݿ��Ƿ����");
 mysql_query("set names utf8");//!!!����һ�²��У��ӵ�����
 //mysql_query("set names 'utf8_bin'");
?>





