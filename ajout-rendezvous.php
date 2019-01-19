<?php
include 'model/appointments.php';
include 'model/patients.php';
include 'controller/ajout-rendezvousController.php';
include 'header.php';
?>

<div class="container-fluid">
    <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12 col-xl-12">
        <div class="row">
            <p class="text-danger"><?= isset($formError['checkAppointment']) ? $formError['checkAppointment'] : '' ?></p>
            <form method="POST" action="ajout-rendezvous.php" class="form">
                <?php if ($isSuccess) { ?>
                    <p class="text-success">Votre rendez-vous a bien été prises en compte</p>
                    <?php
                }
                if ($isError) {
                    ?>
                    <p class="text-danger">Désolé, votre rendez-vous n'a pu être enregistré !</p>
                    <?php
                }
                ?>
                <fieldset>
                    <legend>Ajouter un rendez-Vous</legend>
                    <label for="idLastname"> Nom et prénom du patient : </label>
                    <select name="idLastname" id="idLastname">
                        <option value="">Choix du patient</option>
                        <?php foreach ($patientsList as $patientDetail) { ?>
                            <option value = "<?= $patientDetail->id ?>"><?= $patientDetail->lastname . ' ' . $patientDetail->firstname ?></option>
                        <?php } ?>
                    </select>
                    <p class="text-danger"><?= isset($formError['patient']) ? $formError['patient'] : '' ?></p>
                    <label for="date"> Date du rendez-vous : </label><input type="date" id="date" name="date" value="<?= isset($date) ? $date : '' ?>"/>
                    <p class="text-danger"><?= isset($formError['date']) ? $formError['date'] : '' ?></p> 
                    <p><label for="hour">Heure du rendez-vous (heures d'ouverture 08:00 à 20:00) : </label><input id="hour" type="time" name="hour" min="08:00" max="20:00" value="<?= isset($hour) ? $hour : '' ?>"/></p>
                    <div>
                        <div class="nav-item">
                            <input type="submit" class="valid" value="Valider" name="submit"/></a>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
    <div class="raw">
        <p>Liste des rendez-vous : </p>
        <a href="liste-rendezvous.php" class="btn btn-info">liste des rendez-vous</a>
    </div>
</div>
</div>
<script src="assets/js/jquery-3.3.1.js"></script>
<script defer src="assets/bootstrap/js/bootstrap.js"></script>

</body>
</html>
