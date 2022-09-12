<?php
include '../view/header.php';
?>


<form action="recherche.php" method="post">



    <label for="sport-select">Choisissez un sport:</label>

    <div>
        <select name="sport" id="sport">
            <option value=  <?php $sport ?>   ></option>
        </select>
    </div>

    <br><br>


    <label for="niveau-select">Choisissez le niveau:</label>
    <div>
            <select name="niveau" id="niveau">
                <option value="supporter">Supporter</option>
                <option value="debutant">DÃ©butant</option>
                <option value="confirme">ConfirmÃ©</option>
                <option value="pro">Pro</option>
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







<?php
include '../view/footer.php';