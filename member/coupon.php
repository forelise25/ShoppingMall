<?
	include "../php/config.php"; //session�� DB���ἳ��
	include "../php/util.php";   //���� ��ƿ��Ƽ �Լ�
	//mysql����
	$connect = my_connect($host,$dbid,$dbpass,$dbname);
?>
<html>
<head>
	<title>ȸ������ ��</title>
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
						<a href="#">HOME</a>&nbsp;&gt; <a href="/member/coupon.php">������</a>
					</td>
				</tr>
				<tr>
					<td align='center'>
						<img src="../img/coupon.gif" width='100' height='100'><font size='50pt' color="#0099cc">������ �Բ�<img src="../img/coupon.gif" width='100' height='100'><br><br>��ſ� �����ؿ�!</font>
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