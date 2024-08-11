<?php

require_once "./models/Model.php";
require_once "./models/ProcessusModel.php";

class ProcessusController
{
    private $model;
    private $processusModel;

    public function __construct(){
        $this->model = new Model();
        $this->processusModel = new ProcessusModel();
    }


    public function add_processus($id){
        ob_start();
        $all_users = $this->model->getAllUtilisateurs($id);
        $fields_form_processus = $this->processusModel->getAllProcessusFormFromDB();
        $processus_list = $this->processusModel->getAllProcessus();
        require_once "./views/processus/add_processus.view.php";
        $page_content = ob_get_clean();
        unset($_SESSION['alert']);
        require_once "./views/common/template.php";
    }


    public function add_new_processus($id, $libelle_processus){
        ob_start();
        $all_users = $this->model->getAllUtilisateurs($id);
        $fields_form_processus = $this->processusModel->getAllProcessusFormFromDB();
        $fields_form_processus_add = $this->processusModel->createNewProcessus($libelle_processus);
        $processus_list = $this->processusModel->getAllProcessus();
        $_SESSION['alert-libelle'] = [
            "class" => "alert-success",
            "message" => "Votre libelle à bien été ajouté"
        ];
        require_once "./views/processus/add_processus.view.php";
        $page_content = ob_get_clean();
        require_once "./views/common/template.php";
        header('Location:http://localhost/MRA_Pilotage/add_form_processus');
    }


    public function update_processus($id, $id_processus, $libelle_processus){
        ob_start();
        $all_users = $this->model->getAllUtilisateurs($id);
        $fields_form_processus = $this->processusModel->getAllProcessusFormFromDB();
        $fields_form_processus_update = $this->processusModel->updateProcessus($id_processus, $libelle_processus);
        $processus_list = $this->processusModel->getAllProcessus();
        $_SESSION['alert-libelle'] = [
            "class" => "alert-warning",
            "message" => "Votre libelle à bien été modifié"
        ];
        require_once "./views/processus/add_processus.view.php";
        $page_content = ob_get_clean();
        require_once "./views/common/template.php";
        header('Location:http://localhost/MRA_Pilotage/add_form_processus');
    }


    public function get_processus_by_id($id, $id_processus, $libelle_processus){
        ob_start();
        $all_users = $this->model->getAllUtilisateurs($id);
        $fields_form_processus = $this->processusModel->getAllProcessusFormFromDB();
        $processus_to_update = $this->processusModel->getProcessusById($id_processus);
        $fields_form_processus_update = $this->processusModel->updateProcessus($id_processus, $libelle_processus);
        $processus_list = $this->processusModel->getAllProcessus();
        require_once "./views/processus/add_processus.view.php";
        $page_content = ob_get_clean();
        require_once "./views/common/template.php";
        header('Location:http://localhost/MRA_Pilotage/add_form_processus');
    }


    public function delete_processus($id,$idProcessus){
        ob_start();
        $all_users = $this->model->getAllUtilisateurs($id);
        $fields_form_processus = $this->processusModel->getAllProcessusFormFromDB();
        $fields_form_processus_delete= $this->processusModel->deleteProcessus($idProcessus);
        $processus_list = $this->processusModel->getAllProcessus();
        $_SESSION['alert-libelle'] = [
            "class" => "alert-danger",
            "message" => "Votre libelle à bien été supprimée"
        ];
        require_once "./views/processus/add_processus.view.php";
        $page_content = ob_get_clean();
        require_once "./views/common/template.php";
        header('Location:http://localhost/MRA_Pilotage/add_form_processus');
    }

}