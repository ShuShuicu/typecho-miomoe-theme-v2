<?php 
/**
 * 首页列表(图片)模板
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit; 
?>
<div class="mdui-typo mdui-center">
<?php get_Header_top_info(); ?>
    <?php while($this->next()): ?>
    <div class="mdui-card mdui-hoverable mdui-m-y-2" style="border-radius: 8px;">
        <div class="mdui-col-xs-3 mdui-card-content">
        <?php  
                    // get_ArticleThumbnail函数返回第一张图片的URL，没有则返回null  
                    $thumbnailStyle = $this->fields->thumbnail_Style; // 访问字段值  
                    $thumbnailUrl = $thumbnailStyle ? $thumbnailStyle : get_ArticleThumbnail($this);  
                    if ($thumbnailUrl):  
                    // 如果缩略图URL存在，则输出缩略图  
                ?>  
                <div class="thumbnail" style="background:url(<?php echo htmlspecialchars($thumbnailUrl); ?>);border-radius: 8px;"></div>
            <?php endif; ?>
        </div>
        <div class="mdui-col-xs-9 mdui-card-content">
            <div class="mdui-card-primary-title mdui-text-truncate">
                <a href="<?php $this->permalink() ?>" mdui-tooltip="{content: '阅读本文'}"><?php $this->title() ?></a>
            </div>

            <div class="mdui-card-primary-subtitle mdui-text-truncate">
                <?php $this->date("20y-m-d"); ?> · <?php $this->category(',', false, '暂无分类'); ?> · <?php $this->tags(',', false, '暂无标签'); ?>
            </div>
            <div class="mdui-divider"></div>
            <div class="mdui-card-primary-subtitle mdui-card-content">
                <?php $this->excerpt(); ?>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
</div>