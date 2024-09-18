<?php
    include '../Modele/fonctions.php';
    
    $id=$_GET['id'];

    $erreur = [            
        'suppression'=>''
    ];

    if(!array_filter($erreur))
    {
        $supprnews=DeleteContact($id);

        if($supprnews===false)
        {
            $erreur['suppression']='<p>Nous n\'arrivons pas à supprimer votre contact.</p>';
        }
        else
        {                
            header("location: ../Controleur/Traitement_affichage_contacts.php?error=suppressionOk");
        }
    }

    include '../Vues/index.php';