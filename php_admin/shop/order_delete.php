<?
	include "../../php/auth.php";
	include "../../php/config.php"; 
	include "../../php/util.php";  
	$connect = my_connect($host,$dbid,$dbpass,$dbname);

//오더 리스트로 가야함 근데   page들고가 
	$query = "update mall_order set cancel='Y' where num='$oid'";
	mysql_quert($query, $connect);


?>