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
define('DB_NAME', 'qteksuit_wp293');

/** MySQL database username */
define('DB_USER', 'qteksuit_wp293');

/** MySQL database password */
define('DB_PASSWORD', '.p9b8Sci8)');

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
define('AUTH_KEY',         'yxmvpff1ffxa3vchphwdnrsito2gj7ha7tqr7vjif8jaj5my2mdhkwqpsfh2qziz');
define('SECURE_AUTH_KEY',  'jp1oorzexyoxqaipj57rce3z09olo1c0zpge1f787hbto4qdirkvu7bilxnou8w4');
define('LOGGED_IN_KEY',    'xdarqgzmgvy6ftedqoa42owo90ozsyccn0n2i6uaogmav5acbpe3ivbg1ah7zfb2');
define('NONCE_KEY',        'acgkdywh2k3pylithpb96ku80ra0e5txdrezlczy2r36zi9xuxaoc4ed7tbmlqu8');
define('AUTH_SALT',        '0pst1fq5zthdu6caczu5cp7vkxkzsineilf3zrruoj0yrves8ayes0nnx2je4vsu');
define('SECURE_AUTH_SALT', 'iycmki8fwniyprcfr514nfxadmqaruza66gsou4csimvzkrtwuse0c4g7d8f2u88');
define('LOGGED_IN_SALT',   '3rjyucyfmma1o2w3wwyfqp1afzmouzbztgzms2o8rnacjpedgvvwdrhvt2fxgj6y');
define('NONCE_SALT',       '10pkytk7u1dfbd5ockpfzlvw6hn2fclvp2jhwbkf7tkughak4rpm33wpqezxn8mi');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wpvo_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
