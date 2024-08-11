<?php
session_start();

require_once "./models/Model.php";
require_once "./models/ActionModel.php";

class ActionController
{
    private $model;
    private $actionModel;

    public function __construct(){
        $this->model = new Model();
        $this->actionModel = new ActionModel();
    }

    public function add_action($id, $idDepartement, $idService){
        ob_start();
        $all_users = $this->model->getAllUtilisateurs($id);
        $all_users_by_departement = $this->model->getAllUtilisateursByDepartement($idDepartement, $idService);
        $fields_form = $this->actionModel->getAllActionFormFromDB();
        $departement_list = $this->model->getAllDepartementFromDB();
        $processus_list = $this->model->getAllProcessusFromDB();
        $pole_service_list = $this->model->getAllPoleServiceFromDB();
        $origin_action_list = $this->model->getAllOriginActionFromDB();
        $etat_action_list = $this->model->getAllEtatActionFromDB();
        $user_action = $this->model->getActionByIdUser($id);
        require_once "./views/add_action.view.php";
        $page_content = ob_get_clean();
        unset($_SESSION['alert']);
        require_once "./views/common/template.php";
    }



    public function edit_action($id){
        ob_start();
        $all_users = $this->model->getAllUtilisateurs($id);
        $fields_form = $this->actionModel->getActionById($id);
        $departement_list = $this->model->getAllDepartementFromDB();
        $processus_list = $this->model->getAllProcessusFromDB();
        $pole_service_list = $this->model->getAllPoleServiceFromDB();
        $origin_action_list = $this->model->getAllOriginActionFromDB();
        $etat_action_list = $this->model->getAllEtatActionFromDB();
        require_once "./views/edit_action.view.php";
        $page_content = ob_get_clean();
        require_once "./views/common/template.php";
    }


    public function updateAction($id,$id_action,$date_inscription, $service_pole_emetteur_action, $echelon_origin_action, $pole_service, $responsable_action, $origin_action, $processus,
                                                     $thematique_indicateur_associes, $declinaision_locale, $descriptif_action, $echeances, $constat_analyse_des_causes,
                                                     $objectifs, $date_fin_action, $date_debut_previsionnelle, $etat_action, $commentaire, $action_active) {
        try {
            // On commence la capture du contenu pour le tampon de sortie
            ob_start();

            // Vérifiez d'abord que toutes les données nécessaires existent
            if (!isset($_POST['date_inscription']) || empty($_POST)) {
                throw new Exception('Données manquantes pour la mise à jour.');
            }

            // Appel à la méthode du modèle pour récupérer tous les utilisateurs
            $all_users = $this->model->getAllUtilisateurs($id);
            $departement_list = $this->model->getAllDepartementFromDB();
            $processus_list = $this->model->getAllProcessusFromDB();
            $pole_service_list = $this->model->getAllPoleServiceFromDB();
            $origin_action_list = $this->model->getAllOriginActionFromDB();
            $etat_action_list = $this->model->getAllEtatActionFromDB();

            // Appel à la méthode updateAction du modèle
            $fields_form_update = $this->actionModel->updateAction(
                $id_action,
                $date_inscription, $service_pole_emetteur_action, $echelon_origin_action,
                $pole_service, $responsable_action, $origin_action, $processus,
                $thematique_indicateur_associes, $declinaision_locale, $descriptif_action,
                $echeances, $constat_analyse_des_causes,
                $objectifs, $date_fin_action, $date_debut_previsionnelle,
                $etat_action, $commentaire, $action_active
            );

            $fields_form = $this->actionModel->getActionById($id);

            // Si l'action a été mise à jour, redirigez vers la page d'accueil
            if ($fields_form) {
                // Fin de la capture du tampon de sortie
                ob_end_clean();

                // Redirection après la mise à jour réussie
                header('Location:http://localhost/MRA_Pilotage/home');
                exit(); // Terminer le script pour éviter d'exécuter les lignes suivantes après redirection
            } else {
                // Si la mise à jour échoue, on affiche un message d'erreur
                throw new Exception('La mise à jour a échoué.');
            }

        } catch (Exception $e) {
            // Gestion des erreurs
            ob_end_clean(); // On nettoie le tampon de sortie en cas d'erreur
            echo 'Erreur : ' . $e->getMessage();
            // Vous pouvez aussi rediriger vers une page d'erreur personnalisée
        }

        // Affichage de la vue de modification si nécessaire
        $page_content = ob_get_clean();
        require_once "./views/edit_action.view.php";
        require_once "./views/common/template.php";
    }

    public function detail_action($id){
        ob_start();
        $action_details = $this->actionModel->getDetailAction($id);
        require_once "./views/detail_action.view.php";
        $page_content = ob_get_clean();
        unset($_SESSION['alert']);
        require_once "./views/common/template.php";
    }

    public function save_action($id){
        ob_start();
        $all_users = $this->model->getAllUtilisateurs($id);
        $fields_form = $this->actionModel->getActionById($id);
        require_once "./views/add_action.view.php";
        $page_content = ob_get_clean();
        $_SESSION['alert'] = [
            "class" => "alert-success",
            "message" => "Votre action à bien été enregistrée"
        ];

        $new_action = $this->actionModel->createNewAction(
            $_POST['date_inscription'], $_POST['service_pole_emetteur_action'],
            $_POST['echelon_origin_action'], $_POST['pole_service'],
            $_POST['responsable_action'], $_POST['origin_action'],
            $_POST['processus'], $_POST['thematique_indicateur_associes'],
            $_POST['declinaision_locale'], $_POST['descriptif_action'],
            $_POST['echeances'], $_POST['constat_analyse_des_causes'],
            $_POST['objectifs'], $_POST['date_fin_action'],
            $_POST['date_debut_previsionnelle'], $_POST['etat_action'],
            $_POST['commentaire'], $_POST['action_active']
        );
        header('Location:http://localhost/MRA_Pilotage/home');
        require_once "./views/common/template.php";
        if($new_action){
            $_SESSION['alert'] = [
                "class" => "alert-success",
                "message" => "Votre action à bien été enregistrée"
            ];
        }
    }


    public function delete($id){
        ob_start();
        $all_users = $this->model->getAllUtilisateurs($id);
        $fields_form_delete = $this->actionModel->deleteAction($id);
        $fields_form = $this->actionModel->getActionById($id);
        header('Location:http://localhost/MRA_Pilotage/home');
        require_once "./views/home.view.php";
        $page_content = ob_get_clean();
        $_SESSION['alert'] = [
            "class" => "alert-danger",
            "message" => "Votre actions à bien été supprimée"
        ];
        require_once "./views/common/template.php";
    }


    public function editFormAction($id, $name, $type){
        ob_start();
        $add_column = $this->actionModel->edit_column_action($name, $type);
        $all_users = $this->model->getAllUtilisateurs($id);
        require_once "./views/add_input_form.php";
        $page_content = ob_get_clean();
        unset($_SESSION['alert']);
        require_once "./views/common/template.php";
    }

    public function dropFormAction($id, $name){
        ob_start();
        $add_column = $this->actionModel->drop_column_action($name);
        $all_users = $this->model->getAllUtilisateurs($id);
        require_once "./views/add_input_form.php";
        $page_content = ob_get_clean();
        $_SESSION['alert'] = [
            "class" => "alert-danger",
            "message" => "La colonne ". $name ." à bien été supprimée"
        ];
        require_once "./views/common/template.php";
        header('Location:http://localhost/MRA_Pilotage/home');
    }


}