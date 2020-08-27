<?php
require_once("./connect.php");
class sel_books
{
	private $category;
	private $theme;
	private $izd;
	private $connect;
	private $count_res;

	public function __construct($category, $theme, $izd)
	{
		$this->category = $category;
		$this->theme = $theme;
		$this->izd = $izd;
		$this->$count_res = 0;
		$this->connect = new connect();
	}

	public function sel_choise_books()
	{
		$query = "SELECT * FROM books";
		if ($this->category != "all" || $this->theme != "all" || $this->izd != "all")
			$query.=" WHERE";
		if ($this->category != "all")
			$query.=" category='".$this->category."' AND";
		if ($this->theme != "all")
			$query.=" themes='".$this->theme."' AND";
		if ($this->izd != "all")
			$query.=" izd='".$this->izd."'";
		if (substr($query, -3) == "AND")
			$query = substr($query, 0, -4);
		//echo "$query";

		$result = mysqli_query($this->connect->__getLink(), $query);
		if ($result == false)
		{
			echo "Error Query (".mysqli_errno($this->connect->__getLink())."): ".mysqli_error($this->connect->__getLink())."<br />";
			return false;
		}
		$table_res = "";
		$this->$count_res = $result->num_rows;
		for($i=0; $i<$this->$count_res; $i++)
		{			
			$row=$result->fetch_assoc();

			$table_res.="<tr>";
			$table_res.="<td scope='row'>{$row['id']}</td>";
			$table_res.="<td>{$row['name']}</td>";
			$table_res.="<td>{$row['price']}</td>";
			$table_res.="<td>{$row['izd']}</td>";
			$table_res.="<td>{$row['npages']}</td>";
			$table_res.="<td>{$row['format']}</td>";
			$table_res.="<td>{$row['dateizd']}</td>";
			$table_res.="<td>{$row['pressrun']}</td>";
			$table_res.="<td>{$row['themes']}</td>";
			$table_res.="<td>{$row['category']}</td>";
			$table_res.="</tr>";
		}

		$result->free();
		return $table_res;
	}
	public function __getCount()
	{
		return $this->$count_res;
	}
}
