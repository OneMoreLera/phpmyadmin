<?php
echo "<div align =\"center\">Результат поиска</div>";
if ($db =@mysql_connect ("127.0.0.1","Student","1111"))
{
	mysql_select_db("college");
	mysql_query("SET NAMES UTF8");
	$res = mysql_query("select students.surname, students.name, students.patronym, students.number, groups.group from students inner join groups on students.group = groups.group_id where (surname like '%$_GET[surname]%')and number like '%$_GET[number]%';");
	$coll = mysql_num_rows($res);
	if ($coll == 0)
	{ echo "<div align = \"center\">Неправильно указаны данные</div><br>";
		echo "<div align = \"center\"><a href = \"index.php\"> Назад </a></div>";
	}
	for ($i=0; $i<$coll; $i ++)
	{
		echo mysql_result($res, $i, "surname"), "&nbsp;";
		echo mysql_result($res, $i, "name"),"&nbsp;";
		echo mysql_result($res, $i, "patronym"),"&nbsp;";
		echo mysql_result($res, $i, "number"),"&nbsp;";
		echo mysql_result($res, $i, "group"),"<br>";
	}
	mysql_close($db);
}
else{
	echo "<div align\"center\">Нет подключения к базе данных</div>";
}
function back()
{
Header("Location: index.php");
        exit; 	
};
?>
	