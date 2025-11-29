# ✈️ Gestion des Réclamations des Passagers – Aéroport Habib Bourguiba Monastir

Ce projet est une application web permettant aux passagers de l’Aéroport Habib Bourguiba Monastir de soumettre des réclamations, des demandes d’information ou des commentaires via un formulaire en ligne.  
Un espace administrateur permet également de consulter l’ensemble des messages reçus.

Ce prototype a été développé dans le cadre d’un **projet de stage**, dans le but d’améliorer la communication entre les passagers et le service assistance de l’aéroport.
##  Présentation générale

L’application offre :

- une **interface publique** permettant aux passagers de contacter l’aéroport ;
- un **espace sécurisé pour l’administrateur** afin de consulter les réclamations ;
- un **système d’envoi de mails** via PHPMailer pour notifier le service concerné.

Elle se compose principalement de :

- `index.html` – page d'accueil et formulaire de contact  
- `liaison.php` – traitement des messages envoyés  
- `mail.php` – envoi des emails via PHPMailer  
- `login.html` / `login.php` – authentification administrateur  
- `view.php` – affichage des messages reçus  
- `logout.php` – déconnexion  
- `style.css` – design et mise en forme générale  
- `PHPMailer.php` – librairie d’envoi d’emails



##  Objectifs du projet

- Faciliter la communication entre l’aéroport et ses passagers.  
- Moderniser le traitement des réclamations via une interface numérique.  
- Automatiser l’envoi d’emails de confirmation/notification.  
- Simplifier le travail du service support grâce à une interface d’administration.  
- Proposer un design responsive adapté à un contexte professionnel.



##  Fonctionnalités

###  Côté Passager
- Formulaire complet : **Nom, Email, Sujet, Message**  
- Choix du type de requête :
  - Informations sur les vols  
  - Bagages perdus  
  - Commentaires  
  - Autres demandes  
- Enregistrement du message via PHP  
- Envoi automatique d’un email via **PHPMailer**  
- Interface responsive avec animations CSS

###  Côté Administrateur
- Page de connexion sécurisée  
- Gestion de session (login/logout)  
- Tableau dynamique des réclamations reçues  
- Visualisation des messages en temps réel  
- Interface simple, claire et adaptée au personnel aéroportuaire



##  Architecture du Projet

###  Pages principales
- `index.html` – Accueil & formulaire passager  
- `login.html` – Connexion administrateur  
- `view.php` – Tableau des réclamations  
- `liaison.php` – Traitement des formulaires  
- `mail.php` – Envoi mail (PHPMailer)  
- `logout.php` – Déconnexion  
- `style.css` – Feuille de style principale

###  Design
Basé sur :
- palette bleu & blanc inspirée du design aéronautique ;  
- image de fond (`ab.jpg`) ;  
- animations CSS (`fadeIn`, `fadeInUp`, `fadeInDown`) ;  
- mise en page responsive et moderne.



##  Structure Simplifiée

```text
projet-reclamation/
 ├─ index.html
 ├─ login.html
 ├─ login.php
 ├─ logout.php
 ├─ liaison.php
 ├─ mail.php
 ├─ view.php
 ├─ PHPMailer.php
 ├─ style.css
 ├─ images/
 │   └─ ab.jpg
 └─ README.md
```

### Prérequis pour l'instalation
- Serveur local : **XAMPP**, **WAMP**, **Laragon**  
- PHP 7+  
- PHPMailer (fourni)  
- MySQL 


