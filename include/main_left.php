<table border='0' cellpadding='0' cellspacing='0' width='215' style="border:5px solid #F2EBC4">
	<tr>
		<td	style="padding:4 2 10">
		<?
			if($_SESSION[p_id]){
		?>
			<table border='0' cellpadding='0' cellspacing='0' width='100%'>
				<tr>
					<td	width="200" height="32" border="whitesmoke">
						<p>
							<img src="/img/game_event_icon.gif" align="absmiddle">사이트 메뉴
						</p>
					</td>
				</tr>

				<tr>
					<td	width="200" height="32" border="whitesmoke">
						<img src="/img/notice_icon.gif" align='adsmiddle'><a href="/member/mem_edit.php">정보수정</a>
					</td>
				</tr>
				<tr>
					<td	width="200" height="32" border="whitesmoke">
						<img src="/img/notice_icon.gif" align='adsmiddle'><a href="/member/coupon.php">쿠폰함</a>
					</td>
				</tr>
				<tr>
					<td	width="200" height="32" border="whitesmoke">
						<img src="/img/notice_icon.gif" align='adsmiddle'><a href="/cus_center/faq_main.php">고객센터</a>
					</td>
				</tr>
			</table>
		<?	
		}else{
		?>
			<table border='0' cellpadding='0' cellspacing='0' width='100%'>
				<tr>
					<td	width="200" height="32" border="whitesmoke">
						<p>
							<img src="/img/game_event_icon.gif" align="absmiddle">사이트 메뉴
						</p>
					</td>
				</tr>
				<tr>
					<td	width="200" height="32" border="whitesmoke">
						<img src="/img/notice_icon.gif" align='adsmiddle'><a href="/member/join.php">회원가입</a>
					</td>
				</tr>
				<tr>
					<td	width="200" height="32" border="whitesmoke">
						<img src="/img/notice_icon.gif" align='adsmiddle'><a href="/member/shop_guide.php">쇼핑몰 안내</a>
					</td>
				</tr>
				<tr>
					<td	width="200" height="32" border="whitesmoke">
						<img src="/img/notice_icon.gif" align='adsmiddle'><a href="/shopping/shop_main.php">Shopping</a>
					</td>
				</tr>
				<tr>
					<td	width="200" height="32" border="whitesmoke">
						<img src="/img/notice_icon.gif" align='adsmiddle'><a href="/member/join.php">고객센터</a>
					</td>
				</tr>
			</table>
		<?
			}
		?>
		</td>
	</tr>
</table>