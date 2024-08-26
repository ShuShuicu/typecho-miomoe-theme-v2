<?php 
/*
 * 
 *                        _oo0oo_
 *                       o8888888o
 *                       88" . "88
 *                       (| -_- |)
 *                       0\  =  /0
 *                     ___/`---'\___
 *                   .' \\|     |// '.
 *                  / \\|||  :  |||// \
 *                 / _||||| -:- |||||- \
 *                |   | \\\  - /// |   |
 *                | \_|  ''\---/''  |_/ |
 *                \  .-\__  '-'  ___/-. /
 *              ___'. .'  /--.--\  `. .'___
 *           ."" '<  `.___\_<|>_/___.' >' "".
 *          | | :  `- \`.;`\ _ /`;.`/ - ` : | |
 *          \  \ `_.   \_ __\ /__ _/   .-` /  /
 *      =====`-.____`.___ \_____/___.-`___.-'=====
 *                        `=---='
 *      ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
 *  
 *           佛祖保佑       永不宕机     永无BUG
 *  
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit; 

$index = Helper::options()->siteUrl; 
$admin = Helper::options()->adminUrl; 

define("THEME_URL", str_replace('//usr', '/usr', str_replace(Helper::options()->siteUrl, Helper::options()->rootUrl . '/', Helper::options()->themeUrl)));
$str1 = explode('/themes/', (THEME_URL . '/'));
$str2 = explode('/', $str1[1]);
define("THEME_NAME", $str2[0]);

/**
 * 加载时间
 * Blog.MioMoe.Cn
 */
function timer_start() {
    global $timestart;
    $mtime     = explode( ' ', microtime() );
    $timestart = $mtime[1] + $mtime[0];
    return true;
}
timer_start();
function timer_stop( $display = 0, $precision = 3 ) {
    global $timestart, $timeend;
    $mtime     = explode( ' ', microtime() );
    $timeend   = $mtime[1] + $mtime[0];
    $timetotal = number_format( $timeend - $timestart, $precision );
    $r         = $timetotal < 1 ? $timetotal * 1000 . " ms" : $timetotal . " s";
    if ( $display ) {
        echo $r;
    }
    return $r;
}

/**
 * 提示框
 * Blog.MioMoe.Cn
 */
class ToastNotification
{
    public static function addToastScript($header, $widget)
    {
        $title = '';
        if ($widget->is('post')) { // 检查是否为文章页面
            $title = '文章：' . addslashes($widget->title);
        } elseif ($widget->is('category')) { // 检查是否为分类页面
            $title = '分类：' . addslashes($widget->getArchiveTitle());
        } elseif ($widget->is('tag')) { // 检查是否为标签页面
            $title = '标签：' . addslashes($widget->getArchiveTitle());
        } elseif ($widget->is('author')) { // 检查是否为作者页面
            $title = '作者：' . addslashes($widget->getArchiveTitle());
        } elseif ($widget->is('page')) { // 检查是否为单独页面
            $title = '页面：' . addslashes($widget->title);
        } else {
            return $header;
        }

        $script = <<<EOT
<script>
document.addEventListener("DOMContentLoaded", function() {
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 1500,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });

    Toast.fire({
        icon: "success",
        title: "$title"
    });
});
</script>
EOT;

        echo $script;
        return $header;
    }
}
// 注册挂钩
Typecho_Plugin::factory('Widget_Archive')->header = array('ToastNotification', 'addToastScript'); 

/**
 * 缩略图
 */
function get_RandomThumbnail($base_url, $maxImages = 10) {  
    // 生成一个1到$maxImages之间的随机数  
    $rand = mt_rand(1, $maxImages);  
    // 构造随机缩略图的URL  
    $randomImage = $base_url . $rand . '.jpg';  
    return $randomImage;  
}  
function get_ArticleThumbnail($widget) {  
    // 自定义缩略图逻辑  
    $thumb = $widget->fields->thumb; // 如果有自定义缩略图，直接使用  
    if ($thumb) {  
        return $thumb;  
    }  
    // 尝试从内容中提取图片URL  
    $pattern = '/<img.*?src="(.*?)"[^>]*>/i';  
    if (preg_match($pattern, $widget->content, $thumbUrl) && strlen($thumbUrl[1]) > 7) {  
        return $thumbUrl[1];  
    }  
    // 尝试从附件中获取图片URL  
    $attach = $widget->attachments(1)->attachment;  
    if ($attach && $attach->isImage) {  
        return $attach->url;  
    }  
    // 如果没有找到图片，则生成随机缩略图  
    $base_url = '/assets/images/thumb/'; // 默认缩略图路径  
    // 如果设置了articleImgSpeed，则使用它作为图片的基本URL  
    if (!empty(Helper::options()->articleImgSpeed)) {  
        $base_url = Helper::options()->articleImgSpeed;  
        // 确保URL以斜杠结尾  
        if (substr($base_url, -1) !== '/') {  
            $base_url .= '/';  
        }  
    } else {  
        // 使用themeUrl和默认的图片路径  
        $base_url = $widget->widget('Widget_Options')->themeUrl . $base_url;  
    }  
    // 调用辅助函数获取随机缩略图  
    return get_RandomThumbnail($base_url);  
}  

/**
 * 自定义字段
 */
function themeFields($layout) 
{

    // 缩略图字段
    $thumbnailStyle = new Typecho_Widget_Helper_Form_Element_Text(
        'thumbnail_Style', 
        NULL, 
        NULL,  
        _t
        ('缩略图'), 
        _t('请填入图片链接用于自定义文章缩略图 / 顶图')
    );
    $thumbnailStyle->input->setAttribute(
        'style', 'width: 100%; max-width: 600px;'
    );
    $layout->addItem($thumbnailStyle);

    // 文章背景音乐字段
    // 选择背景音乐是否开启
    $backgroundMusicStyle = new Typecho_Widget_Helper_Form_Element_Select(
        'backgroundMusicStyle', array(
        'close' => '关闭背景音乐',
        'open' => '开启背景音乐'
    ), 'close',
        '背景音乐',
        '')
    ;
    $layout->addItem($backgroundMusicStyle);
    // 选择背景音乐是否自动播放
    $backgroundMusicPlay = new Typecho_Widget_Helper_Form_Element_Select(
        'backgroundMusicPlay', array(
        '0' => '手动播放音乐',
        '1' => '自动播放音乐'
    ), 'close',
        '播放音乐',
        '部分浏览器可能无法自动播放')
    ;
    $layout->addItem($backgroundMusicPlay);
    // 音乐ID
    $backgroundMusicID = new Typecho_Widget_Helper_Form_Element_Text(
        'backgroundMusicID', 
        NULL, 
        NULL,  
        _t
        ('背景音乐ID'), 
        _t('请输入网易云音乐ID<br>开启音乐插入后会使用网易云官方的iframe插入接口。')
    );
    $backgroundMusicID->input->setAttribute(
        'style', 'width: 100%; max-width: 600px;'
    );
    $layout->addItem($backgroundMusicID);

}
Typecho_Plugin::factory('admin/write-post.php')->bottom = 'themeFields';
Typecho_Plugin::factory('admin/write-page.php')->bottom = 'themeFields';

/**
 * Get内容
 */
// 获取主题版本号
function get_ver() {
    $ver = Typecho_Plugin::parseInfo(dirname(__DIR__) . '/index.php');
    return $ver['version'];
}
// 获取主题最新版本号
function get_api_newVer() {
    $apiUrl = 'https://api.miomoe.cn/themes/MioMoeV2?ver';
    $newVer = @file_get_contents($apiUrl);
    if ($newVer === false) {
        return "获取失败，请检查网络！";
    } else {
        return $newVer;
    }
}
// 获取设置页面介绍
function get_api_info() {
    $apiUrl = 'https://api.miomoe.cn/themes/MioMoeV2?info'; 
    $info = @file_get_contents($apiUrl);
    if ($info === false) {
        return "获取失败，请检查网络！";
    } else {
        return $info;
    }
}
// 主题版权
function get_themeCopyright() {  
    echo '
        Theme · <a href="https://blog.miomoe.cn/" target="_blank" rel="external nofollow noopener">MioMoe V2</a>
    ';   
}
// 获取assetsUrl
function get_assetUrl($path) {
    $cdnUrl = Typecho_Widget::widget('Widget_Options')->assetsCdn;
    if ($cdnUrl === 'default') {
        return Typecho_Widget::widget('Widget_Options')->themeUrl($path);
    } else {
        return $cdnUrl . $path;
    }
}
// get_Header_top_info
function get_Header_top_info() {
    echo '<h1>最新文章<small> · 精彩近在咫尺！</small></h1>';
}
/**
 * // 后台说明
 * function get_adminInfo() {
 *     $THEME_URL = Helper::options()->themeUrl; 
 *     if (!isset($THEME_URL)) {
 *         throw new Exception('THEME_URL is not defined.');
 *     }
 *     $adminInfo = __DIR__ . '/../assets/admin/info.html'; 
 *     require_once $adminInfo;
 * }
 */