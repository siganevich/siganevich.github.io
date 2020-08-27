<?php
    session_start();                // возобновляем сессию
	session_destroy();
	header("Location: sessionform1.php");