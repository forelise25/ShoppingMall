<?
	include "../php/config.php"; //session�� DB���ἳ��
	include "../php/util.php";   //���� ��ƿ��Ƽ �Լ�
	//mysql����
	$connect = my_connect($host,$dbid,$dbpass,$dbname);
?>
<html>
<head>
	<title>���θ� �ȳ�</title>
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
						<a href="#">HOME</a>&nbsp;&gt; <a href="/member/shop_guide.php">���θ� �ȳ�</a>
					</td>
				</tr>
				<tr>
					<td style="font-size:14pt">
					<img src="../img/ceo.jpg" width="150" height="170" style="float:left" border='2px' >
						<div style="line-height: 1.8">
						�ȳ��Ͻʴϱ� ���� ���θ��� ����� '�հ���'�̶�� �մϴ�. �̷��� ���� ���θ��� �湮���ֽ� �Ϳ� ū ���縦 ǥ�մϴ�. 1924�� ó��, ������ �̾��Ͽ����� ���� �е��� ������ �̷��� ������ �� �־����ϴ�. �� ȭ���� ���� ���θ��� ������ ���� ������ ��ȸ�� ���Ե鲲�� �����˴ϴ�. Ȥ�ó� ó�� ���θ��� �湮�ϰ� �ǽŴٸ� ������ �Ͻôµ� ���� ������ ���� ������ �Ͽ� �Ʒ��� ������ ������ �����ϰ��� �մϴ�. ȸ���� ��� ��������� ����Ͻ� �� ������ ���� �е��� ���Թٶ��ϴ�.
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<b>[ ������ ]</b><br>
						������ ����� ���θ� ���� ȸ���鳢�� ��ǰ�� ���� ����, �ı� ���� �����ϵ��� �����ϴ� ���� �Դϴ�. �ٸ� ȸ���� ���̵� �� ��� ���� ������, Ȯ��, ���� �� �پ��� ����� ����Ͻ� �� �ֽ��ϴ�.
						<br><br>
						<b>[ ���� ������ ]</b><br>
						ȸ���� ��� ���θ� ���ּ� �پ��ϰ� ��밡���� ������ ������ �� �ֽ��ϴ�. �ַ� �����Ǵ� �������� ������ �ʿ��Ͽ� ȸ�����Ը� �����Ǹ� ó�� ȸ������ �� 1���� ����� ��ǰ���� ���� �� �ִ� ������ �ֽ��ϴ�. �����Կ��� ���� �ޱ⸦ ���� �� '���� ������'���� ���� ������ ������ �����Ͻ� �� �ֽ��ϴ�.
						<br><br>
						<b>[ Shopping ]</b><br>
						Shopping�� ��� �����ϰ� �з��� ī�װ� UI�� �����ϸ� �ּ��� ���Ͽ� ������ ���� ���Ȱ���� ������� �մϴ�. 
						<br><br>
						<b>[ ������ ]</b><br>
						�������� ��� ȸ���� ��ȸ���Ե� ��� ����Ͻ� �� �ִ� ������� ���� ȸ�翡 ���� �Ұ�, �̿���, FAQ�� QnA ���񽺸� �����ϸ� ���� ���θ��� ����Ͻô� ���Ե���� ��Ȱ�� ������ ���� ����ϰ� �ֽ��ϴ�. FAQ�� QnA�� ��� �ֱ������� ��� �μ����� ������Ʈ ���̴� ���� ���� �̿� ��Ź�帳�ϴ�.
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</body>
</html>