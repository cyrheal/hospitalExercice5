<?php
include 'model/appointments.php';
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
            <th>Profil</th>
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
                <td><a href="rendezvous.php?id=<?= $appointments->id ?>"><input type="button" value="voir profil"></a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>  
<p><a href="ajout-rendezvous.php" class="btn btn-info">retour</a></p>
</div>
<script src="assets/js/jquery-3.3.1.js"></script>
<script defer src="assets/bootstrap/js/bootstrap.js"></script>

</body>
</html>

