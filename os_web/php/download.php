<?
if( empty($_GET['FileName'])|| empty($_GET['FileDir'])|| empty($_GET['FileId'])){
    echo'<script> alert("�Ƿ����� !"); </script>'; exit();
}
$file_name=$_GET['FileName'];
$file_dir=$_GET['FileDir'];
$FileId=$_GET['FileId'];
$file_dir = $file_dir."/";
if   (!file_exists($file_dir.$file_name))   {   //����ļ��Ƿ����  
  echo   "�ļ��Ҳ���";  
  exit;    
  }   else   {  
$file = fopen($file_dir . $file_name,"r"); // ���ļ�
// �����ļ���ǩ
Header("Content-type: application/octet-stream");
Header("Accept-Ranges: bytes");
Header("Accept-Length: ".filesize($file_dir . $file_name));
Header("Content-Disposition: attachment; filename=" . $file_name);
// ����ļ�����
echo fread($file,filesize($file_dir . $file_name));
fclose($file);
exit();
}
?>