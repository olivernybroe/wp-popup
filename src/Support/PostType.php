<?php

namespace OliverNybroe\Popup\Support;

abstract class PostType {
	public abstract function name(): string;

	public abstract function label(): string;

	public abstract function description(): string;

	public abstract function labels(): array;

	public abstract function supports(): array;

	public abstract function isHierarchical(): bool;

	public abstract function isPublic(): bool;

	public abstract function showInUI(): bool;

	public abstract function showInMenu(): bool;

	public abstract function menuPosition(): int;

	public abstract function menuIcon(): string;

	public abstract function showInAdminBar(): bool;

	public abstract function showInNavMenus(): bool;

	public abstract function canExport(): bool;

	public abstract function hasArchive(): bool;

	public abstract function excludeFromSearch(): bool;

	public abstract function isPubliclyQueryable(): bool;

	public abstract function capabilityType(): string;

	public abstract function showInRest(): bool;

	public abstract function restBase(): string;

	public abstract function restControllerClass(): string;

	public function toArray(): array
	{
		return [
			'label'                 => $this->label(),
			'description'           => $this->description(),
			'labels'                => $this->labels(),
			'supports'              => $this->supports(),
			'hierarchical'          => $this->isHierarchical(),
			'public'                => $this->isPublic(),
			'show_ui'               => $this->showInUI(),
			'show_in_menu'          => $this->showInMenu(),
			'menu_position'         => $this->menuPosition(),
			'menu_icon'             => $this->menuIcon(),
			'show_in_admin_bar'     => $this->showInAdminBar(),
			'show_in_nav_menus'     => $this->showInNavMenus(),
			'can_export'            => $this->canExport(),
			'has_archive'           => $this->hasArchive(),
			'exclude_from_search'   => $this->excludeFromSearch(),
			'publicly_queryable'    => $this->isPubliclyQueryable(),
			'capability_type'       => $this->capabilityType(),
			'show_in_rest'          => $this->showInRest(),
			'rest_base'             => $this->restBase(),
			'rest_controller_class' => $this->restControllerClass(),
		];
	}
}