<?php

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
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
define('DB_NAME', 'jewellery');

/** Database username */
define('DB_USER', 'root');

/** Database password */
define('DB_PASSWORD', 'root');

/** Database hostname */
define('DB_HOST', 'localhost');

/** Database charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The database collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

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
define('AUTH_KEY',         'dSn*;]72L]>JRN(;oz}s1F}LpSF4,2.0p#uD6g-O9!M^lV,lE|WNA,||=|xW51pa');
define('SECURE_AUTH_KEY',  '(;HaE8kid{+[N6^E amL@)wCE{gef?UsRZ02_|y*P@QnTyQDr-y,-=&UC1|n!DhL');
define('LOGGED_IN_KEY',    '-;w_13};(;^f;f/dwm_ZpJ*%jL_2cdNnB9!%SDA,@YL~/Ekoak);LOu-Rc;xq?v=');
define('NONCE_KEY',        'f!R[E^^A1zp:<+TORd_P-4}(X<t72%esswF4D}4GcQ3N</13U/w2)Q[AjKDx>.4{');
define('AUTH_SALT',        'PkUF!)5%^Zjc6NO{bZ47(aya9mvzF4nz2WvnYTx_<RHJ v][>[9JESdm@HS=}%z+');
define('SECURE_AUTH_SALT', '22{=G+*`Fo1IMbwuk *w9u>nX{Q04Uu!0d@zn<Jmg?9DXiZh>~,>kTCs5NcA7&rB');
define('LOGGED_IN_SALT',   '{A>-8qpf>63G;,-v]w]e5st+>(mIYbYY$_UNf34*]j2)lRx1//VQAdM33=Ozreho');
define('NONCE_SALT',       's9yLkz!P!X2;V#2.glbYBU&:$G2g:p_ </hRgrRV}SC>7BAM7hgc)Cxe{81I|{_z');

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
define('WP_DEBUG', true);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
