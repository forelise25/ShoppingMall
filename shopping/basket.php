<?
	include "../php/config.php";
	include "../php/util.php";		
	$connect = my_connect($host, $dbid, $dbpass, $dbname);

	if(!$_COOKIE[p_sid]) {
		$SID = md5(uniqid(rand()));
		SetCookie("p_sid", $SID, 0, "/");
	}
?>
<html>
<head>
<title>��ٱ��� ��� ����</title>
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
<table width="938" cellspacing="0" cellpadding="0" style="border-width:1; border-style:solid;" border="0">
	<tr>
		<td width="210" height="376" valign="top">
		<?
			include "../include/left_login.php";
			include "../include/main_left2.php";
		?>
		</td>
		<td width="728" height="576" valign="top">
			<table width="100%" border="0"cellspacing="0" cellpadding="0">
				<tr>
					<td height="30" style="padding:10 0 0 14px">
						<a href="#">Ȩ</a>
						&gt; SHOPPING &gt;
						<a href="/shopping/shop_main.php">����Ȩ</a>
					</td>
				</tr>
			</table>
<?
			$query = "select * 
					 from products p, products_cart c
					 where c.user_sid='$_COOKIE[p_sid]' and p.num=c.product_fk
					 order by c.cart_id desc";
			$result = mysql_query($query, $connect);
			$total_count = mysql_num_rows($result);

			$tot_money = 0;
			$tot_mny1 = 0;

			if(!$total_count) { ?>
			<table width="95%" border="0"cellspacing="0" cellpadding="0">
				<tr>
					<td align="center" class="line">��ٱ��Ͽ� ��ǰ�� �������� �ʽ��ϴ�.</td>					
				</tr>
			</table>

<?	}
			else { ?>

			<table width="95%" border="0"cellspacing="0" cellpadding="0">
				<tr bgcolor="#EDEDED">
					<td colspan="2" align="center" class="line2">
						<font color="#666666"><strong>��ǰ��</strong></font>
					</td>
					<td width="1" class="line2"><img src="../img/line1.gif" width="1" height="23"></td>
					<td width="80" align="center" class="line2">
						<font color="#666666"><strong>�ǸŰ���</strong></font>
					</td>
					<td width="1" class="line2"><img src="../img/line1.gif" width="1" height="23"></td>
					<td width="80" align="center" class="line2">
						<font color="#666666"><strong>����</strong></font>
					</td>
					<td width="1" class="line2"><img src="../img/line1.gif" width="1" height="23"></td>
					<td width="80" align="center" class="line2">
						<font color="#666666"><strong>�հ�</strong></font>
					</td>
					<td width="1" class="line2"><img src="../img/line1.gif" width="1"height="23"></td>
					<td width="80" align="center" class="line2">
						<font color="#666666"><strong>����</strong></font>
					</td>
				</tr>
			</table>

<?
			for($i=1; $rows=mysql_fetch_array($result); $i++) {
				$s_tot = (int)$rows[volume] * (int)$rows[amount];
				$tot_money = $tot_money + $s_tot;
?>			<table width="95%" border="0"cellspacing="0" cellpadding="0">
			<form name='basket<?=$i?>' method="post" action="cart_update.php">
				<input type="hidden" name="from" value="basket">
				<tr>
					<td width="100" height="70" align="center" class="line">
						<a href="details.php?pnum=<?=$rows[num]?>&l_code=<?=$rows[category_fk]?>">
							<img src="/upload/p_image/s/<?=$rows[prod_code]?>.<?=$rows[s_image_ty]?>"
							width="50" height="50" border="0" onerror="this.src='../img/noimage.gif'">
						</a>
					</td>
					<td class="line"><?=$rows[name]?> </td>
					<td width="1" class="line2"><img src="../img/line1.gif" width="1"height="23"></td>
					<td class="line"><?=$rows[price]?> </td>
					<td width="1" class="line2"><img src="../img/line1.gif" width="1"height="23"></td>
					<td align="center" class="line">
						<table border="0">
							<tr>	
								<td>
								<input type="text" name="products_count" value="<?=$rows[volume]?>" class="input3" size="2" maxlength="3">
								</td>
								<td width="16" valign="bottom">
									<a href="javascript:num_plus(document.basket<?=$i?>);">
									<img src="../img/order_top.gif" width="9" height="9" border="0">
									</a>
									<br>
									<a href="javascript:num_minus(document.basket<?=$i?>);">
									<img src="../img/order_down.gif" width="9" height="9" border="0">
									</a>
								</td>
								<td>
									<input type="hidden" name="md" value="edit">
									<input type="hidden" name="cart_id" value="<?=$rows[cart_id]?>">
									<input type="image" src="../img/bt_change.gif">
								</td>
							</tr>
						</table>
					</td>
					<td width="1" class="line2"><img src="../img/line1.gif" width="1"height="23"></td>
					<td align="center" class="line"> <?=number_format($s_tot)?> </td>
					<td width="1" class="line2"><img src="../img/line1.gif" width="1"height="23"></td>
					<td align="center" class="line">
						<a href="cart_update.php?md=del&cart_id=<?=$rows[cart_id]?>&from=basket">
							<img src="../img/bt_del.gif" width="14" height="13" border="0">
						</a>
					</td>
				</tr>
			</table>
			</form>
<?	} //for
?>


			<table width="95%" border="0"cellspacing="0" cellpadding="0">
				<tr bgcolor="#EBEDD3">
					<td width="70%" height="30" bgcolor="#EBEDD3">&nbsp;</td>
					<td width="30%">
						<strong>�� ����ݾ� :
							<font color="#AE3E0D">
								<?=number_format($tot_money)?> ��
							</font>
						</strong>
					</td>
				</tr>
			</table>
<?
				if($total_count==0) {
					$go_purcharse = "javascript:alert('��ٱ��Ͽ� ��ǰ�� �����ϴ�.')";
				} //if
				else {
					$go_purcharse = "purchase.php?from=basket";
				}
?>
			<table width="95%" border="0" cellspacing="0" cellpadding="0">
				<tr bgcolor="#FFFFFF">
					<td width="100%" height="30" align="center">
						<a href=<?=$go_purcharse?>><img src="../img/bt_buy.gif" border="0"></a>
						&nbsp;&nbsp;&nbsp;
						<a href="shop_main.php"><img src="../img/bt_cart1.gif" border="0"></a>	
					</td>
				</tr>
			</table>
<?			
			}		 //else
?>

		</td>
	</tr>
</table>
</body>
</html>



































<?
/*<?
	include "../php/config.php"; 
	include "../php/util.php"; 
	$connect = my_connect($host,$dbid,$dbpass,$dbname);

	if(!$_COOKIE[p_id]){ //��Ű�� ���ٸ� ������ֱ�
		$SID = md5(uniqid(rand()));
		SetCookie("p_sid",$SID, 0, "/"); 
	}
?>
<html>
<head>
	<title>��ǰ���� �󼼺���</title>
	<meta http-equiv="content-type" content="text/html;charset=euc-kr">
	<link rel="stylesheet" href="../common/global.css">
	<script language="javascript" src="../common/global.js"></script>
	<script language="javascript" src="../shopping.js"></script>
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
			<?
			$query = "select * from products where num=$pnum";
			$result=mysql_query($query, $connect);
			$rows=mysql_fetch_array($result);
			mysql_free_result($result);
			?>
			<table width = "645" cellspacing = "0" cellpadding = "0" border="0">
			<form name='form1' method='post'>
				<input type='hidden' name='from' value='details'>
				<input type='hidden' name='pnum' value='<?=$pnum?>'>
				<input type='hidden' name='amount' value='<?=$rows[price]?>'>
				<tr>
					<td width='340' height='300' align='center' valign='bottom'>
						<img src="/upload/p_image/m/<?=$rows[prod_code]?>.<?=$rows[m_image_ty]?>" width='230' height='230' border='0' onerror="this.src='../img/noimage.gif'"><br>
							<?
								if($rows[b_image]=='Y'){
							?>
									<a href="javascript:MM_openBrWindow('open_big_view.php?prod_code=<?=$rows[prod_code]?>&prod_ty<?=$rows[b_image_ty]?>','Na','width=550, height=650, scrollbars=yes')">
										<img src="../img/icon_zoom.gif" width='46' height='16' border='0'>
									</a>
							<?
								}else{
							?>
									<img src="../img/icon_zoom.gif" width='46' height='16' border='0'>
							<?
								}	
							?>
					</td>
					<td valign='top'>
						<table width = "90%" cellspacing = "0" cellpadding = "0" border="0">
							<tr>
								<td height='30' align='center' class='text5'><b><?=$rows[name]?></b></td>
							</tr>
							<tr>
								<td	height='5' bgcolor='#585858'></td>
							</tr>
						</table>
						<br>

						<table	width='90%' border='0' cellspacing ='0' cellpadding='0'>
							<tr>
								<td width='130' height='26' class='line'>�Һ��� ����</td>
								<td class='line'><s><?=number_format($rows[cust_price])?> ��</s></td>
							</tr>
							<tr>
								<td width='130' height='26' class='line'>�Ǹ� ����</td>
								<td class='line'><?=number_format($rows[price])?> ��</td>
							</tr>
							<tr>
								<td width='130' height='26' class='line'>������</td>
								<td class='line'><?=number_format($rows[mileage])?> ����Ʈ</td>
							</tr>
							<?
							if($rows[size]){ //�ɼ��� �ִٸ� ����Ʈ ������ֱ� ���� ������
								$t_size = explode("|",$rows[size]);
							?>
							<tr>
								<td width='130' height='26' class='line'>�ɼ�</td>
								<td class='line'>
									<select name='products_size'>
									<?
									for($i=0;$i<sizeof($t_size);$i++){
										if(trim($t_size[$i])==$products_size){
											$selected = "selected";
										}else{
											$selected = "";
										}
									?>
										<option value="<?=trim($t_size[$i])?>" <? echo($selected)?>><?=shortenStr(trim($t_size[$i]),20)?></option>
									<?
									}//for	
									?>
									</select>
								</td>
							</tr>
							<?
							}
							?>
							<tr>
								<td width='130' height='26' class='line'>�ֹ�����</td>
								<td valign='bottom' class='line'> 
									<table width = "100%" cellspacing = "0" cellpadding = "0" border="0">
										<tr>
											<td width='40'>
												<input type='text' name='products_count' value='1' class='input3' size='4' maxlength='5' onkeypress='is_number()'>
 											</td>
											<td width='16' valign='bottom'>
												<a href="javascript:num_plus(document.products_info)">
													<img src="../img/order_top.gif" width='9' height='9' border='0'><br>
												</a>
												<a href="javascript:num_minus(document.products_info)">
													<img src="../img/order_down.gif" width='9' height='9' border='0'>
												</a>
											</td>
											<td>
											��
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td width='130' height='26' class='line'>����ȸ��</td>
								<td><?=$rows[company]?> </td>
							</tr>
							<tr>
								<td	height='20'>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
						</table>
						<table width = "90%" cellspacing = "0" cellpadding = "0" border="0">
							<tr>
								<td>
									<a href="javascript:goCart(this.products_info);">
										<img src= "../img/bt_basket.gif" border='0' width='87' height='20' >
									</a>
									&nbsp;&nbsp;&nbsp;
									<a href="javascript:goOrder(this.products_info);">
										<img src= "../img/bt_buy.gif" border='0' width='87' height='20' >
									</a>
								</td>
							</tr>
						</table>
						<br>
						<table width = "90%" cellspacing = "0" cellpadding = "0" border="0">
							<tr>
								<td bgcolor="#f7f7f7">
									-- ��ǰ �� ���� --
								</td>
							</tr>
							<tr>
								<td>
									<table width = "100%" cellspacing = "0" cellpadding = "10" border="0">
										<tr>
											<td>
											<?
											if($rows[con_html]=='1'){
												echo(stripslashes($rows[contents]));
											}else{
												echo(nl2br(stripslashes($rows[contents])));
											}
											?>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</form>
			</table>
		</td>
	</tr>
</table>
</body>
</html>*/
?>