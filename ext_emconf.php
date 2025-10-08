<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'FE Manager Captcha',
    'description' => 'Adds ability for multiple captchas to femanager, ships with altcha',
    'category' => 'fe',
    'author' => 'Martin Neumann',
    'author_email' => 'neumann@sitegeist.de',
    'author_company' => 'sitegeist media solutions GmbH',
    'state' => 'stable',
    'version' => '',
    'constraints' => [
        'depends' => [
            'typo3' => '13.4.0-13.9.99',
            'php' => '8.2.0-8.3.99',
        ],
        'conflicts' => [
        ],
        'suggests' => [
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'Sitegeist\\FemanagerCaptcha\\' => 'Classes',
        ],
    ],
];
