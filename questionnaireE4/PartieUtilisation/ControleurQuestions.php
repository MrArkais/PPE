<?php
require_once('DAOQuestions.php');
require_once('Question.php');

class ControleurQuestions{
	private static $_instance=null;
	private static $lesQuestions = array();
	
	private function __construct(){
		$daoQ=new DAOQuestions();
		self::$lesQuestions=$daoQ->selectionnerTous();
	}
	public static function getInstance() {
		if(is_null(self::$_instance)) {
			self::$_instance = new ControleurQuestions();  
		}
		return self::$_instance;
	}
	public static function getLesQuestions(){
		return self::$lesQuestions;
	}
	public static function questionsEnCours($idSal){
		$daoQ=new DAOQuestions();
		return $daoQ->selectionnerEnCours($idSal);
	}
	public static function ajouterQuestion(Question $q){
		self::$lesQuestions[]=$q;
		$daoQ=new DAOQuestions();
		$daoQ->ajouter($q);
	}
	public static function supprimerQuestion(Question $q){
		self::$lesQuestions[]=$q;
		$daoQ=new DAOQuestions();
		$daoQ->supprimer($q);
	}
}
?>