<?php
require_once('Reponse.php');

class Question{
	private $id;
	private $libelle;
	private $detail;
	private $dateDebut;
	private $dateFin;
	
	public function __construct($i,$l,$d,$dd,$df){
		$this->id=$i;
		$this->libelle=$l;
		$this->detail=$d;
		$this->dateDebut=$dd;
		$this->dateFin=$df;
	}
	public function __toString(){
		return "$this->id $this->libelle $this->detail $this->dateDebut $this->dateFin";
	}
	public function getId(){
		return $this->id;
	}
	public function getLibelle(){
		return $this->libelle;
	}
	public function getDetail(){
		return $this->detail;
	}
	public function getDateDebut(){
		return $this->dateDebut;
	}
	public function getDateFin(){
		return $this->dateFin;
	}
	public function setId($i){
		$this->id=$i;
	}
	public function setLibelle($l){
		$this->libelle=$l;
	}
	public function setDetail($d){
		$this->detail=$d;
	}
	public function setDateDebut($dd){
		$this->dateDebut=$dd;
	}
	public function setDateFin($df){
		$this->dateFin=$df;
	}
	public function ajouterReponse(Reponse $rep){
		$this->lesReponses[]=$rep;
	}
	public function compterReponsesOui(){
		$i=0;
		foreach($this->lesReponses as $reponse){
			if($reponse->getReponse == "O"){
				$i++;
			}
		}
		return $i;
	}
}
?>