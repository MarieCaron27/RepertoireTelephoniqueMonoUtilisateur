<?php

    include '../Modele/fonctions.php';

    if(isset($_POST['ajoutpersonne']))
    {
        $nom=Securite($_POST['nom']);
        $prenom=Securite($_POST['prenom']);
        $civilite=Securite($_POST['civilite']);
        $mail=Securite($_POST['mail']);
        $telephone=Securite($_POST['telephone']);

        $erreur = [
            'nom'=>'',
            'prenom'=>'',
            'civilite'=>'',
            'mail'=>'',
            'telephone'=>'',
            'ajoutpersonne'=>''
        ];

        if(empty($nom))
        {
            $erreur['nom']='<p>Le nom est un champ obligatoire.</p>';
        }
        else
        {
            $validationNom=ValidationNom($nom);

            if($validationNom===false)
            {
                $erreur['nom'] = '<p>Le nom que vous avez entré est invalide.</p>';
            }
        }

        if(empty($prenom))
        {
            $erreur['prenom']='<p>Le prenom est un champ obligatoire.</p>';
        }
        else
        {
            $validationPrenom=ValidationPrenom($prenom);

            if($validationPrenom===false)
            {
                $erreur['prenom'] = '<p>Le prenom que vous avez entré est invalide.</p>';
            }
        }

        if(empty($civilite))
        {
            $erreur['civilite'] = '<p>La civilité est un champ obligatoire.</p>';
        }

        if(empty($mail))
        {
            $erreur['mail']='<p>L\'adresse mail est un champ obligatoire.</p>';
        }
        else
        {
            $validationMail=ValidationMail($mail);

            if($validationMail===false)
            {
                $erreur['mail'] = '<p>L\'adresse mail que vous avez entré est invalide.</p>';
            }
        }

        if(empty($telephone))
        {
            $erreur['telephone']='<p>Le téléphone est un champ obligatoire.</p>';
        }
        else
        {
            $telephone=ValidationTelephone($telephone);

            if($telephone===false)
            {
                $erreur['telephone'] = '<p>Le téléphone que vous avez entré est invalide.</p>';
            }
        }

        if(!array_filter($erreur))
        {
            $ajoutContact=createContact($nom,$prenom,$civilite,$mail,$telephone);

            if($ajoutContact===false)
            {
                $erreur['ajoutpersonne']='<p>Nous n\'avons pas réussi à ajouter votre message...</p>';
            }
            else
            {
                header("location: ../Controleur/Traitement_affichage_contacts.php?error=ajoutOk");
            }
        }

    }

    include '../Vues/vue_ajout_contact.php';