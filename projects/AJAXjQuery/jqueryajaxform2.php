<?php
	$bookTheme = (isset($_GET['booktheme']))?$_GET['booktheme']:"";
	$link = new mysqli("localhost", "root", "root", "books");
	if ($link === false)
	{
?>
<response>
	<result><?= $link->errno_connect ?></result>
		<data>
			<?= $link->error_connect ?>
		</data>
		<method></method>
	</response>
<?php
		exit();
	}
	$link->query("SET NAMES UTF8");
	$str = "SELECT IFNULL(name, 'N/A') AS name, 
		IFNULL(izd, 'N/A') AS izd, 
		IFNULL(themes, 'N/A') AS themes, 
		IFNULL(category, 'N/A') AS category
		FROM books 
		WHERE themes LIKE '%$bookTheme%' ORDER BY 1";
	$result = $link->query($str);
	if ($result === false)
	{
		echo "Error query (".$link->errno."):".$link->error;
		exit();
	}
	header("Content-Type: text/xml");
	echo "<response><result>0</result><data>";

	for ($i = 0; $i < $result->num_rows; $i++)
	{
		$row = $result->fetch_assoc();
		echo "<book>";
		echo "<name>".htmlspecialchars($row['name'])."</name>";
		echo "<izd>".htmlspecialchars($row['izd'])."</izd>";
		echo "<category>".htmlspecialchars($row['category'])."</category>";
		echo "<themes>".htmlspecialchars($row['themes'])."</themes>";
		echo "</book>";
	}

	echo "</data><method>getBooks</method></response>";
