<?
	include "../php/config.php"; //session및 DB연결설정
	include "../php/util.php";   //각종 유틸리티 함수
	//mysql연결
	$connect = my_connect($host,$dbid,$dbpass,$dbname);

	if(!isset($_SESSION['p_id'])||!isset($_SESSION['p_name'])){
		err_msg("로그인 정보가 없습니다. 다시 로그인 해주세요.");
	}
?>
<html>
<head>
	<title>쪽지보내기 폼</title>
	<meta http-equiv="content-type" content="text/html;charset=euc-kr">
	<link rel="stylesheet" href="../common/global.css">
	<script language="javascript" src="../common/global.js"></script>
	<script language="javascript" src="../common/member.js"></script>
	<script language="javascript">
		function send_chk(){
			var form = document.form1;
			if(!form.receive_id.value){
				alert("받는 사람 ID를 입력하세요.");
				form.receive_id.focus();
				return;
			}
			if(!form.msg.value){
				alert("보낼 내용을 입력하세요.");
				form.msg.focus();
				return;
			}
			form.submit();
		}
	</script>
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
						&gt; 메시지
					</td>
				</tr>
			</table>
			<table width="100%" cellspacing = "0" cellpadding = "0" border="0">
				<tr>
					<td height="89" style="padding:16 0 0 25px">
						<table width="90%" border="0" cellspacing = "0" cellpadding = "0">
							<tr>
								<td>
									<img src="../img/message_title.gif" width='30' height='30' align='center' hspace='2'>쪽지쓰기
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<table width="90%" cellspacing = "0" cellpadding = "6" border="0">
				<tr>
					<td align="right">
						<a href="message_1.php"> 받은 쪽지함 </a> | <a href="message_2.php"> 보낸 쪽지함 </a> | 
						<b> 쪽지 쓰기 </b>
					</td>
				</tr>
			</table>
			<form name="form1" method="post" action="message_send_post.php">
				<table width="90%" cellspacing = "0" cellpadding = "0" border="0">
					<tr>
						<td colspan="3" background="../img/table_bg_001.gif">
							<img src="../img/table_bg_001.gif" width="3" height='1'>
						</td>
					</tr>
					<tr>
						<td	align = "center" width="155"><b>받는사람</b></td>
						<td width="378" style="padding: 8 0 5 0px">
							<input type=text name="receive_id" size=10>
						</td>
					</tr>
					<tr>
						<td colspan="3" background="../img/table_bg_001.gif">
							<img src="../img/table_bg_001.gif" width="3" height='1'>
						</td>
					</tr>
					<tr>
						<td width="115" align="center">
							<b>내용</b>
						</td>
						<td width="378" style="padding:5 0 5 0px">
							<textarea name="msg" cols='50' rows='15'></textarea>
						</td>
					</tr> 
				</table>
			</form> 
			<table width="90%" cellspacing = "0" cellpadding = "0" border="0">
				<tr>
					<td align='center' width="10%"></td>
					<td align='center' width="90%">
						<a href="javascript:send_chk()"><img src="../img/bt_ok2.gif" border='0'></a>
						<a href="javascript:history.go(-1)"><img src="../img/bt_list2.gif" border='0'></a>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>