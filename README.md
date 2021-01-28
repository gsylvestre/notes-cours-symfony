### Instructions d'installation

```
git clone https://github.com/gsylvestre/leboncoin-eni.git  
cd leboncoin-eni  
composer install
```

Créer le fichier .env.local et y configurer la connexion à la base de donnée, puis...  
```
php bin/console doctrine:database:create
php bin/console doctrine:schema:update --force
```