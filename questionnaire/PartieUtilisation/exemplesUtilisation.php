<?php
require_once("ControleurSalaries.php");
require_once("ControleurEntreprises.php");
require_once("ControleurQuestions.php");
require_once("ControleurReponses.php");

// affichage de tous les salariés

ControleurSalaries::getInstance();

$tab=ControleurSalaries::getLesSalaries();
for ($i=0;$i<count($tab);$i++){
	echo $tab[$i]->getId();
	echo $tab[$i]->getPrenom();
	echo $tab[$i]->getNom();
	echo "<br>";
}

// affichage des salariés d'un service (numero 1 par ex)

$tab=ControleurSalaries::salariesSelonEntreprise(1);
for ($i=0;$i<count($tab);$i++){
	echo $tab[$i]->getId();
	echo $tab[$i]->getPrenom();
	echo $tab[$i]->getNom();
	echo "<br>";
}

// affichage des services de l'entreprise

ControleurEntreprises::getInstance();

$tab=ControleurEntreprises::getLesEntreprises();
for ($i=0;$i<count($tab);$i++){
	echo $tab[$i]->getId();
	echo $tab[$i]->getNom();
	echo "<br>";
}

// affichage des questions

ControleurQuestions::getInstance();

$tab=ControleurQuestions::getLesQuestions();
for ($i=0;$i<count($tab);$i++){
	echo $tab[$i]->getId();
	echo $tab[$i]->getLibelle();
	echo "<br>";
}

// affichage des reponses d'une question (numero 1 par ex)

ControleurReponses::getInstance();

$tab=ControleurReponses::reponsesSelonQuestion(1);
for ($i=0;$i<count($tab);$i++){
	echo $tab[$i]->getIdSalarie();
	echo $tab[$i]->getReponseON();
	echo "<br>";
}


?>