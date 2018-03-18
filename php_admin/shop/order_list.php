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
				$p_scale=15; //화면에 표시되는 갯수
				$cpage=intval($page);
				$totalpage=intval($total_bnum/$p_scale);

				if($totalpage*$p_scale!=$total_bnum){
					$totalpage=$totalpage+1;
				}
				//결국 $cline와 $p_scale1 값을 구하는 공식들

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
							<font color='blue' size='3'><b>상품 주문현황</b></font>
						</td>
					</tr>
				</table>
				<table width='99%' cellspacing = "0" cellpadding = "0" border="0">
					<tr bgcolor='#3a9edf'>
						<td>
							<table width='100%' cellspacing = "1" cellpadding = "3" border="0">
								<tr bgcolor='#cbe3f5'>
									<td align='center' height='20'><b>주문번호</b></td>
									<td align='center' height='20'><b>ID</b></td>
									<td align='center' height='20'><b>주문일</b></td>
									<td align='center' height='20'><b>구매자</b></td>
									<td align='center' height='20'><b>수령자</b></td>
									<td align='center' height='20'><b>주문방식</b></td>
									<td align='center' height='20'><b>주문액</b></td>
									<td align='center' height='20'><b>처리상태</b></td>
									<td align='center' height='20'><b>삭제</b></td>
								</tr>
								<?
									if($mode=='search'){
										$query1 = "select * from mall_order where cancel='N' and $key like '%$key_value%' order by num desc";

									}else{
										$query1 = "select * from mall_order where cancel='N' order by num desc limit $cline, $p_scale1";
									}
									$a_pay_type['1'] = "무통장입금";
									$a_pay_type['2'] = "신용카드";
									$a_pay_type['3'] = "휴대폰결재";

									$result1 = mysql_query($query1,$connect);

									for($i = 0; $rows1=mysql_fetch_array($result1);$i++){
										if($rows1[status]=='3'){
											$c_color == "#ffffff";
											$status_now="입금확인전";
										}
										if($rows1[status]=='5'){
											$c_color == "#e0fff0";
											$status_now="입금확인";
										}
										if($rows1[status]=='7'){
											$c_color == "#effcfc";
											$status_now="배송중";
										}
										if($rows1[status]=='8'){
											$c_color == "#fffccc";
											$status_now="배송완료";
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
											<td align='center'><?=number_format($rows1[user_id])?> 원</td>
											<td align='center'><a href = "order_delete.php?oid=">삭제</a></td>
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
											<option value="user_id">아이디</option>
											<option value="user_id">아이디</option>
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
					<td>현재위치 : <a href="list.php?level=1">처음</a> &gt;</td>
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
		<td><b>카테고리 선택</b><br>
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
				<td width='5%'>번호</td>
				<td width='15%'>제조사(생산지)</td>
				<td width='25%'>제품명</td>
				<td width='15%'>소비자 가격</td>
				<td width='15%'>판매가격</td>
				<td width='13%'>이벤트</td>
				<td width='12%'>신상품</td>
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
				$p_scale=10; //화면에 표시되는 갯수
				$cpage=intval($page);
				$totalpage=intval($total_bnum/$p_scale);

				if($totalpage*$p_scale!=$total_bnum){
					$totalpage=$totalpage+1;
				}
				//결국 $cline와 $p_scale1 값을 구하는 공식들

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
							echo("<font color='red'>등록중</font>");
							echo("<a href='delete1.php?p_num=$rows3[num]&mode=del&category_code_fk=$rows3[category_fk]&page=$page&l_category_fk=$rows3[l_category_fk]&ch=option1_chk&level=$level'>
							<해제></a>");
						}else{
							echo("<a href='delete1.php?p_num=$rows3[num]&mode=insert&category_code_fk=$rows3[category_fk]&page=$page&l_category_fk=$rows3[l_category_fk]&ch=option1_chk&level=$level'>등록</a>");	
						}
						?>
					</td>
					<td>
						<?
						if($rows3[option2_chk]=='Y'){
							echo("<font color='red'>등록중</font>");
							echo("
							<a href='delete1.php?p_num=$rows3[num]&mode=del&category_code_fk=$rows3[category_fk]&page=$page&l_category_fk=$rows3[l_category_fk]&ch=option2_chk&level=$level'>
							<해제></a>");
						}else{
							echo("
							<a href='delete1.php?p_num=$rows3[num]&mode=insert&category_code_fk=$rows3[category_fk]&page=$page&l_category_fk=$rows3[l_category_fk]&ch=option2_chk&level=$level'>
							등록</a>");
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
						 등록된 상품이 없습니다.
					</td>
				</tr>
				<?
				}
			?>
			<form action='list.php' name='f' method='post'>
				<tr bgcolor='#ffffff' align='center'>
					<td colspan='10'>
						<select name = 'key'>
							<option value='company'>제조회사</option>
							<option value='price'>판매가격</option>
							<option value='name'>상품명</option>
						</select>
						<input type='hidden' name='mode' value='search'>
						<input type='hidden' name='l_category_fk' value='<?=$l_category_fk?>'>
						<input type='hidden' name='category_code_fk' value='<?=$category_code_fk?>'>
						<input type='hidden' name='level' value='<?=$level?>'>
						<input type='text' name='key_value' size='16'>
						<input type='submit' value='검색'>
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
						<input type="button" value="상품등록" onclick="location='write.php?level=<?=$level?>&category_code_fk=<?=$category_code_fk?>&page=<?=$page?>&l_category_fk=<?=$l_category_fk?>'">
						<input type="button" value="다시읽기" onclick="location='list.php?level=<?=$level?>&category_code_fk=<?=$category_code_fk?>&page=<?=$page?>&l_category_fk=<?=$l_category_fk?>'">
					</td>
				</tr>
			</table>
		<?
		}//if
		?>
	</tr>
</table>
*/?>