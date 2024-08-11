<?php

require_once "MainModel.php";

class ActionModel extends MainModel
{
    public function getAllActionFormFromDB(){
        $req = $this->getBDD()->prepare("DESCRIBE `action`");
        $req->execute();
        $action_form = $req->fetchAll(PDO::FETCH_ASSOC);
        return $action_form;
    }

    public function getActionById($id){
        $req = $this->getBDD()->prepare("
            SELECT `id_action`, `date_inscription`,`service_pole_emetteur_action`, 
            `echelon_origin_action`, `pole_service`,
            `responsable_action`, `origin_action`, 
            `processus`, `thematique_indicateur_associes`, `declinaision_locale`, 
            `descriptif_action`, 
            `echeances`, `constat_analyse_des_causes`, `objectifs`, 
            `date_fin_action`, 
            `date_debut_previsionnelle`, `etat_action`, 
            `commentaire`, `action_active`
            FROM `action` a
            INNER JOIN `departement` d ON a.echelon_origin_action = d.id_departement
            INNER JOIN `processus` p ON a.processus = p.id_processus
            INNER JOIN `pole_service` ps ON a.pole_service = ps.id_service
            INNER JOIN `etat_action` ea ON a.etat_action = ea.id_etat
            INNER JOIN `origine_action` oa ON a.origin_action = oa.id_origin_action
            where a.id_action =".$id
        );
        $req->execute();
        $action_form = $req->fetchAll(PDO::FETCH_ASSOC);
        return $action_form;
    }

    public function createNewAction(
        $date_inscription, $service_pole_emetteur_action, $echelon_origin_action, $pole_service, $responsable_action, $origin_action, $processus,
        $thematique_indicateur_associes, $declinaision_locale, $descriptif_action, $echeances, $constat_analyse_des_causes,
        $objectifs, $date_fin_action, $date_debut_previsionnelle, $etat_action, $commentaire, $action_active
    ){
        $isChecked = isset($declinaision_locale) ? 1 : 0;
        $req = "INSERT INTO `action`(
        `date_inscription`, `service_pole_emetteur_action`, `echelon_origin_action`, `pole_service`, `responsable_action`, `origin_action`, 
        `processus`, `thematique_indicateur_associes`, `declinaision_locale`, `descriptif_action`, 
        `echeances`, `constat_analyse_des_causes`, `objectifs`, `date_fin_action`, 
        `date_debut_previsionnelle`, `etat_action`, `commentaire`, `action_active`
        ) VALUES (
        :date_inscription, :service_pole_emetteur_action, :echelon_origin_action, :pole_service, :responsable_action, :origin_action, :processus, 
        :thematique_indicateur_associes, :declinaision_locale, :descriptif_action, :echeances, :constat_analyse_des_causes, 
        :objectifs, :date_fin_action, :date_debut_previsionnelle, :etat_action, :commentaire, :action_active
        );";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->bindValue(':date_inscription', $date_inscription, PDO::PARAM_STR);
        $stmt->bindValue(':service_pole_emetteur_action', $service_pole_emetteur_action, PDO::PARAM_STR);
        $stmt->bindValue(':echelon_origin_action', $echelon_origin_action, PDO::PARAM_STR);
        $stmt->bindValue(':pole_service', $pole_service, PDO::PARAM_STR);
        $stmt->bindValue(':responsable_action', $responsable_action, PDO::PARAM_STR);
        $stmt->bindValue(':origin_action', $origin_action, PDO::PARAM_STR);
        $stmt->bindValue(':processus', $processus, PDO::PARAM_STR);
        $stmt->bindValue(':thematique_indicateur_associes', $thematique_indicateur_associes, PDO::PARAM_STR);
        $stmt->bindValue(':declinaision_locale', $declinaision_locale, PDO::PARAM_INT);
        $stmt->bindValue(':descriptif_action', $descriptif_action, PDO::PARAM_STR);
        $stmt->bindValue(':echeances', $echeances, PDO::PARAM_STR);
        $stmt->bindValue(':constat_analyse_des_causes', $constat_analyse_des_causes, PDO::PARAM_STR);
        $stmt->bindValue(':objectifs', $objectifs, PDO::PARAM_STR);
        $stmt->bindValue(':date_fin_action', $date_fin_action, PDO::PARAM_STR);
        $stmt->bindValue(':date_debut_previsionnelle', $date_debut_previsionnelle, PDO::PARAM_STR);
        $stmt->bindValue(':etat_action', $etat_action, PDO::PARAM_STR);
        $stmt->bindValue(':commentaire', $commentaire, PDO::PARAM_STR);
        $stmt->bindValue(':action_active', $action_active, PDO::PARAM_INT);
        $stmt->execute();
        $actions_datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $actions_datas;
    }


    public function updateAction(
        $id_action,
        $date_inscription, $service_pole_emetteur_action, $echelon_origin_action, $pole_service, $responsable_action, $origin_action, $processus,
        $thematique_indicateur_associes, $declinaision_locale, $descriptif_action, $echeances, $constat_analyse_des_causes,
        $objectifs, $date_fin_action, $date_debut_previsionnelle, $etat_action, $commentaire, $action_active
    ){
        try {
            // Préparation de la requête SQL
            $req = 'UPDATE `action` SET
        `date_inscription` = :date_inscription,
        `service_pole_emetteur_action` = :service_pole_emetteur_action,
        `echelon_origin_action` = :echelon_origin_action,
        `pole_service` = :pole_service,
        `responsable_action` = :responsable_action,
        `origin_action` = :origin_action,
        `processus` = :processus,
        `thematique_indicateur_associes` = :thematique_indicateur_associes,
        `declinaision_locale` = :declinaision_locale,
        `descriptif_action` = :descriptif_action,
        `echeances` = :echeances,
        `constat_analyse_des_causes` = :constat_analyse_des_causes,
        `objectifs` = :objectifs,
        `date_fin_action` = :date_fin_action,
        `date_debut_previsionnelle` = :date_debut_previsionnelle,
        `etat_action` = :etat_action,
        `commentaire` = :commentaire,
        `action_active` = :action_active
        WHERE `id_action` = :id_action';

            // Préparation et exécution de la requête
            $stmt = $this->getBDD()->prepare($req);

            // Tableaux des valeurs à lier
            $params = [
                ':id_action' => [$id_action, PDO::PARAM_STR],
                ':date_inscription' => [$date_inscription, PDO::PARAM_STR],
                ':service_pole_emetteur_action' => [$service_pole_emetteur_action, PDO::PARAM_STR],
                ':echelon_origin_action' => [$echelon_origin_action, PDO::PARAM_STR],
                ':pole_service' => [$pole_service, PDO::PARAM_STR],
                ':responsable_action' => [$responsable_action, PDO::PARAM_STR],
                ':origin_action' => [$origin_action, PDO::PARAM_STR],
                ':processus' => [$processus, PDO::PARAM_STR],
                ':thematique_indicateur_associes' => [$thematique_indicateur_associes, PDO::PARAM_STR],
                ':declinaision_locale' => [$declinaision_locale, PDO::PARAM_STR],
                ':descriptif_action' => [$descriptif_action, PDO::PARAM_STR],
                ':echeances' => [$echeances, PDO::PARAM_STR],
                ':constat_analyse_des_causes' => [$constat_analyse_des_causes, PDO::PARAM_STR],
                ':objectifs' => [$objectifs, PDO::PARAM_STR],
                ':date_fin_action' => [$date_fin_action, PDO::PARAM_STR],
                ':date_debut_previsionnelle' => [$date_debut_previsionnelle, PDO::PARAM_STR],
                ':etat_action' => [$etat_action, PDO::PARAM_STR],
                ':commentaire' => [$commentaire, PDO::PARAM_STR],
                ':action_active' => [$action_active, PDO::PARAM_STR],
            ];

            // Liaison des paramètres
            foreach ($params as $key => [$value, $type]) {
                $stmt->bindValue($key, $value, $type);
            }

            // Exécution de la requête
            $stmt->execute();

            // Vérification des lignes affectées
            $estModifier = ($stmt->rowCount() > 0);
            $stmt->closeCursor();
            return $estModifier;

        } catch (PDOException $e) {
            // Gestion des erreurs PDO
            echo "Erreur SQL : " . $e->getMessage();
            return false;
        }
    }


    public function deleteAction($id){
        $req = "DELETE FROM `action` where id_action = :id;";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
        $actions_datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $actions_datas;
    }

    public function getDetailAction($id){
        $req = "SELECT * FROM `action` where id_action = :id;";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
        $actions_datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $actions_datas;
    }


    public function edit_column_action($name, $type){
        $req = "ALTER TABLE `action` ADD $name $type(100);";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->execute();
        $actions_datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $actions_datas;
    }

    public function drop_column_action($name){
        $req = "ALTER TABLE `action` DROP  $name;";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->execute();
        $actions_datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $actions_datas;
    }

}