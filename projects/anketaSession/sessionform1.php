<?php
    session_start();                // создаем сессию

    $firstname = (isset($_SESSION["fnm"]))?$_SESSION["fnm"]:"";
    $lastname = (isset($_SESSION["lnm"]))?$_SESSION["lnm"]:"";

?>

<!DOCTYPE html>
<html lang="RU">
<head style>
    <meta charset="UTF-8">
    <title>form1</title>
    <link rel="stylesheet" href="./style.css" type="text/css"> 
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="my-form">
        <form action="sessionform2.php" method="POST">
            <div class="form-group">
                <label class="description" for="firstname">Имя : </label>
                <input id="firstname" type="text" name="firstname" class="form-control form-control-sm" value="<?= $firstname?>"/>
                <br/>
                <label class="description" for="lastname">Фамилия: </label>
                <input id="lastname" type="text" name ="lastname" class="form-control form-control-sm" value="<?= $lastname?>"/>
                <br/>
                <input type="submit" value="Далее"/>
            </div>
        </form>
    </div>
</body>
</html>
