***<h1 align="center">SGD</h1>***
Est une application de gestion des Disques.

# Les tables :
- Disc(+id,nom, price,rayQuantity, stockQuanty, #author_id, #ray_id, #discType_id)
- Author(+id, name)<br/>
- DiscType(+id, name)<br/>
- Ray(+id, name)<br/>


## Installation

### Prérequis
- PHP 7-* <br/>
- Apache <br/>
- Composer <br/>
- nodejs


### Dépôt Git
 - Clônez le projet dans< br/>
 - cd projet<br/><br/>
 - composer install<br/>
 - npm install<br/>
 - npm run dev ou npm run watch<br/>
 - nommer le fichier exemple.env en .env<br/>
 - Taper la commande : php artisan key:generate<br/>
 - choix de base de données ligne 9 dans .env: <br/>
 - Si DB_CONNECTION=sqlite -> créer le database.sqlite dans le dossier database<br/>
 - Taper la commande : php artisan migrate<br/>
 - Taper la commande : php artisan db:seed <br/>
 - Taper la commande: php artisan server

  




### Installation du package
    $ sudo aptitude install php-mongodb #sur debian
    $ sudo pecl install mongodb #avec pecl

