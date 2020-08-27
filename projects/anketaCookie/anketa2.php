<?php 
$arrData =
[ 
    "lastname" => (isset($_POST['lastname'])?$_POST['lastname']:""),
    "firstname" => (isset($_POST['firstname'])?$_POST['firstname']:""),
    "sex" => (isset($_POST['sex']))?$_POST['sex']:"",
    "day" => (isset($_POST['day'])?$_POST['day']:""),
    "month" => (isset($_POST['month'])?$_POST['month']:""),   
    "year" => (isset($_POST['year'])?$_POST['year']:""),
    "php" => (isset($_POST['php']))?true:false,
    "js" => (isset($_POST['js']))?true:false,
    "sharp" => (isset($_POST['sharp']))?true:false,
    "plus" => (isset($_POST['plus']))?true:false,
    "html" => (isset($_POST['html']))?true:false,
];
 
    $error1 = "";
    $error2 = "";
    $error3 = "";
                                 
    if ($arrData["lastname"] == "")
        $error1 = "Ошибка, фамилия не заполнена!";
    if ($arrData["firstname"] == "")
        $error2 = "Ошибка, имя не заполнено!";
    if ($arrData["sex"] == "")
        $error3 = "Ошибка, пол не выбран!";

    if ($error1 != "" || $error2 != "" || $error3 != "")
    {
        $s = "Location: anketa1.php?";
        foreach ($arrData as $key => $value) 
        {
            if ($value === false)
                continue;
            $s .="$key=".urlencode($value)."&";
        }
        $s .="error1=".urlencode($error1)."&";
        $s .="error2=".urlencode($error2)."&";
        $s .="error3=".urlencode($error3)."&";
        header($s);
        exit();
    }

    $interets = "";
    ($arrData["php"])?$interets.="PHP ":"";
    ($arrData["js"])?$interets.="JavaScript ":"";
    ($arrData["sharp"])?$interets.="C# ":"";
    ($arrData["plus"])?$interets.="C++ ":"";
    ($arrData["html"])?$interets.="HTML ":"";


     $bday = $arrData['day'];
     switch ($arrData['month']) 
     {
         case 'jan': $bday.=".01."; break;
         case 'feb': $bday.=".02."; break;
         case 'mar': $bday.=".03."; break;
         case 'apr': $bday.=".04."; break;
         case 'may': $bday.=".05."; break;
         case 'jun': $bday.=".06."; break;
         case 'jul': $bday.=".07."; break;
         case 'aug': $bday.=".08."; break;
         case 'sept': $bday.=".09."; break;
         case 'oct': $bday.=".10."; break;
         case 'nov': $bday.=".11."; break;
         case 'dec': $bday.=".12."; break;
     }
     $bday.=$arrData['year'];

    $expireTime = time() + 1 * 60;
    foreach ($arrData as $key => $value) 
        setcookie($key, $value, $expireTime);
?>

<!DOCTYPE html>
<html lang="RU">
<head style>
    <meta charset="UTF-8">
    <title>form1</title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style.css" type="text/css"> 

</head>
<body>
     <table class="container-fluid table table-dark" style="width: 1000px">
        <tr>
            <td class="name-field">Фамилия:</td>
            <td class="value-field"><?= $arrData["lastname"] ?></td>
        </tr>
        <tr>
            <td class="name-field">Имя:</td>
            <td class="value-field"><?= $arrData["firstname"] ?></td>
        </tr>
        <tr>
            <td class="name-field">Пол:</td>
            <td class="value-field"><?= $arrData["sex"] ?></td>
        </tr>
        <tr>
            <td class="name-field">Дата рождения:</td>
            <td class="value-field"><?= $bday ?></td>
        </tr>
        <tr>
            <td class="name-field">Интересы:</td>
            <td class="value-field"><?= $interets ?></td>
        </tr>
     </table>
     <?php
        $s = "anketa1.php?";
        foreach ($arrData as $key => $value) 
            $s .="$key=".urlencode($value)."&";
        echo "<br/><a href='$s' style='margin-left: 10%;'>Вернуться к редактированию</a>";
     ?>
</body>
</html>