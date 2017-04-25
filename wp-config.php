<?php

// BEGIN iThemes Security - Do not modify or remove this line
// iThemes Security Config Details: 2
define( 'DISALLOW_FILE_EDIT', true ); // Disable File Editor - Security > Settings > WordPress Tweaks > File Editor
// END iThemes Security - Do not modify or remove this line

/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'elleetla-new');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'root');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/* empeche la MAJ automatique de wp */
define( 'WP_AUTO_UPDATE_CORE', false );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'GZ@9,pB-+z#5!i}E<>F^-~P[/~>|[GVv`DnVW*t]|>f%>] -FpHUfPz=XB=UJag}');
define('SECURE_AUTH_KEY',  'MMtv?J(d.{c@ T0<P|edlh9t vcKq-?szcrw8wYd8`aH:&y-?]MnkCqQ)63u@0XO');
define('LOGGED_IN_KEY',    'c+GfCsx=D|}1 L|+!X$mX7$],6wG9I}3F{e&)R`B1|~~_xUc+92g+-2x>& }A[15');
define('NONCE_KEY',        '+y^C!kR#ioV_WX2|7?d3im>z}q5|A!)t#09M-f0]&N>yf7,|So?V!can1*gXo+p4');
define('AUTH_SALT',        'X`8!1 ,wt-)04^k.R:,@9BF[Z}y[Z!KqPKx8n+Nu!/uuU4$+-:zVqJo.PR;*2Vs|');
define('SECURE_AUTH_SALT', 'r[j&ty4xgJ`-zDha%^k-FS3G<&$FkwV} ut6QDN5@/T*i%wsxa;shK|Vv5Jk|4f|');
define('LOGGED_IN_SALT',   'eBZFt#>-yPQ^A@EQAN)C~);:i[(41,1FQ(_-/3ko}nNLx85nFONe-6:YybVN(M@7');
define('NONCE_SALT',       'v)WAJ$UP1Gqb:Iby-AH ~A@)xy|t,hlI63M`T=^oU9!!?DO@JGlrNm|Z4ddSDjaa');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'wopep_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');