<?php
require_once("DAOConnexionBD.php");
require_once("Reponse.php");
class DAOReponses{
	private $db;
	
	public function __construct(){
		$connexion=new DAOConnexionBD();
		$this->db=$connexion->getDb();
	}
	public function ajouter(Reponse $r){
		
		$idQuestion = $r->getIdQuestion();
		$idSalarie= $r->getIdSalarie();
		
		$resultat = $this->db->query("Select idQuestion, idSalarie from reponse where idquestion=".$idQuestion);
		
		
		$ligne=$resultat->fetch();
		$DD=$ligne['idQuestion'];
		$Personne=$ligne['idSalarie'];
		
		
		echo "ici mon $DD est toujours le meme ".$DD;
			
		
			if ($DD == $idQuestion && $Personne == $idSalarie) {
				$requete = $this->db->prepare("Update reponse SET reponseON=:rep WHERE idquestion=:idQ AND idSalarie=:idS");
				
				$requete->bindValue(':idS', $r->getIdSalarie());
				$requete->bindValue(':idQ', $r->getIdQuestion());
				$requete->bindValue(':rep', $r->getReponseON());
				
				$requete->execute();
			}
			else {
				
				$requete = $this->db->prepare("Insert into reponse values (:idS, :idQ, :rep)");
				$requete->bindValue(':idS', $r->getIdSalarie());
				$requete->bindValue(':idQ', $r->getIdQuestion());
				$requete->bindValue(':rep', $r->getReponseON());
				$requete->execute();
			}
		
		
	}
	public function supprimer(Reponse $q){
		$requete = $this->db->prepare("Delete from reponse where idSalarie=:idS and idQuestion=:idQ");
		$requete->bindValue(':idS', $q->getIdSalarie());
		$requete->bindValue(':idQ', $q->getIdQuestion());
		$requete->execute();
	}
	
	
	public function supprimerTOUT(){
		$requete = $this->db->prepare("Truncate table reponse");
		$requete->execute();
	}
	
	
	public function selectionnerTous(){
		$resultat = $this->db->query("Select idSalarie, idQuestion, reponseON from Reponse");
		while($ligne=$resultat->fetch()){
			$donnees[]=new Reponse($ligne['idSalarie'], $ligne['idQuestion'], $ligne['reponseON']);
		}
		//print_r($donnees) ;
		return $donnees;
	}
	public function selectionnerSelonQuestion($idQ){
		$resultat = $this->db->query("Select idSalarie, idQuestion, reponseON from Reponse where idQuestion=$idQ");
		while($ligne=$resultat->fetch()){
			$donnees[]=new Reponse($ligne['idSalarie'], $ligne['idQuestion'], $ligne['reponseON']);
		}
		return $donnees;
	}

	public function recupLibelle()
	{
		$requete = $this->db->query("Select q.libelle from Question as q inner join Reponse as r on q.id=r.idQuestion ");
		$requete->execute();
		$resultat = $requete->fetchColumn();
		return $resultat;
	}
}
?>