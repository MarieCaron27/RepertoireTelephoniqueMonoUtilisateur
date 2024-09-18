<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page_acceuil</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php 
        if(isset($_GET["error"]))
        {
            if($_GET["error"] == "ajoutOk")
            {
                echo '<div class="toutvabien"><p>Votre contact a bien été ajouté(e)!</div>';
            }
            
            if($_GET["error"] == "editOk")
            {
                echo '<div class="toutvabien"><p>Votre contact a bien été modifié(e)!</p></div>';
            }

            if($_GET["error"] == "suppressionOk")
            {
                echo '<div class="toutvabien"><p>Votre contact a bien été supprimé(e)!</p></div>';
            }

            if($_GET["error"] == "annulationOk")
            {
                echo '<div class="toutvabien"><p>L\'ajout de votre contact est annulé!</p></div>';
            }
        }
    ?>

    <section>
        <a href="../Controleur/Traitement_ajout_contact.php">
            <article>
                <h1>
                    Nouveau
                </h1>
                <p>
                    <img src="../img/add.png" alt="plus">
                </p>
            </article>
        </a>

        <?php
            if(!empty($mesContacts))
            {
                foreach ($mesContacts as $tableau) 
                { 
                    if($tableau['genre']==='S')
                    { 
                        echo '<article class="gm">';               
                            echo '<h1>Monsieur' . '&nbsp'. $tableau['prenom'] . '&nbsp'. $tableau['nom'] . '</h1>';
                            echo '<p>GSM :'. '&nbsp'. $tableau['gsm'] . '</p>';
                            echo '<p>mail :'. '&nbsp'. $tableau['email'] . '</p>';
                            echo '<footer>';
                            echo '<a href="../Controleur/Traitement_edit_contact.php?PK=' . urlencode($tableau['id']) . '"><img src="../img/edit.png" alt=""></a>';
                            echo '<a href="../Controleur/Traitement_supprime_contact.php?id=' . urlencode($tableau['id']) . '"><img src="../img/delete.png" alt=""></a>';
                            echo '</footer>';
                        echo '</article>';
                    }
                    elseif($tableau['genre']==='A')                
                    {
                        echo '<article class="gf">';               
                            echo '<h1>Madame' . '&nbsp'. $tableau['prenom'] . '&nbsp'. $tableau['nom'] . '</h1>';
                            echo '<p>GSM :'. '&nbsp'. $tableau['gsm'] . '</p>';
                            echo '<p>mail :'. '&nbsp'. $tableau['email'] . '</p>';
                            echo '<footer>';
                                echo '<a href="../Controleur/Traitement_edit_contact.php?PK=' . urlencode($tableau['id']) . '"><img src="../img/edit.png" alt=""></a>';
                                echo '<a href="../Controleur/Traitement_supprime_contact.php?id=' . urlencode($tableau['id']) . '"><img src="../img/delete.png" alt=""></a>';
                            echo '</footer>';
                        echo '</article>';
                    }
                    elseif($tableau['genre']==='E')
                    {
                        echo '<article class="gf">';               
                            echo '<h1>Mademoiselle' . '&nbsp'. $tableau['prenom'] . '&nbsp'. $tableau['nom'] . '</h1>';
                            echo '<p>GSM :'. '&nbsp'. $tableau['gsm'] . '</p>';
                            echo '<p>mail :'. '&nbsp'. $tableau['email'] . '</p>';
                            echo '<footer>';
                                echo '<a href="../Controleur/Traitement_edit_contact.php?PK=' . urlencode($tableau['id']) . '"><img src="../img/edit.png" alt=""></a>';
                                echo '<a href="../Controleur/Traitement_supprime_contact.php?id=' . urlencode($tableau['id']) . '"><img src="../img/delete.png" alt=""></a>';
                            echo '</footer>';
                        echo '</article>';
                    }
                    else
                    {
                        echo '<article class="gnF">';              
                            echo '<h1>'. $tableau['prenom'] . '&nbsp'. $tableau['nom'] . '</h1>';
                            echo '<p>GSM :'. '&nbsp'. $tableau['gsm'] . '</p>';
                            echo '<p>mail :'. '&nbsp'. $tableau['email'] . '</p>';
                            echo '<footer>';
                                echo '<a href="../Controleur/Traitement_edit_contact.php?PK=' . urlencode($tableau['id']) . '"><img src="../img/edit.png" alt=""></a>';
                                echo '<a href="../Controleur/Traitement_supprime_contact.php?id=' . urlencode($tableau['id']) . '"><img src="../img/delete.png" alt=""></a>';
                            echo '</footer>';
                        echo '</article>';
                    }
                }
            }
        ?>
    </section>
</body>
</html>