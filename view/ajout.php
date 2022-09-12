<?php
include '../view/header.php';
?>

    <form action="ajout-user.php" method="post">

        <!--    Première zone   -->

        <div>
            <label for="prenom">Entrez votre Prénom: </label>
            <input type="text" name="prenom" id="prenom" placeholder="Prénom" required>
        </div>

        <div>
            <label for="nom">Entrez votre Nom: </label>
            <input type="text" name="nom" id="nom" placeholder="Nom" required>
        </div>

        <div>
            <label for="departement">Entrez votre Département: </label>
            <input type="number" name="departement" id="departement" min="01" max="95" minlength="2" maxlength="3" placeholder="xx"
                   required>
        </div>
<!--        Comment gérer le max avec les dom tom-->

        <div>
            <label for="email">Entrez votre e-mail:</label>
            <input type="email" name="email" id="email">
        </div>


        <!--    Seconde zone    -->
        <br><br>
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

        <!--    Nouveau sport   -->
        <br><br>

        <form action="ajout-sport" method="post">
            <div>
                <label for="autre">Entrez un autre sport:</label>
                <input type="text" name="autre" id="autre">
            </div>
            <div>
                <input type="submit" value="Ajouter Sport">
            </div>
        </form>

        <!--    Niveau   -->
        <br><br>
        <div>
            <select name="niveau" id="niveau">
                <option value="supporter">Supporter</option>
                <option value="debutant">Débutant</option>
                <option value="confirme">Confirmé</option>
                <option value="pro">Pro</option>
            </select>
        </div>


        <br><br>
        <!--    Submit   -->

        <div>
            <input type="reset" value="Reset">
        </div>

        <div>
            <input type="submit" value="Inscription">
        </div>

    </form>

<!--    Lien page accueil   -->
<a href="./accueil">


<?php
include '../view/footer.php';