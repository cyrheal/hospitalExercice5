<?php
include 'model/patients.php';
include 'controller/liste-patientsController.php';
include 'header.php';
?>
<table class="table">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>profil</th>
        </tr>
    </thead>
    <tbody>
        <!-- un tableau d objet-->
        <?php foreach ($patientsList as $patient) { ?>
            <tr>
                <td><?= $patient->lastname ?></td>
                <td><?= $patient->firstname ?></td>
                <td><a href="profil-patient.php?id=<?= $patient->id ?>"><input type="button" value="voir profil"></a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>  
<p><a href="ajout-patient.php"><input type="button" value="Ajouter un nouveau patient"></a></p>
</div>
<script src="assets/js/jquery-3.3.1.js"></script>
<script defer src="assets/bootstrap/js/bootstrap.js"></script>

</body>
</html>
