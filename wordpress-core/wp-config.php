<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// Autoload composer sooner, and load dotenv so we can use it earlier in the code
use Dotenv\Dotenv;

require_once(__DIR__ . '/../vendor/autoload.php');
(new Dotenv(__DIR__ . '/../'))->load();

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', getenv('DB_NAME'));

/** MySQL database username */
define('DB_USER', getenv('DB_USER'));

/** MySQL database password */
define('DB_PASSWORD', getenv('DB_PASSWORD'));

/** MySQL hostname */
define('DB_HOST', getenv('DB_HOST'));

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 's68cp7LE9e! |6t7uRXssEZBgtjn;D$8>yNxL)2 $p,uYdk|b^DV(&EFQ;V5:T+M');
define('SECURE_AUTH_KEY', 'J$)j:R|K8Y3Hl[T$ xx$m+1ry<n{z-|2BV.nNjL|+z#:(#vfZTz9N!j}-_zhy nK');
define('LOGGED_IN_KEY', 'N>m(gXqhD<jhN|+seF@qNZybxqPvXkC-)D-=qhVhga#CQ}7aTADg5#sal~~MJ1.[');
define('NONCE_KEY', '(u<#^U$V zUu;v?!fo|ht8fH7u. +md`d(/N7$eEXm 2ZFb~-!3lLxNr@|`A4<-^');
define('AUTH_SALT', 'psA7*}B;qA,=WR0:eqJ5n)SQOmp(-5Z{0v72FaTp{UGKIje0[(lX1|g0r:I@|o}S');
define('SECURE_AUTH_SALT', 'k(RO?c0Y^np}E8/@9GIMynDavVj55|yNXi*BvD>e11xxqCKH7e*R/7A6_z5i3jYS');
define('LOGGED_IN_SALT', 'XS>HsS0r<u_)VW|mm$q5jS$`/6S;3&w6]q);n%f3*bSD]Y|p$vEz1)c56{J+t[KK');
define('NONCE_SALT', 'Mp,2e=yYr&!~f0<^B5IlfW=c$9E3%B6eAFpQMGxpd%+{!+19f gy:||hD|*v/c-u');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', getenv('ENV') === 'dev' ? true : false);
define('WP_ALLOW_MULTISITE', true);
define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', true);
define('DOMAIN_CURRENT_SITE', 'streamatemodels.local');
define('PATH_CURRENT_SITE', '/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);

// TLD CONFIG
define('COOKIE_DOMAIN', '');
define('ADMIN_COOKIE_PATH', '/');
define('COOKIEPATH', '/');
define('SITECOOKIEPATH', '/');

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__FILE__) . '/');
}

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
