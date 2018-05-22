<?php
require_once("DAOConnexionBD.php");
require_once("Question.php");
class DAOQuestions{
	private $db;
	
	public function __construct(){
		$connexion=new DAOConnexionBD();
		$this->db=$connexion->getDb();
	}
	public function ajouter(Question $q){
		
		$requete = $this->db->prepare("Insert into question values (null, :lib, :detail, :dateD, :dateF)");
		$requete->bindValue(':lib', $q->getLibelle());
		$requete->bindValue(':detail', $q->getDetail());
		$requete->bindValue(':dateD', $q->getDateDebut());
		$requete->bindValue(':dateF', $q->getDateFin());
		$requete->execute();
	}
	public function supprimer(Question $q){
		$requete = $this->db->prepare("Delete from question where id=:id");
		$requete->bindValue(':id', $q->getId());
		$requete->execute();
	}
	public function selectionnerTous(){
		$resultat = $this->db->query("Select id, libelle, detail, dateDebut, dateFin from question");
		while($ligne=$resultat->fetch()){
			$donnees[]=new Question($ligne['id'], $ligne['libelle'], $ligne['detail'], $ligne['dateDebut'], $ligne['dateFin']);
		}
		return $donnees;
	}
	public function selectionnerEnCours($idSal){
		$donnees=null;
		$resultat = $this->db->query("Select id, libelle, detail, dateDebut, dateFin from question where dateDebut<=Current_date() and dateFin>=Current_date() and id not in(select idQuestion from reponse where idSalarie=$idSal)");
		while($ligne=$resultat->fetch()){
			$donnees[]=new Question($ligne['id'], $ligne['libelle'], $ligne['detail'], $ligne['dateDebut'], $ligne['dateFin']);
		}
		return $donnees;
	}
}
?>