<?php
class Salarie{
	private $id;
	private $prenom;
	private $nom;
	private $login;
	private $mdp;
	private $idEntreprise;
	private $typeUser;

	
	public function __construct($i,$p,$n,$l,$m, $e, $u){
		$this->id=$i;
		$this->prenom=$p;
		$this->nom=$n;
		$this->login=$l;
		$this->mdp=$m;
		$this->idEntreprise=$e ;
		$this->typeUser=$u ;
	}
	public function __toString(){
		return "$this->id $this->prenom $this->nom $this->login";
	}
	public function getId(){
		return $this->id;
	}
	
	public function getIdEntreprise(){
		return $this->idEntreprise;
	}
	
	public function getPrenom(){
		return $this->prenom;
	}
	public function getNom(){
		return $this->nom;
	}
	public function getLogin(){
		return $this->login;
	}
	public function getMdp(){
		return $this->mdp;
	}
	
	public function getTypeUser(){
		return $this->typeUser;
	}
	public function setId($i){
		$this->id=$i;
	}
	public function setIdEntreprise($i){
		$this->idEntreprise=$i;
	}
	
	public function setPrenom($p){
		$this->prenom=$p;
	}
	public function setNom($n){
		$this->nom=$n;
	}
	public function setLogin($l){
		$this->login=$l;
	}
	public function setMdp($m){
		$this->mdp=$m;
	}
	
	public function setTypeUser($u){
		return $this->typeUser;
	}
	
	
}
?>