# IBOOK

IBOOK est un site ou on peut lire et commenter des livres

## Environnement de développement

### Installation

* PHP Minimun 7.2
* Composer

### Lancer l'environnement de développement


```
php bin/console doctrine:database:create
symfony server:start
```

## Intégration des tables

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