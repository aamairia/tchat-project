Tchat Project
========================
## Présentation

Un tchat 

## Prérequis :
 1. PHP 5.6.35
 2. MYSQL 5.7.21
 3. Apache 2.4.33



## Installation
### Installer les bibliothèques :

Ouvrir une invite de commande dans le dossier du projet et taper les commandes suivantes :

    php composer.phar install


### Mise en place :
 1. Editer le fichier app/config.php
 2. Mettre à jours le fichier avec les données de connexion à la base de donnèes
 4. Créer la base de donnée "[NOM DE LA BASE]" et importer le dump sql se trouvant sous dumps/[date]_db_tchat_app.sql
 5. sous public/ renommer le fichier htaccess.txt a .htaccess

### Configuration VirtualHost :

##Methode 1

Placer vous à la racine du projet puis, Ouvrez une invite de commande dans le dossier du projet et taper les commandes suivantes :

    php -S localhost:8000 -t public

##Methode 2

Sous Windows avec WAMP :

    Ajouter une ligne a /etc/hosts:
    127.0.0.1 test.project.tchat
    
Puis Editer le fichier de configuration des Hôtes virtuelle d'apache sous [DOSSIER_WAMP]\bin\apache\apache2.4.33\conf\extra\httpd-vhosts.conf
et ajouter les lignes suivantes :

    <VirtualHost *:80>
        ServerName test.project.tchat
        DocumentRoot "C:/wamp/www/tchat-project/public"
        <Directory  "C:/wamp/www/tchat-project/public">
            Options +Indexes +Includes +FollowSymLinks +MultiViews
            AllowOverride All
            Require local
        </Directory>
    </VirtualHost>


## Tests
### Accéder au tchat :

    Pseudo : samar
    Mot de passe : samar

ou

    Pseudo : aymen
    Mot de passe : aymen



## Copyright

aamairia @2018
