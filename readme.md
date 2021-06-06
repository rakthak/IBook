# IBOOK

L’ application IBOOK est un site de bibliothèque, où les visiteurs peuvent lire leurs livres préférés. Pour lire des livres, tous les visiteurs doivent créer un compte et se connecter à leur compte. Une fois connectés, ils peuvent lire et aimer tous les livres qu'ils veulent. Et dans l'application il y a des pages dédiées pour l'administrateur, où il/elle peut ajouter, éditer et supprimer les livres et autres informations.
et bien entendu seul l'administrateur valide a le droit d'apporter les modifications après l'authentification du compte.
  

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
symfony console make:migration
```
### d)Création des tables dans phpMyAdmin
```
php bin/console doctrine:migrations:migrate
```

## Mise en place  de l'authentification

```
php bin/console make:auth
```
