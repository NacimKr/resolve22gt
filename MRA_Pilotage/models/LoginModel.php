<?php

require_once "MainModel.php";

class LoginModel extends MainModel
{
    function login_user($identifiant)
    {
        $req = "SELECT * FROM `utilisateurs` WHERE identifiant =:identifiant;";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->bindValue(':identifiant', $identifiant, PDO::PARAM_STR);
        $stmt->execute();
        $actions_datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $actions_datas;

    }

    public function isValid($name, $password){
        //On recupère le mot de passe crypté
        $passwordBD = $this->getPasswordUser($name);
        return password_verify($password, $passwordBD);
    }

    private function getPasswordUser($name){
        $requete = "SELECT mot_de_passe from utilisateurs where login = :name; ";
        $connexion = $this->getBDD()->prepare($requete);
        $connexion->bindValue(':name', $name, PDO::PARAM_STR);
        $connexion->execute();
        $resultat = $connexion->fetch(PDO::FETCH_ASSOC);
        $connexion->closeCursor();
        return $resultat['mot_de_passe'];
    }
}