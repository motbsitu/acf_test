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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'cG8FQ7FVnVL3FALDy7s6rUvy+fJcdDG6ACcjlLIyTSmpGUDH/sKZDOio+HS1bs8pKiv1J8kNtkpRL41GEVhjHQ==');
define('SECURE_AUTH_KEY',  'KR0SFVX0HiZ/9TejXYP065lS44HRg6LdVLU522SIz1STsmqjiMuwpZAWDfWJgN5v/CRIPnwKOxs6ias14SiDVQ==');
define('LOGGED_IN_KEY',    'bk/vSALYCbc9ecyHs5iXJ6rWlqfhPZ1/yuBghIAQk+d7dVo3ZF4zJil7gZTc50VyrXc6m5Skk6IK3SzqPpPQaw==');
define('NONCE_KEY',        'OvuUySbGTCfYq0MpXevngsExaJh29vcLH/ba/QJkH1HrrLQmZN3lWORkuBDqCtam8WBt1TIKbsBMOtI+9/R72Q==');
define('AUTH_SALT',        'HPv0Rh/y4dA89U6o6HmWClxPF6meglUHgF/nRERl8dlV/14nrc2GnF6gHfxh92Rvlh2ff206oz6fXkqg4suyig==');
define('SECURE_AUTH_SALT', '9lqJLttQcLza+nd12TOS5HmPtWjV75gkaIowFeJOREv5qD0vUkCwQxd/ikiCwfujaaMSfVGbFpkelUGaPEMwfQ==');
define('LOGGED_IN_SALT',   '9FPWpAo/rsySh0m+7p3S9LozYci1lGHltlgkVIXZwQYgNSJS7Lrr3zA1trtX8MUZvULg5X2M38B54TZLMzEGJg==');
define('NONCE_SALT',       '5j27W7HQnmUJG4BN8g7mPmefvJXmzDlK6fTYsWiGRlOG0oeOmgSk7TDDymdkBzssgVllFsVFbHGUc4iRb3tiGg==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';





/* Inserted by Local by Flywheel. See: http://codex.wordpress.org/Administration_Over_SSL#Using_a_Reverse_Proxy */
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
	$_SERVER['HTTPS'] = 'on';
}
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
