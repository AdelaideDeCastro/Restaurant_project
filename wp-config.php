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
define( 'DB_NAME', 'bacco' );

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
define( 'AUTH_KEY',         'scicJ4=]m6?i](CY*Ni{Ah4(Z)a@k9*uBBXmZ#z{hHb.~.CMr /s06-f2B:PMw/#' );
define( 'SECURE_AUTH_KEY',  'IDP*@x^Laq ye5q.dM?~<.S@u_>#UMR9!sEiD]c{_g@KK]KzmJJOj4%?w7iU`wKW' );
define( 'LOGGED_IN_KEY',    'V(~k(22TD_/JrM*#9Sy@zMWKuIy}{N kzdLu`0O(8sO}KPbse|vPwvH<sl}q&I#V' );
define( 'NONCE_KEY',        'usTV4W0A#u`%r*-*bZ.B ;raK`|8]wi<Qy+XbmUU|Tu82B~)mcou%px:%fGK3.z>' );
define( 'AUTH_SALT',        '5<:V!C/cQekVQ@PK,tY8<v.P0qQjj$m%,]U)In}@^ImK^cP)p{uRL_wW86enjz!B' );
define( 'SECURE_AUTH_SALT', 'FOyXX-DXDxK2pASpQn{0[0s5U3= ab@OJ/PN%-WEDq%<LkQH&+VTOdZZunyIC},,' );
define( 'LOGGED_IN_SALT',   'd)k`.2%z?}`)#quLc~<d,Hiqg?]P6WSWzew[dL|yPcBr2^mZo0Gcx)644lkv4-Ww' );
define( 'NONCE_SALT',       ' F*Y9%R{6 3l:#IF[0Z,]bx@V0VFNfyD:y&=w2nq=6&x=oxC-FPYMJk7xxX&,|Rl' );

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
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
