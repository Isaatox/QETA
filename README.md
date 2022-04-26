<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## A propos de QETA

Qeta est une application web de question réponses pour les utilisateurs, tout le monde peut réponde a chaque questions posées. Ainsi si une question parrait anormal elle peut alors être signalé de même pour un commentaire.

## Déployé l'application sur Heroku

- Dans un premier temps rendez-vous sur https://dashboard.heroku.com/ et créer vous un compte si ce n'est pas déjà fait.

- Ensuite il faut que vous ayez votre projet qui se trouve dans un et un seul répertoire. Tout dans le répertoire racine du projet.

- Suite à ça on peut commencer le déploiement en effectuant les 3 commande suivante : 
    echo "web: vendor/bin/heroku-php-apache2 public/" > Procfile
    git add .
    git commit -m "Procfile for Heroku"
*Ceci va permettre de créer le fichier Procfile qui permettra le déploiement.*

- Ainsi il vas voir créer l'application avec heroku pour cela il faut faire : **heroku create**

- Par la suite on va configurer notre premiere variable d'environnement APP_KEY.
    - Tout d'abord il vas falloir récupérer la clé généré avec la commande : *php artisan key:generate --show*
    - Ensuite copiez la clé et *heroku config:set APP_KEY=…*
    insérez la à la place des ...

- Enfin vous pourrez faire un push dans votre branche master (ou main) avec la commande suivante *git push heroku master*

- Et pour finir vous pouvez effectuer la dernière commande qui est *heroku open* qui vas vous permettre d'afficher le site.

## La base de donées avec heroku

- Pour alimenter votre site avec une base de données il faudra alors créer les différentes variable qui sont : 
    - DB_CONNECTION
    - DB_DATABASE
    - DB_HOST
    - DB_PASSWORD
    - DB_PORT
    - DB_USERNAME
    Ainsi vous pouvez les créer directement dans le dashboard de Heroku après vous n'avez plus qu'a mettre vos valeurs

- Bien entendu vous n'êtes en aucun cas obligé d'avoir votre base de donées hébergé sur Heroku