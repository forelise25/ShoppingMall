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
	<script language="javascript" src="../common/global.js"></script>
	<script language="javascript" src="../common/member.js"></script>
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
						<a href="#">HOME</a>&gt; ȸ������ &gt;
						<a href="join.php">ȸ������</a>
					</td>
				</tr>
			</table>
			<form name = 'form1' method = 'post' action='join_post.php'>
				<table width="100%" cellspacing = "1" cellpadding = "2" border="0">
					<tr>
						<td colspan = '3' class='line-t' height='1' bgcolor='#e1e1e1'></td>
					</tr>
					<tr>
						<td class='line-n' valign='top' bgcolor='#f8f8f7'>���̵�</td>
						<td class='line'><input type = 'text' name='id' class = 'InputStyle1'><a href="javascript:check_ID_Window('id_check.php')">(�ߺ�Ȯ��)</a>
						<br>
						Ư������, �ѱ�, ������ ������ �� ������<br> ��� �ҹ��ڿ� ���ڸ� �Էµ˴ϴ�.(4-10�� ����)</td>
						<td rowspan='2'></td>
					</tr>

					<tr>
						<td class='line-n' valign='top' bgcolor='#f8f8f7'>��й�ȣ</td>
						<td class='line'>
							<input type = 'password' name='passwd' class = 'InputStyle1' maxlength='10' size='16'>
							<br>Ư������, �ѱ�, ������ ������ �� ������<br> ��,�ҹ��ڸ� �����մϴ�.(4-10�� ����)
						</td>
						<td></td>
					</tr>

					<tr>
						<td class='line-n' valign='top' bgcolor='#f8f8f7'>��й�ȣ ���Է�</td>
						<td class='line'><input type = 'password' name='passwd2' class = 'InputStyle1' size='16'>
							<br>Ư������, �ѱ�, ������ ������ �� ������<br> ��,�ҹ��ڸ� �����մϴ�.(4-10�� ����)
						</td>
						<td></td>
					</tr>

					<tr>
						<td class='line-n' valign='top' bgcolor='#f8f8f7'>�̸�</td>
						<td class='line'><input type = 'text' name='name' class = 'InputStyle1' size='16'></td>
						<td></td>
					</tr>

					<tr>
						<td class='line-n' valign='top' bgcolor='#f8f8f7'>�ֹε�Ϲ�ȣ</td>
						<td class='line'>
							<input type = 'text' name='jumin1' class = 'InputStyle1' size='6' onkeyup='focus_move()' maxlength='6'> - 
							<input type = 'text' name='jumin2' class = 'InputStyle1' size='7' maxlength='7'>
						</td>
						<td></td>
					</tr>

					<tr>
						<td class='line-n' valign='top' bgcolor='#f8f8f7'>E-mail</td>
						<td class='line'><input type = 'text' name='email' class = 'InputStyle1' size='25'></td>
						<td></td>
					</tr>
					<tr>
						<td class='line-n' valign='top' bgcolor='#f8f8f7'>�����ȣ</td>
						<td class='line'>
							<input type = 'text' name='zipcode1' class = 'InputStyle1' size='3'> - 
							<input type = 'text' name='zipcode2' class = 'InputStyle1' size = '3' >
								<a href="javascript:ZipWindow('zip_search.php')">[�����ȣ�˻�]</a>
						</td>
						<td></td>
					</tr>

					<tr>
						<td class='line-n' valign='top' bgcolor='#f8f8f7'>�ּ�</td>
						<td class='line'>
							<input type = 'text' name='address1' class = 'InputStyle1' size='35'> ������ �Է�<br>
							<input type = 'text' name='address2' class = 'InputStyle1' size='35' maxlength='50'>(������ �Է�)
						</td>
						<td></td>
					</tr>

					<tr>
						<td class='line-n' valign='top' bgcolor='#f8f8f7'>��ȭ��ȣ</td>
						<td class='line'>
							<input type = 'text' name='phone1' class = 'InputStyle1' size='3' maxlength='3'> - 
							<input type = 'text' name='phone2' class = 'InputStyle1' size='4' maxlength='4'> - 
							<input type = 'text' name='phone3' class = 'InputStyle1' size='4' maxlength='4'>(���� �Ǵ� ȸ��)
						</td>
						<td></td>
					</tr>
				
					<tr>
						<td class='line-n' valign='top' bgcolor='#f8f8f7'>�޴���</td>
						<td class='line'>
							<select name='hphone1' class='InputStyle1'>
								<option value=''>����</option>
								<option value='010'>010</option>
								<option value='011'>011</option>
								<option value='016'>016</option>
								<option value='017'>017</option>
								<option value='018'>018</option>
								<option value='019'>010</option>
							</select> - 
							<input type = 'text' name='hphone2' class = 'InputStyle1' size='4' maxlength='4'> - 
							<input type = 'text' name='hphone3' class = 'InputStyle1' size='4' maxlength='4'> (���� �Ǵ� ȸ��)
						</td>
						<td></td>
					</tr>
				</table>
				<table width="100%" border="0" cellspacing='0' cellpadding='0'>
					<tr>
						<td align='center'>
							<!--<a href="javascript:checkInput()"><img src="../img/butn_ok.gif" border='0'></img></a>-->
							<a href="javascript:document.form1.submit();"><img src="../img/butn_ok.gif" border='0'></img></a>
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