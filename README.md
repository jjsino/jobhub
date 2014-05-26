JobHub Web Site
==============

Solution site web type "recherche d'emploi"

Pre-requis
----------

* PHP 
* MySQL

Installation
------------

- 1 Récupérer le projet avec GIT:`git clone https://github.com/jjsino/jobhub.git'
- 2 Installer les dépendences:
	`php composer.phar update`
- 3 Renommer le fichier:`app/config/parameters_default.yml' en 'app/config/parameters.yml' et modifier la configuration du projet pour votre base de données concernant la partie suivante:
	'parameters:
		database_driver: pdo_mysql
		database_host: <hôte>
		database_port: <numero_de_port>
		database_name: jobhub
		database_user: <votre_login>
		database_password: <votre_mot_de_pass>'
- 4 Créer une base de données 'jobhub' et Migrer les données à l'aide du fichier 'app/jobhub.sql'
- 5 Lancer le serveur PHP et MySql

Plug-in Géolocalisation
------------
- 1 Créer une base de donnée nommée 'geo_plugin'
- 2 Télécharger le fichier de la liste des villes de France: http://sql.sh/736-base-donnees-villes-francaises
