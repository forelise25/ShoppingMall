<?
	include "../php/config.php"; //session및 DB연결설정
	include "../php/util.php";   //각종 유틸리티 함수
	//mysql연결
	$connect = my_connect($host,$dbid,$dbpass,$dbname);
?>
<html>
<head>
	<title>쇼핑몰 안내</title>
	<meta http-equiv="content-type" content="text/html;charset=euc-kr">
	<link rel="stylesheet" href="../common/global.css">
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
		<td width="728" height="576" valign='top' style="margin-left:5px;"> 
			<table width = "100%" cellspacing = "0" cellpadding = "10" border="0">
				<tr>
					<td height = "30" style="padding:10 0 0 14px">
						<a href="#">HOME</a>&nbsp;&gt; <a href="/member/shop_guide.php">쇼핑몰 안내</a>
					</td>
				</tr>
				<tr>
					<td style="font-size:14pt">
					<img src="../img/ceo.jpg" width="150" height="170" style="float:left" border='2px' >
						<div style="line-height: 1.8">
						안녕하십니까 저는 쇼핑몰의 운영자인 '손가람'이라고 합니다. 이렇게 저희 쇼핑몰에 방문해주신 것에 큰 감사를 표합니다. 1924년 처음, 시작은 미약하였지만 많은 분들의 성원에 이렇게 성장할 수 있었습니다. 이 화면은 저희 쇼핑몰에 가입이 되지 않으신 비회원 고객님들께만 제공됩니다. 혹시나 처음 쇼핑몰을 방문하게 되신다면 쇼핑을 하시는데 여럿 불편한 점이 있을까 하여 아래의 간단한 설명을 제공하고자 합니다. 회원의 경우 쿠폰기능을 사용하실 수 있으니 많은 분들의 가입바랍니다.
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<b>[ 쪽지함 ]</b><br>
						쪽지함 기능은 쇼핑몰 내의 회원들끼리 상품에 대한 정보, 후기 등을 공유하도록 제공하는 서비스 입니다. 다른 회원의 아이디를 알 경우 쪽지 보내기, 확인, 삭제 등 다양한 기능을 사용하실 수 있습니다.
						<br><br>
						<b>[ 나의 쿠폰함 ]</b><br>
						회원의 경우 쇼핑몰 내애서 다양하게 사용가능한 쿠폰을 받으실 수 있습니다. 주로 제공되는 개인적인 소유가 필요하여 회원에게만 제공되며 처음 회원가입 시 1만원 상당의 상품권을 받을 수 있는 혜택이 있습니다. 쿠폰함에서 쿠폰 받기를 누른 후 '나의 쿠폰함'에서 고객님 개인의 쿠폰을 관리하실 수 있습니다.
						<br><br>
						<b>[ Shopping ]</b><br>
						Shopping의 경우 간편하게 분류된 카테고리 UI를 제공하며 최선을 다하여 고객님의 편한 쇼비활동을 도우려고 합니다. 
						<br><br>
						<b>[ 고객센터 ]</b><br>
						고객센터의 경우 회원과 비회원님들 모두 사용하실 수 있는 기능으로 저희 회사에 대한 소개, 이용약관, FAQ와 QnA 서비스를 제공하며 저희 쇼핑몰을 사용하시는 고객님들과의 원활한 소통을 위해 노력하고 있습니다. FAQ와 QnA의 경우 주기적으로 담당 부서에서 업데이트 중이니 많은 정보 이용 부탁드립니다.
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</body>
</html>