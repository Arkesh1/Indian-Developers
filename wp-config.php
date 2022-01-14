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
define( 'DB_NAME', 'id_db' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         'pi+73*3zX9,B#OG7^)4g6>eJrU2)>zlAsl2{N6[O+|);l0;N`(DH6>p5N{;nCs!t' );
define( 'SECURE_AUTH_KEY',  'X#sVRYW=P!,;RsZEpQ*9l.Bi}uxEl*bzJFYLaWhT>Hpds_#6cUMKT/*c @z%}1W6' );
define( 'LOGGED_IN_KEY',    'A{@rb8wv,!bYe<F7`>Bb0o[>:^s`hQAgf^WxJ[G/`<n9+YY8&##5VKKk_UoY}31l' );
define( 'NONCE_KEY',        'czY[d)USx0nJ.(yQ!l&}8D@#x9$BU;4PW?~l[b [Nq~wyU>{/]lMuL=$pxF~W25*' );
define( 'AUTH_SALT',        '`I;lnSk9>y={HUV5C~wBfYiM[&&]_dVsgL)9~@+UY@(+jxM)PpW[zO&3slD&y%(M' );
define( 'SECURE_AUTH_SALT', 'l6MS8F_=:XNUEUP)F4YKy;mb3xGckFC vvBzT~Y>ck>i(,P2t>Fv%-Uxo{z:97;U' );
define( 'LOGGED_IN_SALT',   'LhirU|A3lUA&|X.%K): C H]Lqu1RMl=|M#g<DX_`^OF$v.[Ttj@;lBQ1r[l%-d@' );
define( 'NONCE_SALT',       '5;Ff* M1 ow+y;/FtXIy/9WV?> IcLyHWg#LY~b!RzrAS.*=q~.^F?YNSQ^]uicc' );

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
