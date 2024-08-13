<?php
/**
 * 
 * 主题文章页面
 *
 * @link https://blog.miomoe.cn/
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit; 
$this->need('inc/template/header.php'); 
$this->need("inc/template/posts/" . ($this->options->postStyle) . ".php"); 
$this->need('inc/template/comments.php');
$this->need('inc/template/footer.php');
?>