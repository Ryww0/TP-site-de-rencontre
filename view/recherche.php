<?php
include '../view/header.php';
?>


<form action="recherche.php" method="post">

<!--    Liste des sports   -->
    <label for="sport-select">Choisissez un sport:</label>

    <div>
        <select name="sport" id="sport">
        <option value="" disabled selected hidden> Choisissez votre sport</option>
            <?php if (isset($sports) && (!empty($sports))) {
                foreach ($sports as $sport) { ?>
                    <option value="<?= $sport->id ?>"> <?= $sport->name ?> </option>
                <?php }
            } ?>
        </select>
    </div>
    <br><br>

<!--    Liste des niveaux   -->
    <label for="niveau-select">Choisissez le niveau:</label>
    <div>
            <select name="niveau" id="niveau">
                <option value="supporter">Supporter</option>
                <option value="debutant">Débutant</option>
                <option value="confirme">Confirmé</option>
                <option value="pro">Pro</option>
            </select>
    </div>
    <br><br>


    <!--    Liste des departement   -->
    <div>
        <select name="departement" id="departement">
        <option value="" disabled selected hidden> Choisissez votre département</option>
            <?php if (isset($departement) && (!empty($departement))) {
                foreach ($departements as $departement) { ?>
                    <option value="<?= $departement->id ?>"> <?= $departement->name ?> </option>
                <?php }
            } ?>
        </select>
    </div>


<!--    Reset/Submit   -->
    <div>
        <input type="reset" value="Reset">
    </div>

    <div>
        <input type="submit" value="Lancer la recherche">
    </div>

</form>



<!--    TODO: Améliorer les liens qui suivent !   -->

<a href="./accueil">Retour Accueil</a>

<a href="../view/partials/ajout.php">Retour Inscription</a>

<?php
include '../view/footer.php';