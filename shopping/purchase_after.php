<?
	include "../php/config.php"; //session�� DB���ἳ��
	include "../php/util.php";   //���� ��ƿ��Ƽ �Լ�
	$connect = my_connect($host,$dbid,$dbpass,$dbname);

	if(!$_COOKIE[p_sid]){
		$SID = md5(uniqid(rand()));
		SetCookie("p_sid",$SID, 0, "/"); 
	}
?>
<html>
<head>
	<title>�ֹ����� Ȯ��</title>
	<meta http-equiv="content-type" content="text/html;charset=euc-kr">
	<link rel="stylesheet" href="../common/global.css">
	<script language="javascript" src="../common/global.js"></script>
	<script language="javascript" src="../common/shopping.js"></script>
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
		include "../include/main_left2.php";
		?>	
		</td> 
		<td width="728" height="576" valign='top' style="margin-left:5px;"> 
			<table width = "100%" cellspacing = "0" cellpadding = "0" border="0">
				<tr>
					<td height = "30" style="padding:10 0 0 14px">
						<a href="#">HOME</a>&gt; SHOPPING &gt;
						<a href="/shopping/shop_main.php">����Ȩ</a>
					</td>
				</tr>
			</table>
			<table width = "100%" cellspacing = "0" cellpadding = "0" border="0">
				<tr>	
					<td height='200' align='center' style="padding:10 0 0 14px">
						<br>
						<strong>�̿��� �ּż� �����մϴ�.</strong>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</body>
</html>