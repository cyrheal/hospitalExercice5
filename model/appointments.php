<?php

class appointments {

    public $id = 0;
    public $dateHour = '0000-00-00 00:00:00';
    public $idPatients = 0;
    private $db;

    public function __construct() {
        //protection contre l'erreur
        //si il n'y a pas d'erreur
        try {
            $this->db = new PDO('mysql:host=hospital;dbname=hospitalE2N;charset=utf8', 'cyril', '');
            //si il y a une erreur
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    /**
     * la méthode sert a créer un nouveau rdv (5)
     * @return array
     */
    public function getAddAppointments() {
        // On insert les données du patient à l'aide de la requête INSERT INTO et le nom des champs de la table
        $query = 'INSERT INTO `appointments` (`dateHour`,`idPatients`) VALUES (:dateHour, :idPatients)';
        $queryResult = $this->db->prepare($query);
        $queryResult->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
        $queryResult->bindValue(':idPatients', $this->idPatients, PDO::PARAM_INT);
        return $queryResult->execute();
    }
    public function checkFreeAppointment(){
        $result = FALSE;
//        verifie que le rendez vous n est pas pris
        $query = 'SELECT COUNT(*) AS `takenAppointment` FROM `appointments` WHERE `dateHour`=:dateHour AND `idPatients`=:idPatients';
        $freeAppointment = $this->db->prepare($query);
        $freeAppointment->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
        $freeAppointment->bindValue(':idPatients', $this->idPatients, PDO::PARAM_INT);
        if ($freeAppointment->execute()){
            $result = $freeAppointment->fetch(PDO::FETCH_OBJ);
        }
        return $result;
    }

    /**
 * affiche la liste des rendez vous(6)
 * @return type
 */
    public function getAppointmentsList() {
        // On met notre requète dans la variable $query qui selectionne tous les champs de la table appointments et patients en effectuant une jointure
        // sur l'id et l'idpatient.
        $query = 'SELECT DATE_FORMAT(`appointments`.`dateHour`, "%d/%m/%Y") AS `date`,
                        DATE_FORMAT(`appointments`.`dateHour`, "%H:%i") AS `hour`,
                        `appointments`.`id`,
                        `patients`.`lastname`,
                        `patients`.`firstname`
                    FROM `appointments`
                    LEFT JOIN `patients`
                    ON `appointments`.`idPatients` = `patients`.`id`
                    ORDER BY `patients`.`lastname`';
        // On crée un objet $getAppointmentsById qui prépare la requête avec comme paramètre $query
        $result = $this->db->query($query);
        // On crée un objet $resultList qui est un tableau.
        // La fonction fetchAll permet d'afficher toutes les données de la requète dans un tableau d'objet via le paramètre (PDO::FETCH_OBJ)
        $resultList = $result->fetchAll(PDO::FETCH_OBJ);
        return $resultList;
    }
}

?>
