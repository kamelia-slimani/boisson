<html>
  <head>
    <meta charset="utf-8">
      <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
      <link rel="icon" type="image/jpg" href="image/logo.png"/>
      <title> WeDrink/Famille</title>
      </head>
      <nav>
                <ul>
                <li><img src="image/logo.png" alt="Logo_page" title="Accueil" id="logo"/></li>
                <li><a href="Accueil.php">ACCUEIL</a></li>
                <li><a href="Famille.php">FAMILLE</a></li>
                <li><a href="Recettes.php">RECETTES</a></li>
                <li><a href="RecettePreferees.php">MES RECETTES PRÉFÉRÉES</a></li>
                <li><a href="Recherche.php">RECHERCHER</a></li>
                <li><a href="MonCompte.php"> MON COMPTE</a><img src="image/icon.png" alt="Logo_page" title="Accueil" id="icon1" /></li>
              </ul>
        </nav>
        <h2 id="fami"> FAMILLE </h2>
        <a id="al">Voici les boissons contenant l'aliment choisi : </a>
  
  <?php
    session_start();
    if(isset($_POST['categ'])){
        $_SESSION['categ']=$_POST['categ'];
    }
    if(isset($_POST['famille'])){
        $choix = $_POST['famille'];
        echo $choix;
    
    if(!isset($_POST['categ'])){
        echo 'iic'.isset($_POST['categ']);
        $choix = $_POST['categ'];
        $_SESSION['categ'] = $choix;
    
        //echo $choix;
    }

        //echo $choix;
    }
    
  
    $db_username = 'root';
    $db_password = 'root';
    $db_name = 'boisson';
    $db_host = 'localhost';        
   
    try{
        $bdd = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_username, $db_password);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $famille = $bdd->query("SELECT distinct(famille) FROM Aliment WHERE categorie LIKE 'super-categorie';");
        $aliment = $bdd->query("SELECT distinct(nomAliment) FROM Aliment ;");
        
        if(empty($_SESSION['categ']) && isset($_SESSION['categ'])){
            $_SESSION['categ'] = $_SESSION['aliment'];
        }
        if(empty($_SESSION['aliment']) && isset($_SESSION['aliment'])){
            $_SESSION['aliment'] = $_SESSION['famille'];
            $_SESSION['categ'] = $_SESSION['famille'];
        }
    
        $val = '|'.$_SESSION['categ'].'|';
        
        $cocktail = $bdd->query("SELECT NomCocktail FROM Recettes WHERE LOWER(nomIngredient) LIKE '%$val%';");
        ?>
       
        <div class="boissonchoisis">
       
            <?php
            while($rowc = $cocktail->fetch(PDO::FETCH_ASSOC)){
                ?>
                <div id="boissonchoisi" >
                <?php
                echo htmlspecialchars($rowc['NomCocktail']);?>
                <?php
                if(strtolower($rowc['NomCocktail'])=="black velvet"){
                    echo '<img id="blackvelvet" src="Photos/Black_velvet.jpg" border="0" />';
                }
                   else if(strtolower($rowc['NomCocktail'])=="bloody mary"){
                    echo '</br><img id="bloodymary" src="Photos/Bloody_mary.jpg" border="0" /> ';
                }
                    else if(strtolower($rowc['NomCocktail'])=="bora bora"){
                    echo '</br><img id="borabora" src="Photos/Bora_bora.jpg" border="0" /> ';
                }
                    else if(strtolower($rowc['NomCocktail'])=="builder"){
                    echo '</br><img id="builder" src="Photos/Builder.jpg" border="0" /> ';
                }
                    else if(strtolower($rowc['NomCocktail'])=="caïpirinha"){
                    echo '</br><img id="caipirinha" src="Photos/Caipirinha.jpg" border="0" /> ';
                }
                    else if(strtolower($rowc['NomCocktail'])=="coconut kiss"){
                    echo '</br><img id="cocokiss" src="Photos/Coconut_kiss.jpg" border="0" /> ';
                }
                    else if(strtolower($rowc['NomCocktail'])=="cuba libre"){
                    echo '</br><img id="cubalibre" src="Photos/Cuba_libre.jpg" border="0" /> ';
                }
                    else if(strtolower($rowc['NomCocktail'])=="frosty lime"){
                    echo '</br><img id="frostylime" src="Photos/Frosty_lime.jpg" border="0" /> ';
                }
                    else if(strtolower($rowc['NomCocktail'])=="le vandetta"){
                    echo '</br><img id="levandetta" src="Photos/Le_vandetta.jpg" border="0" /> ';
                }
                    else if(strtolower($rowc['NomCocktail'])=="margarita"){
                    echo '</br><img id="margarita" src="Photos/Margarita.jpg" border="0" /> ';
                }
                    else if(strtolower($rowc['NomCocktail'])=="mojito"){
                    echo '</br><img id="mojito" src="Photos/Mojito.jpg" border="0" /> ';
                }
                    else if(strtolower($rowc['NomCocktail'])=="piña colada"){
                    echo '</br><img id="pinacolada" src="Photos/Pina_colada.jpg" border="0" /> ';
                }
                    else if(strtolower($rowc['NomCocktail'])=="raifortissimo"){
                    echo '</br><img id="raifortissimo" src="Photos/Raifortissimo.jpg" border="0" /> ';
                }
                    else if(strtolower($rowc['NomCocktail'])=="sangria sans alcool"){
                    echo '</br><img id="sangria" src="Photos/Sangria_sans_alcool.jpg" border="0" /> ';
                }
                    else if(strtolower($rowc['NomCocktail'])=="screwdriver"){
                    echo '</br><img id="screwdriver" src="Photos/Screwdriver.jpg" border="0" /> ';
                }
                    else if(strtolower($rowc['NomCocktail'])=="shoot up"){
                    echo '</br><img id="shootup" src="Photos/Shoot_up.jpg" border="0" /> ';
                }
                    else if(strtolower($rowc['NomCocktail'])=="tequila sunrise"){
                    echo '</br><img id="tequila" src="Photos/Tequila_sunrise.jpg" border="0" /> ';
                }
                    else if(strtolower($rowc['NomCocktail'])=="ti punch"){
                    echo '</br><img id="tipunch" src="Photos/Tipunch.jpg" border="0" /> ';
                }else{
                    echo '</br><img id="logo3" src="image/logo.png" border="0" /> ';
                }
                ?>
                </div> 
                <?php
             }
        
        
             ?>

              
             </div>
             <?php
        if(($famille === false) || ($aliment === false) ){
            die("Erreur");
        }
    }
    catch (PDOException $e){
    
        echo $e->getMessage();
    }
?>
  <body>
 
    <section>
       
        <form method="POST" action="Aliment.php">
            <select name="famille" id ="famille"  onchange= "recupIdSelect(this);">
              
            <?php 

                while($rowf = $famille->fetch(PDO::FETCH_ASSOC)){ 
                    ?>
                    <option value="<?php echo strtolower($rowf['famille']); ?>"><?php echo htmlspecialchars($rowf['famille']); ?></option>
                    <?php  
                    }
                    
                    ?>
                  
            </select> 
            <input id="valider2" type="submit" value="Valider" /></br>
            <div class="chemin">
           <p>Voici le chemin : </p>
           
            <?php  
                    if(isset($_POST['categ'])){
                        $_SESSION['categ']=$_POST['categ'];}
                                
                                if(isset($_SESSION['famille'])){
                                    echo $_SESSION['famille']. ' > ';
                                    
                                }
                                if(isset($_SESSION['aliment'])){
                                     
                                    if(empty($_SESSION['aliment'])){
                                        $_SESSION['aliment']=$_SESSION['famille'];
                                    }
                                    echo $_SESSION['aliment'].' > ';
                                   
                                }
                                if(isset($_SESSION['categ'])){
                                    if(empty($_SESSION['categ'])){
                                        
                                        $_SESSION['categ']=$_SESSION['aliment'];
                                    }
                                    echo $_SESSION['categ'].' > ';
                                   
                                }
                                $_SESSION['famille'] = "";
                                $_SESSION['aliment'] = "";
                                $_SESSION['categ'] ="";
                                ?>
            </div>
        </form>
       
    </section>
         <!--<script>
        function recupIdSelect(elt){
            var element = document.getElementById("famille");
            var textOptSelect = element.options[element.selectedIndex].text;
            document.getElementById('result').innerHTML = textOptSelect;  
        }
        </script> -->        
                 
         
 </body>
</html>
 
        
           
    