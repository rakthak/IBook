# IBOOK

IBOOK est bibliothèque de livres. On doit être inscrit pour pouvoir se connecter et ainsi lire les livres  

## Environnement de développement

### Installation
* SYMFONY (5.2.9)
* PHP Minimun 7.2 actuellement 8.0.2
* Composer
* Webpack encore
* bootstrap 5

### Lancer l'environnement de développement


```
symfony server:start ou symfony serve -d (pour travailler dans le même terminal 
```

## Intégration des tables

### a)Connection à la base de données
```
php bin/console doctrine:database:create
```


### b)Création des entités

```
symfony console make:entity
```
### c)Création des requêtes dans la migration
```
symfony console make:migartion
```
### d)Création des tables dans phpMyAdmin
```
php bin/console doctrine:migrations:migrate
```

## Mise en place  de l'authentification
```
