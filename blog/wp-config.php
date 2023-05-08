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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'rudo-wordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '+eHvFdjM5:):;x4::~zZ;gj]w!3#C!vr:0@3TRqkZY5lS7.owlM73$g3c%!S?CI]' );
define( 'SECURE_AUTH_KEY',  '9z4qU6@:DS8i|qAICeES:84=0`E]>YW8Fqm[B>]]i?1H8^+gY_}:epzLc*/f:Z]L' );
define( 'LOGGED_IN_KEY',    'Ys^[#fhGQed=7#iX/t2%LO`,Y1@woRZ^)xQ>rN[D#Z}oK$M1q0t3.lE3E:X;kPqK' );
define( 'NONCE_KEY',        'n/n(YAu4.WACj($w-m5YCKekTUB5jpyryypO_Cse4DaV6IxR&PQ`%fjoBD}8IM8#' );
define( 'AUTH_SALT',        'p2hA+Mna}Wr71_HaV]h:) #(iFIwXnstLTc%7r&~[o~rF}j%`0kR5oZwjOr8pHO_' );
define( 'SECURE_AUTH_SALT', '^= ._ ,C$O$45~g/C-o^CC>Yp>0$jcPD+y-G_m!P*V0@fgo;$$Ue9qoY/n722ry,' );
define( 'LOGGED_IN_SALT',   'S(.}.4KR3_am]Zow-T^>[u,q}Yvu1DxslF-x~&uP(?!aUmf`#0YAC.:y;aIgQnaG' );
define( 'NONCE_SALT',       '~m)e4*5~y2U4<>hsFxAyCZ!?9l>DPc4C`7%/p8~d[& {P<6<.ooqJ B idQO?i/H' );

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



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
