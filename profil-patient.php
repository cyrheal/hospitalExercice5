<?php
include 'model/patients.php';
include 'controller/profil-patientController.php';
include 'header.php';
?>
<table class="table">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Date de naissance</th>
            <th>Téléphone</th>
            <th>email</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($isPatient) {
            ?>
            <!-- un tableau d objet-->
            <tr>
                <td><?= $patients->lastname ?></td>
                <td><?= $patients->firstname ?></td>
                <td><?= $patients->birthdate ?></td>
                <td><?= $patients->phone ?></td>
                <td><?= $patients->mail ?></td>
            </tr>
        </tbody>
    </table>  
    <!-- quand il y a un href, ne pas mettre de input, il faut mettre une class, le href et le name-->
    <p><a class="btn btn-info " href="liste-patients.php" name="back">retour</a></p>
    <div>
        <p>Modifier le profil patient : </p>
        <form method="POST" action="profil-patient.php?id=<?= $patients->id ?>">
            <div class="form-group">
                <div class="form-row">   
                    <!--la value permet de garder la valeur du champ quand on fait une erreur dans un autre champ-->
                    <label for="lastname">Nom:</label><input name="lastname" type="text" class="form-control" id="lastname" placeholder="Nom" value="<?= $patients->lastname ?>"  />
                    <p class="text-danger"> <?= isset($formError['lastname']) ? $formError['lastname'] : '' ?> </p>
                </div>
                <div class="form-row">             
                    <label for="firstname">Prenom:</label><input name="firstname" type="text" class="form-control" id="firstname" placeholder="Prenom" value="<?= $patients->firstname ?>"  />
                    <p class="text-danger"> <?= isset($formError['firstname']) ? $formError['firstname'] : '' ?> </p>
                </div>
               <div class="form-row">                                                                                                                                          <!--value="<? = isset($birthdate) ? $birthdate : '' ?>"-->
                    <label for="birthdate">Date de naissance ex : (10/10/1980)</label><input name="birthdate" type="date" class="form-control" id="birthdate" placeholder="Date de naissance" value="<?= $patients->birthdate ?>" />
                    <p class="text-danger"> <?= isset($formError['birthdate']) ? $formError['birthdate'] : '' ?> </p>
                </div>
                <div class="form-row">             
                    <label for="phone">Téléphone :</label><input name="phone" type="tel" class="form-control" id="phone" placeholder="Téléphone" value="<?= $patients->phone ?>"  />
                    <p class="text-danger"> <?= isset($formError['phone']) ? $formError['phone'] : '' ?> </p>
                </div>
                <div class="form-row">             
                    <label for="mail">Email :</label><input name="mail" type="email" class="form-control" id="mail" placeholder="Email" value="<?= $patients->mail ?>" />
                    <p class="text-danger"> <?= isset($formError['mail']) ? $formError['mail'] : '' ?> </p>
                </div>                            
                <input class="btn btn-info" type="submit" value="Valider" name='submit' />
            </div>   
        </form>
    </div>
    </div>
    <?php
} else {
    ?>
    <div>Le patient n'a pas été trouvé!</div>
    <?php
}
?>
<script src="assets/js/jquery-3.3.1.js"></script>
<script defer src="assets/bootstrap/js/bootstrap.js"></script>
</body>
</html>