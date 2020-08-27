<?php
	session_start();				// возобновляем сессию

    $phone = (isset($_POST["phone"]))?$_POST["phone"]:"";
    $email = (isset($_POST["email"]))?$_POST["email"]:"";

    if ($phone == "" || $email == "")
    {
        $phone = (isset($_SESSION["phone"]))?$_SESSION["phone"]:"";
        $email = (isset($_SESSION["email"]))?$_SESSION["email"]:"";
        if ($phone == "" || $email == "")
        {
            header("Location: sessionform1.php");
            exit();
        }
    }
    else
    {  
        $_SESSION["phone"] = $phone;   // Сохраняем переменную
        $_SESSION["email"] = $email;  // Сохраняем переменную
    }

    $telegram = (isset($_SESSION["telegram"]))?$_SESSION["telegram"]:"";
    $skype = (isset($_SESSION["skype"]))?$_SESSION["skype"]:"";

?>

<!DOCTYPE html>
<html lang="RU">
<head style>
    <meta charset="UTF-8">
    <title>form3</title>
    <link rel="stylesheet" href="./style.css" type="text/css"> 
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="my-form">
        <form action="sessionform4.php" method="POST">
            <div class="form-group">
                <label class="description" for="telegram">telegram: </label>
                <input id="telegram" type="text" name ="telegram" class="form-control form-control-sm" value="<?= $telegram?>"/>
                <br/>
                <label class="description" for="skype">skype: </label>
                <input id="skype" type="text" name ="skype" class="form-control form-control-sm" value="<?= $skype?>"/>
                <br/>
                <input type="submit" value="Далее"/>
            </div>
        </form>
        <?php
         echo "<a href='sessionform2.php'>Вернуться</a>";
        ?>
    </div>
</body>
</html>
