<?php
include 'model/appointments.php';
include 'controller/rendezvousController.php';
include 'controller/liste-rendezvousController.php';
include 'header.php';
?>

<table class="table">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Date</th>
            <th>Heure</th>
        </tr>
    </thead>
    <tbody>
        <!-- un tableau d objet-->
        <?php foreach ($listAppointments AS $appointments) { ?>
            <tr>                           
                <td><?= $appointments->lastname ?></td>
                <td><?= $appointments->firstname ?></td>
                <td><?= $appointments->date ?></td>
                <td><?= $appointments->hour ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>  
<form method="POST" action="rendezvous.php?id=<?= $appointments->id ?>" class="form">
    <fieldset>
        <legend>Modifier le rendez-vous</legend>
        <label for="lastname"> Nom et prénom du patient : </label>

        <select name="idLastname" id="idLastname">
            <option value="" disabled selected>Choix du patient</option>
            <?php foreach ($patientsList as $patientDetail) { ?>
                <option value = "<?= $patientDetail->id ?>"><?= $patientDetail->lastname . ' ' . $patientDetail->firstname ?></option>
            <?php } ?>
        </select>
        <p><label for="date"> Date du rendez-vous : </label><input type="date" id="date" name="date" value="<?= isset($date) ? $date : '' ?>"/></p>
        <p class="text-danger"><?= isset($formError['date']) ? $formError['date'] : '' ?></p> 
        <p><label for="hour">Heure du rendez-vous (heures d'ouverture 08:00 à 20:00) : </label><input id="hour" type="time" name="hour" min="08:00" max="20:00" value="<?= isset($hour) ? $hour : '' ?>"/></p>

        <div>
            <div class="nav-item">
                <input type="submit" class="valid" value="Valider" name="submit"/></a>
            </div>
        </div>
    </fieldset>
</form>
<p><a href="ajout-rendezvous.php" class="btn btn-info">retour</a></p>
</div>
<script src="assets/js/jquery-3.3.1.js"></script>
<script defer src="assets/bootstrap/js/bootstrap.js"></script>
</body>
</html>