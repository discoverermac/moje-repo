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
define('DB_NAME', 'localsitDBd2osv');

/** MySQL database username */
define('DB_USER', 'localsitDBd2osv');

/** MySQL database password */
define('DB_PASSWORD', '9bkQ3hKyeH');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

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
define('AUTH_KEY',         '+Sl1]<aee2O@~!VVO##Zhh5}}cnjB4oorFFb2mmiE^uES#ha]];ii@VR[04sl9DG');
define('SECURE_AUTH_KEY',  'BA^mP>rXB#pa]*P6:od}:_ZWd::F$z^UU}!!Vg40P*^<bbU,,Yff3OP_##WP<.]ei');
define('LOGGED_IN_KEY',    '^gc}3nne22DttHAAu++Lh89G--tHK~#_SnrBJ^@ckGV}4v3qyQjAI.,cjFU{3vtLS');
define('NONCE_KEY',        'b;yQb6E$-SW5G_#deiDS]2t:ksNZ48zwSV1CK|F^,crIQ{}goJY3B@6y*bmuPQ{u');
define('AUTH_SALT',        '-poCCwpp9KK~00orFFCwszNN!yyMTT<$QMX<<Dxx~OS_++LWT<CC-@ROK-~_VW[BF');
define('SECURE_AUTH_SALT', '}@,UUL*+.WTM^^TbX{:#[ddW]#;ei2RN|>[ZRS|:gdyMMU<,@RR!}>cPT<;]eX{<;');
define('LOGGED_IN_SALT',   'VN@@mmqHE+qrAMM^12pwKKDxx*PP_z-NRV|wwKNO!7rnyIIBvv@QQ,6Au+xPE$$*');
define('NONCE_SALT',       'rR!@!VV>AAu$yMFFv$yMie;22le2Atu[ZZd11lea;11lQU,>,UNJ@|!Rmn7EEynB');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);define('FS_METHOD', 'direct');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
