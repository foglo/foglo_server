foglo server
============

Le serveur PHP pour faire tourner foglo.fr     
Les objectifs du projet, les besoins auxquels il répond, sont synthétisés sur la [page À Propos](http://foglo.fr/about) de l'application web [foglo.fr](http://foglo.fr).    





## Le contexte

Le code publié date du primptemps 2012.   
foglo a été créé par Martin Bonnier (design) et [Guillaume Clochard](http://github.com/guillaumewuip) (développement) pour répondre à l'appel à projets opendata de [Nantes Métropole](http://www.nantesmetropole.fr/) et a remporté le [prix étudiant](http://data.nantes.fr/appel-a-projets/).

Nous publions le code en open-source, sous [licence AGPL](http://fr.wikipedia.org/wiki/GNU_Affero_General_Public_License), pour laisser le projet vivre son cours et nous consacrer en priorité à nos études.   

Nous pensons l'idée de foglo importante et ne voulons pas voir le projet mourir à petit feu par manque de temps à y consacrer.





## Le code

Deux choses à prendre en considération :

- le code se fait vieux 
- il est le travail d'un débutant, il y a propablement des choses pas très belles à voir ...
- mais il est relativement bien commenté



### Framework

foglo est codé à l'aide du framework MVC [CakePHP](http://cakephp.org/), version 2.1.1. La documentation est accessible à [book.cakephp.org/2.0](http://book.cakephp.org/2.0).   
CakePHP est aujourd'hui en version 2.4.3, foglo a du retard.

La sépartion du code sous format MVC (Model, View, Controller) permet une certaine cohérence de l'ensemble.


#### Le modèle MVC

Rapidement, le principe de la structure MVC est de faire correspondre une Table de donnée avec un Modèle (qui gère les modifications des données), un Contrôleur (qui gère l'affichage, le traitement) et des vues (une vue par fonction du contrôleur).

Pour aller plus loin :
- la [structure MVC sur Wikipedia](http://fr.wikipedia.org/wiki/Mod%C3%A8le-vue-contr%C3%B4leur)
- [le modèle MVC selon CakePHP](http://book.cakephp.org/2.0/fr/cakephp-overview/understanding-model-view-controller.html)



### Le coeur 

L'essentiel se passe dans `app/`.    
Les éléments importants sont listés ci-dessous :

```
app/
│
├── Config/ (Configuration de CakePHP)
│   │
│   ├── core.php
│   ├── bootstrap.php
│   ├── database.php
│   ├── routes.php
│   └── ...
│ 
├── Controller/
│   │
│   ├── AppController.php (Authentification, clés APIs)
│   │ 
│   ├── UsersController.php (Gestion des comptes utilisateurs)
│   ├── GroupsContoller.php (Vide, correspond au Model Group)
│   │
│   ├── WidgetsController.php (Gestion des widget - ajout, suppr, refresh, etc.)
│   ├── UpagesContoller.php (Gestion des dashboard des utilisateurs)
│   ├── PositionsController.php (Gestion des positions des widgets sur un dashboard)
│   │ 
│   ├── TanController.php (Travail sur les lignes TAN - lignes d'un arrêt, directions d'une ligne)
│   ├── LilasController.php (Travail sur les lignes Lila - HS)
│   ├── IndicesController.php (Travail sur les indices qualité de l'air)
│   │ 
│   ├── PagesController.php (Gestion des pages statiques)
│   └── ContactsController.php (Formulaire de contact)
│   
├── Model/
│   │
│   ├── AppModel.php (Sanitize des entrées)
│   │
│   ├── User.php (Associations avec Group, Widget, Upage / règles de validation)
│   ├── Group.php (Associations avec User)
│   │
│   ├── Widget.php (Associations avec User, Upage, Data, Position / règles de validation / météo Yahoo!)
│   ├── Data.php (Associations avec Widget / règles de validation - 4 champs de données pour chaque widget, utilisé selon les cas)
│   ├── Upage.php (Associations avec Widget, Position / règles de validation)
│   ├── Position.php (Associations avec Widget, Upage)
│   │
│   ├── Tan.php (Liaison table tan / traitements sur les lignes Tan)
│   ├── Lila.php (Liaison table lila / traitements sur les lignes Lila)
│   ├── Parking.php (Liaison table parking)
│   │
│   └── ...
│   
├── View/ (les différentes vues)
│   │
│   ├── Layouts/ (Les différents layouts)
│   │
│   ├── Widgets/ (Les vues génériques pour les Widgets - add, edit, refresh)
│   ├── Elements/
│   │   │
│   │   ├── widgets/ (un élement par widget, appelé par View/Widgets/refresh.ctp)
│   │   │   │
│   │   │   └── ... 
│   │   │
│   │   └── ... (des éléments divers : header, sidebar, etc.)
│   │
│   └── ... (un dossier par Controller, un fichier .ctp par fonction du Controller)
│
└── webroot/
    │
    ├── css/
    │   │
    │   ├── style.css (tout le css à la queue leu leu, +3000 lignes, hahem ...)
    │   └── ...
    │
    ├── files/
    │   │
    │   ├── lila_gtfs/
    │   └── ...
    │ 
    ├── img/ (des images, icônes pour les widgets, etc.)
    │
    ├── js/ 
    │   │
    │   ├── main.js (tout le js à la queue leu leu, jQuery, ~2000 lignes, ...)
    │   └── ...
    │
    └── ...
```

La base de donnée qui correpond à tout ça est de la forme :
```
foglo/
├── datas
├── groups
├── indices
├── lilas
├── parkings
├── positions
├── tans
├── upages
├── users
└── widgets
```

(voir `foglo.sql` pour une base préremplie)



### Front-end

A l'heure actuelle, un des gros points négatifs concerne le css et le javascript : 

- foglo n'utilise pas de framework HTML/CSS (Boostrap ou autre)   
- pas de framework MVC Javascript non plus (Angular, Backbone, etc.)
    

Il n'y a qu'un seul fichier css `webroot/css/style.css` (plus quelques librairies) :

- +3000 lignes
- ne suit pas de guidelines (comme [CSS-Guidelines](https://github.com/flexbox/CSS-Guidelines/blob/master/README.md))
- n'est pas orienté CSS Objet
- n'utilise pas de préprocesseur (comme Sass)
- bref, c'est du CSS débutant ...


Il n'y a qu'un seul fichier javascript `webroot/js/main.js` pour tout gérer (plus quelques librairies) :

- utilisation de jQuery
- tout est dedans (petites animations, tout les dialogues AJAX pour les widgets, etc.)
- bref, c'est le bazard





## Contribuer

Pour développer pour foglo, vous pouvez commencez par forker le projet.    
Nous acceptons bien entendu les pull-request. Mais nous nous réservons le droit d'en laisser de côté, si la modification ne correspond pas à l'idée que nous avons de foglo.

Pour installer foglo sur votre server PHP, vous aurez besoin de charger la base de donnée `foglo` (importez `foglo.sql` qui contient une base préremplie).

Comptes :
- admin (un administrateur)
    id : `admin@foglo.fr`
    mdp : `admin`
- user (un utilisateur lambda)
    id : `user@foglo.fr`
    mdp : `essai` 

Le compte admin a déjà des widgets et des Upages.    
Le compte user est vide.    


### Installation sous Linux (Debian/Ubuntu)

Sous linux, il faut installer Apache2, MySQL, PHP5 et Git (pour cloner le dépôt) avec les commandes :

    sudo apt-get update
    sudo apt-get install apache2 php5 mysql-server libapache2-mod-php5 php5-mysql git
    
    cd ~/
    git clone https://github.com/foglo/foglo_server.git
    sudo ln -s $PWD/foglo_server /var/www/foglo_server
    cd foglo_server/

Puis il faut ajouter un virtual host dans la configuration d'Apache2. 
Le plus simple est de copier le fichier `foglo.vhost`.

    sudo cp foglo.vhost /etc/apache2/sites-available/foglo.local
    sudo a2ensite foglo.local
    sudo a2enmod rewrite
    sudo service apache2 reload

Il faut aussi éditer le ficher `/etc/hosts` avec un éditeur de texte et changer la ligne :

    127.0.0.1       localhost

par :

    127.0.0.1       localhost foglo.local

Ensuite, pour charger la base de données, faire la commande :

    mysql -u root -p < foglo.sql

Enfin, il faut créer les répertoires temporaires pour CakePHP et modifier leurs droits d'accès :

    mkdir -p app/tmp/cache/persistent
    mkdir -p app/tmp/cache/models
    sudo chown -R www-data:www-data app/tmp/

Si tout va bien, dans votre navigateur web l'URL http://foglo.local/ devrait afficher le site web foglo.


## Développer foglo


Nous souhaiterions organiser le développement de foglo via deux outils dans le but d'avoir un workflow cohérent :

-   Trello (voir l'organisation [foglo](https://trello.com/foglo) publique)    
    Pour lister les idées / amélioration     
    Pour assigner des tâches à certaines personnes     
    Pour suivre l'évolution du projet     

-   Google Drive (voir le dossier [foglo](https://drive.google.com/folderview?id=0B5QwbGi-CtRAOFFBcDFPWndMY0E&usp=sharing) public)    
    Pour documenter plus en profondeur certaines idées (histoire utilisateur, schéma, mockup, etc.)    


Et respecter ce processus de développement : 

![Process](https://docs.google.com/drawings/d/1Xyh3efL6brmq41UdqD52PLchwJWnyUW_9RVSBksmDVk/pub?w=960&h=720 "Process : utilisation des boards foglo")

Plus ici sur le fonctionnement du processus : [Contribuer](contribuer.md).





## Historique


- Primptemps 2012 : développement du projet foglo
- 25 juin 2012 : remise du prix étuditant du concours [opendata Nantes Métropole](http://data.nantes.fr)
- Semptembre 2012 : nouveaux widgets
- Décembre 2013 : publication du code en open-source





