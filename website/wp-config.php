<?php

//Begin Really Simple Security session cookie settings
@ini_set('session.cookie_httponly', true);
@ini_set('session.cookie_secure', true);
@ini_set('session.use_only_cookies', true);
//END Really Simple Security cookie settings
//Begin Really Simple Security key
define('RSSSL_KEY', 'CyzrXlZWZg6PsXafpnqAman6dHS8xJIBwcjto8r8uqbwH4itRRKsAH0krhoPP4d5');
//END Really Simple Security key
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'meyzjcmc_wp885' );

/** Database username */
define( 'DB_USER', 'meyzjcmc_wp885' );

/** Database password */
define( 'DB_PASSWORD', 'p]QS5T6Z@9' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'ad85sx7n05dv2nzixshfcbrmcfuscsvexjopcsb39itas9fh1uodtdprgqohcohe' );
define( 'SECURE_AUTH_KEY',  'w6evjdriqtmicryutbfxinhruwrggxf0nrncqkfdmgdg2xiafusosbri42nohfot' );
define( 'LOGGED_IN_KEY',    'uvqtdokfbogc7l55owgac1asousesfcbqxj9uwzkd3mdzibrnzvjhydclq1dxcee' );
define( 'NONCE_KEY',        'es3tpmkvtqq0siuslgqmexfip83w7pp1yu3o2vxjwi1v9nprky4rmqyjghfrpqqx' );
define( 'AUTH_SALT',        'hdlsfjyaurvoiinfgveddv7juypbqnhh8htzacoh1l4ufehhnrqlzdjtv56bhrym' );
define( 'SECURE_AUTH_SALT', 'wmtetwrutekxzi4m1kcsoiduq6bg9lksgenhhodbpo7agdwrbxxobjg5q57gxsfs' );
define( 'LOGGED_IN_SALT',   'o8dd8oyfn9m9t7phvdvv6nadi32grchxoqoaumgikdoj2h04vzp8agtow8ehkkuv' );
define( 'NONCE_SALT',       'j6cqmwlxlpyhzgkzyyz2odlfceqpsfvzphmktflvmxyml8hrzqtfjrgyirj01equ' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wpwk_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
