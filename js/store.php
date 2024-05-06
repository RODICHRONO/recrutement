<?php require('connexion.php') ?>


<?php
        
    if (isset($_POST['register'])) {

        if (!empty($_POST && $_FILES['filecv'])) {
            extract($_POST);

            $file_name = $_FILES['filecv']['name'];
            $file_extension = strrchr($file_name, ".");
    
            $file_tmp_name = $_FILES['filecv']['tmp_name'];
            $file_dest = '../files/' . $file_name;
    
            $extensions_authorises = ['.pdf', '.docx', '.xlsx', '.pub', '.csv'];

            if (in_array($file_extension, $extensions_authorises)) {

                if (move_uploaded_file($file_tmp_name, $file_dest)) {
    
                    $req = $db->prepare("INSERT INTO cvs(nom, prenom, email, telephone, niveauetude, fichier) 
                                    VALUES(:nom, :prenom, :email, :telephone, :niveauetude, :fichier)");
    
                    $inscrit = $req->execute([
                        'nom' => $nom,
                        'prenom' => $prenom,
                        'email' => $email,
                        'telephone' => $tel,
                        'niveauetude' => $nivet,
                        'fichier' => $file_dest
                    ]);
                    
                    echo "<p style='color: green;'>Informations validées avec succès</p>";

                    header('Location: index.php');
                    exit;
    
    
                } else {
    
                    echo "<p style='color: red;'>Informations invalides</p>";
    
                }
            } else {

                echo "<p style='color: red;'>Seul les fichiers documents sont autorisés</p>";
    
            }
        }

    }

?>

<?php require('create.php') ?>