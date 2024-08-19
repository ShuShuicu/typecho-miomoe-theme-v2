<?php
/**
 * 
 * 主题底部文件
 *
 * @link https://blog.miomoe.cn/
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit; 
?>
</div>
<?php
$loadPagination = !($this->is('post') || $this->is('page') || $this->is('single'));
?>
<?php if ($loadPagination): ?>
<div class="mdui-m-y-1 mdui-valign mdui-container">
    <?php $this->pageLink('<div class="mdui-ripple mdui-btn mdui-btn-icon mdui-color-theme"><i class="material-icons mdui-icon">chevron_left</i></div>'); ?>
    <span class="mdui-typo-body-1-opacity mdui-text-center" style="flex-grow:1">第 <?php echo $this->_currentPage > 1 ? $this->_currentPage : 1; ?> 页 / 共 <?php echo ceil($this->getTotal() / $this->parameter->pageSize); ?> 页</span>
    <?php $this->pageLink('<div class="mdui-ripple mdui-btn mdui-btn-icon mdui-color-theme"><i class="material-icons mdui-icon">chevron_right</i></div>','next'); ?>
</div>
<?php endif; ?>
<div class="mdui-m-y-2 mdui-typo mdui-card mdui-hoverable mdui-container mdui-card-content" style="border-radius: 8px;">
    <footer style="display:flex;">
        <div class="mdui-typo-body-1-opacity mdui-text-left">
            Powered by <a href="http://typecho.org" target="_blank" rel="external nofollow noopener">Typecho</a>
            <br>© Copyright <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>
        </div>
        <div style="flex-grow:1">
        </div>
        <div class="mdui-typo-body-1-opacity mdui-text-right">
            页面加载时间<?php echo timer_stop();?>
            <br><?php if ($this->options->styleCode) { echo $this->options->styleCode; } else { get_themeCopyright(); } ?>
        </div>
        <!--
            尊重开源环境，请勿删除版权。
            此主题基于MDUI制作，由鼠子(ShuShuicu)开发；
            可前往主题作者博客：https://blog.miomoe.cn/免费下载。
        -->
    </footer>
</div>
</div>
</div>
</div>
<script src="<?php echo get_assetUrl('assets/js/miomoe-v2.js'); ?>?v=<?php echo get_ver(); ?>"></script>
<script src="<?php echo get_assetUrl('assets/js/mdui.min.js'); ?>?v=<?php echo get_ver(); ?>"></script>
<script src="<?php echo get_assetUrl('assets/js/sweetalert2.all.min.js'); ?>?v=<?php echo get_ver(); ?>"></script>
<?php $this->footer(); ?>
<?php $this->options->footerstyleCode(); ?>
</body>
</html>