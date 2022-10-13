<?php

namespace BMG_Custom_Dynamic_Tag\Tags;

class Current_Category_Tag extends \Elementor\Core\DynamicTags\Tag
{

	public function get_name()
	{
		return 'example-tag';
	}

	public function get_title()
	{
		return __('Current Category', 'elementor-pro');
	}

	public function get_group()
	{
		return 'bmg-custom-category-tags';
	}

	public function get_categories()
	{
		return [\Elementor\Modules\DynamicTags\Module::TEXT_CATEGORY];
	}

	protected function _register_controls()
	{
	}

	public function render()
	{

		global $post;

		$page_object = get_queried_object();
		$categoryID = $page_object->slug;

		echo $categoryID;
	}
}
