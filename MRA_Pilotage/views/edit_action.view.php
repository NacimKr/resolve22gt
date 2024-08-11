<div class="container">
    <form action="http://localhost/MRA_Pilotage/edit_action_new_value&id=<?= $id ?>" method="POST">
        <?php foreach ($fields_form as $formvalue) : ?>
            <?php foreach ($formvalue as $key => $valueForm) : ?>
                <?php if ($key != "id_action") : ?>

                    <?php if ($key == "date_inscription" || $key == "date_fin_action" || $key == "date_debut_previsionnelle") : ?>
                        <label for="<?= $key ?>"><?= ucfirst(str_replace('_', ' ', $key)) ?></label>
                        <input type="date" class="form-control" value="<?= $valueForm ?>" id="<?= $key ?>" name="<?= $key ?>"/>

                    <?php elseif ($key == "echelon_origin_action") : ?>
                        <label for="departement">Département</label>
                        <select class="form-select" name="<?= $key ?>" id="<?= $key ?>">
                            <?php foreach ($departement_list as $value) : ?>
                                <option value="<?= $value['id_departement'] ?>" <?= $value['id_departement'] == $valueForm ? 'selected' : '' ?>>
                                    <?= $value['libelle_departement'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                    <?php elseif ($key == "processus") : ?>
                        <label for="<?= $key ?>"><?= ucfirst($key) ?></label>
                        <select class="form-select" name="<?= $key ?>" id="<?= $key ?>">
                            <?php foreach ($processus_list as $value) : ?>
                                <option value="<?= $value['id_processus'] ?>" <?= $value['id_processus'] == $valueForm ? 'selected' : '' ?>>
                                    <?= $value['libelle_processus'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                    <?php elseif ($key == "origin_action") : ?>
                        <label for="<?= $key ?>"><?= ucfirst(str_replace('_', ' ', $key)) ?></label>
                        <select class="form-select" name="<?= $key ?>" id="<?= $key ?>">
                            <?php foreach ($origin_action_list as $value) : ?>
                                <option value="<?= $value['id_origin_action'] ?>" <?= $value['id_origin_action'] == $valueForm ? 'selected' : '' ?>>
                                    <?= $value['libelle_origin_action'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                    <?php elseif ($key == "etat_action") : ?>
                        <label for="<?= $key ?>"><?= ucfirst(str_replace('_', ' ', $key)) ?></label>
                        <select class="form-select" name="<?= $key ?>" id="<?= $key ?>">
                            <?php foreach ($etat_action_list as $value) : ?>
                                <option value="<?= $value['id_etat'] ?>" <?= $value['id_etat'] == $valueForm ? 'selected' : '' ?>>
                                    <?= $value['libelle_etat'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                    <?php elseif ($key == "pole_service") : ?>
                        <label for="<?= $key ?>"><?= ucfirst(str_replace('_', ' ', $key)) ?></label>
                        <select class="form-select" name="<?= $key ?>" id="<?= $key ?>">
                            <?php foreach ($pole_service_list as $value) : ?>
                                <option value="<?= $value['id_service'] ?>" <?= $value['id_service'] == $valueForm ? 'selected' : '' ?>>
                                    <?= $value['libelle_service'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                    <?php elseif ($key == "declinaision_locale" || $key == "action_active") : ?>
                        <div class="my-3">
                            <label for="<?= $key ?>"><?= ucfirst(str_replace('_', ' ', $key)) ?></label>
                            <select class="form-select" name="<?= $key ?>" id="<?= $key ?>">
                                <option value="1" <?= $valueForm == 1 ? 'selected' : '' ?>>Oui</option>
                                <option value="0" <?= $valueForm == 0 ? 'selected' : '' ?>>Non</option>
                            </select>
                        </div>

                    <?php elseif ($key == "commentaire" || $key == "descriptif_action") : ?>
                        <label for="<?= $key ?>"><?= ucfirst(str_replace('_', ' ', $key)) ?></label>
                        <input type="text" class="form-control" value="<?= $valueForm ?>" id="<?= $key ?>" name="<?= $key ?>"/>

<!--                        <textarea class="form-control" name="--><?php //= $key ?><!--" id="--><?php //= $key ?><!--" cols="30" rows="10">-->
<!--                            --><?php //= htmlspecialchars($valueForm) ?>
<!--                        </textarea>-->

                    <?php else : ?>
                        <label for="<?= $key ?>"><?= ucfirst(str_replace('_', ' ', $key)) ?></label>
                        <input type="text" class="form-control" value="<?= htmlspecialchars($valueForm) ?>" id="<?= $key ?>" name="<?= $key ?>"/>
                    <?php endif; ?>

                <?php endif; ?>
            <?php endforeach; ?>
        <?php endforeach; ?>

        <button class="btn btn-warning" type="submit">Valider les modifications</button>
    </form>
</div>

