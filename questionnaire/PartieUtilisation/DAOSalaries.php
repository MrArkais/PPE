<?php
require_once("DAOConnexionBD.php");
require_once("Salarie.php");
class DAOSalaries{
	private $db;
	
	public function __construct(){
		$connexion=new DAOConnexionBD();
		$this->db=$connexion->getDb();
	}
	public function ajouter(Salarie $sal){
		// $requete = $this->db->prepare("Insert into salarie values (null, :prenom, :nom, :login, :mdp, :idEntreprise)");
		$requete->bindValue(':prenom', $sal->getPrenom());
		$requete->bindValue(':nom', $sal->getNom());
		$requete->bindValue(':login', $sal->getLogin());
		$requete->bindValue(':mdp', $sal->getMdp());
		$requete->bindValue(':idEntreprise', $sal->getIdEntreprise());
		$requete->execute();
	}
	public function supprimer(Salarie $sal){
		$requete = $this->db->prepare("Delete from Salarie where id=:id");
		$requete->bindValue(':id', $sal->getId());
		$requete->execute();
	}
	public function selectionnerTous(){
		$resultat = $this->db->query("Select id, prenom, nom, login, mdp, idEntreprise, typeuser from Salarie");
		while($ligne=$resultat->fetch()){
			$donnees[]=new Salarie($ligne['id'], $ligne['prenom'], $ligne['nom'], $ligne['login'], $ligne['mdp'], $ligne['idEntreprise'], $ligne['typeuser']);
		}
		return $donnees;
	}
	public function selectionnerSelonEntreprise($idEntreprise){
		$resultat = $this->db->query("Select id, prenom, nom, login, mdp, idEntreprise from Salarie where idEntreprise=$idEntreprise");
		while($ligne=$resultat->fetch()){
			$donnees[]=new Salarie($ligne['id'], $ligne['prenom'], $ligne['nom'], $ligne['login'], $ligne['mdp'], $ligne['idEntreprise']);
		}
		return $donnees;
	}
	public function recupererIdSalarie($login,$mdp){
		$donnees=-1;
		$requete = "Select id, prenom, nom, login, mdp, idEntreprise, typeuser from Salarie where login='$login' and mdp='$mdp'" ;
		
		
		$resultat = $this->db->query($requete);
		while($ligne=$resultat->fetch()){
			$donnees=new Salarie($ligne['id'], $ligne['prenom'], $ligne['nom'], $ligne['login'], $ligne['mdp'], $ligne['idEntreprise'], $ligne['typeuser']);
		}
		return $donnees;
	}
}
?>