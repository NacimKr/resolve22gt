<?php

require_once "./models/Model.php";
require_once "./models/OrigineActionModel.php";

 class OrigineActionController{
     private $model;
     private $origineActionModel;


     public function __construct(){
         $this->model = new Model();
         $this->origineActionModel = new OrigineActionModel();
     }


     public function add_origin_action($id){
         ob_start();
         $all_users = $this->model->getAllUtilisateurs($id);
         $fields_form_origin_action = $this->origineActionModel->getAllOrigineActionFormFromDB();
         $origin_action_list = $this->origineActionModel->getAllOriginAction();
         require_once "./views/origine_action/add_origin_action.view.php";
         $page_content = ob_get_clean();
         unset($_SESSION['alert']);
         require_once "./views/common/template.php";
     }



     public function add_new_origin_action($id, $libelle){
         ob_start();
         $all_users = $this->model->getAllUtilisateurs($id);
         $fields_form_origin_action = $this->origineActionModel->getAllOrigineActionFormFromDB();
         $fields_form_origin_action_add = $this->origineActionModel->createNewOriginAction($libelle);
         $origin_action_list = $this->origineActionModel->getAllOriginAction();
         $_SESSION['alert-libelle'] = [
             "class" => "alert-success",
             "message" => "Votre libelle à bien été ajouté"
         ];
         require_once "./views/origine_action/add_origin_action.view.php";
         $page_content = ob_get_clean();
         require_once "./views/common/template.php";
         header('Location:http://localhost/MRA_Pilotage/add_form_origin_action');
     }


     public function update_origin_action($id, $id_departement, $libelle_departement){
         ob_start();
         $all_users = $this->model->getAllUtilisateurs($id);
         $fields_form_origin_action = $this->origineActionModel->getAllOrigineActionFormFromDB();
         $fields_form_origin_action_update = $this->origineActionModel->updateOriginAction($id_departement, $libelle_departement);
         $origin_action_list = $this->origineActionModel->getAllOriginAction($id);
         $_SESSION['alert-libelle'] = [
             "class" => "alert-warning",
             "message" => "Votre libelle à bien été modifié"
         ];
         require_once "./views/origine_action/add_origin_action.view.php";
         $page_content = ob_get_clean();
         require_once "./views/common/template.php";
         header('Location:http://localhost/MRA_Pilotage/add_form_origin_action');
     }


     public function get_origin_action_by_id($id, $id_departement, $libelle_departement){
         ob_start();
         $all_users = $this->model->getAllUtilisateurs($id);
         $fields_form_origin_action = $this->origineActionModel->getAllOrigineActionFormFromDB();
         $origin_action_to_update = $this->origineActionModel->getOriginActionById($id_departement);
         $fields_form_origin_action_update = $this->origineActionModel->updateOriginAction($id_departement, $libelle_departement);
         $origin_action_list = $this->origineActionModel->getAllOriginAction();
         require_once "./views/origine_action/add_origin_action.view.php";
         $page_content = ob_get_clean();
         unset($_SESSION['alert']);
         require_once "./views/common/template.php";
         header('Location:http://localhost/MRA_Pilotage/add_form_origin_action');
     }




     public function delete_origin_action($id,$idOriginAction){
         ob_start();
         $all_users = $this->model->getAllUtilisateurs($id);
         $fields_form_origin_action = $this->origineActionModel->getAllOrigineActionFormFromDB();
         $origin_action_list_delete = $this->origineActionModel->deleteOriginAction($idOriginAction);
         $origin_action_list = $this->origineActionModel->getAllOriginAction();
         $_SESSION['alert-libelle'] = [
             "class" => "alert-danger",
             "message" => "Votre libelle à bien été supprimée"
         ];
         require_once "./views/origine_action/add_origin_action.view.php";
         $page_content = ob_get_clean();
         require_once "./views/common/template.php";
         header('Location:http://localhost/MRA_Pilotage/add_form_origin_action');
     }
 }