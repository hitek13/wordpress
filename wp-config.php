<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'wordpress');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', '');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8mb4');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '4{g*Ri{{ld:$vjGvbo9#f|,>#Obn6P$uW[/@H5e5ZXq8)0$ga(6yt,|~Pp,zs*Z~');
define('SECURE_AUTH_KEY', ' }*Fah40 -T9TNnCvxcnJX^9k;D+4mF^~B.S^e;k;@!l].8<dxutNQgx#4vy>4@c');
define('LOGGED_IN_KEY', 'T2}TI$Nnonld1k>VMn9]zyf}v1dqGZ}[nBn([aol>m?%qzG4ro-9Qt0>F0Lp}1(_');
define('NONCE_KEY', '_1:_3BJt?R9i0krfO@@2$V#~iT<NY!?I1{5U3Wld1.<}z1yN:k; >N21%}*_zttm');
define('AUTH_SALT', 'RY&<K<35xS+^(BKB`H0PAqUWSEd`S%NYkJ&?2ktxBvu#vucHGz$~5fF8n{a7/1#.');
define('SECURE_AUTH_SALT', 'lRL0e$0T`jQ/_7=fnS/Qj3=oGUmVaNT>17B#[} y{4Db#@T;J$D{kT&8upjcY%jC');
define('LOGGED_IN_SALT', '|Udil,..Qi/i?q/2+$oA#&RU:J8xn{abgR}JiQ*;]fVsUYB4?62S@;kCmV_Y?Y4S');
define('NONCE_SALT', 'TNi)m6@xl/nPf|U;ZX+!TuWELzhB$9[b?E;K|o3H?{8a3L=.{P9=|CutXWMw(}.@');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

