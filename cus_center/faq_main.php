<?
	include "../php/config.php"; //session�� DB���ἳ��
	include "../php/util.php";   //���� ��ƿ��Ƽ �Լ�
	//mysql����
	$connect = my_connect($host,$dbid,$dbpass,$dbname);
?>
<html>
<head>
	<title>������ ��_FAQ</title>
	<meta http-equiv="content-type" content="text/html;charset=euc-kr">
	<link rel="stylesheet" href="../common/global.css">
	<script language="javascript" src="../common/global.js"></script>
	<script language="javascript" src="../common/member.js"></script>
	<script language="javascript">
		function ans_Win(var ref){
			window.open(ref,"ans_Win",'width=400,height=200,scrollbars=no,status=no,top=' + window_top + ',left=' + window_left + '');
		}
	</script>
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
		<td width="728" height="576" valign='top' style="margin-left:5px;" align='center'> 
			<table width = "100%" cellspacing = "0" cellpadding = "10" border="0">
			<?
			if($mode=='search'){
				if($word){
					$sear_char .= " and qst like '%$word%' ";
				}
			}
			$query="select qnum, qst, ans, reg_date from cus_faq where 1 $sear_char";
			$result=mysql_query($query,$connect);
			$total=mysql_num_rows($result);
			?>
			<form name='form1' method='post' action="faq_main.php">
				<input type = 'hidden' name='mode' value='search'>
				<tr>
					<td height = "30" style="padding:10 0 0 14px" align='left'>
						<a href="#">HOME</a>&nbsp;&gt; ������ &gt;&nbsp;
						<a href="cus_main.php">FAQ</a>
					</td>
				</tr>
				
				<tr>
					<td align='center'>
						<table cellpadding="10">
							<tr>
								<br>
								<td>
									<font color = "#64BEA4" size="30" style="font-family:����������"><b>FAQ</b></font>
								</td>
								<td>
									<input type = 'text' name = 'word' placeholder="ã���� ������ �Է��Ͽ� �ּ���." size='30'>
								</td>
								<td>
									<input type='submit' value='�˻�' class='input'>
								<td>
							</tr>
						</table>
					</td>
				</tr>
				
				<tr>
					<td width = '10%' align = 'center' class='line'>
						<table>
							<tr>
								<td align = 'center' bgcolor="#f5f5f5" width="5%"><strong>��ȣ</strong></td>
								<td align = 'center' bgcolor="#f5f5f5" width="70%"><strong>����</strong></td>
								<td align = 'center' bgcolor="#f5f5f5" width="15%"><strong>�������</strong></td>
							</tr>
							<?
							for($i = 0; $i < ($rows = mysql_fetch_array($result)); $i++){
							?>
							<tr>
								<td align = 'center'><?=$rows[qnum]?></td>
								<td style="padding-left:20px"><?=$rows[qst]?></td>
								<td align = 'center'><?=$rows[reg_date]?></td>
							</tr>
							<tr>
								<td align = 'center'>&nbsp;</td>
								<td align = 'center' width="70%" bgcolor="#f5f5f5">��&nbsp;<?=$rows[ans]?></td>
								<td align = 'center'>&nbsp;</td>
							</tr>
							<?
							}//end of for
							mysql_free_result($result);
							?>
						</table>
					</td>
				</tr>	
			</table>
			</form>
		</td>
	</tr>
</table>
</body>
</html>



<?
/*
<?
	include "../../php/auth.php";
	include "../../php/config.php"; 
	include "../../php/util.php";  
	$connect = my_connect($host,$dbid,$dbpass,$dbname);
?>
<html>
<head>
	<title>��üȸ�� ���</title>
	<meta http-equiv="content-type" content="text/html;charset=euc-kr">
	<link rel="stylesheet" href="../../common/global.css">
	<script language="javascript" src="../../common/global.js"></script>
	<script language="javascript">
		function open_win(theURL, winName,features){
			window.open(theURL, winName, features);
		}
	</script>
</head>
<body>
<table width="100%" cellspacing = "0" cellpadding = "2" border="0">
	<tr>
		<td height='40' class='title'>ȸ�� ����</td>
	</tr>
</table>
<?
	if($mode=='search'){
		if($id){
			$sear_char .= " and id='$id' ";
		}
		if($mobile){
			$sear_char .= " and mobile like '%$mobile%' ";
		}
		if($name){
			$sear_char .= " and name like '%$name%' ";
		}
		if($jnumber){
			$sear_char .= " and jnumber like '%$jnumber%' ";
		}
		if($email){
			$sear_char .= " and email like '%$email%' ";
		}
		if($phone){
			$sear_char .= " and phone like '%$phone%' ";
		}
	}
	$query="select *from member where 1 $sear_char ";
	$result=mysql_query($query,$connect);
	$total=mysql_num_rows($result);
?>
<form name = 'mb' method = 'post' action='admin_member_list.php'>
	<input type = 'hidden' name='mode' value='search'>
	<div align='center'>
		<table width="95%" cellspacing = "0" cellpadding = "0" border="0">
			<tr class='text'>
				<td width="150" height='20' align='center' bgcolor='#f1f1f1'>
					<b>���̵�</b>
				</td>
				<td width="250" height='20'>
					<input type='text' name='id' value='<?=$id?>' size='20' class='input'>
				</td>
				<td width="150" height='20' align='center' bgcolor='#f1f1f1'>
					<b>�޴���</b>
				</td>
				<td width="250" height='20'>
					<input type='text' name='mobile' value='<?=$mobile?>' size='20' class='input'>
				</td>
			</tr>
			<tr class='text'>
				<td width="150" height='20' align='center' bgcolor='#f1f1f1'>
					<b>�̸�</b>
				</td>
				<td width="250" height='20'>
					<input type='text' name='name' value='<?=$name?>' size='20' class='input'>
				</td>
				<td width="150" height='20' align='center' bgcolor='#f1f1f1'>
					<b>�ֹι�ȣ</b>
				</td>
				<td width="250" height='20'>
					<input type='text' name='jnumber' value='<?=$jnumber?>' size='20' class='input'>
				</td>
			</tr>
			<tr class='text'>
				<td width="150" height='20' align='center' bgcolor='#f1f1f1'>
					<b>�̸���</b>
				</td>
				<td width="250" height='20'>
					<input type='text' name='email' value='<?=$email?>' size='20' class='input'>
				</td>
				<td width="150" height='20' align='center' bgcolor='#f1f1f1'>
					<b>����ó</b>
				</td>
				<td width="250" height='20'>
					<input type='text' name='phone' value='<?=$phone?>' size='20' class='input'>
				</td>
			</tr>
			<tr>
				<td colspan="4"><center><input type='submit' value='�˻�' class='input'></center></td>
			</tr>
		</table>
	</div>
</form>
</body>
</html>
*/
?>