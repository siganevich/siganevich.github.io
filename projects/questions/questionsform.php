<?php
	$email =(isset($_POST['email']))?$_POST['email']:"";
	$textquestion =(isset($_POST['text-question']))?$_POST['text-question']:"";

    if ($email != "" && $textquestion != "")
    {
    	//здесь запись в файл
    	$F = fopen("questions.txt", "a");
        if ($F === false)
            exit();
        $today = date("F j, Y, g:i a");

        fwrite($F, "$email$");
        fwrite($F, "$textquestion$");
        fwrite($F, "$today$");
         
        fclose($F);
    }
      
	header("Location: questions.php");
?>