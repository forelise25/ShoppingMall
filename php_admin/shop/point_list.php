<?
	include "../../php/auth.php";
	include "../../php/config.php"; 
	include "../../php/util.php";  
	$connect = my_connect($host,$dbid,$dbpass,$dbname);
	
	if($mode=='search'){
		if($id_fk){
			$sear_char = "where id_fk like '%$id_fk%'";
		}
	}

	$query = "select *from mileage $sear_char";
	$result=mysql_query($query, $connect);
	$total_bnum = mysql_num_rows($result);

	?>
<html>
<head>
	<title>���ϸ��� ���� ����</title>
	<meta http-equiv="content-type" content="text/html;charset=euc-kr">
	<link rel="stylesheet" href="../../common/global.css">
	<script language="javascript" src="../../common/global.js"></script>
	<script language="javascript" src="../../common/member.js"></script>
	
</head>
<body bgcolor="#ffffff" text="#000000">
<table width="750" cellspacing = "0" cellpadding = "0" border="0" >
	<tr>
		<td>
			<table width='90%' border='0' cellspacing='0' cellpadding='3'>
				<tr class='text'>
					<td>�� <?=number_format($total_bnum)?>��</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td bgcolor='#666666'>
			<table>
				<tr bgcolor='#d9d9d9' align='center'>	
					<td width='5%'>��ȣ</td>
					<td width='15%'>���̵�</td>
					<td width='15%'>����Ʈ</td>
					<td width='45%'>����Ʈ����</td>
					<td width='25%'></td>
				</tr>
				<?
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
				

				$query2 = "select * from mileage $sear_char order by num desc limit $cline, $p_scale1";
				$result2 = mysql_query($query);

				for($i=1;$rows2=mysql_fetch_array($result2);$i++){
					$bunho = $total_bnum - ($i - $cline)+1;
				?>
				<tr align="center" bgcolor="#FFFFFF">
					<td>&nbsp;&nbsp; <?=$bunho?> </td>
					<td>&nbsp;&nbsp; <?=$rows2[id_fk]?> </td>
					<td>&nbsp;&nbsp; <?=$rows2[mileage]?> </td>
					<td>&nbsp;&nbsp; <?=$rows2[mile_desc]?> </td>
					<td>&nbsp;&nbsp; <?=$rows2[wdate]?> </td>
				</tr>
				<?
				}
				mysql_free_result($result2);
				if($total_bnum==0){?>
				<tr bgcolor='#ffffff' align='center'>
					<td align='cetner'>��ϵ� &nbsp;&nbsp;����Ʈ�� �����ϴ�.</td>
				</tr>
				<?	
				}
				?>
				<form action='point_list.php' method='post'>
					<tr bgcolor='#ffffff'>
						<td colspan='10'> 
							<input type='hidden' name='mode' value='search'>
							���̵�<input type = 'text' name='id_fk' size='16' class='input'>
							<input type = 'submit' value='�˻�' class='submit'>
						</td>
					</tr>
				</form>
			</table>
		</td>
	</tr>
</table>
</body>
</html>