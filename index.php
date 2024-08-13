<?php
/**
 * 
 * 这是MioMoe主题 V2(重构)版。
 * <div class="FansSet"><a href="https://blog.miomoe.cn/docs/MioMoe-doc.html" target="_blank">主题文档</a>&nbsp;</div><style>.FansSet{margin-top: 5px;}.FansSet a{background: #ff4d4d;padding: 5px;color: #fff;}</style>
 * @package MioMoeV2
 * @author 鼠子(ShuShuicu)
 * @version beta1.8
 * @link https://blog.miomoe.cn/
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit; 
$this->need('inc/template/header.php'); 
$this->need("inc/template/index/" . ($this->options->indexStyle) . ".php"); 
$this->need('inc/template/footer.php'); 
?>