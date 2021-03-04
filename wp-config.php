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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'shine' );

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
define( 'AUTH_KEY',         'E)L2;11ap1.6t_GIEPs4<6JtnG%#;>$T!eX )Z`Vpr1en`a;w<[2(1bLaAgp!8Nt' );
define( 'SECURE_AUTH_KEY',  'y[?-bn!k3p0K_ofg+u%b/:=UgFJN:#HnoVE7@`3z 1EfY/i9MuAPrXYH[n}EQmK)' );
define( 'LOGGED_IN_KEY',    'hc{5v?U2}ZMG6;Ju$sR:L1OuXaTKTODsL}|pSQXF.=Jj{4EKDvWsi9:&V8zQx(1.' );
define( 'NONCE_KEY',        '2waY~MeK|WQUzc>~2k/_(Y,-ujwhm]c[Mp8|yR_Yj1j};3P{=Q1piNXpAAGS,C/n' );
define( 'AUTH_SALT',        '<G(_CAz=d9nGzs&DV]Y+^!8!Z^dR;p#m!6e|BV)Y~Pl0^(L<RB[9v*huwOjCY#f?' );
define( 'SECURE_AUTH_SALT', 'x!K3o5R130:ZRW?hCk{44e )DviY1LL160}g=mKtuPX._)jtr[k*F2ENu(b)46%|' );
define( 'LOGGED_IN_SALT',   'Re8U,#y3w6PoFUPBpdshQf$$;/<dAeVN^i-N1<A2I4-8sO.mAjqXwg0*$Pw TQ8]' );
define( 'NONCE_SALT',       'Q>MEG9D&+#Q?wFI`.Q>VJ&T]}B57Hvcg@;yKUfW*/xZq~:.]KzHGb,8|/pDz nAz' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
