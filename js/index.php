<?php require('connexion.php') ?>

<?php

        $req = $db->query("SELECT * FROM cvs");
        
        $users = $req->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/boot/css/bootstrap.min.css">
    <link rel="stylesheet" href="../font/css/font-awesome.min.css">
    <title>Listes des candidats </title>
</head>

<body>
    <div class="container mt-5">
        <h1>Listes des utilisateurs</h1>
        <a href="store.php" class="btn btn-primary mb-4">Ajouter un candidat</a>
        <i class="bi-alarm"></i>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Téléphone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Niveau Etudes</th>
                    <th scope="col">Fichier</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <th scope="row"><?= $user['nom'] ?></th>
                        <td><?= $user['prenom'] ?></td>
                        <td><?= $user['telephone'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['niveauetude'] ?></td>
                        <td><a href="<?= $user['fichier'] ?>" class="btn btn-primary">Charger le CV</a></td>
                        <td>
                            <a href="<?="./update.php?iduser=".$user['id']?>">
                                <button type="submit" class="btn btn-primary mx-1">Modifier</button>
                            </a>
                            <a href="<?="./delete.php?iduser=".$user['id']?>">
                                <button type="submit" class="btn btn-danger mx-1">Supprimer</button>
                            </a>
                        </td>

                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>

</html>