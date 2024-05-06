<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/boot/css/bootstrap.min.css">
    <title>Modifier un utilisateur</title>
</head>

<body>
    <div class="container mt-5 jumbotron">
        <h2>Modifier <?= $users['nom'] . ' ' . $users['prenom'] ?></h2>
        <form action="update.php?iduser=<?= $_GET['iduser'] ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-5">
                    <label for="">Nom : </label>
                    <input type="text" name="nom" class="form-control" id="" value="<?= $users['nom'] ?>">
                </div>
            </div>


            <div class="row">
                <div class="col-md-5">
                    <label for="">Prenom : </label>
                    <input type="text" name="prenom" class="form-control" id="" value="<?= $users['prenom'] ?>" >
                </div>
            </div>


            <div class="row">
                <div class="col-md-5">
                    <label for="">Email : </label>
                    <input type="text" name="email" class="form-control" id="" value="<?= $users['email'] ?>">
                </div>
            </div>


            <div class="row">
                <div class="col-md-5">
                    <label for="">Telephone : </label>
                    <input type="text" name="tel" class="form-control" id="" value="<?= $users['telephone'] ?>">
                </div>
            </div>

            <div class="row">
                <div class="col-md-5">
                    <label for="">Niveau d'etude : </label>
                    <input type="text" name="nivet" class="form-control" id="" value="<?= $users['niveauetude'] ?>">
                </div>
            </div>

            <div class="row">
                <div class="col-md-5 mt-4">
                    <label for="">Fichier : </label>
                    <input type="file" name="filecv" id="">
                </div>
            </div>

            <button type="submit" name="modified" class="btn btn-primary mt-4">Enregistrer</button>
        </form>
    </div>
</body>

</html>