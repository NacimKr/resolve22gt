<?php

require_once "MainModel.php";

class Model extends MainModel{
//    public function getAllActionFormFromDB(){
//        $req = $this->getBDD()->prepare("DESCRIBE `action`");
//        $req->execute();
//        $action_form = $req->fetchAll(PDO::FETCH_ASSOC);
//        return $action_form;
//    }


    public function getAllUtilisateurs($id){
        $req = $this->getBDD()->prepare("SELECT * FROM `utilisateurs` WHERE id=".$id);
        $req->execute();
        $utilisateurs = $req->fetch(PDO::FETCH_ASSOC);
        return $utilisateurs;
    }


    public function getAllUtilisateursByDepartement($idDepartement, $idService){
        $req = $this->getBDD()->prepare("
        SELECT * FROM `utilisateurs` 
        INNER JOIN `departement` ON echelon = $idDepartement AND id_departement = $idDepartement
        INNER JOIN `pole_service` ON service = $idService AND id_service = $idService;
        ");
        $req->execute();
        $utilisateurs = $req->fetch(PDO::FETCH_ASSOC);
        return $utilisateurs;
    }

    public function getActionByIdUser($idUser){
        $req = $this->getBDD()->prepare("SELECT * FROM `action` INNER JOIN `utilisateurs` WHERE utilisateurs = :idUser");
        $req->bindValue(':idUser', $idUser, PDO::PARAM_INT);
        $req->execute();
        $action_form = $req->fetchAll(PDO::FETCH_NUM);
        return $action_form;
    }


    public function getAllActionFromDB(){
        $req = $this->getBDD()->prepare("
            SELECT * FROM `action` a
            INNER JOIN `departement` d ON a.echelon_origin_action = d.id_departement
            INNER JOIN `processus` p ON a.processus = p.id_processus
            INNER JOIN `pole_service` ps ON a.pole_service = ps.id_service
            INNER JOIN `etat_action` ea ON a.etat_action = ea.id_etat
            INNER JOIN `origine_action` oa ON a.origin_action = oa.id_origin_action
            INNER JOIN `utilisateurs` u ON a.responsable_action = u.id
        ");
        $req->execute();
        $action_form = $req->fetchAll(PDO::FETCH_ASSOC);
        return $action_form;
    }


    public function getAllActionFromDBForLecteur(){
        $req = $this->getBDD()->prepare("
            SELECT * FROM `action` a
            INNER JOIN `departement` d ON a.echelon_origin_action = d.id_departement
            INNER JOIN `processus` p ON a.processus = p.id_processus
            INNER JOIN `pole_service` ps ON a.pole_service = ps.id_service
            INNER JOIN `etat_action` ea ON a.etat_action = ea.id_etat
            INNER JOIN `origine_action` oa ON a.origin_action = oa.id_origin_action
            INNER JOIN `utilisateurs` u ON a.responsable_action = u.id
            WHERE action_active = 1;
        ");
        $req->execute();
        $action_form = $req->fetchAll(PDO::FETCH_ASSOC);
        return $action_form;
    }


    public function getAllDepartementFromDB(){
        $req = $this->getBDD()->prepare("SELECT * FROM `departement` ");
        $req->execute();
        $action_form = $req->fetchAll(PDO::FETCH_ASSOC);
        return $action_form;
    }

    public function getAllProcessusFromDB(){
        $req = $this->getBDD()->prepare("SELECT * FROM `processus` ");
        $req->execute();
        $action_form = $req->fetchAll(PDO::FETCH_ASSOC);
        return $action_form;
    }

    public function getAllPoleServiceFromDB(){
        $req = $this->getBDD()->prepare("SELECT * FROM `pole_service` ");
        $req->execute();
        $action_form = $req->fetchAll(PDO::FETCH_ASSOC);
        return $action_form;
    }

    public function getAllOriginActionFromDB(){
        $req = $this->getBDD()->prepare("SELECT * FROM `origine_action` ");
        $req->execute();
        $action_form = $req->fetchAll(PDO::FETCH_ASSOC);
        return $action_form;
    }

    public function getAllEtatActionFromDB(){
        $req = $this->getBDD()->prepare("SELECT * FROM `etat_action` ");
        $req->execute();
        $action_form = $req->fetchAll(PDO::FETCH_ASSOC);
        return $action_form;
    }


//    public function getActionById($id){
//        $req = $this->getBDD()->prepare("SELECT * FROM `action` where id =".$id);
//        $req->execute();
//        $action_form = $req->fetchAll(PDO::FETCH_ASSOC);
//        return $action_form;
//    }


    public function createNewAction2(...$args2){
        return $args2;
    }



//    public function createNewAction(
//        $numero_action, $departement, $processus, $source_action, $situation_analyse, $objectifs_visees,
//        $actions_proposes, $echeances, $etat_avancement, $etat_action, $responsable_action,
//        $mesure_de_efficacite, $efficacite, $date_cloture_action, $a_decliner_localement, $numero_action_origine
//    ){
//        $req = "INSERT INTO `action`(
//        `numero_action`, `departement`, `processus`, `source_action`,
//        `situation_analyse`, `objectifs_visees`,
//        `actions_proposes`, `echeances`, `etat_avancement`, `etat_action`, `responsable_action`,
//        `mesure_de_efficacite`, `efficacite`,
//        `date_cloture_action`, `a_decliner_localement`, `numero_action_origine`
//        ) VALUES (
//        :numero_action, :departement, :processus, :source_action, :situation_analyse,
//        :objectifs_visees,:actions_proposes, :echeances, :etat_avancement, :etat_action,
//        :responsable_action,:mesure_de_efficacite,:efficacite, :date_cloture_action,
//        :a_decliner_localement, :numero_action_origine);";
//        $stmt = $this->getBDD()->prepare($req);
//        $stmt->bindValue(':numero_action', $numero_action, PDO::PARAM_STR);
//        $stmt->bindValue(':departement', $departement, PDO::PARAM_STR);
//        $stmt->bindValue(':processus', $processus, PDO::PARAM_STR);
//        $stmt->bindValue(':source_action', $source_action, PDO::PARAM_STR);
//        $stmt->bindValue(':situation_analyse', $situation_analyse, PDO::PARAM_STR);
//        $stmt->bindValue(':objectifs_visees', $objectifs_visees, PDO::PARAM_STR);
//        $stmt->bindValue(':actions_proposes', $actions_proposes, PDO::PARAM_STR);
//        $stmt->bindValue(':echeances', $echeances, PDO::PARAM_STR);
//        $stmt->bindValue(':etat_avancement', $etat_avancement, PDO::PARAM_STR);
//        $stmt->bindValue(':etat_action', $etat_action, PDO::PARAM_STR);
//        $stmt->bindValue(':responsable_action', $responsable_action, PDO::PARAM_STR);
//        $stmt->bindValue(':mesure_de_efficacite', $mesure_de_efficacite, PDO::PARAM_STR);
//        $stmt->bindValue(':efficacite', $efficacite, PDO::PARAM_STR);
//        $stmt->bindValue(':date_cloture_action', $date_cloture_action, PDO::PARAM_STR);
//        $stmt->bindValue(':a_decliner_localement', $a_decliner_localement, PDO::PARAM_STR);
//        $stmt->bindValue(':numero_action_origine', $numero_action_origine, PDO::PARAM_STR);
//        $stmt->execute();
//        $actions_datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
//        $stmt->closeCursor();
//        return $actions_datas;
//    }

//    public function editMyAction(
//        $id, $numero_action, $departement, $processus, $source_action, $situation_analyse, $objectifs_visees,
//        $actions_proposes, $echeances, $etat_avancement, $etat_action, $responsable_action,
//        $mesure_de_efficacite, $efficacite, $date_cloture_action, $a_decliner_localement, $numero_action_origine
//    ){
//        $req = "UPDATE `action` SET `numero_action`=:numero_action, `departement`=:departement,
//        `processus`=:processus, `source_action`=:source_action, `situation_analyse`=:situation_analyse,
//        `objectifs_visees`=:objectifs_visees, `actions_proposes`=:actions_proposes,
//        `echeances`=:echeances,
//        `etat_avancement`=:etat_avancement, `etat_action`=:etat_action,
//        `responsable_action`=:responsable_action, `mesure_de_efficacite`=:mesure_de_efficacite,
//        `efficacite`=:efficacite,
//        `date_cloture_action`=:date_cloture_action, `a_decliner_localement`=:a_decliner_localement,
//        `numero_action_origine`=:numero_action_origine WHERE id = :id
//        ;";
//        $stmt = $this->getBDD()->prepare($req);
//        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
//        $stmt->bindValue(':numero_action', $numero_action, PDO::PARAM_STR);
//        $stmt->bindValue(':departement', $departement, PDO::PARAM_STR);
//        $stmt->bindValue(':processus', $processus, PDO::PARAM_STR);
//        $stmt->bindValue(':source_action', $source_action, PDO::PARAM_STR);
//        $stmt->bindValue(':situation_analyse', $situation_analyse, PDO::PARAM_STR);
//        $stmt->bindValue(':objectifs_visees', $objectifs_visees, PDO::PARAM_STR);
//        $stmt->bindValue(':actions_proposes', $actions_proposes, PDO::PARAM_STR);
//        $stmt->bindValue(':echeances', $echeances, PDO::PARAM_STR);
//        $stmt->bindValue(':etat_avancement', $etat_avancement, PDO::PARAM_STR);
//        $stmt->bindValue(':etat_action', $etat_action, PDO::PARAM_STR);
//        $stmt->bindValue(':responsable_action', $responsable_action, PDO::PARAM_STR);
//        $stmt->bindValue(':mesure_de_efficacite', $mesure_de_efficacite, PDO::PARAM_STR);
//        $stmt->bindValue(':efficacite', $efficacite, PDO::PARAM_STR);
//        $stmt->bindValue(':date_cloture_action', $date_cloture_action, PDO::PARAM_STR);
//        $stmt->bindValue(':a_decliner_localement', $a_decliner_localement, PDO::PARAM_STR);
//        $stmt->bindValue(':numero_action_origine', $numero_action_origine, PDO::PARAM_STR);
//        $stmt->execute();
//        $actions_datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
//        $stmt->closeCursor();
//        return $actions_datas;
//    }


//    public function editMyAction(
//        $id, $numero_action, $departement, $processus, $source_action, $situation_analyse, $objectifs_visees,
//        $actions_proposes, $echeances, $etat_avancement, $etat_action, $responsable_action,
//        $mesure_de_efficacite, $efficacite, $date_cloture_action, $a_decliner_localement, $numero_action_origine
//    ){
//        $req = "UPDATE `action` SET `numero_action`=:numero_action, `departement`=:departement,
//        `processus`=:processus, `source_action`=:source_action, `situation_analyse`=:situation_analyse,
//        `objectifs_visees`=:objectifs_visees, `actions_proposes`=:actions_proposes,
//        `echeances`=:echeances,
//        `etat_avancement`=:etat_avancement, `etat_action`=:etat_action,
//        `responsable_action`=:responsable_action, `mesure_de_efficacite`=:mesure_de_efficacite,
//        `efficacite`=:efficacite,
//        `date_cloture_action`=:date_cloture_action, `a_decliner_localement`=:a_decliner_localement,
//        `numero_action_origine`=:numero_action_origine WHERE id = :id
//        ;";
//        $stmt = $this->getBDD()->prepare($req);
//        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
//        $stmt->bindValue(':numero_action', $numero_action, PDO::PARAM_STR);
//        $stmt->bindValue(':departement', $departement, PDO::PARAM_STR);
//        $stmt->bindValue(':processus', $processus, PDO::PARAM_STR);
//        $stmt->bindValue(':source_action', $source_action, PDO::PARAM_STR);
//        $stmt->bindValue(':situation_analyse', $situation_analyse, PDO::PARAM_STR);
//        $stmt->bindValue(':objectifs_visees', $objectifs_visees, PDO::PARAM_STR);
//        $stmt->bindValue(':actions_proposes', $actions_proposes, PDO::PARAM_STR);
//        $stmt->bindValue(':echeances', $echeances, PDO::PARAM_STR);
//        $stmt->bindValue(':etat_avancement', $etat_avancement, PDO::PARAM_STR);
//        $stmt->bindValue(':etat_action', $etat_action, PDO::PARAM_STR);
//        $stmt->bindValue(':responsable_action', $responsable_action, PDO::PARAM_STR);
//        $stmt->bindValue(':mesure_de_efficacite', $mesure_de_efficacite, PDO::PARAM_STR);
//        $stmt->bindValue(':efficacite', $efficacite, PDO::PARAM_STR);
//        $stmt->bindValue(':date_cloture_action', $date_cloture_action, PDO::PARAM_STR);
//        $stmt->bindValue(':a_decliner_localement', $a_decliner_localement, PDO::PARAM_STR);
//        $stmt->bindValue(':numero_action_origine', $numero_action_origine, PDO::PARAM_STR);
//        $stmt->execute();
//        $actions_datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
//        $stmt->closeCursor();
//        return $actions_datas;
//    }


    public function getUserById($id){
        $req = $this->getBDD()->prepare("SELECT * FROM `utilisateurs` WHERE id=:id");
        $req->bindValue(':id', $id, PDO::PARAM_STR);
        $req->execute();
        $action_form = $req->fetchAll(PDO::FETCH_ASSOC);
        return $action_form;
    }


//    public function deleteAction($id){
//        $req = "DELETE FROM `action` where id = :id;";
//        $stmt = $this->getBDD()->prepare($req);
//        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
//        $stmt->execute();
//        $actions_datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
//        $stmt->closeCursor();
//        return $actions_datas;
//    }
//
//    public function getDetailAction($id){
//        $req = "SELECT * FROM `action` where id = :id;";
//        $stmt = $this->getBDD()->prepare($req);
//        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
//        $stmt->execute();
//        $actions_datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
//        $stmt->closeCursor();
//        return $actions_datas;
//    }


//    public function edit_column_action($name, $type){
//        $req = "ALTER TABLE `action` ADD $name $type(100);";
//        $stmt = $this->getBDD()->prepare($req);
//        $stmt->execute();
//        $actions_datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
//        $stmt->closeCursor();
//        return $actions_datas;
//    }
//
//    public function drop_column_action($name){
//        $req = "ALTER TABLE `action` DROP  $name;";
//        $stmt = $this->getBDD()->prepare($req);
//        $stmt->execute();
//        $actions_datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
//        $stmt->closeCursor();
//        return $actions_datas;
//    }
}