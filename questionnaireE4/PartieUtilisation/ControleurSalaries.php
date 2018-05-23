<?php
require_once('DAOSalaries.php');
require_once('Salarie.php');

class ControleurSalaries{
	private static $_instance=null;
	private static $lesSalaries;
	
	private function __construct(){
		$daoS=new DAOSalaries();
		self::$lesSalaries=$daoS->selectionnerTous();
	}
	public static function getInstance() {
		if(is_null(self::$_instance)) {
			self::$_instance = new ControleurSalaries();
		}
		return self::$_instance;
	}
	public static function getLesSalaries(){
		return self::$lesSalaries;
	}
	public static function recupererIdSalarie($login,$mdp){
		$daoS=new DAOSalaries();
		return $daoS->recupererIdSalarie($login,$mdp);
	}
	
	public static function recupererTypeUser($login,$mdp){
		$daoS=new DAOSalaries();
		return $daoS->recupererTypeUser($login,$mdp);
	}
	public static function salariesSelonEntreprisee($id){
		$daoSalaries=new DAOSalaries();
		return $daoSalaries->selectionnerSelonEntreprise($id);
	}
	public static function ajouterSalarie(Salarie $sal){
		self::$lesSalaries[]=$sal;
		$daoS=new DAOSalaries();
		$daoS->ajouter($sal);
	}
	public static function supprimerSalarie($index){
		$daoS=new DAOSalaries();
		$daoS->supprimer(self::$lesSalaries[$index]);
		unset(self::$lesSalaries[$index]);
	}
}
?>