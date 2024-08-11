<?php

require_once "MainModel.php";

class ProcessusModel extends MainModel
{
    public function getAllProcessusFormFromDB(){
        $req = "DESCRIBE `processus`;";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->execute();
        $actions_datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $actions_datas;
    }

    public function getAllProcessus(){
        $req = "SELECT * FROM `processus`;";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->execute();
        $processus_datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $processus_datas;
    }


    public function deleteProcessus($id){
        $req = "DELETE FROM `processus` where id_processus=:id;";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $actions_datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $actions_datas;
    }



    public function getProcessusById($id_processus){
        $req = "SELECT * FROM `processus` WHERE id_processus=$id_processus";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->execute();
        $processus_datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $processus_datas;
    }

    public function createNewProcessus($libelle_processus){
        $req = "INSERT INTO `processus` (`libelle_processus`) VALUES (:libelle);";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->bindValue(':libelle', $libelle_processus, PDO::PARAM_STR);
        $stmt->execute();
        $actions_datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $actions_datas;
    }

    public function updateProcessus($id_processus, $libelle_processus){
        $req = "UPDATE `processus` SET `libelle_processus`=:libelle_processus WHERE id_processus=:id_processus;";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->bindValue(':id_processus', $id_processus, PDO::PARAM_INT);
        $stmt->bindValue(':libelle_processus', $libelle_processus, PDO::PARAM_STR);
        $stmt->execute();
        $actions_datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $actions_datas;
    }

}