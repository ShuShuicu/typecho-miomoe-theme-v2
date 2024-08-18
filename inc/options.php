<?php 
/**
 * 主题设置
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit; 
function themeConfig($form)
{
?>
<link href="<?php echo THEME_URL ?>/assets/admin/options.css?v=<?php echo get_ver(); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo THEME_URL ?>/assets/css/mdui.min.css?v=<?php echo get_ver(); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo THEME_URL ?>/assets/css/mdx-icons.css?v=<?php echo get_ver(); ?>" rel="stylesheet" type="text/css" />
<script src="<?php echo THEME_URL ?>/assets/js/mdui.min.js?v=<?php echo get_ver(); ?>"></script>
<script>
setTimeout(function() {
    mdui.snackbar({
        message: '欢迎使用MioMoeV2！',
        position: 'top',
    });
}, 1145);
</script>
<div class="mdui-m-y-2 mdui-card mdui-hoverable" style="border-radius: 8px;">
<div class="mdui-card-media mdui-card-content">
    <div class="mdui-card-primary-title mdui-text-truncate">
        感谢使用MioMoeV2！
        <br><small>当前版本：<?php echo get_ver(); ?>丨最新版本：<?php echo get_api_newVer(); ?></small>
    </div>
</div>
<div class="mdui-divider"></div>
<div class="mdui-tab mdui-tab-full-width" mdui-tab>
    <a href="#主题设置" class="mdui-ripple">
        <i class="mdui-icon material-icons">settings</i>
        <label>主题设置</label>
    </a>
    <a href="#使用说明" class="mdui-ripple">
        <i class="mdui-icon material-icons">info</i>
        <label>使用说明</label>
    </a>
</div>
<div class="mdui-divider"></div>
<div class="mdui-typo mdui-card-content" style="padding-left:4%;padding-right:4%;">

<div id="使用说明">
    <?php echo get_api_info(); ?>
    <p>最新版本为：<?php echo get_api_newVer(); ?></p>
</div>
</div>
<div class="mdui-card-content" id="主题设置" style="padding-left:4%;padding-right:4%;">
<?php 
    // CDN
    $assetsCdn = new Typecho_Widget_Helper_Form_Element_Select(  
        'assetsCdn',  
        array(        
            'default' => _t('本地'), 
            'https://ss.bscstorage.com/wpteam-shushuicu/'=> _t('白山云'), 
        ),  
        'default',          
        _t('CDN'),   
        _t('请选择静态资源CDN加速节点<br><font color="red">推荐白山云</font>，如果切换CDN后有问题请切换为本地。') 
    );   
    $form->addInput($assetsCdn);

    // 首页
    $indexStyle = new Typecho_Widget_Helper_Form_Element_Select(  
        'indexStyle',  
        array(        
            'default' => _t('默认风格'), 
            'card'=> _t('卡片风格'), 
            'list'=> _t('列表风格'), 
            'list-pictures'=> _t('列表(图)风格'), 
        ),  
        'default',          
        _t('首页风格'),   
        _t('请选择首页风格') 
    );   
    $form->addInput($indexStyle);
    
    // 列表调整 
    // 文章
    $postStyle = new Typecho_Widget_Helper_Form_Element_Select(  
        'postStyle',  
        array(        
            'default' => _t('默认风格'), 
            'picture'=> _t('顶图风格'), 
        ),  
        'default',          
        _t('文章风格'),   
        _t('请选择文章风格') 
    );   
    $form->addInput($postStyle);

    // 副标题 
    $subTitle = new Typecho_Widget_Helper_Form_Element_Text(
        'subTitle', 
        NULL, 
        '由 MioMoeV2 主题强力驱动', 
        _t('副标题'), 
        _t('输入一段描述，将会显示在网站首页 title 后方，留空不显示。')
    );
    $form->addInput($subTitle);

    // favicon
    $faviconUrl = new Typecho_Widget_Helper_Form_Element_Text(
        'faviconUrl',
        NULL,
        NULL,
        _t('网站图标'),
        _t('输入网站图标，没有则显示主题默认图标。')
    );
    $form->addInput($faviconUrl);

    // 色调
    $themePrimary = new Typecho_Widget_Helper_Form_Element_Text(
        'themePrimary',
        NULL,
        'blue-grey',
        _t('主色调'),
        _t('默认为 blue-grey')
    );
    $form->addInput($themePrimary);
    $accentPrimary = new Typecho_Widget_Helper_Form_Element_Text(
        'accentPrimary',
        NULL,
        'pink',
        _t('副(强)色调'),
        _t('默认为 pink <br>颜色预览地址：
        <a href="https://www.mdui.org/docs/color" target="_blank" rel="external nofollow noopener">https://www.mdui.org/docs/color</a>')
    );
    $form->addInput($accentPrimary);

    // 头像
    $avatarUrl = new Typecho_Widget_Helper_Form_Element_Text(
        'avatarUrl',
        NULL,
        NULL,
        _t('作者头像'),
        _t('输入头像Url，没有显示主题默认。')
    );
    $form->addInput($avatarUrl);

    // 版权声明
    $postCopyright = new Typecho_Widget_Helper_Form_Element_Textarea(
        'postCopyright',
        NULL,
        '<mark>本站文章大部分始于原创，用于个人学习记录，可能对您有所帮助，仅供参考！</mark>',
        _t('版权声明'),
        _t('文章底部版权声明，支持HTML代码。')
    );
    $form->addInput($postCopyright);

    // 友情链接
    $linksInfo = new Typecho_Widget_Helper_Form_Element_Textarea(
        'linksInfo',
        NULL,
        '<ol>
        <li>排名不分先后。</li>
        <li>网站修改友链信息请重新提交留言即可。</li>
        <li>若发现站点无法访问，将会在一个月后删除。</li>
        <li>网站正常访问但是无故下掉链接的，会删除友链。</li>
        <li>如果不符合要求会无视掉申请，<font color="red">一天内都会通过。</font></li>
    </ol>',
        _t('申请友链说明'),
        _t('友情链接申请说明，支持HTML代码。')
    );
    $form->addInput($linksInfo);

    // 自定义内容
    $styleCode = new Typecho_Widget_Helper_Form_Element_Textarea(
        'styleCode',
        NULL,
        '<a href="https://beian.miit.gov.cn/" target="_blank" rel="external nofollow noopener">网站备案号</a>',
        _t('底部自定义显示内容'),
        _t('网站底部自定义内容，不填写则显示网站加载时长。支持HTML代码，推荐设置ICP备案代码。')
    );
    $form->addInput($styleCode);

    // 自定义代码
    // 自定义css代码
    $headerstyleCode = new Typecho_Widget_Helper_Form_Element_Textarea(
        'headerstyleCode',
        NULL,
        NULL,
        _t('自定义CSS代码'),
        _t('位于 head 标签之前(顶部)，<font color="red">需要在 style 标签内填写css代码。</font>')
    );
    $form->addInput($headerstyleCode);
    // 自定义js代码
    $footerstyleCode = new Typecho_Widget_Helper_Form_Element_Textarea(
        'footerstyleCode',
        NULL,
        NULL,
        _t('自定义JS代码'),
        _t('位于 body 标签之前(底部)，<font color="red">需要在 script 标签内填写JavaScript代码。</font>')
    );
    $form->addInput($footerstyleCode);
}
?>