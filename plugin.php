<?php

namespace BMG_Custom_Dynamic_Tag;

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
	die();
}

class Plugin
{

	private static $_instance = null;

	public static function instance()
	{
		if (is_null(self::$_instance)) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	public function __construct()
	{
		// Load files.
		add_action('init', array($this, 'init'));
	}

	public function init()
	{
		add_action('elementor/dynamic_tags/register_tags', [$this, 'register_dynamic_tags']);
	}

	public function register_dynamic_tags($dynamic_tags)
	{

		// Register group
		\Elementor\Plugin::$instance->dynamic_tags->register_group('bmg-custom-category-tags', [
			'title' => 'BMG Custom Category Tags'
		]);

		// Include the Dynamic tag class file
		include_once('tags/current_category_tag.php');

		// Finally register the tag
		$dynamic_tags->register_tag('BMG_Custom_Dynamic_Tag\Tags\Current_Category_Tag');
	}
}

if (!function_exists('Plugin')) {
	function Plugin()
	{
		return Plugin::instance();
	}
}
// Instantiate Plugin Class
Plugin();
