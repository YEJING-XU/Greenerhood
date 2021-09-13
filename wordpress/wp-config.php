<?php

/**

 * The base configuration for WordPress

 *

 * The wp-config.php creation script uses this file during the installation.

 * You don't have to use the web site, you can copy this file to "wp-config.php"

 * and fill in the values.

 *

 * This file contains the following configurations:

 *

 * * MySQL settings

 * * Secret keys

 * * Database table prefix

 * * ABSPATH

 *

 * @link https://wordpress.org/support/article/editing-wp-config-php/

 *

 * @package WordPress

 */


// ** MySQL settings - You can get this info from your web host ** //

/** The name of the database for WordPress */

define( 'DB_NAME', 'bitnami_wordpress' );


/** MySQL database username */

define( 'DB_USER', 'bn_wordpress' );


/** MySQL database password */

define( 'DB_PASSWORD', 'a3d68612b7b586fcb211d86ac116beb1e5fc465fca9d118219926fff2a7dbb78' );


/** MySQL hostname */

define( 'DB_HOST', 'localhost:3306' );


/** Database charset to use in creating database tables. */

define( 'DB_CHARSET', 'utf8' );


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

define( 'AUTH_KEY',         'zheQ>4Caeu*jp=%8qaJV[D>D]tM;.aPZ}9hhE/CSx>Dj7;^CKcH|y$AW5enmf>Ma' );

define( 'SECURE_AUTH_KEY',  ',1kvF2 )/]R8z,.)6@f&4ue?{7h?Hj7_0CJ#6%az/NcR/!fM#p,O/w?tC-qB5Gcf' );

define( 'LOGGED_IN_KEY',    'V^?L]9N;U,I&7!Voo18)BfrqbS3IpfI*LeIkBzb8b,&ArR7D>.>v-c)H#&|hB4?1' );

define( 'NONCE_KEY',        'P/7cu+qc;h1k#T_sM;C}D@gF:LdpI6l&T_;!yccE Ud2s8bFy>|vW]1Z28PqiY0f' );

define( 'AUTH_SALT',        '+cJG]U-~4L3T%_K#`;QVZ[q.ng:BwWAN^}wQ:QtF%l S:{76?9|ZcYjEdEvKh,31' );

define( 'SECURE_AUTH_SALT', '8%,5I(,147GMd3<^);vinVIi,ow5TXDpl!U &16-p99@f5P@kJl2]#3efTa`!P2o' );

define( 'LOGGED_IN_SALT',   'a0oQZH@GfOLbyij<4LBs1okNR=l3A8Sqn% r(&4.<KA+2F*{X.b9JjMNUEg7f`@9' );

define( 'NONCE_SALT',       '~BNIX/w7Gt<ZI7R+-z,04+j7>{p#u*%,t5U:L6bi|4-${.yWV)pMpTk?wgO&AohX' );


/**#@-*/


/**

 * WordPress database table prefix.

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

 * visit the documentation.

 *

 * @link https://wordpress.org/support/article/debugging-in-wordpress/

 */

define( 'WP_DEBUG', false );


/* Add any custom values between this line and the "stop editing" line. */




define( 'FS_METHOD', 'direct' );
/**
 * The WP_SITEURL and WP_HOME options are configured to access from any hostname or IP address.
 * If you want to access only from an specific domain, you can modify them. For example:
 *  define('WP_HOME','http://example.com');
 *  define('WP_SITEURL','http://example.com');
 *
 */
if ( defined( 'WP_CLI' ) ) {
	$_SERVER['HTTP_HOST'] = '127.0.0.1';
}

define( 'WP_HOME', 'http://' . $_SERVER['HTTP_HOST'] . '/' );
define( 'WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST'] . '/' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */


/** Absolute path to the WordPress directory. */

if ( ! defined( 'ABSPATH' ) ) {

	define( 'ABSPATH', __DIR__ . '/' );

}


/** Sets up WordPress vars and included files. */

require_once ABSPATH . 'wp-settings.php';

/**
 * Disable pingback.ping xmlrpc method to prevent WordPress from participating in DDoS attacks
 * More info at: https://docs.bitnami.com/general/apps/wordpress/troubleshooting/xmlrpc-and-pingback/
 */
if ( !defined( 'WP_CLI' ) ) {
	// remove x-pingback HTTP header
	add_filter("wp_headers", function($headers) {
		unset($headers["X-Pingback"]);
		return $headers;
	});
	// disable pingbacks
	add_filter( "xmlrpc_methods", function( $methods ) {
		unset( $methods["pingback.ping"] );
		return $methods;
	});
}
