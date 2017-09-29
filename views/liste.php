!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Inscription</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="/views/styles/administration.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, user-scalable=no">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>
<body>
<table>
    <tr>
        <th>Date d'inscription</th>
        <th>Entreprise</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Email</th>
        <th>Hote</th>
        <th>Code</th>
    </tr>
    <?php foreach ($myType as $user){
    ?>

    <tr>
        <td><?php echo $user['date_registration']; ?></td>
        <td><?php echo $user['entreprise']; ?></td>
        <td><?php echo $user['nom']; ?></td>
        <td><?php echo $user['prenom']; ?></td>
        <td><?php echo $user['email']; ?></td>
        <td><?php echo $user['hote']; ?></td>
        <td><?php echo $user['code']; ?></td>
    </tr>
<?php
}
?>