# Translator

Translator class for based PHP systems.


[![Build Status](https://travis-ci.org/benfiratkaya/Translator.png?branch=master)](https://travis-ci.org/benfiratkaya/Translator)
[![Latest Stable Version](https://poser.pugx.org/benfiratkaya/translator/v/stable.svg)](https://packagist.org/packages/benfiratkaya/translator)
[![Total Downloads](https://poser.pugx.org/benfiratkaya/translator/downloads.png)](https://packagist.org/packages/benfiratkaya/translator)
[![License](https://poser.pugx.org/benfiratkaya/translator/license.svg)](https://packagist.org/packages/benfiratkaya/translator)

## Installation

> Composer (recomended)

```
composer require benfiratkaya/translator
```

> Include

If you don't use composer in your project you can include files.

```PHP
use Translator\Translator;
use Translator\Exception;
	
include_once 'translator/Exception.php';
include_once 'translator/Register.php';
include_once 'translator/Generator.php';
include_once 'translator/Translator.php';
```

## Usage

> Exception

```PHP
// Exception
try {
		
	// Exception Status, Type, Language, Path
	$translator = new Translator();
		
	// Register Functions: translate(), translator(), t__(), e__()
	$translator->register();
		
	$translator->setException(true); // true or false
		
	// path/lang.type -> /languages/en_US.json
	$translator->setType('json'); // php, json, ini
	$translator->setLang('tr_TR'); // Language Code.
	$translator->setPath('translator/languages'); // Language Files Directory
		
	// Update Changes
	$translator->update();
		
} catch (Exception $e) {
	echo 'Error: '.$e->errorMessage();
}
```
