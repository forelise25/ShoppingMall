<?
	include "../php/config.php"; //session및 DB연결설정
	include "../php/util.php";   //각종 유틸리티 함수
	//mysql연결
	$connect = my_connect($host,$dbid,$dbpass,$dbname);

	if(!isset($_SESSION['p_id']) || !isset($_SESSION['p_name'])){
		err_msg("잘못 접근");
	}else{
		$query = "select *from member where id = '$_SESSION[p_id]'";
		$result = mysql_query($query, $connect);
		$rows2 = mysql_fetch_array($result);
	}
?>
<html>
<head>
	<title>회원 정보 수정</title>
	<meta http-equiv="content-type" content="text/html;charset=euc-kr">
	<link rel="stylesheet" href="../common/global.css">
	<script language="javascript" src="../common/global.js"></script>
	<script language="javascript" src="../common/member.js"></script>
</head>
<body>
<?
	include "../include/top_menu.php";
?>
<br>
<table width = "938" height="77" cellspacing = "0" cellpadding = "10" style='border-width:1; border-style:solid;' border="0">
	<tr>
		<td width = '210' height='376' valign = 'top' >
		<?
		include "../include/left_login.php";
		include "../include/main_left.php";
		?>
			
		</td> 
		<td width="728" height="576" valign='top'> 
			<table width = "100%" cellspacing = "0" cellpadding = "0" border="0">
				<tr>
					<td height = "30" style="padding:10 0 0 14px">
						<a href="#">HOME</a>
						&gt; 회원정보 &gt; <a href="/member/mem_edit.php">회원 정보 수정</a>
					</td>
				</tr>
			</table>
			<form name = 'form1' method = 'post' action='mem_edit_post.php'>
				<table width="100%" cellspacing = "1" cellpadding = "2" border="0">
					<tr>
						<td colspan = '3' class='line-t' height='1' bgcolor='#e1e1e1'></td>
					</tr>
					<tr>
						<td class='line-n' valign='top' bgcolor='#f8f8f7'>아이디</td>
						<td class='line'><?=$rows2[id]?></td>
						<td rowspan='2'></td>
					</tr>

					<tr>
					<td class='line-n' valign='top' bgcolor='#f8f8f7'>비밀번호</td>
						<td class='line'><input type = 'password' name='passwd' class = 'InputStyle1' maxlength='10' size='16' value=<?=$rows2[passwd]?>>
						<br>특수문자, 한글, 공백을 포함할 수 없으며<br> 대,소문자를 구분합니다.(4-10자 사이)</td>
						<td></td>
					</tr>

					<tr>
						<td class='line-n' valign='top' bgcolor='#f8f8f7'>비밀번호 재입력</td>
						<td class='line'><input type = 'password' name='passwd2' class = 'InputStyle1' size='16' value = <?=$rows2[passwd]?>>
						<td></td>
					</tr>

					<tr>
						<td class='line-n' valign='top' bgcolor='#f8f8f7'>이름</td>
						<td class='line'><input type = 'text' name='name' class = 'InputStyle1' size='16' value=<?=$rows2[name]?>></td>
						<td></td>
					</tr>

					<tr>
						<td class='line-n' valign='top' bgcolor='#f8f8f7'>주민등록번호</td>
						<td class='line'>
							<?= substr($rows2[jnumber],0,6)?> - *******
						</td>
						<td></td>
					</tr>

					<tr>
						<td class='line-n' valign='top' bgcolor='#f8f8f7'>E-mail</td>
						<td class='line'><input type = 'text' name='email' class = 'InputStyle1' size='25' value=<?=$rows2[email]?>></td>
						<td></td>
					</tr>
					<?
						//explode() : 구분자를 기준으로 분리하여 배열에 저장하는 변수 like 스트링 토크나이저
						$a_zipno=explode("-",$rows2[zipcode]);
					?>
					<tr>
						<td class='line-n' valign='top' bgcolor='#f8f8f7'>우편번호</td>
						<td class='line'>
							<input type = 'text' name='zipcode1' class = 'InputStyle1' size='3' value=<?=$a_zipno[0]?>> - 
							<input type = 'text' name='zipcode2' class = 'InputStyle1' size = '3' value=<?=$a_zipno[0]?>>
								<a href="javascript:ZipWindow('zip_search.php')">[우편번호검색]</a>
						</td>
						<td></td>
					</tr>

					<tr>
						<td class='line-n' valign='top' bgcolor='#f8f8f7'>주소</td>
						<td class='line'>
							<input type = 'text' name='address1' class = 'InputStyle1' size='35' value=<?=$rows2[address1]?>> 동까지 입력<br>
							<input type = 'text' name='address2' class = 'InputStyle1' size='35' maxlength='50' value=<?=$rows2[address2]?>>(나머지 입력)
						</td>
						<td></td>
					</tr>
					<?
						$a_phone = explode("-",$rows2[phone]);
					?>
					<tr>
						<td class='line-n' valign='top' bgcolor='#f8f8f7'>전화번호</td>
						<td class='line'><input type = 'text' name='phone1' class = 'inputStyle1' size='3' value=<?=$a_phone[0]?>> - <input type = 'text' name='phone2' class = 'inputStyle1' size='4' value=<?=$a_phone[1]?>> - <input type = 'text' name='phone3' class = 'inputStyle1' size='4' value=<?=$a_phone[2]?>>(자택 또는 회사)
						</td>
						<td></td>
					</tr>
					<?
						$a_hphone = explode("-",$rows2[mobile]);
					?>
					<tr>
						<td class='line-n' valign='top' bgcolor='#f8f8f7'>휴대폰</td>
						<td class='line'>
							<select name='hphone1' class='InputStyle1'>
								<option value=''>선택</option>
								<option value='010' <?if($a_hphone[0]=='010') echo "selected"?>>010</option>
								<option value='011' <?if($a_hphone[0]=='011') echo "selected"?>>011</option>
								<option value='016' <?if($a_hphone[0]=='016') echo "selected"?>>016</option>
								<option value='017' <?if($a_hphone[0]=='017') echo "selected"?>>017</option>
								<option value='018' <?if($a_hphone[0]=='018') echo "selected"?>>018</option>
								<option value='019' <?if($a_hphone[0]=='019') echo "selected"?>>010</option>
							</select> - 
							<input type = 'text' name='hphone2' class = 'InputStyle1' size='4' value=<?=$a_phone[1]?>> - 
							<input type = 'text' name='hphone3' class = 'InputStyle1' size='4' value=<?=$a_phone[2]?>> (자택 또는 회사)
						</td>
						<td></td>
					</tr>
				</table>
				<table width="100%" border="0" cellspacing='0' cellpadding='0'>
					<tr>
						<td align='center'>
							<a href="javascript:checkEdit()"><img src="../img/butn_ok.gif" border='0'></img></a>
							<a href="../index.php"><img src="../img/btn_cancel.gif" hspace='4' border='0'></a>
						</td>
					</tr>
				</table>
			</form>
		</td>
	</tr>
</table>
</body>
</html>