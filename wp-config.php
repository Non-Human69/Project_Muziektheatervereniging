<?php
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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'Project_theater' );

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
define( 'AUTH_KEY',         '*]f*k,i1#SVx@n6UQ>$$b:RQi^oJhKbMvb,pm`ZU&TcbU)1dgpRCr$HI5d#{^@qF' );
define( 'SECURE_AUTH_KEY',  'yT*i5~g*=K<Z !| f@=lU8O7B%u/uvV?15S?un(4TO@AjFVOe1OrD-I3lrg~N$]_' );
define( 'LOGGED_IN_KEY',    'G5}R;OeoX@{x#A]b4<*TZ~Klp75QQY`r76 ncQ2|!MA+&h%3LLSHg(U-Xn~ixAdu' );
define( 'NONCE_KEY',        'VjH=IDZx!X;C=4^T/izcxA$D|&9Va@P(66(O9y:?ql-m<Q JxDN71Ql)|@d,b$_1' );
define( 'AUTH_SALT',        ']T*/ /eum/&JF|Vv(li0Y<g2>&:`;@-d#y&xC-p5h,`j+5$~3i ?U@#L{!M6.r7<' );
define( 'SECURE_AUTH_SALT', '/coXfMHO3A*937dcX}?sN@kF!q=(Xa}iuGs?hz[:;?Vl[<!wy$h.emX>LRF(^hbx' );
define( 'LOGGED_IN_SALT',   '<sK<gV$v#x;_tM0)G>lz@g`orS&UP/pm;zC!BFOO,%;%^?,b&Kr>Ge([;fln(#eS' );
define( 'NONCE_SALT',       'KyO0B=(9^Jz`fM>gsSzRy!vr`S.b&gf*]!3`v^d=g27_f5gStJ.b2zj|xUB-=vn}' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
