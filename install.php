  
<?php
        session_start();
        $db_username = 'root';
        $db_password = 'root';
        $db_name = 'boisson';
        $db_host = 'localhost';
        

        try{
               
            $dbco = new PDO("mysql:host=$db_host", $db_username, $db_password);
            $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
            $sql = "
            DROP DATABASE IF EXISTS $db_name;
            CREATE DATABASE IF NOT EXISTS $db_name;
            USE $db_name;

            CREATE TABLE Aliment (idAliment int(100) AUTO_INCREMENT  PRIMARY KEY, famille VARCHAR(400), nomAliment VARCHAR(400) NULL, categorie VARCHAR(400) );

            CREATE TABLE Recettes (idRecette int(200) AUTO_INCREMENT PRIMARY KEY, NomCocktail VARCHAR(400) unique ,preparation VARCHAR(4000) ,ingredient VARCHAR(4000), nomIngredient VARCHAR(400));

            CREATE TABLE Utilisateur (id int(100) AUTO_INCREMENT  PRIMARY KEY , nom VARCHAR(400)  NOT NULL ,prenom VARCHAR(400) NULL, sexe VARCHAR(400), date_naiss VARCHAR(400), adresse VARCHAR(400), code_postal VARCHAR(400), ville VARCHAR(400), num VARCHAR(400) ,mail VARCHAR(400)  NOT NULL ,motDePasse VARCHAR(400) NOT NULL );

            CREATE TABLE Panier (id int(100) AUTO_INCREMENT PRIMARY KEY , idUsers int(100) NOT NULL, nomCocktail VARCHAR(400)  NOT NULL);
 
           ";
            $dbco->exec($sql);
                    
            echo 'Base de données créée bien créée !';
            header('Location: Accueil.php');
            }
                
            catch(PDOException $e){
                echo "Erreur : création de la table ".$e->getMessage();
            }
    ?>
 