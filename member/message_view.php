<?
	include "../php/config.php"; 
	include "../php/util.php";   

	$connect = my_connect($host,$dbid,$dbpass,$dbname);

	if(!isset($_SESSION['p_id'])||!isset($_SESSION['p_name'])){
		err_msg("로그인 정보가 없습니다. 다시 로그인 해주세요.");
	}
?>
<html>
<head>
	<title>쪽지내용 보기</title>
	<meta http-equiv="content-type" content="text/html;charset=euc-kr">
	<link rel="stylesheet" href="../common/global.css">
	<script language="javascript" src="../common/global.js"></script>
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
									<img src="../img/message_title.gif" width='30' height='30' align='center' hspace='2'>메시지 확인
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<form name= 'form1' method='post' action = 'message_del.php'>
			<input type = 'hidden' name='gb'>
			<table width="90%" cellspacing = "0" cellpadding = "6" border="0">
				<tr>
					<td align="right">
						<a href="message_1.php"> 받은 쪽지함 </a> | 
						<a href="message_2.php"> 보낸 쪽지함 </a> | 
						<a href="message_3.php"> 쪽지 쓰기 </a>
					</td>
				</tr>
			</table>
			<table width='90%' border='0' cellspacing = "0" cellpadding = "6">
				<tr bgcolor='#CCCCCC'>
					<td align='center' class='line2'>메시지</td>
					<td align='center' class='line2'>보낸시간</td>
				</tr>
				<?
					$query2 = "select *from message_info where mnum='$mnum'";
					$result2 = mysql_query($query2,$connect);
					$rows2 = mysql_fetch_array($result2);

					if($gb=='1'&&($rows2[receive_chk]=='N')){
						$query3 = "update message_info set receive_chk='Y', receive_reg=now() where mnum='$mnum'";
						$result3= mysql_query($query3,$connect);
					}
				?>
				<tr>
					<td class='line' >
						<?=nl2br(stripslashes($rows2[message]))?>
					</td>
					<td class='line' align="center">
						<?=$rows2[send_reg]?>
					</td>
				</tr>
			</table>
			<table width="90%" border='0' cellspacing='0' cellpadding='0'>
				<tr>
					<td height="36">
						<a href="message_del.php?mode=view&gb=<?=$gb?>&mnum=<?=$mnum?>"><img src="../img/bt_del2.gif" hspace="4" border='0'></a>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</body>
</html>