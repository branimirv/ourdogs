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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'wordpress' );

/** MySQL database password */
define( 'DB_PASSWORD', 'wordpress' );

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
define( 'AUTH_KEY',          'lr=x$iIQI4~<UU3 _#WY46Yi1n*yrPdAPjil??6|Z(*(LK{~/Sb#As#$ T!.q*1^' );
define( 'SECURE_AUTH_KEY',   'dWDciZOG8#bPwds0&J.,n1s=J*c=P4b!jh9rl#b%`9=.L.UZNPt o[TYW#yqxL`)' );
define( 'LOGGED_IN_KEY',     'H)Tj&U*q}$!3#gkji3[t2`1y:Ry0`Y_i+m6,>/6MtB*&Edrv$8e]`#mSTfL(Reb?' );
define( 'NONCE_KEY',         'VHW 5K]L7kH<o8@u+7a99/GNv^-e*FO($i$?ugXZ)w{3eB-#2lm%d,7@y=:zja;f' );
define( 'AUTH_SALT',         'Q8G29$8TgLyr@T>`3H@{M}jdH)#aQgR=.SIY$cDk4E!GefR2?>MJQvhgnZ|g2=.}' );
define( 'SECURE_AUTH_SALT',  'a0:DQ-#%OGtqn 0QR1=^eS%`3c*!?L(zp-QpgStH.HdqZlKzZt3rUe0u137s<B60' );
define( 'LOGGED_IN_SALT',    '8{t*P~G}_:jiKgg. _ mzTp/Bx5::Li}!d:x*W( zX<lY,4021rml:=:/7pr?|pK' );
define( 'NONCE_SALT',        'gmb}+U7Nfi+$h48t|*Vn#0Oem@sn@_*|0nfO8Dn(i[A&0@l(}UzV15:@p/BjSK%l' );
define( 'WP_CACHE_KEY_SALT', 'X9Q;]fW<$EuQ>#6_I]+BjOOqKa|%Si!H>CQFoUg?Df@v-2#=JZ8?]{Sr(2j1[ >L' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


define( 'JETPACK_DEV_DEBUG', True );
define( 'WP_DEBUG', True );
define( 'FORCE_SSL_ADMIN', False );
define( 'SAVEQUERIES', False );

// Additional PHP code in the wp-config.php
// These lines are inserted by VCCW.
// You can place additional PHP code here!


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
