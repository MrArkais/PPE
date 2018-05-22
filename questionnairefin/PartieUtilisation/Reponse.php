<?php
require_once('Salarie.php');

class Reponse{
	private $idSalarie;
	private $idQuestion;
	private $reponseON;
	
	public function __construct($s,$q,$r){
		$this->idSalarie=$s;
		$this->idQuestion=$q;
		$this->reponseON=$r;
	}
	public function __toString(){
		return "$this->idSalarie $this->idQuestion $this->reponseON";
	}
	public function getIdSalarie(){
		return $this->idSalarie;
	}
	public function getIdQuestion(){
		return $this->idQuestion;
	}
	public function getReponseON(){
		return $this->reponseON;
	}
	public function setIdSalarie($is){
		$this->idSalarie=$is;
	}
	public function setIdQuestion($iq){
		$this->idQuestion=$iq;
	}
	public function setReponseON($r){
		$this->reponse=$r;
	}
}
?>