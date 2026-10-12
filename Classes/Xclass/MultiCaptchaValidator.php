<?php

declare(strict_types=1);

namespace Sitegeist\FemanagerCaptcha\Xclass;

use In2code\Femanager\Domain\Service\ValidationSettingsService;
use In2code\Femanager\Domain\Validator\CaptchaValidator;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class MultiCaptchaValidator extends CaptchaValidator
{
    /**
     * Validation of given Params
     *
     * @param $value
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    protected function isValid($value): void
    {
        $this->init();

        $validationSettingsService = GeneralUtility::makeInstance(ValidationSettingsService::class, $this->getControllerName(), $this->getValidationName());
        $validationSettings = $validationSettingsService->getValidationSettings();

        if ($this->captchaEnabled()) {
            if ($validationSettings['captcha']['validatorclass']) {
                $validator = GeneralUtility::makeInstance($validationSettings['captcha']['validatorclass']);
                $validator->validate($value);
            } else {
                // orig sr_freecap validation
                parent::isValid($value);
            }
        }
    }
}
