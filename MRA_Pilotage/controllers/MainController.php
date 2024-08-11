<?php
session_start();

require_once "./models/Model.php";
require_once "./models/ActionModel.php";


class MainController{

    private $model;
    private $actionModel;

    public function __construct(){
        $this->model = new Model();
        $this->actionModel = new ActionModel();
    }

    public function home($id){
        ob_start();
        $all_users = $this->model->getAllUtilisateurs($id);
        $all_action_for_lecteur = $this->model->getAllActionFromDBForLecteur();
        $departement_list = $this->model->getAllDepartementFromDB();
        $all_action = $this->model->getAllActionFromDB();
        $fields_form = $this->actionModel->getAllActionFormFromDB();
        require_once "./views/home.view.php";
        $page_content = ob_get_clean();
        unset($_SESSION['alert']);
        require_once "./views/common/template.php";
    }

    public function pageInfoUtilisateur($id){
        ob_start();
        $all_users = $this->model->getAllUtilisateurs($id);
        require_once "./views/page_infos.view.php";
        $page_content = ob_get_clean();
        require_once "./views/common/template.php";
    }
}