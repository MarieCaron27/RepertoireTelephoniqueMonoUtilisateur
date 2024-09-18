<!DOCTYPE html>
<html>
    <head>
        <meta charset=utf-8 />
        <title>Vue_ajout_personne</title>
        <link href="../css/style.css" rel="stylesheet" type="text/css"/>
    </head>

    <body>
        <main>
            <form  method = "POST" id="form1" action="../Controleur/Traitement_ajout_contact.php" class="ajoutPersonne">
                <h3>Ajout d'un contact</h3>
                        
                <div class="form_add_person">
                    <input type="text" name ="nom" id="nom" placeholder="Entrez son nom" <?php if(isset($_POST['ajoutpersonne']) && !empty($_POST['nom'])){echo 'value= "' . $_POST['nom'] . '"';}?>>
                    <div class="erreur">
                        <?php 
                            if(!empty($erreur['nom']))
                            {
                                echo $erreur['nom'];
                            } 
                        ?>
                    </div>                    
                </div>

                <div class="form_add_person">     
                    <input type="text" name="prenom" placeholder="Entrez son prenom" <?php if(isset($_POST['ajoutpersonne']) && !empty($_POST['prenom'])){echo 'value= "' . $_POST['prenom'] . '"';}?>>
                    <div class="erreur">
                        <?php 
                            if(!empty($erreur['prenom']))
                            {
                                echo $erreur['prenom'];
                            } 
                        ?>
                    </div>
                </div>

                <div class="form_add_person">
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

                <div class="form_add_person">
                    <input type="mail"  name ="mail" id="mail" class="form_controls" placeholder="Entrez son adresse mail" <?php if(isset($_POST['ajoutpersonne']) && !empty($_POST['mail'])){echo 'value= "' . $_POST['mail'] . '"';}?>>
                    <div class="erreur">
                        <?php 
                            if(!empty($erreur['mail']))
                            {
                                echo $erreur['mail'];
                            } 
                        ?>
                    </div>
                </div>
            
                <div class="form_add_person">
                    <input type="phone"  name ="telephone" id="telephone" class="form_controls" placeholder="Entrez son numero de téléphone" <?php if(isset($_POST['ajoutpersonne']) && !empty($_POST['telephone'])){echo 'value= "' . $_POST['telephone'] . '"';}?>>
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
                        if(!empty($erreur['ajoutpersonne']))
                        {
                            echo $erreur['ajoutpersonne'];
                        } 
                    ?>
                </div>

                <div class="form_add_person">
                    <a href="../Controleur/Traitement_affichage_contacts.php?error=annulationOk">Annuler mon ajout</a>
                </div>

                <div class="form_add_person">
                    <button type = "submit" name="ajoutpersonne" class="form_controls" id="ajoutpersonne">Enregistrer mon contact</button>
                </div>
            </form>
        </main>
    </body>
</html>
