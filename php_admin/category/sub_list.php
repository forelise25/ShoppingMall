<?
	include "../../php/auth.php";
	include "../../php/config.php"; 
	include "../../php/util.php";  
	$connect = my_connect($host,$dbid,$dbpass,$dbname);

	$query = "select *from products_category2 where category_code_fk='$sub_code'";
	$result = mysql_query($query, $connect);
	$total_count=mysql_num_rows($result);  //�ߺз��� ����
?>
<html>
<head>
	<title>�ߺз� ��� ����</title>
	<meta http-equiv="content-type" content="text/html;charset=euc-kr">
	<link rel="stylesheet" href="../../common/global.css">
	<script language="javascript" src="../../common/global.js"></script>
</head>
<body bgcolor="#ffffff" text="#000000">
<center>
<form method='post' action='sub_list.php'>
	<table width="700" cellspacing = "0" cellpadding = "3" border="0">
		<tr class="hanamii" >
			<td align="right" ><? echo($total_count)?> ��</td>
		</tr>
	</table>
	<table width="700" cellspacing = "0" cellpadding = "0" border="0">
		<tr>
			<td bgcolor="#666666">
				<table width="100%" cellspacing = "1" cellpadding = "2" border="0">
					<tr align="center" bgcolor="#d9d9d9" class="hanamii">
						<td width="10%">��ȣ</td>
						<td width="15%">�ڵ�</td>
						<td width="30%">ī�װ� �̸�</td>
						<td width="20%">��ϵ� ��ǰ��</td>
						<td width="25%">����</td>
					</tr>
					<?
					for($i=0; $rows=mysql_fetch_array($result);$i++){
						$query1 = "select *from products where l_category_fk ='$rows[code]'";
						$result1= mysql_query($query1, $connect);
						$products_count = mysql_num_rows($result1);
						mysql_free_result($result1);
						
						if($i%2==0){
							$bgcolor="#ffffff";
						}else{
							$bgcolor="#f5f5f5";
						}
					?>
					<tr bgcolor="<?=$bgcolor?>" align='center' class='hanamii'>
						<td><?=($i+1)?></td>
						<td><?=$rows[code]?></td>
						<td><?=$rows[name]?></td>
						<td><?=$products_count?> ��</td>
						<td>
							<a href='sub_write.php?mode=update&id=<?=$rows[id]?>&h_code=<?=$rows[category_code_fk]?>'>
							����</a>
							<a href='sub_delete.php?id=<?=$rows[id]?>&h_code=<?=$rows[category_code_fk]?>' onclick="return confirm('������ �����Ͻðڽ��ϱ�?')">����</a>
						</td>
					</tr>
					<?
					} //end of for   �����°� 
					mysql_free_result($result);

					if($total_count==0){?>
					<tr bgcolor="#ffffff" align='center' class='hanamii'>
						<td colspan='6'>
							��ϵ� �з��� �����ϴ�.
						</td>
					</tr>
					<?	
					}
					?>
				</table>
			</td>
		</tr>
	</table>
	<table width='700' border='0' cellspacing='0' cellpadding='3'>
		<tr>
			<td	align='center'>
				<input type='button' onclick="location='sub_write.php?h_code=<?=$sub_code?>'" value="����ϱ�">
				<input type='button' onclick="location='list.php'" value="�����׸�">
			</td>
		</tr>
	</table>
</form>
</center>	
</body>
</html>