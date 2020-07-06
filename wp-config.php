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
define( 'DB_NAME', 'mge943511214841' );

/** MySQL database username */
define( 'DB_USER', 'mge943511214841' );

/** MySQL database password */
define( 'DB_PASSWORD', 'xNWBO+=HuUn0!' );

/** MySQL hostname */
define( 'DB_HOST', 'mge943511214841.db.43511214.6ff.hostedresource.net:3307' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',         '@8N#xhGPp=j6xYB9=$2/' );
define( 'SECURE_AUTH_KEY',  '@jz&CpZ7@Y_p4GZBSca_' );
define( 'LOGGED_IN_KEY',    '&46y KgLAjIDkYBDX2qR' );
define( 'NONCE_KEY',        'vS@d@R+QSN*YSFR2w27N' );
define( 'AUTH_SALT',        '0!0YA6E(bzcZQRTLa7m=' );
define( 'SECURE_AUTH_SALT', '-E$Q1pXP$sBm6kn)pVr3' );
define( 'LOGGED_IN_SALT',   '=ZRZYkB(vTc*38(#I5Z!' );
define( 'NONCE_SALT',       '&abQJVV1Ej/w_NFXqpb#' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_a0w2bmspg3_';

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
//define( 'WP_CACHE', true );
require_once( dirname( __FILE__ ) . '/gd-config.php' );
define( 'FS_METHOD', 'direct' );
define( 'FS_CHMOD_DIR', (0705 & ~ umask()) );
define( 'FS_CHMOD_FILE', (0604 & ~ umask()) );


define( 'FORCE_SSL_ADMIN', true );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';