<?
	include "../php/config.php"; //session�� DB���ἳ��
	include "../php/util.php";   //���� ��ƿ��Ƽ �Լ�
	//mysql����
	$connect = my_connect($host,$dbid,$dbpass,$dbname);

	$query="select *from member where id='$id' and passwd='$pwd'";
	$result=mysql_query($query, $connect);
	$rows=mysql_fetch_array($result);

	if(!$rows){ //��ȸ��
		err_msg("�������� �ʴ� ȸ��ID�̰ų� ��й�ȣ�� Ʋ���ϴ�.");
	}else{
		$_SESSION["p_id"] = $id;//$rows
		$_SESSION["p_name"] = $rows[name];
		$_SESSION["p_email"] = $rows[email];
		//��ٱ��� �ڵ� ���� �߰�
		
		echo "<meta http-equiv='Refresh' content='0;url=/index.php'>";
	}
?>