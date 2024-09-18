<?php

    /* Fonction liée à la connexion à la base de données : */ 

    function ConnexionBDD() 
    {
        $connexion = mysqli_connect('localhost', 'root', '', 'repertoire');
         
        if(!$connexion)
        {
            die("Nous n'arrivons pas à vous connecter à la base de donéees :" .mysqli_connect_error());
            exit();
        }
        else
        {
            return $connexion;
        }
    }
 
    /* Fonction qui permet de supprimer les caractères inacceptés : */
 
    function Securite($donnees1)
    {
        $donnees1=trim($donnees1); //Permet de supprimer des caractères inutiles (espaces, retours à la ligne, etc.)
        $donnees1=stripcslashes($donnees1); //Permet de supprimer des caractères inutiles (guillemets, slaches, etc.)
        $donnees1=strip_tags($donnees1); //Permet d'éviter le traitement et l'affichage des caracrtères HTML
 
        return ($donnees1);
    }

    /* Fonctions liées au repertoire */

    function ValidationNom($nom)
    {
        if(!preg_match('/^[A-Za-z0-9\' -]+$/', $nom))
        {
            $resultat=false;
        }
        else
        {
            $resultat=true;
        }

        return ($resultat);
    }

    function ValidationPrenom($prenom)
    {
        if(!preg_match('/^[A-Za-z0-9\' -]+$/', $prenom))
        {
            $resultat=false;
        }
        else
        {
            $resultat=true;
        }

        return ($resultat);
    }

    function ValidationMail($mail)
    {
        if(!filter_var($mail, FILTER_VALIDATE_EMAIL))
        {
            $resultat=false;
        }
        else
        {
            $resultat=true;
        }

        return ($resultat);
    }

    function ValidationTelephone($telephone)
    {
        // Supprimer tous les caractères qui ne sont pas des chiffres
        $telephone=preg_replace('/\D/', '', $telephone);

        // Vérifier si le numéro a la longueur attendue
        if (strlen($telephone) == 11) 
        {
            // Vérifier si le numéro commence par '+32'
            if (substr($telephone, 0, 2) == '32') 
            {
                // Remplacer '+32' par '+324'
                $telephone = '+324' . substr($telephone, 2);
                // Insérer les séparateurs de chiffres
                $telephone = substr($telephone, 0, 7) . substr($telephone, 7, 2) . substr($telephone, 9, 2) . substr($telephone, 11);

                return $telephone;
            }
        }
        else
        {
            $telephone=false;
        }

        return $telephone;
    }

    function createContact($nom,$prenom,$civilite,$mail,$telephone)
    {
        $connexion = ConnexionBDD();
        $requete = "INSERT INTO utilisateur(nom,prenom,genre,email,gsm) VALUES ('$nom','$prenom','$civilite','$mail','$telephone');";
        $result = mysqli_query($connexion, $requete);
        
        if(!$result)
        {
            $result=false;
        }
        else
        {
            $result=true; 
        }
        
        return($result);
        mysqli_close($connexion);
    }

    function AffichageContacts()
    {
        $connexion=ConnexionBDD();

        $requete="SELECT * FROM utilisateur;";

        $resultat=mysqli_query($connexion,$requete);

        $mesContacts = array();
        if($resultat && mysqli_num_rows($resultat) > 0)
        {
            while($line = mysqli_fetch_assoc($resultat)) 
            {
                $mesContacts[] = $line;
            }
        }

        return($mesContacts);
        mysqli_close($connexion);
    }

    function EditContact($id,$nom,$prenom,$civilite,$mail,$telephone)
    {
        $connexion = ConnexionBDD();
        $requete = "UPDATE utilisateur SET nom='$nom',prenom='$prenom',genre='$civilite',email='$mail',gsm='$telephone'
        WHERE id='$id';";
        $result = mysqli_query($connexion, $requete);
        
        if(!$result)
        {
            $result=false;
        }
        else
        {
            $result=true; 
        }
        
        return($result);
        mysqli_close($connexion);
    }

    function RechercheContact($id)
    {
        $connexion=ConnexionBDD();

        $requete="SELECT * FROM utilisateur WHERE id='$id';";

        $resultat=mysqli_query($connexion,$requete);

        if($resultat)
        {
            $monContact=mysqli_fetch_assoc($resultat);
        }
        else
        {
            $monContact=false;
        }

        return($monContact);
        mysqli_close($connexion);
    }

    function DeleteContact($id)
    {
        $connexion = ConnexionBDD();
        $requete = "DELETE FROM utilisateur
                    WHERE id='$id';";
        $result = mysqli_query($connexion, $requete);
        
        if(!$result)
        {
            $result=false;
        }
        else
        {
            $result=true; 
        }
        
        return($result);
        mysqli_close($connexion);
    }

