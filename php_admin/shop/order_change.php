<?
	include "../../php/auth.php";
	include "../../php/config.php"; 
	include "../../php/util.php";  
	$connect = my_connect($host,$dbid,$dbpass,$dbname);

	if($mode=='1'){
		$query = "update mall_order
				  set status ='5'
				  where num='$oid'";
		$result = mysql_query($query,$connect);
	}
	if($mode=='2'){
		$query = "update mall_order
				  set status ='7'
				  where num='$oid'";
		$result = mysql_query($query,$connect);  
	}
	if($mode=='3'){
		$query1 = "select * from mall_order where num = '$oid'";
		$result1 = mysql_query($query1, $connect);
		$rows1 = mysql_fetch_array($result1);

		if((int)$rows1[mileage_use]>0 && ($rows1[user_id]!='비회원')){
			if($rows1[status]!='8'){
				$mile_amt = 0 - $rows1[mileage_use];

				$query3="insert into mileage(id_fk, mileage,mile_desc, wdate) values('$rows1[user_id]','$mile_amt','상품)"
			}
		}
		$query = "update mall_order
				  set status ='8'
				  where num='$oid'";
		$result = mysql_query($query,$connect);
	}
?>