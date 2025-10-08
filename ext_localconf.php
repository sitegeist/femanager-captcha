<?php

declare(strict_types=1);

use Sitegeist\FemanagerCaptcha\Xclass\MultiCaptchaValidator;
use In2code\Femanager\Domain\Validator\CaptchaValidator;

defined('TYPO3') or die();

$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][CaptchaValidator::class] = [
    'className' => MultiCaptchaValidator::class,
];
