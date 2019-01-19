<?php
var_dump($_POST);
?>
<?php
include 'model/patients.php';
include 'controller/ajout-patientController.php';
include 'header.php';
?>


  <h1>Exercice 1</h1>
<p>Créer une page ajout-patient.php et y créer un formulaire permettant de créer un patient. 
    Elle doit être accessible depuis la page index.php.</p>
<div class="container-fluid">
    <div class="row">
        <div class="text-center text-info col-12" >
            FORMULAIRE D'INSCRIPTION :
             <?php
        if ($isSuccess){?>
        <p class="text-success">Enregistrement effectué !</p>
            <?php 
        }
        if ($isError){?>
        <p class="text-danger">Désolé, le patient n'a pu être enregistré !</p>
            <?php 
        }
        ?>
        </div>
        <form method="POST" action="ajout-patient.php">
            <div class="form-group">
                <div class="form-row">   
                   <!--la value permet de garder la valeur du champ quand on fait une erreur dans un autre champ-->
                    <label for="lastname">Nom:</label><input name="lastname" type="text" class="form-control" id="lastname" placeholder="Nom" value="<?= isset($lastname) ? $lastname : '' ?>"  />
                    <p class="text-danger"> <?= isset($formError['lastname']) ? $formError['lastname'] : '' ?> </p>
                </div>
                <div class="form-row">             
                    <label for="firstname">Prenom:</label><input name="firstname" type="text" class="form-control" id="firstname" placeholder="Prenom" value="<?= isset($firstname) ? $firstname : '' ?>"  />
                    <p class="text-danger"> <?= isset($formError['firstname']) ? $formError['firstname'] : '' ?> </p>
                </div>
                <div class="form-row">             
                    <label for="birthdate">Date de naissance ex : (10/10/1980)</label><input name="birthdate" type="date" class="form-control" id="birthdate" placeholder="Date de naissance" value="<?= isset($birthdate) ? $birthdate : '' ?>" />
                    <p class="text-danger"> <?= isset($formError['birthdate']) ? $formError['birthdate'] : '' ?> </p>
                </div>
                <div class="form-row">             
                    <label for="phone">Téléphone :</label><input name="phone" type="tel" class="form-control" id="phone" placeholder="Téléphone" value="<?= isset($phone) ? $phone : '' ?>"  />
                    <p class="text-danger"> <?= isset($formError['phone']) ? $formError['phone'] : '' ?> </p>
                </div>
                <div class="form-row">             
                    <label for="mail">Email :</label><input name="mail" type="email" class="form-control" id="mail" placeholder="Email" value="<?= isset($mail) ? $mail : '' ?>" />
                    <p class="text-danger"> <?= isset($formError['mail']) ? $formError['mail'] : '' ?> </p>
                </div>                            
                <input class="btn btn-info" type="submit" value="Valider" name='submit' />
            </div>   
        </form>
    </div>
</div>