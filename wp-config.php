<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'heytesc_prop1');

/** MySQL database username */
define('DB_USER', 'heytesc_prop1');

/** MySQL database password */
define('DB_PASSWORD', 'prop1');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'w_}_iyMDpE7jxC5r<pg)bURPamaWWaUy^Y1`IBS{@4eizUriKNp&A,jAL^Q?1|cC');
define('SECURE_AUTH_KEY',  '7+Q|0s.^^~Dl_jtxj5IQx5+mHoE*6,1}C>t*t{S-+_@u,F<jA&=[$qFSVd:lNJfk');
define('LOGGED_IN_KEY',    'pohbS6D#lIZLo}FF6g7,clJ{fLSXB{5~>vs/hBY._1oI5P{R&o| Ro(_H[AP;=6-');
define('NONCE_KEY',        ',LD^^7d-UmMqg#{430YyY`=^&Lc!b}5uY[.f> Xj`[>H8{P`_uu/~ymjQ6oT4{yC');
define('AUTH_SALT',        'x#(]h/jQW/V*N=&f3<-|j|^E9z9/NKn4AuX z1;4BUt&wdKqgtYRz*-{A|X{W,m+');
define('SECURE_AUTH_SALT', '@mRjxc(Sw.inqd.i%:~BMANs>q|}7rAQc$3t<Q0=HL|+Jg6!cG#Uiii?)U@C]|8{');
define('LOGGED_IN_SALT',   'na!> $H_1OGjo~K-#B[z5NN@wgbtR~jJ4EKx5FLwVuz,BbrfibLIN`K1-u[CBTJ>');
define('NONCE_SALT',       '9>22ujqc%cC]VsK$kjO42*.#(3G#[uYu2Q8xmwARdna/2uuaqFhs*]~@kn:$C~wh');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
