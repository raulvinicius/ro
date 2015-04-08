<?php
/** 
 * As configurações básicas do WordPress.
 *
 * Esse arquivo contém as seguintes configurações: configurações de MySQL, Prefixo de Tabelas,
 * Chaves secretas, Idioma do WordPress, e ABSPATH. Você pode encontrar mais informações
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. Você pode obter as configurações de MySQL de seu servidor de hospedagem.
 *
 * Esse arquivo é usado pelo script ed criação wp-config.php durante a
 * instalação. Você não precisa usar o site, você pode apenas salvar esse arquivo
 * como "wp-config.php" e preencher os valores.
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar essas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'raony');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '123');

/** nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8');

/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer cookies existentes. Isto irá forçar todos os usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'DA%vj3PgUVlwIPS d0%W8]i6M,VZzV#[(P/$eb>a02BH[37R-c0:KFO-xEll!M7I');
define('SECURE_AUTH_KEY',  ',nI{m7<d^J!4Bc=eWbHc=ZL_.@z3GP]Ob-pHGu5E0x }7,QvI#yQjGwXC$QuXTP4');
define('LOGGED_IN_KEY',    'Ot57!Y{dc)9*3UG<9+{dCyG^`1aV `c^6&!aDi(UataQr:A=cb--9{(<Oq>H8+2F');
define('NONCE_KEY',        '#k}?=m;+ovk]HmjmU(FVUFEJMt>9lnIANfe[8KzJ<u1M&lFYY*JYT9C;_E)[|ge8');
define('AUTH_SALT',        'xI5{QWMMR3w)V<p~I7NwH5Lf:+a!TbNKji+~6=Am+9FyudL:[=DFqfvoV^JRwGV8');
define('SECURE_AUTH_SALT', 'gV$z2<Vj#H/W7@ALG;4LX/]aqJ};,V};>4T>x@2uV)k&a_+DvDaM-zW*:B?1ZKT>');
define('LOGGED_IN_SALT',   'Vh[Re%=tui6?xg)Uk0wkkuTK65,r,{#$=9 BD&_g.2j>NgDt5lQ<i`&BhC.4Z]lq');
define('NONCE_SALT',       '(mdnNA_>C4R0$K}1AF^:=,h1H&IQ^HWhPZ_&z3W,DCbR0T|ksa!uc.Q$({<JJHze');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';


/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * altere isto para true para ativar a exibição de avisos durante o desenvolvimento.
 * é altamente recomendável que os desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');
