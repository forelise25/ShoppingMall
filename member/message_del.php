<?
	include "../php/config.php"; 
	include "../php/util.php";   

	$connect = my_connect($host,$dbid,$dbpass,$dbname);

	if(!isset($_SESSION['p_id'])||!isset($_SESSION['p_name'])){
		err_msg("로그인 정보가 없습니다. 다시 로그인 해주세요.");
	}

	if($mode=='view'){
		if($gb=='1'){
			$query = "update message_info set receive_del = 'Y' where mnum='$mnum'";
			$result = mysql_query($query, $connect);
			echo "<meta http-equiv='Refresh' content='0;url = message_1.php'>";
		}else if($gb=='2'){
			$query2 = "update message_info set send_del = 'Y' where mnum='$mnum'";
			$result2 = mysql_query($query2, $connect);
			echo "<meta http-equiv='Refresh' content='0;url = message_2.php'>";
		}
	}else{  //목록에서 삭제할 경우
		if($gb=='1'){
			for($i=0;$i<sizeof($mnum);$i++){
				if($mnum[$i]){
					$query1 = "update message_info set receive_del = 'Y' where mnum='$mnum[$i]'";
					$result1 = mysql_query($query1, $connect);
					echo "<meta http-equiv='Refresh' content='0;url = message_1.php'>";
				}
			}
		}else if($gb=='2'){
			for($i=0;$i<sizeof($mnum);$i++){
				if($mnum[$i]){
					$query1 = "update message_info set send_del = 'Y' where mnum='$mnum[$i]'";
					$result1 = mysql_query($query1, $connect);
					echo "<meta http-equiv='Refresh' content='0;url = message_2.php'>";
				}
			}
		}
	}
?>