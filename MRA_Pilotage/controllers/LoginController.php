<?php

require_once "./models/Model.php";
require_once "./models/LoginModel.php";

class LoginController
{
    private $model;
    private $loginModel;

    public function __construct(){
        $this->model = new Model();
        $this->loginModel = new LoginModel();
    }

    public function login_page($identifiant){
        ob_start();
        $all_users = $this->loginModel->login_user($identifiant);
        require_once "./views/login.view.php";
        $page_content = ob_get_clean();
        unset($_SESSION['alert']);
        require_once "./views/common/template.php";
    }

    function toLogin($identifiant, $mot_de_passe){
        var_dump($identifiant);
        var_dump($mot_de_passe);
        require_once "./views/login.view.php";
        $page_content = ob_get_clean();
        unset($_SESSION['alert']);
        require_once "./views/common/template.php";
//        ob_start();
//        $fields_form = $this->loginModel->login_user($identifiant);
//        require_once "./views/login.view.php";
//        $page_content = ob_get_clean();
//        unset($_SESSION['alert']);
//        require_once "./views/common/template.php";
    }
}