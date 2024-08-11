<?php

require_once "./models/Model.php";
require_once "./models/PoleServiceModel.php";

class PoleServiceController
{
    private $model;
    private $poleServiceModel;

    public function __construct(){
        $this->model = new Model();
        $this->poleServiceModel = new PoleServiceModel();
    }

    public function add_pole_service($id){
        ob_start();
        $all_users = $this->model->getAllUtilisateurs($id);
        $fields_form_pole_service = $this->poleServiceModel->getAllPoleServiceFormFromDB();
        $list_pole_service = $this->poleServiceModel->getAllPoleServiceFromDB();
        require_once "./views/pole_service/add_pole_service.view.php";
        $page_content = ob_get_clean();
        unset($_SESSION['alert']);
        require_once "./views/common/template.php";
    }


    public function add_new_pole_service($id, $libelle){
        ob_start();
        $all_users = $this->model->getAllUtilisateurs($id);
        $fields_form_pole_service = $this->poleServiceModel->getAllPoleServiceFormFromDB();
        $fields_form_pole_service_add = $this->poleServiceModel->createNewPoleService($libelle);
        $list_pole_service = $this->poleServiceModel->getAllPoleServiceFromDB($id);
        $_SESSION['alert-libelle'] = [
            "class" => "alert-success",
            "message" => "Votre libelle à bien été ajouté"
        ];
        require_once "./views/pole_service/add_pole_service.view.php";
        $page_content = ob_get_clean();
        require_once "./views/common/template.php";
        header('Location:http://localhost/MRA_Pilotage/add_form_pole_service');
    }


    public function update_pole_service($id, $id_departement, $libelle_departement){
        ob_start();
        $all_users = $this->model->getAllUtilisateurs($id);
        $fields_form_pole_service = $this->poleServiceModel->getAllPoleServiceFormFromDB();
        $fields_form_pole_service_update = $this->poleServiceModel->updatePoleService($id_departement, $libelle_departement);
        $list_pole_service = $this->poleServiceModel->getAllPoleServiceFromDB($id);
        require_once "./views/pole_service/add_pole_service.view.php";
        $_SESSION['alert-libelle'] = [
            "class" => "alert-warning",
            "message" => "Votre libelle à bien été modifié"
        ];
        $page_content = ob_get_clean();
        unset($_SESSION['alert']);
        require_once "./views/common/template.php";
        header('Location:http://localhost/MRA_Pilotage/add_form_pole_service');
    }


    public function get_pole_service_by_id($id, $id_departement, $libelle_departement){
        ob_start();
        $all_users = $this->model->getAllUtilisateurs($id);
        $fields_form_pole_service = $this->poleServiceModel->getAllPoleServiceFormFromDB();
        $pole_service_to_update = $this->poleServiceModel->getPoleServiceById($id_departement);
        $fields_form_departement_update = $this->poleServiceModel->updatePoleService($id_departement, $libelle_departement);
        $list_pole_service = $this->poleServiceModel->getAllPoleServiceFromDB();
        require_once "./views/pole_service/add_pole_service.view.php";
        $page_content = ob_get_clean();
        unset($_SESSION['alert']);
        require_once "./views/common/template.php";
        header('Location:http://localhost/MRA_Pilotage/add_form_pole_service');
    }



    public function delete_pole_service($id, $idPoleService){
        ob_start();
        $all_users = $this->model->getAllUtilisateurs($id);
        $fields_form_pole_service = $this->poleServiceModel->getAllPoleServiceFormFromDB();
        $list_pole_service_delete = $this->poleServiceModel->deletePoleService($idPoleService);
        $list_pole_service = $this->poleServiceModel->getAllPoleServiceFromDB();
        $_SESSION['alert-libelle'] = [
            "class" => "alert-danger",
            "message" => "Votre libelle à bien été supprimée"
        ];
        require_once "./views/pole_service/add_pole_service.view.php";
        $page_content = ob_get_clean();
        require_once "./views/common/template.php";
        header('Location:http://localhost/MRA_Pilotage/add_form_pole_service');
    }

}