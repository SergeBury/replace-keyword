<?php
/**
 * @package replace-keyword
 * @version 1.1
 */
/*
Plugin Name: Replace-keyword
Description: Плагин в статьях добавляет для вхождения ключевых слов из keywords.txt кастомную строку.
Author: Me
Version: 1.1
*/

define('PLUGIN_DIR', plugin_dir_path(__FILE__));

function replace_keyword_filter_the_content($the_content)
{
	static $keywords = array();
	if ( empty($keywords))
	{
		$keywords = explode(',',file_get_contents(PLUGIN_DIR . 'keywords.txt'));
	}
	

	for ($i = 0, $c = count ($keywords); $i < $c; $i++)
	{
		$the_content = preg_replace('#'.$keywords[$i].'#iu', $keywords[$i].' в Москве', $the_content);

	}

	return $the_content;
}

add_filter('the_content', 'replace_keyword_filter_the_content');

