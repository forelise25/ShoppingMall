
<table width = "939" height="150" cellspacing = "0" cellpadding = "0" background="/img/top.png"  border="0">
	<tr>
		<td>
			<table width = "890" height="77" cellspacing = "0" cellpadding = "0" border="0">
				<tr align = 'center'>
					<td width = "238" height = "50" >
						<a href="/index.php"><font color="white" size="4" style="font-family: ����������,����"><b>&nbsp;&nbsp;�������� ���θ�</b></font></a>
					</td>
				</tr>
				<tr align = 'center'>
					<td>
						<img src = "/img/top_icon-02.png" width='70'height='70'>
					</td>
				</tr>
				<tr>
					<td align = "middle" width="597" height="50">
						<font color ="white">
<?
						if(!($_SESSION[p_id] || $_SESSION[p_name])){//ȸ���� ��ȸ�� ���� �̰� ��ȸ��
?>
								<b><a href="/member/join.php"><font color="#ffffff" style="font-family: ����������,����">ȸ������</font></a>&nbsp&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp&nbsp
								<a href="/member/shop_guide.php"><font color="#ffffff" style="font-family: ����������,����">���θ� �ȳ�</font></a>&nbsp&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp&nbsp
								<a href="/shopping/shop_main.php"><font color="#ffffff" style="font-family: ����������,����">Shopping</font></a>
<?
						}else{//ȸ��
?>
							<b>
								<a href="/member/mem_edit.php"><font color="#ffffff" style="font-family: ����������,����">��������</font></a>&nbsp&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp&nbsp
								<a href="/member/coupon.php"><font color="#ffffff" style="font-family: ����������,����">������</font></a>&nbsp&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp&nbsp
								<a href="/shopping/shop_main.php"><font color="#ffffff" style="font-family: ����������,����">Shopping</font></a>
								
<?						}     
?>
								&nbsp&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp&nbsp
								<a href="/cus_center/faq_main.php"><font color="#ffffff" style="font-family: ����������,����">������</font></a>
							</b>	

							<?
							if($_SESSION[p_id]=='choi'){
							?>
							<b>&nbsp;&nbsp;&nbsp;&nbsp;<font color="#ffffff">|</font>&nbsp;&nbsp;&nbsp;&nbsp;<a href="../php_admin/index.php" target='_blank' style="color:#ffffff"><font color="#ffffff" style="font-family: ����������,����">������ ���</font></a></b>
							<?
							}
							?>
						</font>
					</td>
					<td class = "chon11px" align = "right" width="55" height="50">&nbsp</td>
				</tr>
			</table>
		</td>
	</tr>
</table>