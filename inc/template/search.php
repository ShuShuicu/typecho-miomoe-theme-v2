<?php
/**
 * 
 * 主题搜索页面
 *
 * @link https://blog.miomoe.cn/
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit; 
?>
<div class="mdui-m-y-2">
    <div class="mdui-card mdui-typo mdui-card-content mdui-hoverable" style="border-radius: 8px;padding-left:4%;padding-right:4%;">
        <h1>站内搜索</h1>
        <div class="mdui-textfield">
            <form method="post">
                <label class="mdui-textfield-label">输入内容回车搜索</label>
                <input class="mdui-textfield-input" type="text" name="s" class="text" placeholder="开启精彩搜索" value="<?php echo $this->_keywords ?>" />
            </form>
        </div>
    </div>
</div>
<?php while($this->next()): ?>
<div class="mdui-m-y-4 mdui-typo mdui-card mdui-hoverable" style="border-radius: 8px;">
    <div class="mdui-card-primary">
        <div class="mdui-card-primary-title mdui-text-truncate">
            <a href="<?php $this->permalink() ?>" mdui-tooltip="{content: '查看文章'}"><?php $this->title() ?></a>
        </div>
        <div class="mdui-card-primary-subtitle">
            时间：<?php $this->date(); ?>
            · 分类：<?php $this->category(',', true, '暂无分类'); ?>
            · 标签： <?php $this->tags(',', true, '暂无标签'); ?>
        </div>
    </div>
    <div class="mdui-divider"></div>
    <div class="mdui-card-content">
        <?php $this->excerpt(180, '......'); ?>
    </div>
</div>
<?php endwhile; ?>
</div>