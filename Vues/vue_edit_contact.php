<!DOCTYPE html>
<html>
    <head>
        <meta charset=utf-8 />
        <title>Vue_ajout_news</title>
        <link href="../style/style.css" rel="stylesheet" type="text/css"/>
    </head>

    <body>
        <main>
            <form method="POST" id="form4" action="../Controleur/Traitement_edit_contact.php?PK=<?php echo urlencode($_GET['PK']); ?>">
                <h3>Modifier mon contact</h3>

                <div class="form_edit_contact">
                    <input type="text" name ="nom" id="nom" placeholder="Entrez son nouveau nom" <?php if(!empty($nom)){echo 'value= "' . $nom . '"';}?>>
                    <div class="erreur">
                        <?php 
                            if(!empty($erreur['nom']))
                            {
                                echo $erreur['nom'];
                            } 
                        ?>
                    </div>                    
                </div>
                        
                <div class="form_edit_contact">
                    <input type="text" name ="prenom" id="prenom" placeholder="Entrez son nouveau prenom" <?php if(!empty($prenom)){echo 'value= "' . $prenom . '"';}?>>
                    <div class="erreur">
                        <?php 
                            if(!empty($erreur['prenom']))
                            {
                                echo $erreur['prenom'];
                            } 
                        ?>
                    </div>                    
                </div>

                <div class="form_edit_contact">
                    <label for="civilite">Entrez sa civilité</label>
                    <input type="radio" name="civilite" value="S">Monsieur</input>
                    <input type="radio" name="civilite" value="A">Madame</input>
                    <input type="radio" name="civilite" value="E">Madamoiselle</input>
                    <input type="radio" name="civilite" value="X">Non définie</input>
                    <div class="erreur">
                        <?php 
                            if(!empty($erreur['civilite']))
                            {
                                echo $erreur['civilite'];
                            } 
                        ?>
                    </div>
                </div>

                <div class="form_edit_contact">
                    <input type="mail"  name ="mail" id="mail" class="form_controls" placeholder="Entrez sa nouvelle adresse mail" <?php if(!empty($mail)){echo 'value= "' . $mail . '"';}?>>
                    <div class="erreur">
                        <?php 
                            if(!empty($erreur['mail']))
                            {
                                echo $erreur['mail'];
                            } 
                        ?>
                    </div>
                </div>
            
                <div class="form_edit_contact">
                    <input type="phone"  name ="telephone" id="telephone" class="form_controls" placeholder="Entrez son numero de téléphone" <?php if(!empty($telephone)){echo 'value= "' . $telephone . '"';}?>>
                    <div class="erreur">
                        <?php 
                            if(!empty($erreur['telephone']))
                            {
                                echo $erreur['telephone'];
                            } 
                        ?>
                    </div>
                </div>

                <div class="erreur">
                    <?php 
                        if(!empty($erreur['requete']))
                        {
                            echo $erreur['requete'];
                        } 
                    ?>
                </div>

                <div class="form_edit_contact">
                    <button type = "submit" name="modifContact" class="form_controls" id="modifContact">Modifier mon contact</button>
                </div>
            </form>
        </main>
    </body>
</html>
