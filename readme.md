# IBOOK

IBOOK est un site ou on peut lire et commenter des livres

## Environnement de développement

### Installation

* PHP Minimun 7.2
* Composer
* Webpack encore
* bootstrap 5

### Lancer l'environnement de développement


```
symfony server:start ou symfony serve -d (pour travailler dans le même terminal 
```

## Intégration des tables

### Connection à la base de données
```
php bin/console doctrine:database:create
```


### Création des entités

```
symfony console make:entity
```
### Création des requêtes dans la migration
```
symfony console make:migartion
```
### Création des tables dans phpMyAdmin
```
php bin/console doctrine:migrations:migrate
```