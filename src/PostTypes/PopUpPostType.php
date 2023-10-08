<?php

namespace OliverNybroe\Popup\PostTypes;

use OliverNybroe\Popup\Support\PostType;
use WP_REST_Posts_Controller;

class PopUpPostType extends PostType {
	public function name(): string {
		return "wp_popup";
	}

	public function label(): string {
		return __( 'Popups', 'wp-popup' );
	}

	public function description(): string {
		return __( 'Lightboxes to potentially display on website', 'wp-popup' );
	}

	public function labels(): array {
		return [
			'name'                  => _x( 'Popups', 'Post Type General Name', 'wp-popup' ),
			'singular_name'         => _x( 'Popup', 'Post Type Singular Name', 'wp-popup' ),
			'menu_name'             => __( 'Popups', 'wp-popup' ),
			'name_admin_bar'        => __( 'Popups', 'wp-popup' ),
			'archives'              => __( 'Popup Archives', 'wp-popup' ),
			'parent_item_colon'     => __( 'Parent Item:', 'wp-popup' ),
			'all_items'             => __( 'All Popups', 'wp-popup' ),
			'add_new_item'          => __( 'Add New Popup', 'wp-popup' ),
			'add_new'               => __( 'Create New Popup', 'wp-popup' ),
			'new_item'              => __( 'New Popup', 'wp-popup' ),
			'edit_item'             => __( 'Edit Popup', 'wp-popup' ),
			'update_item'           => __( 'Update Popup', 'wp-popup' ),
			'view_item'             => __( 'View Popup', 'wp-popup' ),
			'search_items'          => __( 'Search Popups', 'wp-popup' ),
			'not_found'             => __( 'Not found', 'wp-popup' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'wp-popup' ),
			'featured_image'        => __( 'Featured Image', 'wp-popup' ),
			'insert_into_item'      => __( 'Insert in popup', 'wp-popup' ),
			'uploaded_to_this_item' => __( 'Uploaded to this popup', 'wp-popup' ),
			'items_list'            => __( 'PopupSettingsPanel list', 'wp-popup' ),
			'items_list_navigation' => __( 'PopupSettingsPanel list navigation', 'wp-popup' ),
			'filter_items_list'     => __( 'Filter popups', 'wp-popup' ),
		];
	}

	public function supports(): array
	{
		return ['title', 'editor'];
	}

	public function isHierarchical(): bool
	{
		return false;
	}

	public function isPublic(): bool
	{
		return true;
	}

	public function showInUI(): bool
	{
		return true;
	}

	public function showInMenu(): bool
	{
		return true;
	}

	public function menuPosition(): int
	{
		return 30;
	}

	public function menuIcon(): string
	{
		return 'dashicons-slides';
	}

	public function showInAdminBar(): bool
	{
		return true;
	}

	public function showInNavMenus(): bool
	{
		return true;
	}

	public function canExport(): bool
	{
		return true;
	}

	public function hasArchive(): bool
	{
		return false;
	}

	public function excludeFromSearch(): bool
	{
		return true;
	}

	public function isPubliclyQueryable(): bool
	{
		return false;
	}

	public function capabilityType(): string
	{
		return 'page';
	}

	public function showInRest(): bool
	{
		return true;
	}

	public function restBase(): string
	{
		return 'wp_popup';
	}

	public function restControllerClass(): string
	{
		return WP_REST_Posts_Controller::class;
	}
}