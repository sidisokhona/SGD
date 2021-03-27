***<h1 align="center">SGD version 1 (v1)</h1>***
Est une application de gestion des Disques(Livre, Appareil, Téléphone....).

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
- node(npm)


### Dépôt Git
 - Clônez le projet dans< br/>
 - cd projet<br/>
 - composer install<br/>
 - npm install<br/>
 - npm run dev ou npm run watch<br/>
 - nommer le fichier exemple.env en .env<br/>
 - Taper la commande : php artisan key:generate<br/>
 - Editer le fichier .env pour renseigner les informations de la base données à partir du bloc qui commence par ligne 9<br/>
 - Si Sqlite gardez uniquement ça et supprimer les restes du bloc qui commence à la ligne 9 -> DB_CONNECTION=sqlite <br/>
 - créer le fichier database.sqlite dans le dossier database<br/>
 - Taper la commande : php artisan migrate<br/>
 - Taper la commande : php artisan db:seed <br/>
 - Taper la commande: php artisan server<br/>
 - Dans votre navigateur taper : localhost:8000<br/>

  





