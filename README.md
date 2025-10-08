# FE Manager Captcha

This TYPO3 extensions extends EXT:femanager to use other captchas than EXT:sr_freecap. It offers some configuration to include a captcha of your choice.
It especially comes with everything you need to use "altcha" in femanager: https://altcha.org/docs/v2

## What does it do?

EXT:femanager can only be used with EXT:sr_freecap. There is no native way to integrate another captcha. This extension introduces the possibility to include your favourite captcha.
Looking for EXT:femanager to use a GDPR compliant captcha? This extension is shiped with "altcha": no cookies, non-intrusive.

## Getting Started

1. Install the extension

    ```
    composer require sitegeist/femanager-captcha
    ```

2. Include the TypoScript settings (these lines or select our "Set" in "Sets for this Site")
    ```
   # enable use of captcha in femanager
    plugin.tx_femanager.settings.new.validation.captcha.captcha = 1
    # provide the path to overwritten partials (do not change this line)
    plugin.tx_femanager.view.partialRootPaths.1759843226 = EXT:femanager-captcha/Resources/Private/Partials/
   # use altcha instead of sr_freecap
    plugin.tx_femanager.settings.new.validation.captcha.use = altcha
   # use the validator class for altcha
    plugin.tx_femanager.settings.new.validation.captcha.validatorclass = BBysaeth\Typo3Altcha\Validation\AltchaValidator
    ```

## How to use other captchas

    # enable use of captcha in femanager
    plugin.tx_femanager.settings.new.validation.captcha.captcha = 1
    # use "somecaptcha"
    plugin.tx_femanager.settings.new.validation.captcha.use = somecaptcha
    # use the validator class for yor "somecaptcha"
    plugin.tx_femanager.settings.new.validation.captcha.validatorclass = YourNameSpace\YourExt\Validation\SomecaptchaValidator
    # provide a partial to display your "somecaptcha"
    plugin.tx_femanager.view.partialRootPaths.123456789 = EXT:YourExt/Resources/Private/Partials/

You will have to provide (in your own EXT or sitepackage)
* A partial with the same name as defined in ".use": somecaptcha.html. This partial has to provide a form field named "tx_femanager_registration[captcha]" which will then be validated by some PHP class. For an example take a look at vendor/femanager-captcha/Resources/Private/Partials/Fields/altcha.html.
* Probably you will want to call a custom ViewHelper (from your partial) which will actually render the Captcha (Image or whatever). For an example take a look at vendor/bbysaeth/typo3-altcha/Classes/ViewHelpers/Form/AltchaViewHelper.php.
* A validator class to validate captcha data after form is submitted. For an example take a look at vendor/bbysaeth/typo3-altcha/Classes/Validation/AltchaValidator.php

## ToDo / Remarks
* composer.json requires sjbr/sr-freecap. This must remain the case for the time being because femanager checks in various places whether this EXT is loaded. However, femanager could instead rely on the fact that if “settings.” . $controllerName . “.validation.captcha.captcha” == TRUE has been set, a captcha EXT is also available. Currently, it checks *both* conditions, which means we have to ensure that sr_freecap is also present.
* at the moment captcha is only provided for "new" action, but should be easy to adapt to "edit" action as well

## Special thanks
*The development and the public-releases of this package is generously sponsored by SPIEGEL-Verlag Rudolf Augstein GmbH & Co. KG*
