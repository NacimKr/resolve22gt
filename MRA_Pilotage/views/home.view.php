<?php //var_dump($all_action) ?>
<?php if(empty($all_action)) : ?>
    <h2>Vous n'avez aucune action d'enregistré</h2>
<?php else : ?>
    <div class="container-fluid">
        <div class="mt-3 fw-bold">
            Bonjour,<a href="http://localhost/MRA_Pilotage/page_info_utilisateur" class="text-decoration-none text-dark ">
                <?=  $all_users ? $all_users['nom'] . " " . $all_users['prenom'] : "" ?>
            </a>
        </div>

        <?php if($all_users['role'] === 'ROLE_PROPRIETAIRES') :?>
            <div class="mt-3 d-flex justify-content-end gap-1">
                <a href="http://localhost/MRA_Pilotage/add_form_departement" class="btn btn-secondary">Formulaire Departement</a>
                <a href="http://localhost/MRA_Pilotage/add_form_processus" class="btn btn-secondary">Formulaire Processus</a>
                <a href="http://localhost/MRA_Pilotage/add_form_etat_action" class="btn btn-secondary">Formulaire Etat de l'action</a>
                <a href="http://localhost/MRA_Pilotage/add_form_pole_service" class="btn btn-secondary">Formulaire Pole service</a>
                <a href="http://localhost/MRA_Pilotage/add_form_origin_action" class="btn btn-secondary">Formulaire Origine d'action</a>
            </div>
        <?php endif; ?>

        <h1 class="text-center my-3">Suivi des actions</h1>

        <?php if(isset($_SESSION['alert'])): ?>
            <div class="alert <?= $_SESSION['alert']['class'] ?> alert-dismissible fade show" role="alert">
                <strong><?= $_SESSION['alert']['message'] ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <table class="table table-striped table-bordered w-auto" id="table">
            <thead class="table-dark">
            <tr class="table-dark">
                <th>
                    <button class="btn d-flex align-items-center text-uppercase text-light">
                        N°action
                        <svg class="ms-2" width="8" height="12" viewbox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.35392 0.146039C4.30747 0.0994761 4.2523 0.0625332 4.19155 0.0373268C4.13081 0.0121203 4.06569 -0.000854492 3.99992 -0.000854492C3.93415 -0.000854492 3.86903 0.0121203 3.80828 0.0373268C3.74754 0.0625332 3.69236 0.0994761 3.64592 0.146039L0.645918 3.14604C0.575811 3.21597 0.528047 3.30514 0.50868 3.40225C0.489313 3.49936 0.499216 3.60003 0.537134 3.6915C0.575051 3.78298 0.639276 3.86113 0.721665 3.91606C0.804054 3.97099 0.900898 4.00022 0.999918 4.00004H6.99992C7.09894 4.00022 7.19578 3.97099 7.27817 3.91606C7.36056 3.86113 7.42479 3.78298 7.4627 3.6915C7.50062 3.60003 7.51052 3.49936 7.49116 3.40225C7.47179 3.30514 7.42403 3.21597 7.35392 3.14604L4.35392 0.146039Z" fill="#7A899B"></path>
                            <path d="M6.99992 8H0.999918C0.900898 7.99982 0.804054 8.02905 0.721665 8.08398C0.639276 8.13891 0.575051 8.21706 0.537134 8.30854C0.499216 8.40001 0.489313 8.50068 0.50868 8.59779C0.528047 8.6949 0.575811 8.78407 0.645918 8.854L3.64592 11.854C3.69236 11.9006 3.74754 11.9375 3.80828 11.9627C3.86903 11.9879 3.93415 12.0009 3.99992 12.0009C4.06569 12.0009 4.13081 11.9879 4.19155 11.9627C4.2523 11.9375 4.30747 11.9006 4.35392 11.854L7.35392 8.854C7.42403 8.78407 7.47179 8.6949 7.49116 8.59779C7.51052 8.50068 7.50062 8.40001 7.4627 8.30854C7.42479 8.21706 7.36056 8.13891 7.27817 8.08398C7.19578 8.02905 7.09894 7.99982 6.99992 8Z" fill="#7A899B"></path>
                        </svg>
                    </button>
                </th>

                <?php foreach($fields_form as $fields) : ?>
                    <?php if($fields['Field'] !== "id_action") : ?>
                        <th scope="col">
                            <button class="btn d-flex align-items-center text-uppercase text-light">
                                <?= str_replace('_'," ",$fields['Field']) ?>
                                <svg class="ms-2" width="8" height="12" viewbox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.35392 0.146039C4.30747 0.0994761 4.2523 0.0625332 4.19155 0.0373268C4.13081 0.0121203 4.06569 -0.000854492 3.99992 -0.000854492C3.93415 -0.000854492 3.86903 0.0121203 3.80828 0.0373268C3.74754 0.0625332 3.69236 0.0994761 3.64592 0.146039L0.645918 3.14604C0.575811 3.21597 0.528047 3.30514 0.50868 3.40225C0.489313 3.49936 0.499216 3.60003 0.537134 3.6915C0.575051 3.78298 0.639276 3.86113 0.721665 3.91606C0.804054 3.97099 0.900898 4.00022 0.999918 4.00004H6.99992C7.09894 4.00022 7.19578 3.97099 7.27817 3.91606C7.36056 3.86113 7.42479 3.78298 7.4627 3.6915C7.50062 3.60003 7.51052 3.49936 7.49116 3.40225C7.47179 3.30514 7.42403 3.21597 7.35392 3.14604L4.35392 0.146039Z" fill="#7A899B"></path>
                                    <path d="M6.99992 8H0.999918C0.900898 7.99982 0.804054 8.02905 0.721665 8.08398C0.639276 8.13891 0.575051 8.21706 0.537134 8.30854C0.499216 8.40001 0.489313 8.50068 0.50868 8.59779C0.528047 8.6949 0.575811 8.78407 0.645918 8.854L3.64592 11.854C3.69236 11.9006 3.74754 11.9375 3.80828 11.9627C3.86903 11.9879 3.93415 12.0009 3.99992 12.0009C4.06569 12.0009 4.13081 11.9879 4.19155 11.9627C4.2523 11.9375 4.30747 11.9006 4.35392 11.854L7.35392 8.854C7.42403 8.78407 7.47179 8.6949 7.49116 8.59779C7.51052 8.50068 7.50062 8.40001 7.4627 8.30854C7.42479 8.21706 7.36056 8.13891 7.27817 8.08398C7.19578 8.02905 7.09894 7.99982 6.99992 8Z" fill="#7A899B"></path>
                                </svg>
                            </button>
                        </th>
                    <?php endif; ?>
                <?php endforeach; ?>
                <th scope="col">Actions</th>
            </tr>

            </thead>
            <tbody>

            <?php if($all_users['role'] === "ROLE_LECTEUR") : ?>
                <?php foreach($all_action_for_lecteur as $actions) : ?>
                    <tr>
                        <td><?= date("Y")."-".$actions['libelle_departement']."".$actions['numero_departement']?></td>
                        <td><?= $actions['date_inscription'] ?></td>
<!--                        <td>--><?php //= $actions['service_pole_emetteur_action'] ?><!--</td>-->
                        <td><?= $actions['libelle_origin_action'] ?></td>
                        <td><?= $actions['libelle_processus'] ?></td>
                        <td><?= $actions['thematique_indicateur_associes'] ?></td>
                        <td><?= $actions['constat_analyse_des_causes'] ?></td>
                        <td><?= $actions['descriptif_action'] ?></td>
                        <td><?= $actions['objectifs'] ?></td>
                        <td><?= $actions['nom']." ".$actions['prenom'] ?></td>
                        <td><?= $actions['libelle_service'] ?></td>
                        <td><?= $actions['libelle_departement']."".$actions['numero_departement']?></td>
                        <td><?= $actions['libelle_service'] ?></td>
                        <td><?= $actions['declinaision_locale'] == 1 ? "Oui" : "Non" ?></td>
                        <td><?= $actions['echeances'] ?></td>
                        <td><?= $actions['date_fin_action'] ?></td>
                        <td><?= $actions['date_debut_previsionnelle'] ?></td>
                        <td><?= $actions['libelle_etat'] ?></td>
                        <td><?= $actions['commentaire'] ?></td>
<!--                        <td>--><?php //= $actions['action_active'] == "1" ? "Active" : "Non active" ?><!--</td>-->
                        <td>
                            <?php if ($all_users['echelon'] == $actions["echelon_origin_action"] || $all_users['role'] === 'ROLE_CONTRIBUTEURS' || $all_users['role'] === 'ROLE_PROPRIETAIRES'): ?>
                                <a href="http://localhost/MRA_Pilotage/detail_action&id=<?= $actions["id_utilisateur"] ?>" class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                                    </svg>
                                </a>
                                <a href="http://localhost/MRA_Pilotage/delete_action&id=<?= $actions["id_action"] ?>" class="btn btn-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                                    </svg>
                                </a>
                            <?php else: ?>
                                <a href="" class="btn btn-secondary">Action non modifiable</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <!--Vu pour le propriètaires -->
                <?php foreach($all_action as $actions) : ?>
                    <tr>
                        <td><?= date("Y")."-".$actions['libelle_departement']."".$actions['numero_departement']?></td>
                        <td><?= $actions['date_inscription'] ?></td>
<!--                        <td>--><?php //= $actions['service_pole_emetteur_action'] ?><!--</td>-->
                        <td><?= $actions['libelle_origin_action'] ?></td>
                        <td><?= $actions['libelle_processus'] ?></td>
                        <td><?= $actions['thematique_indicateur_associes'] ?></td>
                        <td><?= $actions['constat_analyse_des_causes'] ?></td>
                        <td><?= $actions['descriptif_action'] ?></td>
                        <td><?= $actions['objectifs'] ?></td>
                        <td><?= $actions['nom']." ".$actions['prenom'] ?></td>
                        <td><?= $actions['libelle_service'] ?></td>
                        <td><?= $actions['libelle_departement'] ?></td>
                        <td><?= $actions['libelle_service'] ?></td>
                        <td><?= $actions['declinaision_locale'] == 1 ? "Oui" : "Non" ?></td>
                        <td><?= $actions['echeances'] ?></td>
                        <td><?= $actions['date_fin_action'] ?></td>
                        <td><?= $actions['date_debut_previsionnelle'] ?></td>
                        <td><?= $actions['libelle_etat'] ?></td>
                        <td><?= $actions['commentaire'] ?></td>
                        <td><?= $actions['action_active'] == "1" ? "Active" : "Non active" ?></td>
                        <td>
                            <?php if ($all_users['echelon'] == $actions["echelon_origin_action"] || $all_users['role'] === 'ROLE_CONTRIBUTEURS' || $all_users['role'] === 'ROLE_PROPRIETAIRES'): ?>
                                <a href="http://localhost/MRA_Pilotage/detail_action&id=<?= $actions["id_utilisateur"] ?>" class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                                    </svg>
                                </a>
                                <a href="http://localhost/MRA_Pilotage/edit_action&id=<?= $actions["id_action"] ?>" class="btn btn-warning">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                                    </svg>
                                </a>
                                <a href="http://localhost/MRA_Pilotage/delete_action&id=<?= $actions["id_action"] ?>" class="btn btn-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                                    </svg>
                                </a>
                            <?php else: ?>
                                <a href="" class="btn btn-secondary">Action non modifiable</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            <tfoot>
                <tr>
                    <?php foreach($fields_form as $fields) : ?>
                        <th></th>
                    <?php endforeach ; ?>
                </tr>
            </tfoot>
            </tbody>
        </table>

<?php endif; ?>


