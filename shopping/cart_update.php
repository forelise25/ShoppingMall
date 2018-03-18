<?
	include "../php/config.php"; //session및 DB연결설정
	include "../php/util.php";   //각종 유틸리티 함수
	$connect = my_connect($host,$dbid,$dbpass,$dbname);

	if(!$_COOKIE[p_sid]){
		$SID = md5(uniqid(rand()));
		SetCookie("p_sid",$SID, 0, "/"); 
	}

	if(!$_SESSION[p_sid]){
		$id_fk = "비회원";
	}else{
		$id_fk = $_SESSION[p_sid];
	}

	if($from=="basket"){
		if($md=="del") {
			$query = "delete from products_cart where cart_id = $cart_id";
			mysql_query($query, $connect);
		}else if($md=="edit") {
			$query = "update products_cart set volume='$products_count' where cart_id='$cart_id'";
			mysql_query($query, $connect);
		}
	}else if($from=="details") {
		if(!$products_count) {
			$products_count = 1;
		}
		$query = "insert into products_cart
	          values('','$id_fk','$_COOKIE[p_sid]','$pnum','$products_count','$amount','$products_size',now())";
		mysql_query($query, $connect);
	}

	if($chk=='2') {
		echo "<meta http-equiv='Refresh'content='0;url=purchase.php?from=detail'>";	
	}
	else {
		echo "<meta http-equiv='Refresh'content='0;url=basket.php'>";	
	}
?>