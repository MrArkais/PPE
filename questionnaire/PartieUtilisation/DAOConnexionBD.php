<?php
class DAOConnexionBD{
	private $db;
	
	public function __construct(){
		$this->db = new PDO('mysql:host=localhost;dbname=sondage', 'sondage', 'sondage');
		$this->db->exec('SET NAMES utf8');
	}
	public function getDb(){
		return $this->db;
	}
}
?>