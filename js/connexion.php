<?php

try {
    $db = new PDO('mysql:host=localhost;dbname=recrutementbd', 'root', '');
    //$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    print('Connexion à la base de donnée : ' . $e->getMessage());
}