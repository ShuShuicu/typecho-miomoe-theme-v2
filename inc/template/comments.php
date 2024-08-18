<?php
/**
 * 
 * 主题评论文件
 *
 * @link https://blog.miomoe.cn/
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit; 
?>
<div class="mdui-m-y-2">
    <div class="mdui-typo mdui-paper mdui-center" id="comments">
        <?php $this->comments()->to($comments); ?>
        <?php if ($comments->have()): ?>
        <div class="mdui-panel mdui-m-y-2" mdui-panel>
            <div class="mdui-panel-item mdui-panel-item-open" style="border-radius: 8px">
                <div class="mdui-panel-item-header">
                    <div class="mdui-panel-item-title">全部评论</div>
                    <div class="mdui-panel-item-summary">
                        <?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?>
                    </div>
                    <i class="mdui-panel-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
                </div>
                <div class="mdui-divider"></div>
                <div class="mdui-panel-item-body">
                    <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>

                        <?php $this->comments()->to($comments); ?>
                        <?php while($comments->next()): ?>
                        <div class="mdui-card-content" id="<?php $comments->theId(); ?>">
                            <div class="comment_data">
                                <div class="mdui-chip">
                                    <span class="mdui-chip-icon">
                                        <i class="mdui-icon material-icons">face</i>
                                    </span>
                                        <span class="mdui-chip-title"><?php $comments->author(); ?></span>
                                    </div>
                                    <div class="mdui-ripple mdui-float-right">
                                        <?php $comments->date('Y-m-d·H:i:s'); ?> · #<?php $comments->sequence(); ?>楼
                                    </div>
                            </div>       
                            <div class="mdui-card-content comment_body">
                                <?php $comments->content(); ?> 
                            </div>
                        </div>
                        <div class="mdui-divider"></div>
                        <?php endwhile; ?>

                    <div class="mdui-panel-item-actions">
                        <button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme" mdui-panel-item-close>收起</button>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        
        <?php if ($this->allow('comment')): ?>
        <div id="<?php $this->respondId(); ?>" class="respond">
            <div class="cancel-comment-reply">
                <?php $comments->cancelReply(); ?>
            </div>
            <div class="mdui-card mdui-hoverable mdui-card-content" style="border-radius: 8px">
                <div class="mdui-valign">
                    <div class="mdui-m-r-2"><i class="mdui-icon material-icons">comment</i></div>
                    <div class="mdui-card-primary-title mdui-text-truncate"><strong>评论</strong></div>
                </div>
                <h3 id="response"><?php _e('添加新评论'); ?></h3>
                <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
                    <?php if ($this->user->hasLogin()): ?>
                    <p><?php _e('登录身份: '); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a>
                    </p>
                    <?php else: ?>
                    <div class="mdui-divider"></div>
                    <div class="mdui-textfield mdui-textfield-floating-label">
                        <i class="mdui-icon material-icons">account_circle</i>
                        <label class="mdui-textfield-label">名称·Name</label>
                        <input class="mdui-textfield-input" type="text" name="author" class="text" size="35" value="<?php $this->remember('author'); ?>" />
                    </div>
                    <div class="mdui-textfield mdui-textfield-floating-label">
                        <i class="mdui-icon material-icons">email</i>
                        <label class="mdui-textfield-label">邮箱·E-Mail</label>
                        <input class="mdui-textfield-input" type="text" name="mail" class="text" size="35" value="<?php $this->remember('mail'); ?>" />
                    </div>
                    <div class="mdui-textfield mdui-textfield-floating-label">
                        <i class="mdui-icon material-icons">link</i>
                        <label class="mdui-textfield-label">主页链接·Link</label>
                        <input class="mdui-textfield-input" type="text" name="url" class="text" size="35" value="<?php $this->remember('url'); ?>" />
                    </div>
                    <?php endif; ?>
                    <div class="mdui-textfield">
                        <textarea class="mdui-textfield-input" rows="4" cols="50" name="text" placeholder="万水千山总是情，评论一句行不行~"><?php $this->remember('text'); ?></textarea>
                    </div>
                    <dic class="mdui-float-right">
                        <button type="submit" class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent submit"><?php _e('提交评论'); ?></button>
                    </div>
            </form>
        </div>
        <?php else: ?>
        <h3><?php _e('评论已关闭'); ?></h3>
        <?php endif; ?>
    </div>
</div>
</div>