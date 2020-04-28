<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'reink_db' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', '' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'jKeUp~E]y/:lXS,7/6V!I8?W@.Os_5`d+jJ8c=why!kAS *veLrMK,AE m0DgU)D' );
define( 'SECURE_AUTH_KEY',  '({Gg4/-8-f=/^H9^!yYyu30tO,^H[~^w@5})z@kXfM$| k?uD9=Qtq_5/`<4:lQ5' );
define( 'LOGGED_IN_KEY',    ',:^@r7[nLf^njuR-ihbeKljsi* 8WZ50e??L&8dT_F05RPR%1+~%;~CbtD>VnFG=' );
define( 'NONCE_KEY',        'hv}B}-jM9_*|saMQnYYy~s7)p{zxA0myu+}%2(h9K.`!rfGczMVD 7&+u2zwf`>`' );
define( 'AUTH_SALT',        '><jdd[J&BD#}zEBW94qDk5bG2c^ZwvSd=m:( blCRb!@F^VkH_?[>zSIw3Z4Wml,' );
define( 'SECURE_AUTH_SALT', 'R6}%.Ghv*LJ1j0MM/sp$se#8g,3dtPP3iYo./L i}CR72?ss-e6Z>If)vql[7rEZ' );
define( 'LOGGED_IN_SALT',   'M4fccWImshfozB);_@=x72 9.:n<^-dl-~R0DO34byz?,pda9hIQ`*Ln~wsthiY2' );
define( 'NONCE_SALT',       'Tfyv<MoAxYeLY_s%WRo#G5aN$3%zOsvvN*RD]~NT|}Z{@;WH`5&0`U*fIv1T{iSS' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );
