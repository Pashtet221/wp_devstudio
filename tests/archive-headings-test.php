<?php
const ABSPATH='/tmp/';
$GLOBALS['post_index']=-1;
$GLOBALS['titles']=['Статья один','Статья два'];
function get_header(){echo '<html><head><meta name="viewport" content="width=device-width,initial-scale=1"></head><body>';}
function get_footer(){echo '</body></html>';}
function is_search(){return false;}
function is_home(){return false;}
function get_the_archive_title(){return 'Автор: Павел';}
function get_the_archive_description(){return '';}
function wp_strip_all_tags($s){return strip_tags($s);}
function esc_html($s){return htmlspecialchars($s,ENT_QUOTES);}
function wp_kses_post($s){return $s;}
function have_posts(){return $GLOBALS['post_index']<1;}
function the_post(){$GLOBALS['post_index']++;}
function post_class($s){echo 'class="'.$s.'"';}
function has_post_thumbnail(){return false;}
function the_title(){echo $GLOBALS['titles'][$GLOBALS['post_index']];}
function the_permalink(){echo '/article-'.$GLOBALS['post_index'].'/';}
function get_the_excerpt(){return '<h1>Вложенный заголовок</h1><p>Краткий анонс без полного текста статьи.</p>';}
function strip_shortcodes($s){return $s;}
function wp_trim_words($s,$num,$more){return $s;}
function the_posts_pagination($args){echo '<nav aria-label="Страницы"><a href="/author/pavel/page/2/">2</a></nav>';}
ob_start();require dirname(__DIR__) . '/archive.php';$html=ob_get_clean();
if(substr_count($html,'<h1>')!==1||substr_count($html,'<h2>')!==2)throw new Exception('archive headings');

echo "PASS: archive one H1, two H2, no embedded excerpt headings\n";
