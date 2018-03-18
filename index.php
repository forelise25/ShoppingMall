<?
	include "php/config.php"; //session및 DB연결설정
	include "php/util.php";   //각종 유틸리티 함수
	//mysql연결
	$connect = my_connect($host,$dbid,$dbpass,$dbname);
?>
<html>
<head>
	<title>가람이의 쇼핑몰</title>
	<meta http-equiv="content-type" content="text/html;charset=euc-kr">
	<link rel="stylesheet" href="common/global.css">
	<script language="javascript" src="common/global.js"></script>
</head>
<body>   
<?  
include "include/top_menu.php";
?>
<br>
<table width = "938" height="77" cellspacing = "0" cellpadding = "0" style='border-width:1; border-style:solid;' border="0">
	<tr>
		<td width = '210' height='376' valign = 'top' >
		<?
		include "include/left_login.php"; 
		include "include/main_left.php";
		?>
		</td>
		<td>
			<table width = "100%" cellspacing = "0" cellpadding = "0" border="0" >
				<tr>
					<td height = "30" style="padding:10 0 0 14px">
						<a href="#">쇼핑몰</a>&nbsp;&gt;
						<a href="index.php">HOME</a>
					</td>
				</tr>
			</table>
			<table width = "100%" cellspacing = "1" cellpadding = "2" border="0">
				<tr>
					<td class="hanamii" height="30" bgcolor="#F2EBC4">&nbsp- 쇼핑몰 신상품 -&nbsp</td>
				</tr>
				<tr>
					<td width = "100%" align = 'center' >
						<table width = "99%" border= "0" cellspacing ='0' cellpadding='0'>
							<tr>
								<?
								$query2 = "select *from products where del_chk='N'and option2_chk='Y' order by num desc limit 0,5";
								$result2 = mysql_query($query2,$connect);
								for($kk=0;$rows2=mysql_fetch_array($result2);$kk++){   
								?>
								<td align ='center' valign = 'top' width='115' height='120'>
									<table border='0'>
										<tr>
											<td align = 'center' valign = 'top' width = '115' height='120'>
												<a href="shopping/details.php?pnum=<?=$rows2[num]?>&l_code=<?=$rows2[category_fk]?>"></a>
												<img src="upload/p_image/m/<?=$rows2[prod_code]?>.<?=$rows2[m_image_ty]?>" width="100"	height="120" border="0" onerror="this.src = '/img/noimage.gif'">
											</td>
										</tr>
										<tr>
											<td class="hanamii" align = 'center'><?=stripslashes($rows2[name])?></td>
										</tr>
										<tr>
											<td class = "hanamii" align = "center"> <s><?=number_format($rows2[cust_price])?>원</s></td>
										</tr>
										<tr>
											<td class = "hanamii" align ='center'><b><?=number_format($rows2[price])?>원</b></td>
										</tr>
									</table>
								</td>
								<?
								}
								mysql_free_result($result2);
								for($j=$kk;$j<5;$j++){ ?>
									<td width='115' height='150'>
										<table border = '0'>
											<tr>
												<td align = "center">&nbsp;</td>
											</tr>
											<tr>
												<td align = 'center'>&nbsp;</td>
											</tr>
											<tr>
												<td align = 'center'>&nbsp;</td>
											</tr>
											<tr>
												<td align = 'center'>&nbsp;</td>
											</tr>
										</table>
									</td>
								<?
								}
								?>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<br><br>
			<table width = "100%" cellspacing = "1" cellpadding = "2" border="0">
				<tr>
					<td class="hanamii" colspan="3" height="30" bgcolor="#F2EBC4">&nbsp- 신규 블로그 목록 -&nbsp</td>
				</tr>
				<tr bgcolor = "#E2E2E2">
					<td width = "200" align = "center" class="hanamii">블로그명</td>
					<td width = "250" align = "center" class="hanamii">블로그 소개</td>
					<td width = "100" align = "center" class="hanamii">생성일</td>
					
				</tr>
				<?
				for($j=1;$j<=5;$j++){
				?>
				<tr>
					<td align = "center" colspan="3" class="hanamii">&nbsp</td>
				</tr>
				<?  
				}  
				?>
			</table>
			<table width = "100%" cellspacing = "1" cellpadding = "2" border="0">
				<tr>
					<td class="hanamii" colspan="3" height="30" bgcolor="#F2EBC4">&nbsp- 새로 올라온 경매 -&nbsp</td>
				</tr>
				<?
				for($j=1;$j<=5;$j++){
				?>
					<tr>
						<td align = "center" colspan="3" class="hanamii">&nbsp</td>
					</tr>
				<?  
				}  
				?>
			</table>
		</td>
	</tr>
</table>
</body>
</html>
