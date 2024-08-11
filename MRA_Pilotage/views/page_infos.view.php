<div class="d-flex justify-content-center my-5">
    <div class="card" style="width: 38rem;">
        <div class="card-body">
            <h3 class="card-title"><strong>Nom : </strong><?= $all_users["nom"] ?></h3>
            <h3 class="card-title"><strong>Prénom : </strong><?= $all_users["prenom"] ?></h3>
            <h3 class="card-text"><strong>Habilitation : </strong><?= $all_users["role"] ?></h3>
            <h3 class="card-text"><strong>Échelon : </strong><?= $all_users["echelon"] ?></h3>
        </div>
    </div>
</div>

<?php var_dump($all_users) ?>