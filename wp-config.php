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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wpthemes' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'zyrmb_H^D)FS>F05v|XoMw0{ (._{;Co`VQHp#8OwC!=o^3/I>r [eT6BG4><>5q' );
define( 'SECURE_AUTH_KEY',  '>k-xrh[GMnGvT)aQD3/SHF{E }Y>~:6ngd*7{#Dj(eOd5~G]z0xkwaK%Zy?79g+#' );
define( 'LOGGED_IN_KEY',    'K-4HWkw_& u*50{;I)W?5@S]b<NwYA$l%Mx/7fT<~> wKRxe`}l:7^4d}O]Llm]S' );
define( 'NONCE_KEY',        '&<{}egdbLh]:%8W+hH7R}xYR1UF^~ceh`dRmz04K$Xjlr.EL2O(.(}6]fZlwK1gm' );
define( 'AUTH_SALT',        'y#Klr5OR;dbY2y^jZ/~:j?Gr*:fFDJ|7_Ig<+Rhq8r<oxo8+pG*30pzT~81~{Qb)' );
define( 'SECURE_AUTH_SALT', 'hnp@Cn0`BoWc1jB`C)uBitT]3h~OjO8II;~Em9^rGC5ZsDUyZL-WdC8uKh0X3jz(' );
define( 'LOGGED_IN_SALT',   'KNDc2#c?L3z[/Vp$&U))H_&1C$JIx^/.XzPL1nH<;a.>pm* a<Kns}`q-:/|<(rh' );
define( 'NONCE_SALT',       '0]J<>LH^hlX;,EL0nn<USaq]@=tvFUz>`CMBI:$J_Vh*3}!KUo04UY`IZb oHTrW' );

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
