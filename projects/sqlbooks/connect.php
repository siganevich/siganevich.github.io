<?php
class connect
{
	private $link;

	public function __construct()
	{
		$this->link = mysqli_connect("localhost", "root", "root", "books");//$link - описатель подключения, подключение к базе phpMyAdmin
		$this->link->query("SET NAMES UTF8");	// для русских букв

		if($this->link == false)
		{
			echo "Error conect MySql
			(".mysqli_errno_connect()."): ".mysqli_error_connect()."<br />";
			exit();
		}
	}

	public function __getLink()
	{
		return $this->link;
	}

	public function __destruct()
	{
		mysqli_close($this->link);
	}
}
