<?
	include "../../php/auth.php";
	include "../../php/config.php"; 
	include "../../php/util.php";  
	$connect = my_connect($host,$dbid,$dbpass,$dbname);
	
	if(!$level){
		$level=1;
	}
?>
<html>
<head>
	<title>��ü �ֹ���� ����</title>
	<meta http-equiv="content-type" content="text/html;charset=euc-kr">
	<link rel="stylesheet" href="../../common/global.css">
	<script language="javascript" src="../../common/global.js"></script>
	<script language="javascript" src="../../common/member.js"></script>
	
</head>
<body bgcolor="#ffffff" text="#000000">
<table width="780" cellspacing = "0" cellpadding = "0" border="0" >
	<tr>
		<td valign='top'>
			<form action= "order_list.php" method='post'>
			<?
				if($mode=='search'){
					$query = "select orderid from mall_order where cancel='N' and $key like '%$key_value%'";
				}else{
					$query = "select orderid from mall_order where cancel='N'";
				}
				$result=mysql_query($query,$connect);
				$total_bnum=mysql_num_rows($result);

				if(!$page){
					$page=1;
				}
				$p_scale=15; //ȭ�鿡 ǥ�õǴ� ����
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

			?>
				<table width='99%' cellspacing = "0" cellpadding = "0" border="0">
					<tr>
						<td height='25' align='center'>
							<font color='blue' size='3'><b>��ǰ �ֹ���Ȳ</b></font>
						</td>
					</tr>
				</table>
				<table width='99%' cellspacing = "0" cellpadding = "0" border="0">
					<tr bgcolor='#3a9edf'>
						<td>
							<table width='100%' cellspacing = "1" cellpadding = "3" border="0">
								<tr bgcolor='#cbe3f5'>
									<td align='center' height='20'><b>�ֹ���ȣ</b></td>
									<td align='center' height='20'><b>ID</b></td>
									<td align='center' height='20'><b>�ֹ���</b></td>
									<td align='center' height='20'><b>������</b></td>
									<td align='center' height='20'><b>������</b></td>
									<td align='center' height='20'><b>�ֹ����</b></td>
									<td align='center' height='20'><b>�ֹ���</b></td>
									<td align='center' height='20'><b>ó������</b></td>
									<td align='center' height='20'><b>����</b></td>
								</tr>
								<?
									if($mode=='search'){
										$query1 = "select * from mall_order where cancel='N' and $key like '%$key_value%' order by num desc";

									}else{
										$query1 = "select * from mall_order where cancel='N' order by num desc limit $cline, $p_scale1";
									}
									$a_pay_type['1'] = "�������Ա�";
									$a_pay_type['2'] = "�ſ�ī��";
									$a_pay_type['3'] = "�޴�������";

									$result1 = mysql_query($query1,$connect);

									for($i = 0; $rows1=mysql_fetch_array($result1);$i++){
										if($rows1[status]=='3'){
											$c_color == "#ffffff";
											$status_now="�Ա�Ȯ����";
										}
										if($rows1[status]=='5'){
											$c_color == "#e0fff0";
											$status_now="�Ա�Ȯ��";
										}
										if($rows1[status]=='7'){
											$c_color == "#effcfc";
											$status_now="�����";
										}
										if($rows1[status]=='8'){
											$c_color == "#fffccc";
											$status_now="��ۿϷ�";
										}
									?>
										<tr bgcolor="<?=$c_color?>">
											<td align='center'>
												<a href="order_read.php?oid=<?=$rows1[num]?>&page==<?=$page?>">
													<?=$rows1[orderid]?>
												</a>
											</td>
											<td align='center'><?=$rows1[user_id]?></td>
											<td align='center'><?=$rows1[createdate]?></td>
											<td align='center'><?=$rows1[buyer_name]?></td>
											<td align='center'><?=$rows1[recipient_name]?></td>
											<td align='center'><?=$a_pay_type[$rows[payment_type]]?></td>
											<td align='center'><?=number_format($rows1[user_id])?> ��</td>
											<td align='center'><a href = "order_delete.php?oid=">����</a></td>
										</tr>
									<?

									}
								?>
								<tr bgcolor='#f2f9ef'>
									<td colspan='10'>
										<table width='100%' cellspacing = "1" cellpadding = "2" border="0">
											<tr>	
												<td align='center'>
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr bgcolor="#cbe2f5">
									<td colspan='10' align='left'>
										<select name='key'>
											<option value="user_id">���̵�</option>
											<option value="user_id">���̵�</option>
										</select>
										<input type='hidden' value='search'>
										<input type='text' name='key_value' >

									</td> 
								</tr>
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



<?/*
<table width="750" cellspacing = "0" cellpadding = "0" border="0" >
	<tr>
		<td>
			<table width="750" cellspacing = "1" cellpadding = "2" border="0">
				<tr>
					<td>������ġ : <a href="list.php?level=1">ó��</a> &gt;</td>
					<?
					$query = "select *from products_category1";
					$result=mysql_query($query,$connect);
					
					for($i=1;$rows=mysql_fetch_array($result);$i++){
						$category_code=$rows[code];
						$category_name=$rows[name];
					?>
					<td align='center'>
					<a href="list.php?level=2&category_code_fk=<?=$category_code?>">
						<?=$category_name?>
					</a>&gt;
					</td>
					<?
					}
					mysql_free_result($result);
					?>
				</tr>
			</table>
		</td>
	</tr>
</table>
<table width='100%' border='0' cellspacing='1' cellpadding='2'>
	<tr>
		<td><b>ī�װ� ����</b><br>
		<?
			if(($level==2)||($level==3)){
				$query1 = "select *from products_category2 where category_code_fk = '$category_code_fk' order by code";
				$result1 = mysql_query($query, $connect);
				for($i=0; $rows1 = mysql_fetch_array($result1);$i++){
					if($i==0){
						if(!$category_code){
							$category_code = $rows1[code];
						}
					}else{
						echo " | ";
					}
					echo("
					<a href = list.php?level=3&l_category_fk=$rows1[code]&category_code_fk=$category_code_fk>$rows1[name]</a>");
				}
			}
		?>
		</td>
	</tr>
	<tr>
		<td bgcolor='#666666'></td>
		<table width='100%' border='0' cellspacing='1' cellpadding='2'>
			<tr align='center' bgcolor='#d9d9d9'>
				<td width='5%'>��ȣ</td>
				<td width='15%'>������(������)</td>
				<td width='25%'>��ǰ��</td>
				<td width='15%'>�Һ��� ����</td>
				<td width='15%'>�ǸŰ���</td>
				<td width='13%'>�̺�Ʈ</td>
				<td width='12%'>�Ż�ǰ</td>
			</tr>
			<?
				if($mode=='search'){
					$sear_char = "and $key like '%$key_value%'";
				}
				if($category_code_fk){
					$qry_char = "and category_fk='$category_code_fk'";
				}
				if($l_category_fk){
					$qry_char = "and l_category_fk='$l_category_fk'";
				}

				$query2 = "select *from products where 1 $qry_char $sear_char";
				$result2 = mysql_query($query2, $connect);
				$total_bnum = mysql_num_rows($result2);

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

				$query3= "select *from products where 1 $qry_char $sear_char order by num desc limit $cline, $p_scale1";
				$result3 = mysql_query($query3, $connect);

				for($i=0;$rows3=mysql_fetch_array($result3);$i++){
					$list_num=$total_bnum-($cline+$i);
					
					if($i%2==0){
						$bgcolor='#ffffff';
					}else{
						$bgcolor='f5f5f5';
					}
				?>
				<tr bgcolor=<?=$bgcolor?> align='center'>
					<td>
					<a href="view.php?p_num=<?=$rows3[num]?>&level=<?=$level?>&category_code_fk=<?=$rows3[category_fk]?>&page=<?=$page?>&l_category_fk=<?=$rows3[l_category_fk]?>">
						<?=$list_num?>
					</a>
					</td>
					<td><?=$rows3[company]?></td>
					
					<td><?=$rows3[name]?></td>
					<td><?=number_format($rows3[cust_price])?></td>
					<td><?=number_format($rows3[price])?></td>
					<td>
						<?
						if($rows3[option1_chk]=='Y'){
							echo("<font color='red'>�����</font>");
							echo("<a href='delete1.php?p_num=$rows3[num]&mode=del&category_code_fk=$rows3[category_fk]&page=$page&l_category_fk=$rows3[l_category_fk]&ch=option1_chk&level=$level'>
							<����></a>");
						}else{
							echo("<a href='delete1.php?p_num=$rows3[num]&mode=insert&category_code_fk=$rows3[category_fk]&page=$page&l_category_fk=$rows3[l_category_fk]&ch=option1_chk&level=$level'>���</a>");	
						}
						?>
					</td>
					<td>
						<?
						if($rows3[option2_chk]=='Y'){
							echo("<font color='red'>�����</font>");
							echo("
							<a href='delete1.php?p_num=$rows3[num]&mode=del&category_code_fk=$rows3[category_fk]&page=$page&l_category_fk=$rows3[l_category_fk]&ch=option2_chk&level=$level'>
							<����></a>");
						}else{
							echo("
							<a href='delete1.php?p_num=$rows3[num]&mode=insert&category_code_fk=$rows3[category_fk]&page=$page&l_category_fk=$rows3[l_category_fk]&ch=option2_chk&level=$level'>
							���</a>");
						}
						?>
					</td>
				</tr>
				<?
				}//for
				mysql_free_result($result3);

				if($total_bnum==0){
				?>
				<tr align='center' bgcolor='#ffffff'>
					<td colspan='11'>
						 ��ϵ� ��ǰ�� �����ϴ�.
					</td>
				</tr>
				<?
				}
			?>
			<form action='list.php' name='f' method='post'>
				<tr bgcolor='#ffffff' align='center'>
					<td colspan='10'>
						<select name = 'key'>
							<option value='company'>����ȸ��</option>
							<option value='price'>�ǸŰ���</option>
							<option value='name'>��ǰ��</option>
						</select>
						<input type='hidden' name='mode' value='search'>
						<input type='hidden' name='l_category_fk' value='<?=$l_category_fk?>'>
						<input type='hidden' name='category_code_fk' value='<?=$category_code_fk?>'>
						<input type='hidden' name='level' value='<?=$level?>'>
						<input type='text' name='key_value' size='16'>
						<input type='submit' value='�˻�'>
					</td>
				</tr>
			</form>
		</table><br>
		<?
		if($level>=2){
		?>
			<table width='90%' border='0' cellspacing='0' cellpadding='3'>
				<tr bgcolor='#ffffff' align='center'>
					<td>
					<?
						$url="$PHP_SELF?l_category_fk=$l_category_fk&category_fk=$category_code_fk&level=$level&mode=$mode&key=$key&key_value=$key_value";
						page_avg($total_bnum,$cpage,$url);
					?>
					</td>
				</tr>
				<tr>
					<td align='center'>
						<input type="button" value="��ǰ���" onclick="location='write.php?level=<?=$level?>&category_code_fk=<?=$category_code_fk?>&page=<?=$page?>&l_category_fk=<?=$l_category_fk?>'">
						<input type="button" value="�ٽ��б�" onclick="location='list.php?level=<?=$level?>&category_code_fk=<?=$category_code_fk?>&page=<?=$page?>&l_category_fk=<?=$l_category_fk?>'">
					</td>
				</tr>
			</table>
		<?
		}//if
		?>
	</tr>
</table>
*/?>