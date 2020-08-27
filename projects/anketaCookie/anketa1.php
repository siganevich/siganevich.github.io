<?php 
   $arrMonth =
    [
    "jan"=>"январь", "feb"=>"февраль", "mar"=>"март", "apr"=>"апрель", "may"=>"май", "jun"=>"июнь", "jul"=>"июль", "aug"=>"август", "sept"=>"сентябрь", "oct"=>"октябрь", "nov"=>"ноябрь", "dec"=>"декабрь"
    ];
    $error1 =(isset($_GET['error1'])?$_GET['error1']:"");
    $error2 =(isset($_GET['error2'])?$_GET['error2']:"");
    $error3 =(isset($_GET['error3'])?$_GET['error3']:"");


 function get_values($globalArr)
    {    
        $arr =
        [ 
            "lastname" => (isset($globalArr['lastname'])?$globalArr['lastname']:""),
            "firstname" => (isset($globalArr['firstname'])?$globalArr['firstname']:""),
            "sex" => (isset($globalArr['sex']))?$globalArr['sex']:"",
            "day" => (isset($globalArr['day'])?$globalArr['day']:""),
            "month" => (isset($globalArr['month'])?$globalArr['month']:""),   
            "year" => (isset($globalArr['year'])?$globalArr['year']:""),
            "php" => (isset($globalArr['php']))?true:false,
            "js" => (isset($globalArr['js']))?true:false,
            "sharp" => (isset($globalArr['sharp']))?true:false,
            "plus" => (isset($globalArr['plus']))?true:false,
            "html" => (isset($globalArr['html']))?true:false,
        ];
        return $arr;
    }

    if ($error1 == "" && $error2 == "" && $error3 == "")
        $arrData = get_values($_COOKIE);
    else
        $arrData = get_values($_GET);
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
        <h1>Анкета</h1>
        <form action="anketa2.php" method="POST">
            <div class="form-group">
                <label class="description" for="lastname">Фамилия : </label>
                <input id="lastname" type="text" name="lastname" class="form-control form-control-sm" value="<?= $arrData['lastname'] ?>"/>
                <span class="error">
                    <?php
                        echo "$error1";
                    ?>
                </span>
            </div>

            <div class="form-group">
                <label class="description" for="firstname">Имя : </label>
                <input id="firstname" type="text" name="firstname" class="form-control form-control-sm" value="<?= $arrData['firstname'] ?>"/>
                <span class="error">
                    <?php
                        echo "$error2";
                    ?>
                </span>
            </div>

            <label class="description">Пол: </label>
            <span class="error">
                    <?php
                        echo "$error3";
                    ?>
            </span>
            <div class="form-check">
                <input id="radio1" class="sex form-check-input" type="radio" name="sex" value="male" <?= ($arrData['sex'] == 'male')?"checked":""?>/>
                <label class="form-check-label" for="radio1">Мужской</label>
            </div>
            <div class="form-check">
                <input id="radio2" class="sex form-check-input" type="radio" name="sex" value="female" <?= ($arrData['sex'] == 'female')?"checked":""?>/>
                <label class="form-check-label" for="radio2">Женский</label>
            </div>
            <br/>

            <label class="description">Дата рождения:</label>
            <div class="form-group">
                <label for="day">День: </label>
                <select id="day" name="day" class="form-control">
                    <?php
                        for ($i = 1; $i < 31; $i++)
                            if ($i == $arrData['day'])
                                echo "<option value='$i' selected>$i</option>";
                            else
                                echo "<option value='$i'>$i</option>";
                    ?>
                </select>
                <label for="month">Месяц: </label>
                <select id="month" name="month" class="form-control">
                    <?php
                        foreach($arrMonth as $k=>$v)
                        {
                            if($k == $arrData['month'])
                                echo "<option value='$k' selected>$v</option>";
                            else echo "<option value = '$k'>$v</option>";
                        }
                    ?>
                </select>
                <label for="year">Год: </label>
                <select id="year" name="year" class="form-control">
                    <?php
                        for ($i = 1950; $i < 2021; $i++)
                            if ($i == $arrData['year'])
                                echo "<option value='$i' selected>$i</option>";
                            else
                                echo "<option value='$i'>$i</option>";
                    ?>
                </select>
            </div>

            <label class="description">Интересы:</label>
            <div class="form-check">
                <input id="php" type ="checkbox" class="form-check-input" name="php" <?= ($arrData['php'] == 1)?"checked":"" ?>/>
                <label class="form-check-label" for="php">PHP</label>
                <br />
                <input id="js" type ="checkbox" class="form-check-input" name="js" <?= ($arrData['js'] == 1)?"checked":"" ?>/>
                <label class="form-check-label" for="js">JavaScript</label>
                <br />
                <input id="sharp" type ="checkbox" class="form-check-input" name="sharp" <?= ($arrData['sharp'] == 1)?"checked":"" ?>/>
                <label class="form-check-label" for="sharp">C#</label>
                <br />
                <input id="plus" type ="checkbox" class="form-check-input" name="plus" <?= ($arrData['plus'] == 1)?"checked":"" ?>/>
                <label class="form-check-label" for="plus">C++</label>
                <br />
                <input id="html" type ="checkbox" class="form-check-input" name="html" <?= ($arrData['html'] == 1)?"checked":"" ?>/>
                <label class="form-check-label" for="html">HTML</label>
                <br />
            </div>
            <input style="margin-left: 100px;" type="submit" value="Отправить"/>
        </form>
    </div>
</body>
</html>