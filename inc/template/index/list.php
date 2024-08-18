<?php 
/**
 * 首页列表模板
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit; 
?>
<div class="mdui-typo mdui-center">
<?php get_Header_top_info(); ?>
<?php while($this->next()): ?>
<div class="mdui-col-xs-12">
    <div class="mdui-m-y-1 mdui-card mdui-hoverable" style="border-radius: 8px;">
        <div class="mdui-card-content">
            <div class="mdui-card-primary-title mdui-text-truncate">
                <a href="<?php $this->permalink() ?>" mdui-tooltip="{content: '阅读本文'}"><?php $this->title() ?></a>
            </div>
            <div class="mdui-card-primary-subtitle mdui-text-truncate">
                时间：<?php $this->date(); ?>
                · 分类：<?php $this->category(',', true, '暂无分类'); ?>
                · 标签： <?php $this->tags(',', true, '暂无标签'); ?>
            </div>
        </div>
        <div class="mdui-divider"></div>
            <div class="mdui-card-primary-subtitle mdui-card-content">
                <?php $this->excerpt(); ?>
            </div>
    </div>
</div>
<?php endwhile; ?>
</div>