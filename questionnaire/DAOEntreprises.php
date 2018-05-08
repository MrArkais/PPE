<?php
require_once("DAOConnexionBD.php");
require_once("Entreprise.php");
class DAOEntreprises{
	private $db;
	
	public function __construct(){
		$connexion=new DAOConnexionBD();
		$this->db=$connexion->getDb();
	}
	public function ajouter(Entreprise $entreprise){
		$requete = $this->db->prepare("Insert into entreprises values (null, :nomEntreprise)");
		$requete->bindValue(':nomEntreprise', $entreprise->getNomEntreprise());
		$requete->execute();
	}
	public function supprimer(Entreprise $entreprise){
		$requete = $this->db->prepare("Delete from entreprises where id=:id");
		$requete->bindValue(':id', $entreprise->getId());
		$requete->execute();
	}
	public function selectionnerTous(){
		$resultat = $this->db->query("Select id, nomEntreprise from entreprises");
		while($ligne=$resultat->fetch()){
			$donnees[]=new Entreprise($ligne['id'], $ligne['nomEntreprise']);
		}
		return $donnees;
	}
}
?>