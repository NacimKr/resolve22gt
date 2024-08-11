<?php

require_once "./models/Model.php";
require_once "./models/DepartementModel.php";

class DepartementController
{
    private $model;
    private $departementModel;

    public function __construct(){
        $this->model = new Model();
        $this->departementModel = new DepartementModel();
    }

    public function add_departement($id){
        ob_start();
        $all_users = $this->model->getAllUtilisateurs($id);
        $fields_form_departement = $this->departementModel->getAllDepartementFormFromDB();
        $departement_list = $this->departementModel->getDepartements($id);
        require_once "./views/departement/add_departement.view.php";
        $page_content = ob_get_clean();
        unset($_SESSION['alert']);
        unset($_SESSION['alert-libelle']);
        require_once "./views/common/template.php";
    }

    public function add_new_departement($id, $libelle, $numero_departement){
        ob_start();
        $all_users = $this->model->getAllUtilisateurs($id);
        $fields_form_departement = $this->departementModel->getAllDepartementFormFromDB();
        $fields_form_departement_add = $this->departementModel->createNewDepartement($libelle, $numero_departement);
        $departement_list = $this->departementModel->getDepartements($id);
        $_SESSION['alert-libelle'] = [
            "class" => "alert-success",
            "message" => "Votre libelle à bien été ajouté"
        ];
        require_once "./views/departement/add_departement.view.php";
        $page_content = ob_get_clean();
        unset($_SESSION['alert']);
        unset($_SESSION['alert-libelle']);
        require_once "./views/common/template.php";
        header('Location:http://localhost/MRA_Pilotage/add_form_departement');
    }


    public function update_departement($id, $id_departement, $libelle_departement, $numero_departement){
        ob_start();
        $all_users = $this->model->getAllUtilisateurs($id);
        $fields_form_departement = $this->departementModel->getAllDepartementFormFromDB();
        $fields_form_departement_update = $this->departementModel->updateDepartement($id_departement, $libelle_departement, $numero_departement);
        $departement_list = $this->departementModel->getDepartements($id);
        $_SESSION['alert-libelle'] = [
            "class" => "alert-warning",
            "message" => "Votre libelle à bien été modifié"
        ];
        require_once "./views/departement/add_departement.view.php";
        $page_content = ob_get_clean();
        unset($_SESSION['alert']);
        unset($_SESSION['alert-libelle']);
        require_once "./views/common/template.php";
        header('Location:http://localhost/MRA_Pilotage/add_form_departement');
    }


    public function get_departement_by_id($id, $id_departement, $libelle_departement, $numero_departement){
        ob_start();
        $all_users = $this->model->getAllUtilisateurs($id);
        $fields_form_departement = $this->departementModel->getAllDepartementFormFromDB();
        $departement_to_update = $this->departementModel->getDepartementsById($id_departement);
        $fields_form_departement_update = $this->departementModel->updateDepartement($id_departement, $libelle_departement, $numero_departement);
        $departement_list = $this->departementModel->getDepartements($id);
        require_once "./views/departement/add_departement.view.php";
        $page_content = ob_get_clean();
        unset($_SESSION['alert']);
        unset($_SESSION['alert-libelle']);
        require_once "./views/common/template.php";
        header('Location:http://localhost/MRA_Pilotage/add_form_departement');
    }


    public function delete_departement($id,$idDpt){
        ob_start();
        $all_users = $this->model->getAllUtilisateurs($id);
        $fields_form_departement = $this->departementModel->getAllDepartementFormFromDB();
        $departement_list_delete = $this->departementModel->deleteDepartement($idDpt);
        $departement_list = $this->departementModel->getDepartements($id);
        $_SESSION['alert-libelle'] = [
            "class" => "alert-danger",
            "message" => "Votre libelle à bien été supprimée"
        ];
        require_once "./views/departement/add_departement.view.php";
        $page_content = ob_get_clean();
        unset($_SESSION['alert']);
        unset($_SESSION['alert-libelle']);
        require_once "./views/common/template.php";
        header('Location:http://localhost/MRA_Pilotage/add_form_departement');
    }
}