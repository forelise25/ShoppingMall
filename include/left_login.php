<table border ='0' cellpadding='0' cellspacing = '0' width='215' style='border:5px solid #F2EBC4'>
	<tr>
		<td style="padding:4 2 10;">
			<table border ='0' cellpadding='0' cellspacing = '0' width='198'>
			<?
			if(!isset($_SESSION["p_id"])||!$_SESSION["p_name"]){
			?>
				<form method='post' name='login' action='/member/login_process.php' onsubmit="javascript:return(login_check())">
				<tr>
					<td width = '198' height='26'>
						<img width='200' height='25' src='/img/login_subject.gif'>
					</td>
				</tr>
				<tr>
					<td width='198' height='45'>
						<table width = '200' border='0' cellpadding='0' cellspacing='0'>
							<tr>
								<td height="5"></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td width='40'>
									<table width = '100' border='0' cellpadding='0' cellspacing='0'>
										<tr>
											<td width='40' height='25'>
												<img width='39' height='9' src='/img/login_id.gif'>
											</td>
											<td>
												<input type=text size='12' name='id'>
											</td>
										</tr>
										<tr>
											<td height='25'>
												<img width='39' height='9' src='/img/login_pass.gif'>
											</td>
											<td>
												<input type='password' size='12' name='pwd'>
											</td>
										</tr>
									</table>
								</td>
								<td align='middle' width='50'>
									<input type='image' width='45' height='46' src='/img/login_btn.gif'>
								</td>
								<td></td>
							</tr>
							<tr align='middle'>
								<td></td>
								<td></td>
								<td></td>
							</tr>
						</table>
						<table width = '168' height='25' align='center' border='0' cellpadding='0' cellspacing='0'>
							<tr>
								<td class='chon11px'>
									<img width='7' height='7' border='0' src='/img/login_blit.gif'>
									  <font color='#000000'><a href="/member/join.php">ȸ������</a></font>
								</td>

								<td class='chon11px'>
									<img width='7' height='7' border='0' src='/img/login_blit.gif'>
									  <font color='#000000'><a href="/member/idpass_search.php">��й�ȣ ã��</a></font>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				</form>
			<?
			}else{//���ǿ� ���� �ִ� = ȸ���̴�
				$query = "select count(mnum) as cnt_1 from message_info where receiveid_fk='$_SESSION[p_id]' and receive_del='N' and receive_chk='N'";
				$result = mysql_query($query,$connect);
				$rows = mysql_fetch_array($result);
				mysql_free_result($result);
			?>
				<tr>
					<td width='198' height='26'>
						<img width='200' height='25' src='/img/login_subject.gif'>
					</td>
				</tr>
				<tr>
					<td width='198' height='45'>
						<table width = '200' height='0' border='0' cellpadding='0' cellspacing='0'>
							<tr>
								<td height="5"></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td	colspan='3' align='center'>
									<table width='150' cellpadding='0' cellspacing='0'>	
										<tr>
											<td height='35' align='center'>
												<?=$_SESSION[p_name]?>�� �ݰ����ϴ�.
											</td>
										</tr>
									</table>
								</td>
							</tr>

							<tr>
								<td align='middle'></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
						</table>
						<table width='168' height='25' border='0' align='center' cellpadding='0' cellspacing='0'>
							<tr>
								<td class='chon11px'>&nbsp;&nbsp;
									<img width='7' height='7' border='0' src='/img/login_blit.gif'>
									<font color='#000000'><a href="/member/mem_edit.php">��������</a></font>
								</td>
								<td class='chon11px'>
									<img width='7' height='7' border='0' src='/img/login_blit.gif'>
									<font color='#000000'><a href="/member/logout_process.php">�α׾ƿ�</a></font>
								</td>
							</tr>
						</table>
						<table width = '95%'border='0' cellpadding='0' cellspacing='0'>
							<tr>
								<td width='13'>
									<img src='/img/bt_msg.gif'>
								</td>
								<td	width='75' class='line2'> 
									<a href="/member/message_1.php">
									������ ��
									</a>
								</td>
								<td	width="10" class="line2" align="center">:</td>
								<td	width="62" class="line2" align="right">
								<a href="/member/message_1.php"><b><?=number_format($rows[cnt_1])?></b></a>��</td>
							</tr>
							<tr>
								<td width='13'>
									<img src='/img/coupon.gif' width="20" height='20'>
								</td>
								<td	width='75' class='line2'> 
									<a href="#">
									���� ������
									</a>
								</td>
								<td	width="10" class="line2" align="center">:</td>
								<td	width="62" class="line2" align="right">
								<a href="#"><b>0</b></a>��</td>
							</tr>
						</table>
					</td>
				</tr>
			<?
			}//else
			?>
			</table>
		</td>
	</tr>
</table>