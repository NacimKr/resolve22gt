<?php

require_once "models/MainModel.php";
class PoleServiceModel extends MainModel
{
    public function getAllPoleServiceFormFromDB(){
        $req = $this->getBDD()->prepare("DESCRIBE `pole_service`");
        $req->execute();
        $pole_service_form = $req->fetchAll(PDO::FETCH_ASSOC);
        return $pole_service_form;
    }

    public function getAllPoleServiceFromDB(){
        $req = $this->getBDD()->prepare("SELECT * FROM `pole_service`");
        $req->execute();
        $pole_service_datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $pole_service_datas;
    }


    public function getPoleServiceById($id_pole_service){
        $req = "SELECT * FROM `pole_service` WHERE id_service=$id_pole_service";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->execute();
        $pole_service_datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $pole_service_datas;
    }

    public function createNewPoleService($libelle_service){
        $req = "INSERT INTO `pole_service`(`libelle_service`) VALUES (:libelle_service);";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->bindValue(':libelle_service', $libelle_service, PDO::PARAM_STR);
        $stmt->execute();
        $pole_service_datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $pole_service_datas;
    }

    public function updatePoleService($id_pole_service, $libelle_pole_service){
        $req = "UPDATE `pole_service` SET `libelle_service`=:libelle_service WHERE id_service = :id_service;";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->bindValue(':id_service', $id_pole_service, PDO::PARAM_INT);
        $stmt->bindValue(':libelle_service', $libelle_pole_service, PDO::PARAM_STR);
        $stmt->execute();
        $pole_service_datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $pole_service_datas;
    }



    public function deletePoleService($id){
        $req = "DELETE FROM `pole_service` where id_service = :id;";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $pole_service_datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $pole_service_datas;
    }
}