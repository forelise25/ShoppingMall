<?
	include "../php/config.php"; 
	include "../php/util.php";   

	$connect = my_connect($host,$dbid,$dbpass,$dbname);

	if(!isset($_SESSION['p_id'])||!isset($_SESSION['p_name'])){
		err_msg("�α��� ������ �����ϴ�. �ٽ� �α��� ���ּ���.");
	}
?>
<html>
<head>
	<title>�������� ���</title>
	<meta http-equiv="content-type" content="text/html;charset=euc-kr">
	<link rel="stylesheet" href="../common/global.css">
	<script language="javascript" src="../common/global.js"></script>
	<script language="javascript">
		function form_delete(){
			var form =  document.form1;
			var b = 0;
			for(i=0;i<form.elements.length;i++){
				if(form.elements[i].name=='mnum[]'){
					if(form.elements[i].checked==true){
						b++;
					}
				}
			}
			if(b==0){
				alert("��� �ϳ��̻��� �׸��� �����ϼž� �մϴ�.");
				return;
			}
			form.gb.value='2';
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
						&gt; �޽���
					</td>
				</tr>
			</table>


			<table width="100%" cellspacing = "0" cellpadding = "0" border="0">
				<tr>
					<td height="89" style="padding:16 0 0 25px">
						<table width="90%" border="0" cellspacing = "0" cellpadding = "0">
							<tr>
								<td>
									<img src="../img/message_title.gif" width='30' height='30' align='center' hspace='2'>����������
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
						<a href="message_1.php"> ���� ������ </a> | <b> ���� ������ </b> | 
						<a href="message_3.php"> ���� ���� </a>
					</td>
				</tr>
			</table>
			<table width='90%' border='0' cellspacing = "0" cellpadding = "6">
				<tr bgcolor='#CCCCCC'>
					<td align='center' width='30' class='line2'>����</td>
					<td align='center' width='100' class='line2'>�޴»��</td>
					<td align='center' width='30' class='line2'>�޽���</td>
					<td align='center' width='30' class='line2'>Ȯ������</td>
					<td align='center' width='30' class='line2'>Ȯ�νð�</td>
				</tr>
				<?
				$a_re_chk['Y']='Ȯ��';
				$a_re_chk['N']="<font color='red'>��Ȯ��</font>";
				
				$query = "select mnum from message_info where sendid_fk='$_SESSION[p_id]' and send_del = 'N' ";
				$result = mysql_query($query, $connect);
				$total_bnum = mysql_num_rows($result);

				if(!$page){
					$page=1;
				}
				$p_scale=10; //ȭ�鿡 ǥ�õǴ� ����
				$cpage=intval($page);
				$totalpage=intval($total_bnum/$p_scale);

				if($totalpage*$p_scale!=$total_bnum){
					$totalpage=$totalpage+1;
				}
				//�ᱹ $cline�� $p_scale1 ���� ���ϴ� ���ĵ�

				if($cpage==1){
					$cline=0;
				}else{
					$cline=($cpage*$p_scale)-$p_scale;
				}
				$limit=$cline+$p_scale;

				if($limit>=$total_bnum){
					$limit=$total_bnum;
				}
				$p_scale1=$limit-$cline;

				$query3 = "select *from message_info
						  where sendid_fk='$_SESSION[p_id]' and
								send_del='N'
						  order by mnum desc limit $cline, $p_scale1";
				$result3 = mysql_query($query3, $connect);

				for($i = 0; $rows3 = mysql_fetch_array($result3); $i++){
					$msg_char=shortenStr($rows3[message], 20); //l
				?>
				<tr>
					<td align='center' class='line'><input type='checkbox' name = "mnum[]" value=<?=$rows3[mnum]?>></td>
					<td align = 'center' class='line'><?=$rows3[receiveid_fk]?></td>
					<td align = 'center' class='line'><a href="message_view.php?mnum=<?=$rows3[mnum]?>&gb=2"><?=$msg_char?></a></td>
					<td align = 'center' class='line'><?=$a_re_chk[$rows3[receive_chk]]?></td>
					<td align = 'center' class='line'><?=$rows3[receive_reg]?></td>
				</tr>
				<?
				}//end of for
				mysql_free_result($result);
				?>
			</table>
			<table width = '90%' border='0' cellspacing='0' cellpadding='0'>
				<tr>
					<td width='30%' height='36%'>
						<a href = "javascript:form_delete()"><img src="../img/bt_del2.gif" hspace='4' border='0'></img></a>
					</td>
					<td height='36' align='center'>
					<?
						$url="message_2.php?gb=2";
						page_avg($totalpage, $cpage, $url);
					?>
					</td>
				</tr>
			</table>
			</form><br>
		</td>
	</tr>
</table>
</body>
</html>