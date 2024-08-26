<?php
/**
 * 
 * 主题影视解析页面
 * 
 * @link https://blog.miomoe.cn/
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit; 
?>
<div class="mdui-m-y-5"></div>
<div class="mdui-center">
<div class="mdui-card mdui-hoverable" style="border-radius: 8px">
    <div class="mdui-card-media mdui-card-content">
        <div class="mdui-card-primary-title mdui-text-truncate"><?php $this->title() ?></div>
        <div class="mdui-divider"></div>
        <div class="mdui-card-actions">
            <strong>声明：</strong><mark>本页面不存储任何视频内容，所有VIP视频解析接口也来自于互联网，请勿用于任何商业用途，否则后果自负。解析中出现的广告勿信，广告由接口内置与本站无关，有疑问请联系站长。</mark>
        </div>
        <div class="mdui-divider"></div>
        <div class="mdui-card-content post-container" id="content" style="padding-left:4%;padding-right:4%;">
        <div class="mdui-textfield">
            <i class="mdui-icon material-icons">videocam</i>
            <label class="mdui-textfield-label">影视链接</label>
            <input class="mdui-textfield-input" type="text" />
            <div class="mdui-textfield-helper">请输入影视网址，http / https开头</div>
        </div>
            <button class="mdui-btn mdui-btn-raised mdui-ripple mdui-float-right mdui-color-theme">跳转播放</button>
        </div>
    </div>    
</div>
</div>