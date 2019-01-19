<?php
//fin vérification du formulaire
//j instancie de l objet clients; 
//donc $client devient une instance de la classe client
//la méthode magique __construct  est appeler automatiquement grace au mot clé new
$patients= new patients();
//j apelle ma méthode avec $client->getClientList et je la stock dans la varaible $clientList
$patientsList = $patients->getPatientsList();
?>
