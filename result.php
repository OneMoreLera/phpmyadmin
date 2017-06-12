<?php
echo "<style type=\"text/css\">
   TABLE { 
    width: 300px; /* Ширина таблицы */
    border-collapse: collapse; /* Убираем двойные линии между ячейками */
   }
   TD, TH {
    padding: 3px; /* Поля вокруг содержимого таблицы */
    border: 1px solid black; /* Параметры рамки */
   }
   TH {
    background: #b0e0e6; /* Цвет фона */
   }
  </style>";
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
	else{
		echo "<div align = \"center\"> <table>
				<thead>
				<tr>
					<th>Фамилия</th>
					<th>Имя</th>
					<th>Отчество</th>
					<th>Номер</th>
					<th>Группа</th>
				</tr>
				</thead>
				<tbody>
		";
		
		for ($i=0; $i<$coll; $i ++)
		{
			echo"<tr>";
			echo "<td>",mysql_result($res, $i, "surname"), "&nbsp;","</td>";
			echo "<td>",mysql_result($res, $i, "name"),"&nbsp;","</td>";
			echo "<td>",mysql_result($res, $i, "patronym"),"&nbsp;","</td>";
			echo "<td>",mysql_result($res, $i, "number"),"&nbsp;","</td>";
			echo "<td>",mysql_result($res, $i, "group"),"</td>";
			echo "</tr>";
		}
		mysql_close($db);
		echo"</tbody>
			</table></div>";
	}
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
	