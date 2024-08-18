<?php 
/**
 * 首页列表模板
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit; 
?>
<div class="mdui-typo mdui-center">
<?php get_Header_top_info(); ?>
<?php
$count = 0;
while($this->next()): 
    if ($count % 2 == 0) { // 开始一个新的行
        if ($count > 0) {
            echo '</div>'; // 关闭上一个行
        }
        echo '<div class="mdui-col-xs-12">'; // 开始一个新的行
    }
?>
<div class="mdui-col-xl-6 mdui-col-lg-6 mdui-col-md-6 mdui-col-sm-12 mdui-m-y-2">
    <div class="mdui-card mdui-hoverable" style="border-radius: 8px;">
        <div class="mdui-card-content">
            <div class="mdui-card-primary-title mdui-text-truncate">
                <a href="<?php $this->permalink() ?>" mdui-tooltip="{content: '阅读本文'}"><?php $this->title() ?></a>
            </div>
        </div>
        <div class="mdui-divider"></div>
            <div class="mdui-card-primary-subtitle mdui-card-content">
                <?php $this->excerpt(); ?>
            </div>
    </div>
</div>
<?php 
$count++;
endwhile; 
if ($count > 0) {
    echo '</div>'; 
}
?>

</div>