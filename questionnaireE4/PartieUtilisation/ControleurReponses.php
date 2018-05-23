<?php
require_once('DAOReponses.php');
require_once('Reponse.php');

class ControleurReponses{
	private static $_instance=null;
	private static $lesReponses = array();
	
	private function __construct(){
	}
	public static function getInstance() {
		if(is_null(self::$_instance)) {
			self::$_instance = new ControleurReponses();  
		}
		return self::$_instance;
	}
	public static function getLesReponses(){
		return self::$lesReponses;
	}
	
	public static function reponse(){
		$daoR = new DAOReponses();
		return $daoR -> selectionnerTous();
	}
	public static function ajouterReponse(Reponse $r){
		self::$lesReponses[]=$r;
		$daoR=new DAOReponses();
		$daoR->ajouter($r);
	}
	public static function reponsesSelonQuestion($idQ){
		$daoR=new DAOReponses();
		return $daoR->selectionnerSelonQuestion($idQ);
	}
	public static function supprimerReponse(Reponse $r){
		$daoR=new DAOReponses();
		$daoR->supprimer($r);
		unset(self::$lesReponses[$index]);
	}
	
	public static function supprimertout() {
		$daoR= new DAOReponses();
		$daoR->supprimerTOUT();
	}

	public static function recupLib(){
		$daoR = new DAOReponses();
		$daoR->recupLibelle();
		return $daoR->recupLibelle();
	}
}
?>