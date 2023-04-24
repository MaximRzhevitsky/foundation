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
define( 'DB_NAME', 'max-foundation' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         'xFaYh8jibE;nKn#%iuH(t$/Y?R;jNA(~&$DpJO@ (%ZZ:V[gOcu)?DHX_5bk6B&B' );
define( 'SECURE_AUTH_KEY',  '@4s*cOd`%+,=Q!aHRqNwM.xC`0 iKp:yxqf>_@Ckt^Z4Di}6}][2u?j3!HvyQ9+t' );
define( 'LOGGED_IN_KEY',    'AQ?>xIv)GcW;W~U[C+;1qL17=@;:C=Y_[;M{SpV.hYUt:,gGDedc7*XxIT4!RH7s' );
define( 'NONCE_KEY',        'gcP/Dt_Hj`1-Sj|R<a]zT5xt3r[ate)KpJ`Am7viCEpP8k$<Q!s=(/#NTL[cpLLV' );
define( 'AUTH_SALT',        'U2?H_Gda|=J.w2lC{x#P=e;I3u49NI64uk /$|Z{}j[{>k1frf[6A9.?{!V_a7K-' );
define( 'SECURE_AUTH_SALT', ',D;o0(V90g6TPYP(oUVCu*c!HSuXm#n-9b}~6uje%G5Ts32zjS*T@FF$!NGxe.pE' );
define( 'LOGGED_IN_SALT',   'tuT~PH^{;790~wnrS%1Bs_uI(r?Y4KLH6^,&E(D{Yry:w{pQ=:_{<I29z6*PXj|]' );
define( 'NONCE_SALT',       '&hY09P>V:0bP8n3Y5M}(|^t= k&I8pOsOX]&CFM7Z$GVT]}8=6(>(wb(wSV)Vkl`' );

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
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
