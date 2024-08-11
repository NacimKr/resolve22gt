<div class="container">
    <?php if(isset($_SESSION['alert-libelle'])): ?>
        <div class="alert <?= $_SESSION['alert-libelle']['class'] ?> alert-dismissible fade show" role="alert">
            <strong><?= $_SESSION['alert-libelle']['message'] ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <form action="http://localhost/MRA_Pilotage/add_new_origin_action" method="POST">
        <?php foreach($fields_form_origin_action as $field_origin_action) : ?>
            <?php if($field_origin_action['Field'] != "id_origin_action") :?>
                <div>
                    <label for=""><?= $field_origin_action['Field'] ?></label>
                    <input type="text" name="<?= $field_origin_action['Field'] ?>" class="form-control" required />
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
        <button type="submit" class="btn btn-primary mt-2">Ajouter</button>
    </form>

    <h3 class="mt-5">Liste des origines action existants</h3>
    <ul class="list-group">

        <?php foreach($origin_action_list as $list_origin_action) : ?>
            <li class="list-group-item">
                <span><?= $list_origin_action['libelle_origin_action'] ?></span>
                <span>
                    <a href="http://localhost/MRA_Pilotage/get_origin_action_by_id&id_origin_action=<?= $list_origin_action['id_origin_action'] ?> " class="badge text-bg-warning">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                          <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>
                        </svg>
                    </a>
                </span>
                <span>
                    <a href="http://localhost/MRA_Pilotage/delete_origin_action&id=<?= $list_origin_action['id_origin_action'] ?>" class="badge text-bg-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                          <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                        </svg>
                    </a>
                </span>
            </li>
        <?php endforeach; ?>

        <?php if (isset($_GET['id_origin_action'])) : ?>
            <?php foreach($origin_action_to_update as $origin_action_infos) : ?>
                <form action="http://localhost/MRA_Pilotage/update_origin_action&id_origin_action=<?= $origin_action_infos['id_origin_action'] ?>" method="POST">
                    <input type="text" class="form-control mt-2" name="libelle_origin_action" value="<?= $origin_action_infos['libelle_origin_action'] ?>" />
                    <button type="submit" class="btn btn-warning mt-2">Valider les modifications</button>
                </form>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>
</div>



<!--var_dump($fields_form_departement);-->
<!--var_dump($departement_list);-->
<!--var_dump($all_users);-->

