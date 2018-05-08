<?php
require_once('DAOEntreprises.php');
require_once('Entreprise.php');

class ControleurEntreprises{
	private static $_instance=null;
	private static $lesEntreprises = array();
	
	private function __construct(){
		$daoEntreprise=new DAOEntreprises();
		self::$lesEntreprises=$daoEntreprise->selectionnerTous();
	}
	public static function getInstance() {
		if(is_null(self::$_instance)) {
			self::$_instance = new ControleurServices();  
			$daoEntreprise=new DAOEntreprises();
			self::$lesEntreprises=$daoEntreprise->selectionnerTous();
		}
		return self::$_instance;
	}
	public static function getLesEntreprises(){
		return self::$lesEntreprises;
	}
	public static function ajouterEntreprise(Entreprise $entreprise){
		self::$lesEntreprises[]=$entreprise;
		$daoEntreprise=new DAOEntreprises();
		$daoEntreprise->ajouter($entreprise);
	}
	public static function supprimerEntreprise($index){
		$daoEntreprise=new DAOEntreprises();
		$daoEntreprise->supprimer(self::$lesEntreprises[$index]);
		unset(self::$lesEntreprises[$index]);
	}
}
?>