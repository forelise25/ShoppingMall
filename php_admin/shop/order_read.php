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
<table width="100%" cellspacing = "0" cellpadding = "0" border="0" >
	<tr>
		<td>
		<?
			$query="select * from mall_order where num=$oid";
			$result=mysql_query($query, $connect);

			$a_goods_fk = explode("|",$rows[goods_fk]);
			$a_goods_price = explode("|",$rows[goods_price]);
			$a_goods_volume = explode("|",$rows[goods_count]);

			$temp .= "
				<table border='0' width='100%'>
					<tr bgcolor= '#cbe2f5'>
						<td align='center'>�̹���</td>
						<td align='center'>��ǰ��</td>
						<td align='center'>����ȸ��</td>
						<td align='center'>����</td>
						<td align='center'>����</td>
					</tr>
				";

			for($i=0; $i<sizeof($a_goods_fk); $i++) {
					$query2 = "select * from products where num='$a_goods_fk[$i]'";
					$result2 = mysql_query($query2, $connect);
					$rows2 = mysql_fetch_array($result2);

					$goods_name = shortenStr($rows2[name],20);
					$img_char = "../../upload/p_image/s/".$rows2[prod_code].".".$rows2[s_image_ty];

					$temp .= "
						<tr>
							<td align='center'><img src='$img_char' width='50' height='50' border='0' onerror=this.src='../../img/noimage.gif'></td>
							<td align='center'>$goods_name</td>
							<td align='center'>$rows2[company]</td>
							<td align='center'>$a_volume[$i]</td>
							<td align='center'>$a_price[$i] ��</td>
						</tr>";
					$tot_amount = $tot_amount + (int)$a_price[$i] * (int)$a_volume[$i];
					$t_count = $t_count+(int)$a_volume[$i];
			}//end of for
			$trans_cost = 0;
			if($trans_cost>0){
				$amount_o=$tot_amount+$trans_cost;
				$amount_temp="($tot_amount �� + $trans_cost ��)";
			}else{
				$amount_o=$tot_amount;
			}
			$temp .= "
				<tr bgcolor='#ece2f5'>
					<td colspan='3' align='right'>�հ�
					</td>
					<td align='center'><font color='blue'>$t_count ��</font></td>
					<td align='center'><font color='blue'>$tot_amount ��</font></td>
				</tr>
				</table>
			";
			if($rows[payment_type]==1){$payment_type = "�������Ա�";}
			if($rows[payment_type]==2){$payment_type = "�ſ�ī��";}
			if($rows[payment_type]==3){$payment_type = "�޴��� ����";}

			$a_status['3'] = "�Ա�Ȯ����";
			$a_status['5'] = "�Ա�Ȯ��";
			
			
		?>
		</td>
	</tr>
</table>
<table width="94%" cellspacing = "2" cellpadding = "1" border="0" >
	<tr>
		<td height='25' align='center'>
			<b>�ֹ� �� ���� <font color='red'>(�ֹ���ȣ : <?=$oid?></font></b>
		</td>
	</tr>
</table>
<table width="94%" cellspacing = "2" cellpadding = "1" border="0" >
	<tr bgcolor='#3a9edf'>	
		<td>
			<table width="100%" cellspacing = "2" cellpadding = "1" border="0" >
				<tr bgcolor='#cbe2f5'>
					<td align='center' width='100'><b>�ֹ�����</b></td>
					<td align='left' colspan='3' bgcolor='white'>
						<?=$temp?>
					</td>
				</tr>
				<tr bgcolor='#cbe2f5'>
					<td align='center' width='100'><b>�ֹ���ȣ</b></td>
					<td align='center' bgcolor="white" width='100'><?=$rows[orderid]?></td>
					<td align='center' width='100'><b>��������</b></td>
					<td align='center' bgcolor="white" width='100'><?=$rows[createdate]?></td>
				</tr>
				<tr bgcolor='#cbe2f5'>
					<td align='center' width='100'><b>������</b></td>
					<td align='center' bgcolor="white" width='100'>
					�����ڸ� : <?=$rows[buyer_name]?> <br>
					�����ȣ : <?=$rows[buyer_zipno]?> <br>
					�����ּ� : <?=$rows[buyer_address]?> <br>
					������ȣ : <?=$rows[buyer_phone]?> <br>
					�̸���: <?=$rows[buyer_email]?> <br>
					</td>
					<td align='center' bgcolor="white" width='100'>
					�����ڸ� : <?=$rows[buyer_name]?> <br>
					�����ȣ : <?=$rows[buyer_zipno]?> <br>
					�����ּ� : <?=$rows[buyer_address]?> <br>
					������ȣ : <?=$rows[buyer_phone]?> <br>
					�̸���: <?=$rows[buyer_email]?> <br>
					</td>
				</tr>
				<tr bgcolor='#cbe2f5'>
					<td align='center' width='100'><b>ID ����</b></td>
					<td align='center' bgcolor="white" width='100' colspan='3'><?=$rows[user_id]?></td>
					<td align='center' width='100'><b>������</b></td>
					<td align='center' bgcolor="white"  colspan='3'><?=$payment_type?></td>
				</tr>
				<tr bgcolor='#cbe2f5'>
					<td align='center' width='100'><b>���űݾ�</b></td>
					<td align='center' bgcolor="white"  colspan='3'><?=$rows[amount]?> �� (��ۺ�:<?=$rows[trans_cost]?>) ��</td>
					<td align='center' width='100'><b>����Ʈ����</b></td>
					<td align='center' bgcolor="white" ><?=$rows[mileage]?></td>
				</tr>
				<tr bgcolor='#cbe2f5'>
					<td align='center' width='100'><b>���� ����ݾ�</b></td>
					<td align='center' bgcolor="white"  colspan='3'><?=$rows[amount]?> �� (��ۺ�:<?=$rows[trans_cost]?>) ��</td>
					<td align='center' width='100'><b>����Ʈ����</b></td>
					<td align='center' bgcolor="white" ><?=$rows[mileage]?></td>
				</tr>
				<tr bgcolor='#cbe2f5'>
					<td align='center' width='100'><b>����</b></td>
					<td align='center' bgcolor="white" colspan='3'><?=$a_status[$rows[status]]?> �� (��ۺ�:<?=$rows[trans_cost]?>) ��</td>
					<td align='center' width='100'><b>���º���</b></td>
					<td align='center' bgcolor="white" colspan='3'><?=$a_status[$rows[status]]?> �� (��ۺ�:<?=$rows[trans_cost]?>) ��</td>
				</tr>
			<?
				if($rows[payment_type]=='1'){?>
					<tr bgcolor='#cbe2f5'>
						<td align='center' width='100'><b>�Ա����� �̸�</b></td>
						<td align='center' bgcolor="white"  ><?=$rows[amount]?> �� (��ۺ�:<?=$rows[trans_cost]?>) ��</td>
						<td align='center' width='100'><b>����Ʈ����</b></td>
						<td align='center' bgcolor="white" ><?=$rows[mileage]?></td>
					</tr>
					<tr bgcolor='#cbe2f5'>
						<td align='center' width='100'><b>���űݾ�</b></td>
						<td align='center' bgcolor="white"  colspan='3'><?=$rows[amount]?> �� (��ۺ�:<?=$rows[trans_cost]?>) ��</td>
						<td align='center' width='100'><b>����Ʈ����</b></td>
						<td align='center' bgcolor="white" ><?=$rows[mileage]?></td>
					</tr>
			?>
			</table>
		</td>
	</tr>
</table>
<table width="94%" cellspacing = "2" cellpadding = "1" border="0" >
	<tr>
		<td>
			<a href="order��st.php">
		</td>
	</tr>
</table>
</body>
</html>
