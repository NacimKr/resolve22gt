<?php

require_once "./models/Model.php";
require_once "./models/EtatActionModel.php";

class EtatActionController
{
    private $model;
    private $etatActionModel;

    public function __construct(){
        $this->model = new Model();
        $this->etatActionModel = new EtatActionModel();
    }

    public function add_etat_action($id){
        ob_start();
        $all_users = $this->model->getAllUtilisateurs($id);
        $fields_form_etat_action = $this->etatActionModel->getAllEtatActionFormFromDB();
        $etat_action_list = $this->etatActionModel->getAllEtatAction();
        require_once "./views/etat_action/add_etat_action.view.php";
        $page_content = ob_get_clean();
        unset($_SESSION['alert']);
        require_once "./views/common/template.php";
    }

    public function delete_etat_action($id, $idEtatAction){
        ob_start();
        $all_users = $this->model->getAllUtilisateurs($id);
        $fields_form_etat_action = $this->etatActionModel->getAllEtatActionFormFromDB();
        $etat_action_list_delete = $this->etatActionModel->deleteEtatAction($idEtatAction);
        $etat_action_list = $this->etatActionModel->getAllEtatAction();
        $_SESSION['alert-libelle'] = [
            "class" => "alert-danger",
            "message" => "Votre libelle à bien été supprimée"
        ];
        require_once "./views/etat_action/add_etat_action.view.php";
        $page_content = ob_get_clean();
        require_once "./views/common/template.php";
        header('Location:http://localhost/MRA_Pilotage/add_form_etat_action');
    }


    public function add_new_etat_action($id, $libelle){
        ob_start();
        $all_users = $this->model->getAllUtilisateurs($id);
        $fields_form_etat_action = $this->etatActionModel->getAllEtatActionFormFromDB();
        $fields_form_etat_action_add = $this->etatActionModel->createNewEtatAction($libelle);
        $etat_action_list = $this->etatActionModel->getAllEtatAction();
        $_SESSION['alert-libelle'] = [
            "class" => "alert-success",
            "message" => "Votre libelle à bien été ajouté"
        ];
        require_once "./views/etat_action/add_etat_action.view.php";
        $page_content = ob_get_clean();
        require_once "./views/common/template.php";
        header('Location:http://localhost/MRA_Pilotage/add_form_etat_action');
    }


    public function update_etat_action($id, $id_etat_action, $libelle_etat_action){
        ob_start();
        $all_users = $this->model->getAllUtilisateurs($id);
        $fields_form_etat_action = $this->etatActionModel->getAllEtatActionFormFromDB();
        $fields_form_etat_action_update = $this->etatActionModel->updateEtatAction($id_etat_action, $libelle_etat_action);
        $etat_action_list = $this->etatActionModel->getAllEtatAction($id);
        $_SESSION['alert-libelle'] = [
            "class" => "alert-warning",
            "message" => "Votre libelle à bien été modifié"
        ];
        require_once "./views/etat_action/add_etat_action.view.php";
        $page_content = ob_get_clean();
        require_once "./views/common/template.php";
        header('Location:http://localhost/MRA_Pilotage/add_form_etat_action');
    }


    public function get_etat_action_by_id($id, $id_etat_action){
        ob_start();
        $all_users = $this->model->getAllUtilisateurs($id);
        $fields_form_etat_action = $this->etatActionModel->getAllEtatActionFormFromDB();
        $etat_action_infos_to_update = $this->etatActionModel->getEtatActionById($id_etat_action);
        $fields_form_etat_action_update = $this->etatActionModel->updateEtatAction($id_etat_action, $libelle_etat_action);
        $etat_action_list = $this->etatActionModel->getAllEtatAction();
        require_once "./views/etat_action/add_etat_action.view.php";
        $page_content = ob_get_clean();
        require_once "./views/common/template.php";
        header('Location:http://localhost/MRA_Pilotage/add_form_etat_action');
    }
}