<?php
    session_start();                // создаем сессию

    $lastname = (isset($_POST["lastname"]))?$_POST["lastname"]:"";
    $firstname = (isset($_POST["firstname"]))?$_POST["firstname"]:"";

    if ($firstname == "" || $lastname == "")
    {
        $firstname = (isset($_SESSION["fnm"]))?$_SESSION["fnm"]:"";
        $lastname = (isset($_SESSION["lnm"]))?$_SESSION["lnm"]:"";
        if ($firstname == "" || $lastname == "")
        {
            header("Location: sessionform1.php");
            exit();
        }
    }
    else
    {  
        $_SESSION["lnm"] = $lastname;   // Сохраняем переменную
        $_SESSION["fnm"] = $firstname;  // Сохраняем переменную
    }

    $phone = (isset($_SESSION["phone"]))?$_SESSION["phone"]:"";
    $email = (isset($_SESSION["email"]))?$_SESSION["email"]:"";
    
?>

<!DOCTYPE html>
<html lang="RU">
<head style>
    <meta charset="UTF-8">
    <title>form2</title>
    <link rel="stylesheet" href="./style.css" type="text/css"> 
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="my-form">
        <form action="sessionform3.php" method="POST">
            <div class="form-group">
                <label class="description" for="phone">Телефон:</label>
                <input id="phone" type="text" name ="phone" class="form-control form-control-sm" value="<?= $phone?>"/>
                <br/>
                <label class="description" for="email">E-mail:</label>
                <input id="email" type="text" name ="email" class="form-control form-control-sm" value="<?= $email?>"/>
                <br/>
                <input type="submit" value="Далее"/>
            </div>
        </form>
        <?php
         echo "<a href='sessionform1.php'>Вернуться</a>";
        ?>
    </div>
</body>
</html>
