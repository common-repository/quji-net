<?php

class Quji
{
    const PRODUCT_NAME = "趣迹";

    public function init()
    {
        // 注册数据 & 创建菜单设置界面
        register_setting(QUJI_PRODUCT, QUJI_PRODUCT_ID);
        add_action("admin_menu", [$this, "createMenuPage"]);
        // 头部嵌入脚本
        add_action("wp_head", [$this, 'toInsertScript']);
    }

    public function createMenuPage()
    {
        add_options_page(
            esc_html__(self::PRODUCT_NAME),
            esc_html__(self::PRODUCT_NAME),
            "manage_options", "Settings",
            [$this, "toSettingsView"]
        );
    }

    public function toSettingsView()
    {
        require_once dirname(__DIR__) . "/admin/views/settings.php";
    }

    public function toInsertScript()
    {
        if (is_admin()) {
            return; // 非管理模式
        }
        // 从数据库读取
        $qid = trim(get_option(QUJI_PRODUCT_ID));
        if (empty($qid)) {
            return; // 防止无效ID
        }
        // 按wp条件更正为只能填写ID的方式，以防XSS攻击
        echo '<script>
            (function () {
                var quji = function () {
                    let aid = "' . esc_attr($qid) . '";
                    let pid = String(Date.now());
                    if (typeof window.__qujied != "undefined") return;
                    window.__qujied = 1;
                    var qujisp = document.createElement("script");
                    qujisp.type = "text/javascript";
                    qujisp.async = true;
                    qujisp.id = "qujispsync";
                    qujisp.src = ("https:" == document.location.protocol ? "https" : "http") + "://cdn.quji.net/push/" + aid + ".js?aid=" + aid + "&pid=" + pid + "&_t=" + Math.floor(new Date().getTime() / 3600000);
                    var x = document.getElementsByTagName("script")[0];
                    x.parentNode.insertBefore(qujisp, x);
                };
                setTimeout(quji, 0);
            })();
        </script>';
    }
}

?>



