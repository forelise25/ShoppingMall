<?
	session_start();
	session_destroy();

	SetCookie("p_sid","", time(), "/");//��Ű ����
	echo "<meta http-equiv='Refresh' content='0;url=/index.php'>";
?>