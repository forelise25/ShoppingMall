<?
	include "../../php/auth.php";
	include "../../php/config.php"; 
	include "../../php/util.php";  
	$connect = my_connect($host,$dbid,$dbpass,$dbname);

//���� ����Ʈ�� ������ �ٵ�   page��� 
	$query = "update mall_order set cancel='Y' where num='$oid'";
	mysql_quert($query, $connect);


?>