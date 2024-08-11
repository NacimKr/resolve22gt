<?php $dt = new DateTime(); ?>
<div class="container">
    <form action="http://localhost/MRA_Pilotage/index.php?page=save_action" method="POST">
        <?php foreach($fields_form as $key=>$value) : ?>
            <?php if($key != "id") : ?>
                <?php if($value['Field'] == "date_inscription") : ?>
                    <label for="<?= $value['Field'] ?>">date inscription</label>
                    <input type="date" class="form-control" id="<?=$value['Field'] ?>" name="<?=$value['Field'] ?>" value="<?= $dt->format('Y-m-d') ?>"/>
                <?php elseif($value['Field'] == "echelon_origin_action") : ?>
                    <label for="departement">departement</label>
                    <select class="form-select" name="<?= $value['Field'] ?>" id="<?=$value['Field'] ?>">
                        <?php if($all_users['role'] === "ROLE_PROPRIETAIRES") : ?>
                            <?php foreach($departement_list as $value) : ?>
                                <option value="<?= $value['id_departement'] ?>"><?= $value['libelle_departement'] ?></option>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <option value="<?= $all_users_by_departement['id_departement'] ?>"><?= $all_users_by_departement['libelle_departement'] ?></option>
                        <?php endif; ?>
                    </select>
                <?php elseif($value['Field'] == "processus") : ?>
                    <label for="<?= $value['Field'] ?>"><?= $value['Field'] ?></label>
                    <select class="form-select" name="<?= $value['Field'] ?>" id="<?=$value['Field'] ?>">
                        <?php foreach($processus_list as $value) : ?>
                            <option value="<?= $value['id_processus'] ?>"><?= $value['libelle_processus'] ?></option>
                        <?php endforeach; ?>
                    </select>
                <?php elseif($value['Field'] == "origin_action") : ?>
                    <label for="<?= $value['Field'] ?>"><?= $value['Field'] ?></label>
                    <select class="form-select" name="<?= $value['Field'] ?>" id="<?=$value['Field'] ?>">
                        <?php foreach($origin_action_list as $value) : ?>
                            <option value="<?= $value['id_origin_action'] ?>"><?= $value['libelle_origin_action'] ?></option>
                        <?php endforeach; ?>
                    </select>
                <?php elseif($value['Field'] == "etat_action") : ?>
                    <label for="<?= $value['Field'] ?>"><?= $value['Field'] ?></label>
                    <select class="form-select" name="<?= $value['Field'] ?>" id="<?=$value['Field'] ?>">
                        <?php foreach($etat_action_list as $value) : ?>
                            <option value="<?= $value['id_etat'] ?>"><?= $value['libelle_etat'] ?></option>
                        <?php endforeach; ?>
                    </select>
                <?php elseif($value['Field'] == "pole_service") : ?>
                    <div class="my-3">
                        <label for="<?= $value['Field'] ?>"><?= $value['Field'] ?></label>
<!--                        --><?php //foreach($pole_service_list as $valueService) : ?>
<!--                            <div>-->
<!--                                <input type="checkbox" value="--><?php //= $valueService['libelle_service'] ?><!--" name="--><?php //= $value['Field'] ?><!--[]"/>-->
<!--                                <label for="">--><?php //= $valueService['libelle_service'] ?><!--</label>-->
<!--                            </div>-->
<!--                        --><?php //endforeach; ?>
<!--                    -->
                        <select class="form-select" name="<?= $value['Field'] ?>" id="<?=$value['Field'] ?>">
                            <?php foreach($pole_service_list as $value) : ?>
                                <option value="<?= $value['id_service'] ?>"><?= $value['libelle_service'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                <?php elseif($value['Field'] == "service_pole_emetteur_action") : ?>
                    <label for="<?= $value['Field'] ?>"><?= $value['Field'] ?></label>
                    <select class="form-select" name="<?= $value['Field'] ?>" id="<?=$value['Field'] ?>">
                        <option value="<?= $all_users_by_departement['id_service'] ?>"><?= $all_users_by_departement['libelle_service'] ?></option>
                    </select>
                <?php elseif($value['Field'] == "date_fin_action") : ?>
                    <label for="<?= $value['Field'] ?>"><?= $value['Field'] ?></label>
                    <input type="date" class="form-control" id="<?=$value['Field'] ?>" name="<?=$value['Field'] ?>"  />
                <?php elseif($value['Field'] == "date_debut_previsionnelle") : ?>
                    <label for="<?= $value['Field'] ?>"><?= $value['Field'] ?></label>
                    <input type="date" class="form-control" id="<?= $value['Field'] ?>" name="<?=$value['Field'] ?>" />
                <?php elseif($value['Field'] == "commentaire") : ?>
                    <label for="<?= $value['Field'] ?>"><?= $value['Field'] ?></label>
                    <textarea class="form-control" name="<?= $value['Field'] ?>" id="" cols="30" rows="10"></textarea>
                <?php elseif($value['Field'] == "descriptif_action") : ?>
                    <label for="<?= $value['Field'] ?>"><?= $value['Field'] ?></label>
                    <textarea class="form-control" name="<?= $value['Field'] ?>" id="" cols="30" rows="10"></textarea>
                <?php elseif($value['Field'] == "responsable_action") : ?>
                    <label for="<?= $value['Field'] ?>"><?= $value['Field'] ?></label>
                    <select class="form-select" name="<?= $value['Field'] ?>" id="<?=$value['Field'] ?>">
                        <option value="<?= $all_users_by_departement['id'] ?>"><?= $all_users_by_departement['nom']." ".$all_users_by_departement['prenom'] ?></option>
                    </select>
                <?php elseif($value['Field'] == "declinaision_locale") : ?>
                    <label for="<?= $value['Field'] ?>"><?= $value['Field'] ?></label>
                    <select class="form-select" name="<?= $value['Field'] ?>" id="<?=$value['Field'] ?>">
                        <option value="1">Oui</option>
                        <option value="0">Non</option>
                    </select>
                <?php elseif($value['Field'] == "action_active") : ?>
                    <div class="my-3">
                        <label for="<?= $value['Field'] ?>"><?= $value['Field'] ?></label>
                        <select class="form-select" name="<?= $value['Field'] ?>" id="<?=$value['Field'] ?>">
                            <option value="1">Oui</option>
                            <option value="0">Non</option>
                        </select>
                    </div>
                <?php else: ?>
                    <label for=""><?= $value["Field"] ?></label>
                    <input class="form-control" type="text" name="<?= $value["Field"] ?>" required/>
                <?php endif; ?>

            <?php endif; ?>
        <?php endforeach; ?>
        <button class="btn btn-primary" type="submit">Ajouter</button>
    </form>
</div>
<script>
    document.querySelector('')
</script>

<?php var_dump($action_update) ?>