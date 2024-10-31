<?php
/**
 * Plugin Name: quji-net
 * Description: 回放用户行为轨迹，深度洞察用户行为习惯
 * Author: QuJi
 * Author URI: https://quji.net/
 * Version: 1.0.3
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.en.html
 * Text Domain: quji
 */

// 入口文件
add_action('plugins_loaded', 'plugin_init_quji');
define('QUJI_PRODUCT', 'quji');
define('QUJI_PRODUCT_ID', '_quji_id_');

function plugin_init_quji()
{
    // 当admin_init，执行插件安装函数
    require_once __DIR__ . '/includes/quji.php';
    (new Quji())->init();
}
