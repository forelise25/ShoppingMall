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
	<title>전체 주문목록 보기</title>
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
						<td align='center'>이미지</td>
						<td align='center'>상품명</td>
						<td align='center'>제조회사</td>
						<td align='center'>수량</td>
						<td align='center'>가격</td>
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
							<td align='center'>$a_price[$i] 원</td>
						</tr>";
					$tot_amount = $tot_amount + (int)$a_price[$i] * (int)$a_volume[$i];
					$t_count = $t_count+(int)$a_volume[$i];
			}//end of for
			$trans_cost = 0;
			if($trans_cost>0){
				$amount_o=$tot_amount+$trans_cost;
				$amount_temp="($tot_amount 원 + $trans_cost 원)";
			}else{
				$amount_o=$tot_amount;
			}
			$temp .= "
				<tr bgcolor='#ece2f5'>
					<td colspan='3' align='right'>합계
					</td>
					<td align='center'><font color='blue'>$t_count 개</font></td>
					<td align='center'><font color='blue'>$tot_amount 원</font></td>
				</tr>
				</table>
			";
			if($rows[payment_type]==1){$payment_type = "무통장입금";}
			if($rows[payment_type]==2){$payment_type = "신용카드";}
			if($rows[payment_type]==3){$payment_type = "휴대폰 결재";}

			$a_status['3'] = "입금확인전";
			$a_status['5'] = "입금확인";
			
			
		?>
		</td>
	</tr>
</table>
<table width="94%" cellspacing = "2" cellpadding = "1" border="0" >
	<tr>
		<td height='25' align='center'>
			<b>주문 상세 내역 <font color='red'>(주문번호 : <?=$oid?></font></b>
		</td>
	</tr>
</table>
<table width="94%" cellspacing = "2" cellpadding = "1" border="0" >
	<tr bgcolor='#3a9edf'>	
		<td>
			<table width="100%" cellspacing = "2" cellpadding = "1" border="0" >
				<tr bgcolor='#cbe2f5'>
					<td align='center' width='100'><b>주문내역</b></td>
					<td align='left' colspan='3' bgcolor='white'>
						<?=$temp?>
					</td>
				</tr>
				<tr bgcolor='#cbe2f5'>
					<td align='center' width='100'><b>주문번호</b></td>
					<td align='center' bgcolor="white" width='100'><?=$rows[orderid]?></td>
					<td align='center' width='100'><b>구매일자</b></td>
					<td align='center' bgcolor="white" width='100'><?=$rows[createdate]?></td>
				</tr>
				<tr bgcolor='#cbe2f5'>
					<td align='center' width='100'><b>구매자</b></td>
					<td align='center' bgcolor="white" width='100'>
					구매자명 : <?=$rows[buyer_name]?> <br>
					우편번호 : <?=$rows[buyer_zipno]?> <br>
					연락주소 : <?=$rows[buyer_address]?> <br>
					연락번호 : <?=$rows[buyer_phone]?> <br>
					이메일: <?=$rows[buyer_email]?> <br>
					</td>
					<td align='center' bgcolor="white" width='100'>
					수령자명 : <?=$rows[buyer_name]?> <br>
					우편번호 : <?=$rows[buyer_zipno]?> <br>
					연락주소 : <?=$rows[buyer_address]?> <br>
					연락번호 : <?=$rows[buyer_phone]?> <br>
					이메일: <?=$rows[buyer_email]?> <br>
					</td>
				</tr>
				<tr bgcolor='#cbe2f5'>
					<td align='center' width='100'><b>ID 정보</b></td>
					<td align='center' bgcolor="white" width='100' colspan='3'><?=$rows[user_id]?></td>
					<td align='center' width='100'><b>결재방법</b></td>
					<td align='center' bgcolor="white"  colspan='3'><?=$payment_type?></td>
				</tr>
				<tr bgcolor='#cbe2f5'>
					<td align='center' width='100'><b>구매금액</b></td>
					<td align='center' bgcolor="white"  colspan='3'><?=$rows[amount]?> 원 (배송비:<?=$rows[trans_cost]?>) 원</td>
					<td align='center' width='100'><b>포인트적립</b></td>
					<td align='center' bgcolor="white" ><?=$rows[mileage]?></td>
				</tr>
				<tr bgcolor='#cbe2f5'>
					<td align='center' width='100'><b>실제 결재금액</b></td>
					<td align='center' bgcolor="white"  colspan='3'><?=$rows[amount]?> 원 (배송비:<?=$rows[trans_cost]?>) 원</td>
					<td align='center' width='100'><b>포인트적립</b></td>
					<td align='center' bgcolor="white" ><?=$rows[mileage]?></td>
				</tr>
				<tr bgcolor='#cbe2f5'>
					<td align='center' width='100'><b>상태</b></td>
					<td align='center' bgcolor="white" colspan='3'><?=$a_status[$rows[status]]?> 원 (배송비:<?=$rows[trans_cost]?>) 원</td>
					<td align='center' width='100'><b>상태변경</b></td>
					<td align='center' bgcolor="white" colspan='3'><?=$a_status[$rows[status]]?> 원 (배송비:<?=$rows[trans_cost]?>) 원</td>
				</tr>
			<?
				if($rows[payment_type]=='1'){?>
					<tr bgcolor='#cbe2f5'>
						<td align='center' width='100'><b>입금은행 이름</b></td>
						<td align='center' bgcolor="white"  ><?=$rows[amount]?> 원 (배송비:<?=$rows[trans_cost]?>) 원</td>
						<td align='center' width='100'><b>포인트적립</b></td>
						<td align='center' bgcolor="white" ><?=$rows[mileage]?></td>
					</tr>
					<tr bgcolor='#cbe2f5'>
						<td align='center' width='100'><b>구매금액</b></td>
						<td align='center' bgcolor="white"  colspan='3'><?=$rows[amount]?> 원 (배송비:<?=$rows[trans_cost]?>) 원</td>
						<td align='center' width='100'><b>포인트적립</b></td>
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
			<a href="order그st.php">
		</td>
	</tr>
</table>
</body>
</html>
