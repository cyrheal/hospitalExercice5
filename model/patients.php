<?php

class patients {

    public $id = 0;
    public $lastName = '';
    public $firstName = '';
    public $birthDate = '00/00/0000';
    public $phone = '0000000000';
    public $mail = '';
    private $db;

    public function __construct() {
        try {
            $this->db = new PDO('mysql:host=hospital;dbname=hospitalE2N;charset=utf8', 'cyril', '');
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    /**
     * methode permettant d'insérer des données dans la table patients.
     * @return array
     */
    //ajoute un patient (1)
    public function addPatients() {
      $query = 'INSERT INTO `patients`(`lastname`, `firstname`, `birthdate`, `phone`, `mail`) VALUES( :lastname, :firstname, :birthdate, :phone, :mail)';
        $queryResult = $this->db->prepare($query);
        $queryResult->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $queryResult->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $queryResult->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $queryResult->bindValue(':phone', $this->phone, PDO::PARAM_STR);
        $queryResult->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        return $queryResult->execute();
    }

//        méthode pour que l'utilisateur ne voit pas si il y a une erreur dans la requête
//        public function getPatientsList() {
//        $result = array();
//        $query = 'SELECT `id`,`lastname`,`firstname`,DATE_FORMAT(`birthdate`,\'%d/%m/%Y\') AS `birthdate`,`phone`,`mail` FROM `patients` ORDER BY `lastname` ASC';
//        $Resultquery = $this->db->query($query);
//        if (is_object($Resultquery)) {
//            $result = $Resultquery->fetchAll(PDO::FETCH_OBJ);
//        }
//        return $result;
//    }
    //affiche le nom et le prénom (2)
    public function getPatientsList() {
        //faut renomer birthDate avec le AS car le birthDate et entre parenthèse
        $query = 'SELECT `id`, `lastname`, `firstname`, DATE_FORMAT(`birthdate`, "%d/%m/%Y") AS `birthdate`, `phone`, `mail` FROM `patients` ORDER BY `lastname`';
        //permet d executer une requete sql this= $db 
        $queryResult = $this->db->query($query);
        //un tableau d'objets fecth(recherche) obj
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }

    //affiche le profil du patient (3)
    public function getProfilPatient() {
        $return = FALSE;
        $isOk = FALSE;
        $query = 'SELECT `id`, `lastname`, `firstname`, DATE_FORMAT(`birthdate`, "%d/%m/%Y") AS `birthdate`, `phone`, `mail` FROM `patients` WHERE `id` = :id';
        $queryResult = $this->db->prepare($query);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
//si la requete c'est bien executé alors on rempli $returnArray avec un objet         
        if ($queryResult->execute()) {
            $return = $queryResult->fetch(PDO::FETCH_OBJ);
        }
//si $return est un objet alors on hydrate       
        if (is_object($return)) {
            $this->lastname = $return->lastname;
            $this->firstname = $return->firstname;
            $this->birthdate = $return->birthdate;
            $this->phone = $return->phone;
            $this->id = $return->id;
            $this->mail = $return->mail;
            $isOk = TRUE;
        }
        return $isOk;
    }

    //modifie le profil patient (4)
    public function updatePatient() {
        $query = 'UPDATE `patients` SET `lastname`=:lastname, `firstname`=:firstname, `birthdate`=:birthdate, `phone`=:phone, `mail`=:mail WHERE `id`= :id';
        $queryResult = $this->db->prepare($query);
        $queryResult->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $queryResult->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $queryResult->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $queryResult->bindValue(':phone', $this->phone, PDO::PARAM_STR);
        $queryResult->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryResult->execute();
    }

}
