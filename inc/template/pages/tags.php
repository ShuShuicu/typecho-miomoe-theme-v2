<?php
/**
 * 
 * 主题标签云页面
 *
 * @link https://blog.miomoe.cn/
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit; 
?>
<div class="mdui-m-y-5"></div>
<div class="mdui-typo mdui-center">
<div class="mdui-card mdui-hoverable" style="border-radius: 8px">
    <div class="mdui-card-media mdui-card-content">
        <div class="mdui-card-primary-title mdui-text-truncate"><?php $this->title() ?></div>
        <?php $this->widget('Widget_Metas_Tag_Cloud','sort=name&ignoreZeroCount=1&desc=0')->to($tag);$total=0;$max=0; ?>
		<?php while ($tag->next()) {$total++;if ($tag->count>$max) $max=$tag->count;} ?>
		<div class="mdui-card-primary-subtitle">共计<?php echo $total; ?>个标签</div>
    </div>
        <div class="mdui-divider"></div>
        <div class="mdui-card-content post-container" id="content" style="padding-left:4%;padding-right:4%;">
            <?php while ($tag->next()){ ?>
				<a href="<?php $tag->permalink(); ?>" class="mdui-hoverable mdui-p-a-1"><?php $tag->name(); ?></a>
			<?php } ?>
        </div>
</div>
</div>