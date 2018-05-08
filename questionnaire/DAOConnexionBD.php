<?php
class DAOConnexionBD{
	private $db;
	
	public function __construct(){
		$this->db = new PDO('mysql:host=mysql-portfolioquentinjeannot.alwaysdata.net;dbname=portfolioquentinjeannot_1', '140646', 'sondage');
		$this->db->exec('SET NAMES utf8');
	}
	public function getDb(){
		return $this->db;
	}
}
?>