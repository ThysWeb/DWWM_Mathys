<?php
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
define( 'DB_NAME', 'Eval_CMS_Front_Mathys' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'root' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

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
define( 'AUTH_KEY',         'AU_um<*?g7W6p Z34b@*Ic#)#!t,zbDo0OJ*S$@u$8h-Ip~0Fgcx(gzN{T{as uL' );
define( 'SECURE_AUTH_KEY',  'WkIveDJliLN!4k,4&Jg&Z^} x6(nfq2.^+H;tYvk=8s@D]QYK[w)<z]Cgzt}#S4C' );
define( 'LOGGED_IN_KEY',    'y]*D^Aeu|mc{v._x|EVRAJVR7u]k#<xE&|h5d`M>Nf),v 1x]{DffFMlv@Ag= tU' );
define( 'NONCE_KEY',        'O4zpTc,iRj6/*/#iR4vK_UU0kUu:;2`9.]5a3r4y4]M4r<w}Se)TRRZ!E/ndWRzw' );
define( 'AUTH_SALT',        'r[U0GN.cC??6j8LkeHe]xkk5Z!L/>W~e(tB4k<f=)JpI`%J9qhe)&=8nDE&,mt6J' );
define( 'SECURE_AUTH_SALT', 'Nc5Lg<(1#6|(eK2rje0Rw0[8{Z4f-6u]O >^*~y2DVS/28#nR2`|?VK`Wtvvz)~A' );
define( 'LOGGED_IN_SALT',   'ByB]5e9yrx+.UD`@^R7)fixfZNk_O23A:.z{(83@,uF;FNj8UHmI0|&rpDtUR``$' );
define( 'NONCE_SALT',       'HFw6 Rz%D<9 h|&RU3ycxt`mrra+eEMmpz,`=h9>g6-qfi=3;p|7q!Bsrcm35SwS' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

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

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
