
<!DOCTYPE html>
<html>
<head>
<title>HOMEWORK.COM</title>
<meta charset="utf-8" />
</head>
<body>
<?php
	$_ENV = parse_ini_file(".env");
	$conn = mysqli_connect($_ENV['MYSQL_HOST'], $_ENV['MYSQL_USER'], $_ENV['MYSQL_PASSWORD'], $_ENV['DATABASE_NAME']);
	if (!$conn) {
	  echo "Подключение неуспешно  не установлено";
	  die("Ошибка: " . mysqli_connect_error());
	} 
	echo "Подключение успешно установлено";
	mysqli_close($conn);
?>

<h2>Список пользователей</h2>
<?php


function getUserByCityId($id)
{
	$conn = mysqli_connect($_ENV['MYSQL_HOST'], $_ENV['MYSQL_USER'], $_ENV['MYSQL_PASSWORD'], $_ENV['DATABASE_NAME']);
 	$sql = "SELECT * FROM USERS WHERE City_id = $id";
	if($result = mysqli_query($conn, $sql)){
		
    		$rowsCount = mysqli_num_rows($result); // количество полученных строк
    		if($rowsCount>0){
    		echo "<p>Получено объектов: $rowsCount</p>";
    		echo "<table><tr><th>Id</th><th>Имя</th><th>Почта</th><th>Телефон</th><th>id города</th></tr>";
    		foreach($result as $row){
        		echo "<tr>";
            		echo "<td>" . $row["ID"] . "</td>";
            		echo "<td>" . $row["Name"] . "</td>";
            		echo "<td>" . $row["Email"] . "</td>";
            		echo "<td>" . $row["Phone"] . "</td>";
            		echo "<td>" . $row["City_id"] . "</td>";
        		echo "</tr>";
    		}
    		echo "</table>";
    	mysqli_free_result($result);
	} else{

    		echo "Нет таких! ";
	}
	}
mysqli_close($conn);   
}
$ID_city = 33333;
getUserByCityId($ID_city)
?>
</body>
</html>
