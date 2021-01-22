# symfony-sunmedia
Prueba precio.com sunmedia
Fabian A. Espinosa H.
+57 3145496329
# create database
php bin/console doctrine:database:create
# create migration
php bin/console make:migration
# execute migration
php bin/console doctrine:migrations:migrate
# import data to database
php bin/console doctrine:database:import dump.sql
# serve 
symfony server:start
# build
yarn encore dev --watch
