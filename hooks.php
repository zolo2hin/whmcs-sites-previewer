<?php

add_hook('ClientAreaPage', 10, function($vars) {
	if (empty($vars['services'])) {
		return;
	}

	require_once dirname(__FILE__) . '/Previewer.php';
	$config = yaml_parse_file(dirname(__FILE__) . '/config.yaml');
	$previewer = new Previewer(
		$config['browser_size'],
		$config['clip_size'],
		$config['image_size'],
		$config['image_reload_time']
	);

	$services = [];
	foreach ($vars['services'] as $service) {
		$service['preview'] = $previewer->getServiceImage($service);
		$services[] = $service;
	}

	return [
		'services' => $services
	];
});
