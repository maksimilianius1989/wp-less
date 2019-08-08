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
define( 'DB_NAME', 'wordpress_lessons' );

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
define( 'AUTH_KEY',         '/sj]X-0=n>o)h5!StQg60i;@Znya57_H%5Qs//>z9X_6EdZ 2}#T,QxWO#Q$]CVT' );
define( 'SECURE_AUTH_KEY',  '|?m.p3dBmRDQi+jf{57RPGU5#5RxR:!><H}Oz(fiS2m05*J5Z#oi1MXlN(J#)XKV' );
define( 'LOGGED_IN_KEY',    '8J -=RQ&q#H`KLEBs!B)=V=@#: :U!>?|8F@GR0!<}#&8qJzvr<BZ}|yWj*0P4:s' );
define( 'NONCE_KEY',        'QSYCg<t?#J$C5-qe5e%nAPkKBk<EsAk:(Y0aC.S`V|sgEE/kj;EvzSLCLxP,WpW@' );
define( 'AUTH_SALT',        'jh<Px#0spdH9k8}q{ p3|lQ;Z.#(P:{=g|+v83eO^-NP>Leii*6f]stC$1FFlj{w' );
define( 'SECURE_AUTH_SALT', 'n>mtor:7|9tWR.0E>A{%,!$zd?j+$t1F!w1  4(+|LuRl{.-O8q#F.Do=;A,C/RD' );
define( 'LOGGED_IN_SALT',   'bg/d|o%e)7UutZg+,ZAy&KDk(1^H[I<zhypcc_WY+R&UIsrR A4+gW6BA/r2f5NZ' );
define( 'NONCE_SALT',       'H5Ga}`hi2KK%ddY{=]EKl%[-#~iwqKq4@qOw-k`EY}&z!zhqIbszaykZH 4vLOFa' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpl_';

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
