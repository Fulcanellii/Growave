<?php

return [

	'' => [
		'controller' => 'main',
		'action' => 'index',
	],

    'add' => [
        'controller' => 'main',
        'action' => 'add',
    ],

    'articles/{id:\d+}' => [
        'controller' => 'main',
        'action' => 'articles',
    ],

    'page' => [
        'controller' => 'main',
        'action' => 'page',
    ],
];