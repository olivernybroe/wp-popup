<?php

namespace OliverNybroe\Popup\Providers;

use OliverNybroe\Popup\Blocks\PopupBlock;
use OliverNybroe\Popup\Contracts\Block;
use OliverNybroe\Popup\Contracts\Provider;

class ComponentsProvider implements Provider {
	private const BLOCKS = [
            PopupBlock::class,
    ];

	public function init(): void {
		$this->registerBlocks();
	}

	private function registerBlocks(): void {

		foreach (self::BLOCKS as $block) {
			/** @var Block $block */
			$block = new $block();

			register_block_type($block->path(), [
				'attributes' => $block->attributes(),
				'render_callback' => fn(array $attributes) => $block->render($attributes)
			]);
		}
	}
}