<?php require('connexion.php') ?>

<?php

if (isset($_GET['iduser'])) {
    extract($_GET);

    $req = $db->query("SELECT * FROM cvs WHERE id=$iduser");

    $users =  $req->fetch();
}

        
    if (isset($_POST['modified'])) {

        if (!empty($_POST && $_FILES['filecv'])) {
            extract($_POST);

            $file_name = $_FILES['filecv']['name'];
            $file_extension = strrchr($file_name, ".");
    
            $file_tmp_name = $_FILES['filecv']['tmp_name'];
            $file_dest = '../files/' . $file_name;
    
            $extensions_authorises = ['.pdf', '.docx', '.xlsx', '.pub', '.csv'];

            if (in_array($file_extension, $extensions_authorises)) {

                if (move_uploaded_file($file_tmp_name, $file_dest)) {
    
                    $req = $db->prepare("UPDATE cvs 
                                            SET nom=?, prenom=?, email=?, telephone=?, niveauetude=?, fichier=? WHERE id=$iduser");
    
                    $inscrit = $req->execute([
                        $nom,
                        $prenom,
                        $email,
                        $tel,
                        $nivet,
                        $file_dest,
                    ]);
    
                    echo "<p style='color: green;'>Informations modifiés avec succès</p>";

                    header('Location: index.php');
                    exit;
    
                } else {
    
                    echo "<p style='color: red;'>Informations non modifiés</p>";
    
                }
            } else {
    
                echo "<p style='color: red;'>Seul les fichiers images sont autorisés</p>";
    
            }
        }

    }

?>

<?php require('edit.php') ?>