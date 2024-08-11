<?php

require_once "models/MainModel.php";

class OrigineActionModel extends MainModel
{

    public function getAllOrigineActionFormFromDB(){
        $req = $this->getBDD()->prepare("DESCRIBE `origine_action`");
        $req->execute();
        $origine_action_form = $req->fetchAll(PDO::FETCH_ASSOC);
        return $origine_action_form;
    }

    public function getAllOriginAction(){
        $req = $this->getBDD()->prepare("SELECT * FROM `origine_action`");
        $req->execute();
        $list_origine_action = $req->fetchAll(PDO::FETCH_ASSOC);
        return $list_origine_action;
    }


    public function getOriginActionById($id_departement){
        $req = "SELECT * FROM `origine_action` WHERE id_origin_action=$id_departement";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->execute();
        $departement_datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $departement_datas;
    }

    public function createNewOriginAction($libelle_origine_action){
        $req = "INSERT INTO `origine_action`(`libelle_origin_action`) VALUES (:libelle_origin_action);";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->bindValue(':libelle_origin_action', $libelle_origine_action, PDO::PARAM_STR);
        $stmt->execute();
        $actions_datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $actions_datas;
    }

    public function updateOriginAction($id_origine_action, $libelle_origine_action){
        $req = "UPDATE `origine_action` SET `libelle_origin_action`=:libelle WHERE id_origin_action = :id_departement;";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->bindValue(':id_departement', $id_origine_action, PDO::PARAM_INT);
        $stmt->bindValue(':libelle', $libelle_origine_action, PDO::PARAM_STR);
        $stmt->execute();
        $actions_datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $actions_datas;
    }


    public function deleteOriginAction($id){
        $req = "DELETE FROM `origine_action` where id_origin_action = :id;";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $actions_datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $actions_datas;
    }
}