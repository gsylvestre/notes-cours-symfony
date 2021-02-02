# Les commandes de console Symfony utiles

## Pour installer Symfony 
```shell
cd /wamp64/www/
composer create-project symfony/website-skeleton nom_projet
cd nom_projet/
composer require apache-pack
```

## Pour mettre à jour Symfony 
```shell
composer update
```

## Pour générer du code

```shell
# génère un contrôleur
php bin/console make:controller

# génère une entité OU la modifie
php bin/console make:entity

# génère une classe de formulaire 
php bin/console make:form 

# génère une commande de console perso 
php bin/console make:command
```

## Pour la base de données
```shell
# Crée la base de données configurée dans .env.local
php bin/console doctrine:database:create

# Met à jour les tables
php bin/console doctrine:schema:update --force
```