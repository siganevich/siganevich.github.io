<?php
    session_start();                // возобновляем сессию

    $telegram = (isset($_POST["telegram"]))?$_POST["telegram"]:"";
	$skype = (isset($_POST["skype"]))?$_POST["skype"]:"";

	if ($telegram == "" || $skype == "")
	{
		$telegram = (isset($_SESSION["telegram"]))?$_SESSION["telegram"]:"";
        $skype = (isset($_SESSION["skype"]))?$_SESSION["skype"]:"";
        if ($telegram == "" || $skype == "")
        {
            header("Location: sessionform1.php");
            exit();
        }
	}
    else
    {
    	$_SESSION["telegram"] = $telegram;	// Сохраняем переменную
    	$_SESSION["skype"] = $skype;	// Сохраняем переменную
    }

?>

<!DOCTYPE html>
<html lang="RU">
<head style>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <title>form4</title>
    <link rel="stylesheet" href="./style.css" type="text/css"> 
</head>
<body>
    <table class="container-fluid table table-dark" style="width: 1000px">
        <tr>
            <th class="name-field">Фамилия:</th>
            <th class="value-field"><?= $_SESSION["lnm"] ?></th>
        </tr>
        <tr>
            <th class="name-field">Имя:</th>
            <th class="value-field"><?= $_SESSION["fnm"] ?></th>
        </tr>
        <tr>
            <th class="name-field">Телефон:</th>
            <th class="value-field"><?= $_SESSION["phone"] ?></th>
        </tr>
        <tr>
            <th class="name-field">E-mail:</th>
            <th class="value-field"><?= $_SESSION["email"] ?></th>
        </tr>
        <tr>
            <th class="name-field">Telegram:</th>
            <th class="value-field"><?= $_SESSION["telegram"] ?></th>
        </tr>
        <tr>
            <th class="name-field">Skype:</th>
            <th class="value-field"><?= $_SESSION["skype"] ?></th>
        </tr>
    </table>

   <br/>
   <a href='destroy_session.php' style='margin-left: 10%;'>Очистить данные</a>
   <br/>
   <a href='sessionform1.php' style='margin-left: 10%;'>Редактировать данные</a> 

</body>
</html>
