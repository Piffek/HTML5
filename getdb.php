<?php
use \PDO;
class DBconnect
{
	public $table;
	public $pdo;
	public function __construct()
	{
		try
		{
			$this->pdo = new PDO('mysql:host=172.16.0.6;dbname=patryk_half', 'patryk_half', 'patryk25');
			echo("");
		
		}
		//przechwycamy komunikat o ewentualnym b³êdzie, zapisany w w PDOException
		catch(PDOException $e)
		{
			echo'B³¹d :' . $e->getMessage();
		}
	}
	
	
	public function getWhere()
	{
		$query = $this->pdo->prepare("SELECT * FROM lang WHERE :lang = lang");
		$query->bindParam(':lang', $_GET['name']);
		$query->execute();
		foreach ($query as $lang)
		{
			echo $lang['desc'];
		}
		
	}
}

$connect = new DBconnect();
return $connect->getWhere();




?>