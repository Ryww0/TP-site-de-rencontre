<?php
include '../view/header.php';
?>

<form action="ajout-user.php" method="post">

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
        <input type="number" name="departement" id="departement" min="1" max="96" placeholder="Votre département" required>
    </div>

    <div>
        <label for="email">Entrez votre e-mail:</label>
        <input id="email" name="email" type="email">
    </div>




    <form action="ajout-sport" method="post">
        <div
            <select name="sport" id="sport" >
            <option value="" disabled selected hidden> Choisissez votre sport: </option>

            <?php
            if (isset($sport) (!empty($sport))){
            foreach ($sports as $sport) { ?>
                <option><?php echo $sport ?></option>
            <?php } ?>

            </select>
        </div>

        <div>
            <input type="submit" value="Nouveau Sport">
        </div>
    </form>



    <select name="niveau" id="niveau">
        <option value="" disabled selected hidden> Choisissez votre niveau:</option>

        <option value="supporter">Supporter</option>
        <option value="debutant">Débutant</option>
        <option value="confirme">Confirmé</option>
        <option value="pro">Pro</option>
    </select>



</form>

<?php
include '../view/footer.php';