<?php
/**
 * 
 * 主题文章页面
 *
 * @link https://blog.miomoe.cn/
 */
// 需要删除文章评论功能就注释掉 comments.php 这一行
if (!defined('__TYPECHO_ROOT_DIR__')) exit; 
$this->need('inc/template/header.php'); 
$this->need("inc/template/posts/" . ($this->options->postStyle) . ".php"); 
$this->need('inc/functions/musics.php'); 
$this->need('inc/template/comments.php'); 
$this->need('inc/template/footer.php');
?>