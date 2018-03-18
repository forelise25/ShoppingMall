<?
	include "../php/config.php"; //session및 DB연결설정
	include "../php/util.php";   //각종 유틸리티 함수
	//mysql연결
	$connect = my_connect($host,$dbid,$dbpass,$dbname);
?>
<html>
<head>
	<title>회원가입 폼</title>
	<meta http-equiv="content-type" content="text/html;charset=euc-kr">
	<link rel="stylesheet" href="../common/global.css">
</head>
<body>
<?
	include "../include/top_menu.php";
?>
<br>
<table width = "938" height="77" cellspacing = "0" cellpadding = "0" style='border-width:1; border-style:solid;' border="0">
	<tr>
		<td width = '210' height='376' valign = 'top' >
		<?
		include "../include/left_login.php";
		include "../include/main_left.php";
		?>	
		</td> 
		<td width="728" height="576" valign='top' style="margin-left:5px;"> 
			<table width = "100%" cellspacing = "0" cellpadding = "10" border="0">
				<tr>
					<td height = "30" style="padding:10 0 0 14px">
						<a href="#">HOME</a>&nbsp;&gt; <a href="/member/coupon.php">쿠폰함</a>
					</td>
				</tr>
				<tr>
					<td align='center'>
						<img src="../img/coupon.gif" width='100' height='100'><font size='50pt' color="#0099cc">쿠폰과 함께<img src="../img/coupon.gif" width='100' height='100'><br><br>즐거운 쇼핑해요!</font>
					</td>
				</tr>
				<tr>
					<td align='center'>
						<img src="../img/coupon.png" width='200'height='140'><img src="../img/coupon.png" width='200'height='140'><img src="../img/coupon.png" width='200'height='140'>
					</td>
				</tr>
				<tr>
					<td align='center'>
						<img src="../img/coupon.png" width='200'height='140'><img src="../img/coupon.png" width='200'height='140'><img src="../img/coupon.png" width='200'height='140'>
					</td>
				</tr>
				<tr>
					<td align='center'>
						<img src="../img/coupon.png" width='200'height='140'><img src="../img/coupon.png" width='200'height='140'><img src="../img/coupon.png" width='200'height='140'>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</body>
</html>