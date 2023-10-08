<?php

namespace OliverNybroe\Popup\Providers;

use OliverNybroe\Popup\Contracts\Provider;
use OliverNybroe\Popup\PostTypes\PopUpPostType;
use OliverNybroe\Popup\Support\PostType;

class PostTypeProvider implements Provider {
	private const TYPES = [
		PopUpPostType::class
	];

	public function init(): void {
		foreach (self::TYPES as $type) {
			/** @var PostType $type */
			$type = new $type();

			register_post_type($type->name(), $type->toArray());
		}
	}
}