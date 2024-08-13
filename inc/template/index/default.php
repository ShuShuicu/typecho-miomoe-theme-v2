<?php 
/**
 * 首页默认模板
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit; 
?>
<div class="mdui-typo mdui-center">
<h1>
<?php 
    if (empty($this->getArchiveTitle())) {
        echo _t('最新文章');
    } else {
        $this->archiveTitle(array(
            'category' => _t('%s'),
            'search'   => _t('%s'),
            'tag'      => _t('%s'),
            'author'   => _t('%s')
        ), '', '');
    }
?>
    <small> · 精彩近在咫尺！</small></h1>
    <?php while($this->next()): ?>
    <div class="mdui-col-xl-4 mdui-col-lg-4 mdui-col-md-6 mdui-col-sm-6 mdui-m-y-1">
        <div class="mdui-card mdui-hoverable" style="border-radius: 8px;">
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
            <div class="mdui-card-media-covered mdui-card-media-covered-top">
                <div class="mdui-card-primary">
                    <div class="mdui-card-primary-title">
                        <i class="mdui-icon material-icons">apps</i>
                        <?php $this->category(',', false, '暂无分类'); ?>
                    </div>
                    <div class="mdui-card-primary-subtitle">
                        <i class="mdui-icon material-icons">local_offer</i>
                        <?php $this->tags(',', false, '暂无标签'); ?>
                    </div>
                </div>
            </div>
            
            <div class="mdui-card-media-covered">
            </div>
            </div>
            <div class="mdui-card-primary">
                <div class="mdui-card-primary-title mdui-text-truncate"><?php $this->title() ?></div>
                <div class="mdui-card-primary-subtitle mdui-card-content mdui-text-truncate"><?php $this->excerpt(); ?></div>
                    <i class="mdui-icon material-icons">timer</i>
                    <?php $this->date("m-d"); ?>
                <button class="mdui-btn mdui-ripple mdui-float-right">
                <a href="<?php $this->permalink() ?>">阅读文章</a></button>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
</div>
