<?php if (isset($_GET['settings-updated'])) {
    $qid = trim(get_option(QUJI_PRODUCT_ID));
    if ($qid == '') { ?>
        <div id="message" class="notice notice-warning is-dismissible">
            <p><strong><?php _e('您未填写趣迹代码, 趣迹将无法使用!', QUJI_PRODUCT); ?></strong></p>
        </div>
    <?php } else { ?>
        <div id="message" class="notice notice-success is-dismissible">
            <p><strong>您已填写趣迹ID,
                    <a href="https://quji.net/dashboard" target="_blank">点击验证安装是否成功</a>
                </strong></p>
        </div>
    <?php }
} ?>

<div id="business-info-wrap" class="wrap"
     style="width: 710px; font-size: 13px; background: #fff; border: 1px solid #ccc; padding: 15px 20px;">
    <div class="wp-header">
        <a href="https://quji.net?fm=wordpress" target="_blank"
           style="display: inline-block;width: 100px;height: 50px;">
            <img src="<?php echo plugins_url('../static/logo-blue.svg', __FILE__); ?>"
                 style="width: 100px;height: 50px;"></a>
    </div>
    <form method="post" action="options.php">
        <?php settings_fields(QUJI_PRODUCT);
        do_settings_sections(QUJI_PRODUCT_ID); ?>
        <div>
            <p style="color: #333"><b>趣迹是一个直观了解用户行为的可视化用户行为分析工具，提供热力图，回放用户操作轨迹功能，
                    你可以看到用户在你网页，着落页上的每一个鼠标移动，滚动，点击。
                    以优化产品用户体验，提高转化率，对用户行为深度洞察，发现无价信息。</b></p>
            <div>
                <a class="info-button" target="_blank" href="https://quji.net/dashboard">回放用户操作</a>
                <a class="info-button" target="_blank" href="https://quji.net/dashboard">查看热力图</a>
            </div>
            <h3>安装步骤：</h3>
            <h4>第一步：注册趣迹</h4>
            <p>前往 <a href="https://quji.net?fm=wordpress" target="_blank">趣迹</a> 注册账号，填写您的网站地址，获取趣迹ID。</p>
            <h4>第二步：添加趣迹ID</h4>
            <table class="form-table">
                <p>添加趣迹ID并保存，提示安装成功后即可使用趣迹，不填写不生效。</p>
                <div><input
                            style="width: 180px; border: 1px solid #ccc; text-align: left; padding: 10px;
                            margin: 10px 0; line-height: 1; height: 40px;"
                            name="<?php echo QUJI_PRODUCT_ID; ?>"
                            id="<?php echo QUJI_PRODUCT_ID; ?>"
                            placeholder="趣迹ID"
                            value="<?php echo esc_attr(trim(get_option(QUJI_PRODUCT_ID))); ?>"/>
                </div>
            </table>
        </div>
        <style>
            a.info-button {
                margin: 5px 20px 5px 0;
                cursor: pointer;
                color: #fff;
                background-color: #0d6efd;
                border-color: #0d6efd;
                display: inline-block;
                font-weight: 400;
                line-height: 1.2;
                text-align: center;
                text-decoration: none;
                vertical-align: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
                padding: 8px 15px;
                font-size: 14px;
                border-radius: .25rem;
            }

            p.submit {
                display: inline-block;
                margin-top: -10px;
            }
        </style>
        <?php submit_button(); ?>
        &nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #0d66c2">
            <?php
            if ($qid == '') {
                echo '已配置';
            } else {
            }
            ?>
        </span>
    </form>
</div>
