<?php
    require('connexion.php');
    if (isset($_GET['iduser'])) {
       $iduser = $_GET['iduser'];
    }
    $verif = false;

    if (!empty($_POST)) {
      // print_r($_POST);
      $iduser = $_POST['iduser'];
      $req = $db->prepare("DELETE FROM cvs WHERE id=?");
      $req->execute(array($iduser));
      $verif = true;
    }
    if ($verif == true) {
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <input type="number" hidden value="<?= $_GET['iduser']; ?>">

    <form action="delete.php" method="post">
        <input type="number" hidden value="<?= $_GET['iduser']; ?>" name="iduser">
        Êtes vous sure de vouloir supprimer cette Oeuvre? <br>
        <button type="submit">Valider</button>
    </form>
</body>
</html>