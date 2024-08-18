<?php 
/**
 * 首页卡片模板
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit; 
?>
<div class="mdui-typo mdui-center">
<?php get_Header_top_info(); ?>
<?php while($this->next()): ?>
<div class="mdui-col-xl-4 mdui-col-lg-4 mdui-col-md-6 mdui-col-sm-6 mdui-m-y-2">
    <div class="mdui-card" style="border-radius: 8px;">
        <div class="mdui-card-media">
                <?php  
                    // get_ArticleThumbnail函数返回第一张图片的URL，没有则返回null  
                    $thumbnailStyle = $this->fields->thumbnail_Style; // 访问字段值  
                    $thumbnailUrl = $thumbnailStyle ? $thumbnailStyle : get_ArticleThumbnail($this);  
                    if ($thumbnailUrl):  
                    // 如果缩略图URL存在，则输出缩略图  
                ?>  
                <div class="thumbnail" style="background:url(<?php echo htmlspecialchars($thumbnailUrl); ?>);"></div>
            <?php endif; ?>
        <div class="mdui-card-media-covered">
            <div class="mdui-card-primary">
                <div class="mdui-card-primary-title mdui-text-truncate"><?php $this->title() ?></div>
                <div class="mdui-card-primary-subtitle mdui-text-truncate"><?php $this->excerpt(); ?></div>
            </div>
        </div>
    </div>
    <div class="mdui-card-actions">
        <i class="mdui-icon material-icons">timer</i>
        <?php $this->date("m-d"); ?>
        <button class="mdui-btn mdui-ripple mdui-float-right">
        <a href="<?php $this->permalink() ?>">阅读文章</a></button>
    </div>
    </div>
</div>
<?php endwhile; ?>
</div>