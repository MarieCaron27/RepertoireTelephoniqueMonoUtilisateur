<?php
    include '../Modele/fonctions.php';

    $erreur = [ 
        'id'=>'',           
        'nom' => '',
        'prenom' => '',
        'email'=>'',
        'telephone'=>'',
        'requete' => ''
    ];

    if(!isset($_POST['modifContact']))
    {
        $monContact=RechercheContact($_GET['PK']);
                    
        $id=$_GET['PK'];
        $nom=Securite($monContact['nom']);
        $prenom=Securite($monContact['prenom']);
        $civilite=Securite($monContact['genre']);
        $mail=Securite($monContact['email']);
        $telephone=Securite($monContact['gsm']);
    }
    else
    {
        if(isset($_POST['modifContact']))
        {
            $id=$_GET['PK'];
            $nom=Securite($_POST['nom']);
            $prenom=Securite($_POST['prenom']);
            $civilite=Securite($_POST['civilite']);
            $mail=Securite($_POST['mail']);
            $telephone=Securite($_POST['telephone']);

            if(empty($nom))
            {
                $erreur['nom']='<p>Le nom est un champ obligatoire...</p>';
            }
            else
            {
                $validationNom=ValidationNom($nom);

                if($validationNom===false)
                {
                    $erreur['nom'] = '<p>Le nom que vous avez entré est invalide.</p>';
                }
                else
                {
                    $nom=$_POST['nom'];
                }
            }

            if(empty($prenom))
            {
                $erreur['prenom']='<p>Le prenom est un champ obligatoire...</p>';
            }
            else
            {
                $validationPrenom=ValidationPrenom($prenom);

                if($validationPrenom===false)
                {
                    $erreur['prenom'] = '<p>Le prenom que vous avez entré est invalide.</p>';
                }
                else
                {
                    $prenom=$_POST['prenom'];
                }
            }

            if(empty($civilite))
            {
                $erreur['civilite']='<p>La civilite est un champ obligatoire...</p>';            
            }
            else
            {
                $civilite=$_POST['civilite'];
            }

            if(empty($mail))
            {
                $erreur['mail']='<p>L\'adresse mail est un champ obligatoire...</p>';            
            }
            else
            {
                $validationMail=ValidationMail($mail);

                if($validationMail===false)
                {
                    $erreur['mail'] = '<p>L\'adresse mail que vous avez entré est invalide.</p>';
                }
                else
                {
                    $mail=$_POST['mail'];
                }
            }
            
            if(empty($telephone))
            {
                $erreur['telephone']='<p>Le telephone est un champ obligatoire...</p>';            
            }
            else
            {
                $telephone=ValidationTelephone($telephone);

                if($telephone===false)
                {
                    $erreur['telephone'] = '<p>Le téléphone que vous avez entré est invalide.</p>';
                }
                else
                {
                    $telephone=$_POST['telephone'];
                }
            }

            if(!array_filter($erreur))
            {
                $ModifContact=EditContact($id,$nom,$prenom,$civilite,$mail,$telephone);

                if($ModifContact===false)
                {
                    $erreur['requete']='<p>Nous n\'arrivons pas à modifier votre contact.</p>';
                }
                else
                {
                    header("location: ../Controleur/Traitement_affichage_contacts.php?error=editOk");
                }
            }
        }
    }

    include '../Vues/vue_edit_contact.php';