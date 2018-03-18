<?
	include "../php/config.php"; 
	include "../php/util.php";  

	$connect = my_connect($host,$dbid,$dbpass,$dbname);
	
	if(!$what){  //우편번호는 경매에서는 3번으로 쇼핑몰에서는 2번 에서 사용할 것 이다. 이렇게 다양하게 사용하고 싶어서 구분값 주는 거임. 
		$what = 1;
	}
?>
<html>
<head>
	<title>우편번호 검색</title>
	<meta http-equiv="content-type" content="text/html;charset=euc-kr">
	<link rel="stylesheet" href="../common/global.css">
	<script language="javascript" src="../common/global.js"></script>
	<script language="javascript">
		function checkInput(){
			var form = document.zipsearch;
			if(!(form.dong.value)){
				alert("찾기를 원하는 동을 입력하세요");
				form.dong.focus();
				return false;
			}else{
				form.submit();
			}
		}
		function open_move1(zipcode, adr){
			var form_object=eval("opener.document.form1");
			zip1=zipcode.substring(0,3);
			zip2=zipcode.substring(4,7);
			b=adr;
			form_object.zipcode1.value=zip1;
			form_object.zipcode2.value=zip2;
			form_object.address1.value=b;
			form_object.address1.focus();
			self.close();
		}
		function open_move2(zipcode, adr){
			var form_object=eval("opener.document.purchase");
			zip1=zipcode.substring(0,3);
			zip2=zipcode.substring(4,7);
			b=adr;
			form_object.buyer_zipcode01.value=zip1;
			form_object.buyer_zipcode02.value=zip2;
			form_object.buyer_address01.value=b;
			form_object.buyer_address02.focus();
			self.close();
		}
		function open_move3(zipcode, adr){
			var form_object = eval("opener.document.purchase");
			zip1=zipcode.substring(0,3);
			zip2=zipcode.substring(4,7);
			b=adr;
			form_object.recipient_zipcode01.value=zip1;
			form_object.recipient_zipcode02.value=zip2;
			form_object.recipient_address01.value=b;
			form_object.recipient_address02.focus();
			self.close();
		}
	</script>
	<style type="text/css">
		a:active{color:#333333; text-decoration:none;}
		a:hover{color:#cc0000;}
		a:link{color:#cc0000; text-decoration:underline;}
		a:visited{color:#333333;}
		td{font-size:9pt;}
	</style>
</head>
<body topmargin="0">
	<table width = '390' border='0' align='center' cellpadding='0' cellspacing='1' bgcolor="#666666">
		<tr>
			<td>
				<table width = '390' border='0' align='center' cellpadding='0' cellspacing='0'>
					<tr>
						<td bgcolor="#999999">
							<div align='center'>
								<img src="../img/member_title4.gif" width = '390'	height='61' border='0'></img>
							</div>
						</td>
					</tr>
					<tr>
						<td height='13' bgcolor="#f5f5f5">
							<div align='center'></div>
						</td>
					</tr>
					<tr>
						<td bgcolor='#f5f5f5'>
							<table width='217' height='25' border='0' align='center' cellspacing='0' cellpadding='0'>
								<form name="zipsearch" method='post' action = "<?=$PHP_SELF?>" onsubmit="return checkInput()"><!--폴스면 안가-->
								<tr>
									<td width='50'>동이름</td>
									<td width='118'>
										<input type=text name='dong' size='12'></input>
									</td>
									<input type="hidden" name="mode" value="search"> <!--히든을 하는 이유는 화면에 보이고 싶지 않아, 하지만 다른 php로 넘겨줘야해-->
									<input type="hidden" name="what" value="<?=$what?>">
									<td>
										<input type='submit' name="btn" value='확인'>
									</td>
								</tr>
								</form>
							</table>
						</td>
					</tr>
					<?
					if($mode=='search'){
						$query = "select post_id, post_num, address, phon_num from p_zipcode where address like '%$dong%'";
						$result = mysql_query($query, $connect);
						$total_num = mysql_num_rows($result); //레코드의 갯수를 갖게 됨
					?>
					<tr>
						<td height='50' bgcolor='#f5f5f5'>
							<div align='center'><font color="#000099">해당 주소를 클릭하시면 자동으로 입력됩니다.</font></div>
						</td>
					</tr>
					<tr> <!--이 부분은 주소 주르륵-->
						<td bgcolor='#f5f5f5'>
							<table width = '350' height='33' border='0' cellpadding='1' cellspacing='0'>
								<?
									if($total_num){ //DB에서 '두정동'을 찾았는데 있어? 그러면 total_num에 값이 들어와 있을꺼야
										for($i=0; $i<$total_num; $i++){
											$post_id=mysql_result($result, $i, "post_id");//i가 0이면 $i의 0번째 포스트 아이디 가져와
											$post_num=mysql_result($result, $i, "post_num");
											$address=mysql_result($result, $i, "address");
											$phon_num=mysql_result($result, $i, "phon_num");
								?>
								<tr bgcolor="#ffffff">
									<td width="57" height="30">
										<div align='center'>
											<a href="javascript:open_move<?=$what?>('<?=$post_num?>','<?=$address?>')">
												<?=$post_num?>
											</a>
										</div>
									</td>
									<td width="57" height="30">
										<div align='center'>
											<a href="javascript:open_move<?=$what?>('<?=$post_num?>','<?=$address?>')">
												<?=$address?>
											</a>
										</div>
									</td>
								</tr>
								<?
										} //end of for
									}else{//유효한 동을 입력하지 않은 경우
								?>
								<tr bgcolor='#ffffff'>
									<td colspan='2' height='30'>
										<div align='center'>해당 주소가 없습니다.</div>
									</td>
								</tr>
								<?
									}//end of mini else
							}else{?>
								<tr>
									<td height="85" bgcolor='#f5f5f5'>
										<div align='center'>
											<font color="#000099">
												검색하려는 주소의 <br> 동이나 단어를 입력하세요.
											</font>
										</div>
									</td>
								</tr>
								<?
							}
								?>
								<tr>
									<td bgcolor="#f5f5f5">&nbsp;</td>
								</tr>
								<tr>
									<td height="1"bgcolor="#ffffff">
										<p align='rignt'>
											<a href="javascript:window.close()">
												<img src="../img/member_close_button.gif" width="60" height="19" border="0"></img>
											</a>
										</p>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>