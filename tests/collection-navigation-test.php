<?php
const ABSPATH='/tmp/';
$GLOBALS['pretty']='/%postname%/';$GLOBALS['actions']=[];$GLOBALS['filters']=[];
$wp_rewrite=(object)['pagination_base'=>'page'];
function get_option($k){return $GLOBALS['pretty'];}
function wp_parse_url($u,$part){return parse_url($u,$part);}
function trailingslashit($x){return rtrim($x,'/').'/';}
function user_trailingslashit($x,$type=''){return trailingslashit($x);}
function add_query_arg($args,$url){$p=parse_url($url);parse_str($p['query']??'',$q);$q=array_merge($q,$args);return preg_replace('/\?.*/','',$url).($q?'?'.http_build_query($q):'');}
function add_action($tag,$fn){$GLOBALS['actions'][$tag][]=$fn;}
function add_filter($tag,$fn){$GLOBALS['filters'][$tag][]=$fn;}
function remove_action(...$args){}
function esc_url($s){return htmlspecialchars($s,ENT_QUOTES);}
function wpds_theme_seo_plugin_active(){return $GLOBALS['seo_active']??true;}
require dirname(__DIR__) . '/includes/collection-navigation.php';
function check($condition,$message){if(!$condition)throw new Exception($message);}
check(wpds_collection_url('https://example.org/blog/',1)==='https://example.org/blog/','first page');
check(wpds_collection_url('https://example.org/blog/',2)==='https://example.org/blog/page/2/','pretty pagination');
check(wpds_collection_url('https://example.org/cases/',3,['cat'=>'shops','q'=>'test'])==='https://example.org/cases/page/3/?cat=shops&q=test','filters');
check(wpds_collection_pagination('https://example.org/blog/')['base']==='https://example.org/blog/%_%','pagination first page placeholder');
check(wpds_collection_pagination('https://example.org/blog/')['format']==='page/%#%/','pagination path format');
$GLOBALS['pretty']='';
check(wpds_collection_url('https://example.org/?page_id=436',2)==='https://example.org/?page_id=436&paged=2','plain permalinks');
$GLOBALS['pretty']='/%postname%/';
wpds_collection_seo('https://example.org/blog/page/2/',true,'https://example.org/blog/','https://example.org/blog/page/3/');
check(($GLOBALS['filters']['rank_math/frontend/canonical'][0])('old')==='https://example.org/blog/page/2/','Rank Math canonical');
check(($GLOBALS['filters']['rank_math/frontend/robots'][0])(['index'=>'index'])['index']==='noindex','filtered robots');
ob_start();foreach($GLOBALS['actions']['wp_head'] as $fn)$fn();$head=ob_get_clean();
check(!str_contains($head,'rel="canonical"'),'no duplicate canonical with SEO plugin');
check(str_contains($head,'rel="prev"')&&str_contains($head,'rel="next"'),'prev/next');
$GLOBALS['actions']=[];$GLOBALS['seo_active']=false;
wpds_collection_seo('https://example.org/blog/',false);
ob_start();foreach($GLOBALS['actions']['wp_head'] as $fn)$fn();$head=ob_get_clean();
check(substr_count($head,'rel="canonical"')===1,'one fallback canonical');
echo "PASS: collection URLs, query/pretty pagination, filters, canonical ownership, robots and prev/next\n";
