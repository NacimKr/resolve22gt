<?php

require_once "models/MainModel.php";

class EtatActionModel extends MainModel
{
    public function getAllEtatActionFormFromDB(){
        $req = $this->getBDD()->prepare("DESCRIBE `etat_action`");
        $req->execute();
        $etat_action_form = $req->fetchAll(PDO::FETCH_ASSOC);
        return $etat_action_form;
    }

    public function getAllEtatAction(){
        $req = "SELECT * FROM `etat_action`;";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->execute();
        $etat_action_datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $etat_action_datas;
    }

    public function getEtatActionById($id_etat_action){
        $req = "SELECT * FROM `etat_action` WHERE id_etat=$id_etat_action;";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->execute();
        $departement_datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $departement_datas;
    }

    public function createNewEtatAction($libelle_etat){
        $req = "INSERT INTO `etat_action`(`libelle_etat`) VALUES (:libelle_etat);";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->bindValue(':libelle_etat', $libelle_etat, PDO::PARAM_STR);
        $stmt->execute();
        $actions_datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $actions_datas;
    }

    public function updateEtatAction($id_etat, $libelle_etat){
        $req = "UPDATE `etat_action` SET `libelle_etat`=:libelle_etat WHERE id_etat = :id_etat;";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->bindValue(':id_etat', $id_etat, PDO::PARAM_INT);
        $stmt->bindValue(':libelle_etat', $libelle_etat, PDO::PARAM_STR);
        $stmt->execute();
        $actions_datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $actions_datas;
    }


    public function deleteEtatAction($id){
        $req = "DELETE FROM `etat_action` where id_etat = :id;";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $etat_action_datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $etat_action_datas;
    }

}