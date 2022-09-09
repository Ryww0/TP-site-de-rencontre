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

<!--!! Select à modifier avec un foreach et des variables !!-->

    <div
        <select name="sport" id="sport" >
            <option value="" disabled selected hidden> Choisissez votre sport</option>
            <option value="tennis">Tennis</option>
            <option value="golf">Golf</option>
            <option value="football">Football</option>
            <option value="badminton">Badminton</option>
            <option value="course">Course</option>
            <option value="rando">Randonnée</option>
            <option value="arc">Tir à l'arc</option>
        </select>
    </div>

    <div>
        <input type="submit" value="Inscription">
    </div>

</form>

<?php
include '../view/footer.php';