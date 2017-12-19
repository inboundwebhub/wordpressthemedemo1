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

define('DB_NAME', 'Kreativewp');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'mysql');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         't78i2?}8k/PR-I.(435<D[,w*6GCx7G7yDUukW9|OvtC}p q*:bxV#~aa]vA{_-G');
define('SECURE_AUTH_KEY',  'Go|Q#gi=)jW2/H`;7A8&CzJiB*WE-JbPCFj;xCn}GV/E@y9?)4nO<TZhb+Ig^WgN');
define('LOGGED_IN_KEY',    'F|00LBl.B?kExSVJFE?GbCOP0p$@nlfm*t2VbIEFe8R}xY1_,NSf0uuEWw1z&5$Q');
define('NONCE_KEY',        'qJ ;BuL@X4BK`^ivRH;[}@l?>,zn2}i6c},f}{KgKe##~>vB$=2^qeY !KqyAk9U');
define('AUTH_SALT',        '^B%^2ONH3Jbf72K$`T}7#_!5AQ39):;V/2*5KJ#C#.F4sw{rJQP3qviDOuDh_kYa');
define('SECURE_AUTH_SALT', '#/rJD1,N|rEWxe#[)3C4 ) xx-I>A:mqtCs%l{I7;xh8U}D@o#;S*8{17vOWhpS;');
define('LOGGED_IN_SALT',   'b;9tCuuX0:57=f|xg@av~6n[lb~q/0sCtap`qu4NL@gE>eQJ3fYH+_4U6% i8|`h');
define('NONCE_SALT',       'PNVI8A?PS G !B*LA#]+NE;U+D+.ZOLfI>&GzbwrQhg#8[bjxX!/*rY5Y(,+K[(C');

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');