### Seconde session	Programmation web dynamique	2021-2022

# Examen de seconde session

## Objectif :

Il s'agit de concevoir un répertoire téléphonique basique, mono-utilisateur.

Il s’agira d’implémenter les pages décrites ci-dessous.

*L’évaluation est centrée sur le développement d’une solution dynamique (PHP/MySQL) permettant de réaliser les fonctionnalités demandées ainsi que sur la mise en œuvre de l’architecture Modèle-Vue-Contrôleur présentée lors des laboratoires.*

*Ce sont les conditions nécessaires et suffisantes à la réussite.*

*Pour obtenir une note supérieure, vous tiendrez également compte :*

- *du contenu et de la sémantique associée ;*
- *de la mise en forme (positionnement, mise en forme des formulaires, ergonomie, etc.). La mise en forme proposée dans les captures doit être respectée.*



## Détail des pages :

### **Vue principale**

La vue principale (dont l’ossature est fournie dans le git accompagnant l’examen) affiche un ensemble de tuiles contenant les informations du répertoire :

- La première tuile est un lien permettant d’accéder à une vue qui permet d’ajouter un nouveau contact ;
- Chaque tuile suivante contient 
  - Le prénom et le nom d’un contact, précédé d’une éventuelle civilité (Mr, Mme, …).
  - Son numéro de Gsm (affiché au format +## ### ## ##).
  - Son mail.
  - Deux pictogrammes dirigeant vers des vues qui permettent respectivement de modifier ou supprimer la fiche du contact.
  - Le fond de la tuile est coloré en fonction de la civilité du contact.

  <p align="center"><img src="Aspose.Words.77941d82-8541-43d9-a16e-40219360a0df.001.png" /></p>

### **Ajout de contenu**

L’ajout de contenu affiche :

- Un formulaire comprenant :
  - Une zone de texte obligatoire pour saisir le prénom du contact (obligatoire, caractères alphanumériques, tiret, guillemet simple et espace).
  - Une zone de texte obligatoire pour saisir le nom du contact (obligatoire, caractères alphanumériques, tiret, guillemet simple et espace).
  - Un groupe de boutons radio permettant de spécifier la civilité du contact (Monsieur[S], Madame[A], Mademoiselle[E] ou Non définie[X].
  - Une zone permettant d’encoder l’adresse e-mail du contact (format de mail valide).
  - Une zone permettant d’encoder le numéro de gsm du contact (chiffres, symboles plus, tiret, point, espace, slash). Attention, seul le + de début et les chiffres seront enregistrés dans la base de données.
    +32.486/40.50.20 sera par exemple enregistré +32486405020
- Un lien permet d’annuler l’encodage et de revenir à la vue principale.

### **Modification de contenu**

La modification de contenu fonctionne comme l’ajout, à ceci près que les informations actuelles du contact sont préremplies.

## Script de création :
```
CREATE TABLE repertoire
(
  id      int(11)       NOT NULL AUTO_INCREMENT,
  nom     varchar(50)   NOT NULL,
  prenom  varchar(50)   NOT NULL,
  genre   char(1)       NOT NULL,
  email   varchar(200),
  gsm     varchar(16),
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO utilisateur (nom, prenom, genre, email, gsm) VALUES
('Dupond','Jean','S','mon.mail@mailing.be','+32488845411'),
('Duschmol','Jane','A','son.mailing@mail.be','+32484554411');
```
# RepertoireTelephoniqueMonoUtilisateur
