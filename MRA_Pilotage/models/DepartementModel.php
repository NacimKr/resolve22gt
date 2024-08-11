<?php

require_once "MainModel.php";

class DepartementModel extends MainModel
{
    public function getAllDepartementFormFromDB(){
        $req = "DESCRIBE `departement`;";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->execute();
        $actions_datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $actions_datas;
    }

    public function getDepartements($id){
        $req = "SELECT * FROM `departement`;";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->execute();
        $departement_datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $departement_datas;
    }

    public function getDepartementsById($id_departement){
        $req = "SELECT * FROM `departement` WHERE id_departement=$id_departement";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->execute();
        $departement_datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $departement_datas;
    }

    public function createNewDepartement($libelle_departement, $numero_departement){
        $req = "INSERT INTO `departement`(`libelle_departement`, `numero_departement`) VALUES (:libelle_departement, :numero_departement);";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->bindValue(':libelle_departement', $libelle_departement, PDO::PARAM_STR);
        $stmt->bindValue(':numero_departement', $numero_departement, PDO::PARAM_STR);
        $stmt->execute();
        $actions_datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $actions_datas;
    }

    public function updateDepartement($id_departement, $libelle_departement, $numero_departement){
        $req = "UPDATE `departement` SET `libelle_departement`=:libelle_departement, `numero_departement`=:numero_departement WHERE id_departement = :id_departement;";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->bindValue(':id_departement', $id_departement, PDO::PARAM_STR);
        $stmt->bindValue(':libelle_departement', $libelle_departement, PDO::PARAM_STR);
        $stmt->bindValue(':numero_departement', $numero_departement, PDO::PARAM_STR);
        $stmt->execute();
        $actions_datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $actions_datas;
    }

    public function deleteDepartement($id){
        $req = "DELETE FROM `departement` where id_departement = :id;";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $actions_datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $actions_datas;
    }

}