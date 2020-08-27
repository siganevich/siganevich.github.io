<?php
	$str = "";
		if (file_exists("questions.txt") ) 
		{
	      	$F = fopen("questions.txt", "r");
		    if ($F === false)
		        echo "Error open file<br />";

		    $str = htmlentities(file_get_contents("questions.txt"));
		    //$str .= "";
		    //while(!feof($F))
	        //    $str .= fread($F, 16); //512; 1024
	                
		    fclose($F);
		}
?>
<!DOCTYPE html>
<html lang="RU">
<head style>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <title>form1</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="./style.css" type="text/css"> 
</head>
<body>
	<div id="form-question">
		<form action="questionsform.php" method="POST">
			<div class="form-group">
				<label for="email">Email:</label>
				<input id="email" class="form-control form-control-sm" type="text" name="email"/>
			</div>
			<div class="form-group">
				<label for="text-question">Вопрос:</label>
				<textarea id="text-question" class="form-control" type="text" name="text-question"></textarea>
			</div>
			<button class="btn btn-sm btn-primary">Отправить</button>
		</form>
	</div>
	<div id="questions">
	</div>

	<script>
		$(document).ready
		(
			function() 
			{

				let str = "<?= $str ?>";

	    		if (str != "")
	    		{
	    			let arr_questions = str.split("$");

					let questions_div = document.getElementById("questions");
	    			questions_div.innerText = "";

	    			for (let i = arr_questions.length - 2; i >= 0; i-=3)
	    			{
	    				let new_div = document.createElement("div");

	    				let name_user = document.createElement("h5");
	    				name_user.innerText = arr_questions[i - 2];
	    				new_div.appendChild(name_user);

	    				let message = document.createElement("p");
	    				message.style.fontSize = "15px";
	    				message.style.border = "2px solid #D3D3D3";
	    				message.style.borderRadius = "10px";
	    				message.style.padding = "7px";
	    				message.style.backgroundColor = "#D3D3D3"
	    				message.innerText = arr_questions[i - 1];
	    				new_div.appendChild(message);

	    				let data = document.createElement("p");
	    				data.innerText = arr_questions[i];
	    				data.style.fontSize = "12px";
	    				data.style.fontStyle = "italic";
	    				data.setAttribute("align", "right");
	    				new_div.appendChild(data);

	    				questions_div.appendChild(new_div);
	    			}	    					   				
	    		}
	    		
			}
		);

	</script>
</body>
</html>