<?php
include '../view/header.php';
?>

<form action="ajout-user.php" method="post">

    <div>
        <label for="name">Entrez votre Pseudonyme: </label>
        <input type="text" name="pseudo" id="pseudo" placeholder="Pseudonyme" required>
    </div>

    <div>
        <label for="name">Entrez votre Age: </label>
        <input type="number" name="age" id="age" placeholder="Age" required>
    </div>

    <div>
        <label for="email">Entrez votre e-mail:</label>
        <input id="email" name="email" type="email">
    </div>

    <div>
        <label for="password">Entrez votre mot de passe: </label>
        <input type="password" name="password" id="password" minlenght="8" placeholder="Mot de passe" required>
    </div>

    <div>
        <select name="sport" id="sport" >Choisissez un sport:
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