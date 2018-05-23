<?php
require_once('Salarie.php');

class Entreprise{
	private $id;
	private $nomEntreprise;
	
	public function __construct($i,$n){
		$this->id=$i;
		$this->nomEntreprise=$n;
	}
	public function __toString(){
		return "$this->id $this->nomEntreprise";
	}
	public function getId(){
		return $this->id;
	}
	public function getNomEntreprise(){
		return $this->nomEntreprise;
	}
	public function setId($i){
		$this->id=$i;
	}
	public function setNomEntreprise($n){
		$this->nomEntreprise=$n;
	}
}
?>