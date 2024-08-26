<?php 
/**
 * 主题文章音乐功能
 *
 * @link https://blog.miomoe.cn/
 */

// 获取自定义字段的值
$backgroundMusicStyle = $this->fields->backgroundMusicStyle;
$backgroundMusicPlay = $this->fields->backgroundMusicPlay;
$backgroundMusicID = $this->fields->backgroundMusicID;

// 检查是否开启背景音乐
if ($backgroundMusicStyle === 'open' && !empty($backgroundMusicID)): ?>
    <iframe frameborder="no" border="0" marginwidth="0" marginheight="0" width="100%" height="86" src="https://music.163.com/outchain/player?type=2&id=<?php echo $backgroundMusicID; ?>&auto=<?php echo $backgroundMusicPlay; ?>&height=66"></iframe>
<?php endif; ?>