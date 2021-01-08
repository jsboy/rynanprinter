<?php
define( 'WP_CACHE', true );
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
define( 'DB_NAME', 'u517104247_tgQYI' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'dung@2021' );

/** MySQL hostname */
define( 'DB_HOST', '127.0.0.1' );

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
define( 'AUTH_KEY',          'R{q:=h[mYZbV*Dv@uP1(q0~!kQ.[.*LLPv_N.+G`WvDl*j}8XiCM>Ow*T?:Y52^t' );
define( 'SECURE_AUTH_KEY',   '_?L4L %|6LlBYrWXAqTsiQ#dU)fX3@oSg6dG1+DuF^em];=_?]viL tJ&]a_yC+O' );
define( 'LOGGED_IN_KEY',     ']$1F3/BlEeqB8V}DsZmL7(ia|ZnpeDj}hMaYA@nHXN/,w9#HG<+c7n!O_&bN@T#c' );
define( 'NONCE_KEY',         'n]M?-x8bV`ac>mCD2{](zs(ueKPQ+{LQKuj-ppq@_E3nJ^z=0;b/@Bz.*.c[>;HT' );
define( 'AUTH_SALT',         'kF{xbM%}p%f4>@V0[D6$:@[MvL:Lh dCB7b}=+s7HvuyeF2Q^N+Yw(qHMA.yG0Yj' );
define( 'SECURE_AUTH_SALT',  's%+UCz0XHs?!9]&E{5qM-aL#n1!z9|Sc%yp]NL8Xb(,,a0V/z*cNgl?:@3Yod3ED' );
define( 'LOGGED_IN_SALT',    'm8-r:4TFyv#YJ]E3[xkG|5|/Ps:|F7keI:!9!6@hUQah,*/BUj[q:hu-Z+p^V[Zf' );
define( 'NONCE_SALT',        'wh] a<.1!bU9}b]<8e7d[QsOhoY j5O1g4&*b1jJ>/zq(&q?>*@S-dja6t;2x#yX' );
define( 'WP_CACHE_KEY_SALT', '?kVEH@9EOj4.VCw_t$_8uh)v]Mt<cucDCdUe*UaY)%k{:18emg[wKSCrlrkuAb[/' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';



define( 'WP_HOME', 'http://rynanprinting.com/' );
define( 'WP_SITEURL', 'http://rynanprinting.com/' );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
