<?
	include "../php/config.php"; //session및 DB연결설정
	include "../php/util.php";   //각종 유틸리티 함수
	//mysql연결
	$connect = my_connect($host,$dbid,$dbpass,$dbname);

	$query="select *from member where id='$id' and passwd='$pwd'";
	$result=mysql_query($query, $connect);
	$rows=mysql_fetch_array($result);

	if(!$rows){ //비회원
		err_msg("존재하지 않는 회원ID이거나 비밀번호가 틀립니다.");
	}else{
		$_SESSION["p_id"] = $id;//$rows
		$_SESSION["p_name"] = $rows[name];
		$_SESSION["p_email"] = $rows[email];
		//장바구니 코드 추후 추가
		
		echo "<meta http-equiv='Refresh' content='0;url=/index.php'>";
	}
?>