<?php
error_reporting(0);

if(empty($_GET['page'])){
    $_GET['page'] = "home";
}

require_once "./controllers/MainController.php";
require_once "./controllers/ActionController.php";
require_once "./controllers/DepartementController.php";
require_once "./controllers/ProcessusController.php";
require_once "./controllers/EtatActionController.php";
require_once "./controllers/PoleServiceController.php";
require_once "./controllers/OrigineActionController.php";
require_once "./controllers/LoginController.php";

$mainController = new MainController();
$actionController = new ActionController();
$departementController = new DepartementController();
$processusController = new ProcessusController();
$etatActionController = new EtatActionController();
$poleServiceController = new PoleServiceController();
$originActionController = new OrigineActionController();
$loginController = new LoginController();

$params = explode('/', $_GET['page']);

try{
    switch($params[0]){

//        Fomulaire login
        case 'login':
            $loginController->login_page("toto");
            break;

        case 'toLogin':
            $loginController->toLogin(
                $_POST['identifiant'],
                $_POST['mot_de_passe']
            );
            break;
//        Fomulaire login


        case 'home':
            $mainController->home(3);
            break;


        /*action*/
        case 'add_action':
            $actionController->add_action(3, $_GET['idUser'], $_GET['idService']);
            break;

        case 'save_action':
            $actionController->save_action(3);
            break;

        case 'detail_action':
            $actionController->detail_action($_GET['id']);
            break;

        case 'edit_action':
            $actionController->edit_action($_GET['id']);
            break;

        case 'edit_action_new_value':
            $actionController->updateAction(3,$_GET['id'],
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
            break;


        case 'delete_action':
            $actionController->delete($_GET['id']);
            break;

        case 'add':
            echo "Nous sommes dans le add";
            break;

        case 'edit_form_action':
            $actionController->editFormAction(
                3,
                $_POST['libelle_champs'],
                $_POST['type_champs']
            );
            break;

        case 'drop_column_action':
            $actionController->dropFormAction(3, $_POST['name_column']);
            break;



        /*utilisateur*/
        case 'page_info_utilisateur':
            $mainController->pageInfoUtilisateur(3);
            break;



        /*departement*/
        case 'add_form_departement':
            $departementController->add_departement(3);
            break;

        case 'add_new_departement':
            $departementController->add_new_departement(3, $_POST['libelle_departement'], $_POST['numero_departement']);
            break;

        case 'delete_departement':
            $departementController->delete_departement(3, intval($_GET['id']));
            break;

        case 'get_departement_by_id':
            $departementController->get_departement_by_id(3, $_GET['id_departement'],$_POST['libelle_departement'], $_POST['numero_departement']);
            break;

        case 'update_departement':
            $departementController->update_departement(3, $_GET['id_departement'],$_POST['libelle_departement'], $_POST['numero_departement']);
            break;



        /*processus*/
        case 'add_form_processus':
            $processusController->add_processus(3);
            break;

        case 'delete_processus':
            $processusController->delete_processus(3, intval($_GET['id']));
            break;

        case 'add_new_processus':
            $processusController->add_new_processus(3, $_POST['libelle_processus']);
            break;

        case 'get_processus_by_id':
            $processusController->get_processus_by_id(3, $_GET['id_processus'],$_POST['libelle_processus']);
            break;

        case 'update_processus':
            $processusController->update_processus(3, $_GET['id_processus'],$_POST['libelle_processus']);
            break;



        /*etat_action*/
        case "add_form_etat_action":
            $etatActionController->add_etat_action(3);
            break;

        case 'delete_etat_action':
            $etatActionController->delete_etat_action(3, intval($_GET['id']));
            break;

        case 'add_new_etat_action':
            $etatActionController->add_new_etat_action(3, $_POST['libelle_etat']);
            break;

        case 'get_etat_action_by_id':
            $etatActionController->get_etat_action_by_id(3, $_GET['id_etat_action']);
            break;

        case 'update_etat_action':
            $etatActionController->update_etat_action(3, $_GET['id_etat_action'], $_POST['libelle_etat']);
            break;



        /*pole_service*/
        case "add_form_pole_service":
            $poleServiceController->add_pole_service(3);
            break;

        case 'delete_pole_service':
            $poleServiceController->delete_pole_service(3, intval($_GET['id']));
            break;

        case 'add_new_pole_service':
            $poleServiceController->add_new_pole_service(3, $_POST['libelle_service']);
            break;

        case 'get_pole_service_by_id':
            $poleServiceController->get_pole_service_by_id(3, $_GET['id_pole_service'], $_POST['libelle_service']);
            break;

        case 'update_pole_service':
            $poleServiceController->update_pole_service(3, $_GET['id_pole_service'], $_POST['libelle_service']);
            break;


        /*origin_action*/
        case "add_form_origin_action":
            $originActionController->add_origin_action(3);
            break;

        case 'delete_origin_action':
            $originActionController->delete_origin_action(3, intval($_GET['id']));
            break;

        case 'add_new_origin_action':
            $originActionController->add_new_origin_action(3, $_POST['libelle_origin_action']);
            break;

        case 'get_origin_action_by_id':
            $originActionController->get_origin_action_by_id(3, $_GET['id_origin_action'], $_POST['libelle_origin_action']);
            break;

        case 'update_origin_action':
            $originActionController->update_origin_action(3, $_GET['id_origin_action'], $_POST['libelle_origin_action']);
            break;

        default:
            throw new Exception("La page existe pas !");
    }
}catch(Exception $e){
    echo $e->getMessage();
}
