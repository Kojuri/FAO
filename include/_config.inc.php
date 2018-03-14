<?php
// ----------------------------------------------------------------------------------------
/* Video
 * 
*/
// ----------------------------------------------------------------------------------------

/**
 * paramètres de configuration de l'application
 */

// gestion d'erreur 
//ini_set('error_reporting', E_ALL);      // en phase de développement
ini_set('error_reporting', 0);        // en phase de production 

// constantes pour l'accès à la base de données

// Serveur MySql
define('DB_SERVER', '');
// Nom de la base de données
define('DB_DATABASE', '');
// Nom d'utilisateur pour se connecter à la base de données
define('DB_USER', '');
// Mot de passe pour se connecter à la base de données
define('DB_PWD', '');

// La dsn en entier
define('DSN', 'mysql:dbname='.DB_DATABASE.';host='.DB_SERVER);

// PDO
define ('PDO_EXCEPTION_VALUE',-99);

// constantes utilisées par l'application
define ('ERROR', 0);
define ('WARNING', 1);
define ('INFO', 2);
define ('SUCCESS', 2);
