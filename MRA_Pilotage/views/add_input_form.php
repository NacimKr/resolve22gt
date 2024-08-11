<div class="container">
    <h1 class="my-4">Ajouter des champs à votre formulaire</h1>
    <form action="http://localhost/MRA_Pilotage/edit_form_action" method="POST">
        <input
            class="form-control my-1"
            type="text"
            name="libelle_champs"
            placeholder="Ajouter le libelle de votre champs"
        />
        <label for="type_champs" class="my-1">Précisez le type de votre champs</label>
        <select class="form-select" name="type_champs" id="type_champs">
            <option value="varchar">Chaine de caractères</option>
            <option value="int">Nombre entier</option>
<!--            <option value="TIMESTAMP">Date</option>-->
        </select>
        <button type="submit" class="btn btn-primary my-2">Ajouter d'autre champs</button>
    </form>
</div>

