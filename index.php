<?php

require_once __DIR__ . '/vendor/autoload.php';

/*
Plugin Name: Popup
Description: Adds popups to wordpress
Version: 0.1.3
Author: Oliver Nybroe
Author URI: https://nybroe.dev/
License: MIT
*/

use OliverNybroe\Popup\Contracts\Provider;
use OliverNybroe\Popup\Providers\ComponentsProvider;
use OliverNybroe\Popup\Providers\PostTypeProvider;

/** @var class-string<Provider>[] $providers */
$providers = [
	ComponentsProvider::class,
	PostTypeProvider::class,
];

foreach ($providers as $provider) {
	/** @var Provider $provider */
	$provider = new $provider();

	add_action('init', [$provider, 'init']);
}

