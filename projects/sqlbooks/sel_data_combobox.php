<?php
require_once("./connect.php");
class sel_data_combobox
{
	private $options_category;
	private $options_theme;
	private $options_izd;
	private $connect;

	public function __construct($sel_cat, $sel_them, $sel_izd)
	{
		$this->connect = new connect();
		$this->options_category = "";
		$this->options_theme = "";
		$this->options_izd = "";

		$this->res_category = mysqli_query($this->connect->__getLink(), "SELECT DISTINCT category FROM books"); 
		if ($this->res_category->num_rows > 0)
			while ($row = mysqli_fetch_assoc($this->res_category))
			{
				if ($row['category'] == $sel_cat) 
				   $this->options_category .= "<option value='".$row['category']."' selected='true'>".$row['category']."</option>";
				else
					$this->options_category .= "<option value='".$row['category']."'>".$row['category']."</option>";
			}
		$this->res_category->free();


		$this->res_theme = mysqli_query($this->connect->__getLink(), "SELECT DISTINCT themes FROM books"); 
		if ($this->res_theme->num_rows > 0)
			while ($row = mysqli_fetch_assoc($this->res_theme)) 
			{
				if ($row['themes'] == $sel_them) 
				   $this->options_theme .= "<option value='".$row['themes']."' selected='true'>".$row['themes']."</option>";
				else
				   $this->options_theme .= "<option value='".$row['themes']."'>".$row['themes']."</option>";
			}
		$this->res_theme->free();


		$this->res_izd = mysqli_query($this->connect->__getLink(), "SELECT DISTINCT izd FROM books");
		if ($this->res_izd->num_rows > 0)
			while ($row = mysqli_fetch_assoc($this->res_izd))
			{
				if ($row['izd'] == $sel_izd) 
				   $this->options_izd .= "<option value='".$row['izd']."' selected='true'>".$row['izd']."</option>";
				else
				   $this->options_izd .= "<option value='".$row['izd']."'>".$row['izd']."</option>";
			}
		$this->res_izd->free();
	}

	public function __getCategory()
	{
		return $this->options_category;
	}

	public function __getTheme()
	{
		return $this->options_theme;
	}

	public function __getIzd()
	{
		return $this->options_izd;
	}
}