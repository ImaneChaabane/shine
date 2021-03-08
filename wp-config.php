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
define( 'AUTH_KEY',         '<ggTZT,NAe`mVXk-BV0oCj!#P?y(*v{/Rj;IWQ-;^c{w,ac9QL/gX^!)MoAN;4$#' );
define( 'SECURE_AUTH_KEY',  'k+#@Amex71#}{?29Mg{o,1n);vAyA{6Q:`.J7|Z%,D:h;gP} )S%8Fmf?It(`mXF' );
define( 'LOGGED_IN_KEY',    'zW[mm*Zp=6eUowJMH@QeyTeJK64819*:-zVk7r,{A[0+|YUhRLFQ_2RPSahKWCtb' );
define( 'NONCE_KEY',        '5@p-GQyX$Pe/3H2Pv| [f4YxV`%*_UX,`n@OaS&F*u~/pbSx,r^e&32^8:TjBSix' );
define( 'AUTH_SALT',        '3r%LR<PXeZPsZLz/k[g %lt.w8ul?W)SeY9!<JQs1?8r[YxXK<:?&A,>B>MSXKFI' );
define( 'SECURE_AUTH_SALT', '|pgebBJ5FNaj;_$JH8dM R#v^D]EzKmd2t~Xn&Y}U[|oGfl|eZe_kTtiz51M9m?h' );
define( 'LOGGED_IN_SALT',   'tppz{9O5]9>q)`93Sdo~x7(n+~8l&nkHn}a[ 11Ki_zLOf1`AB!)2jT&7!|g%]9M' );
define( 'NONCE_SALT',       'IUestUO{4BZL4?!Zp-I=df-Y dr-U@~J_4:21(R&hw{8<yXjq5_cIePk)|#DV[2V' );

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
