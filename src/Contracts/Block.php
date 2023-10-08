<?php

namespace OliverNybroe\Popup\Contracts;

interface Block {
	public function path(): string;

	public function attributes(): array;

	public function render( array $attributes ): string|null;
}