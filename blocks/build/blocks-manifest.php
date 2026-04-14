<?php
// This file is generated. Do not modify it manually.
return array(
	'svgicon' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'eli-blocks/svgicon',
		'version' => '0.1.0',
		'title' => 'Svg Icon',
		'category' => 'widgets',
		'icon' => 'smiley',
		'description' => 'A simple component to select an SVG Icon Element.',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false
		),
		'textdomain' => 'svgicon',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'viewScript' => 'file:./view.js',
		'attributes' => array(
			'id' => array(
				'type' => 'number',
				'default' => null
			),
			'fill' => array(
				'type' => 'string'
			),
			'background' => array(
				'type' => 'string'
			),
			'stroke' => array(
				'type' => 'string'
			),
			'padding' => array(
				'type' => 'string',
				'default' => null
			)
		)
	)
);
