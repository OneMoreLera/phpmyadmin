<?php
echo "<div align =\"center\">Результат поиска</div>";
if ($db =@mysql_connect ("pks41.ru","Student","1111"))
{
	mysql_select_db("kollege");
	mysql_query("SET NAMES UTF8");
	$res = mysql_query("select students.surname, students.name, students.patronym, groups.group from students inner join groups on students.group_id = groups.group_id where (surname like '$_GET[surname]');");
	$coll = mysql_num_rows($res);
	for ($i=0; $i<$coll; $i ++)
	{
		echo mysql_result($res, $i, "surname"), "&nbsp;";
		echo mysql_result($res, $i, "name"),"&nbsp;";
		echo mysql_result($res, $i, "patronym"),"&nbsp;";
		echo mysql_result($res, $i, "group"),"<br>";
	}
	mysql_close($db);
}
else{
	echo "<div align\"center\">Нет подключения к базе данных</div>";
}
?>
	