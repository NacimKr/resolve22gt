<?php //var_dump($all_users) ?>
<nav class="navbar navbar-dark navbar-expand-lg bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand text-secondary fw-bold" href="home">MRA<br/> Suivi Pilotage</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav" id="navbarScroll">
            <ul class="navbar-nav navbar-nav-scroll" style="--bs-scroll-height: 100px;">
<!--                <li class="d-flex align-items-center text-light fw-bold">-->
<!--                    <a href="http://localhost/MRA_Pilotage/page_info_utilisateur" class="text-decoration-none text-light me-5">-->
<!--                        --><?php //=  $all_users ? $all_users['nom'] . "-" . $all_users['prenom'] : "" ?>
<!--                    </a>-->
<!--                </li>-->
                <?php if($all_users['role'] === "ROLE_PROPRIETAIRES") : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Gestion des formulaires
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="text-light fw-bold mx-2">
                        <a class="btn btn-success" href="http://localhost/MRA_Pilotage/edit_form_action">Modifer le formulaire</a>
                    </li>

                <?php endif; ?>
                <a href='http://localhost/MRA_Pilotage/add_action&idUser=<?= $all_users['echelon'] ?>&idService=<?= $all_users['service'] ?>' class="btn btn-warning">Ajouter une action</a>



            </ul>
        </div>
    </div>
</nav>