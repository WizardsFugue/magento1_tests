magento1_tests
==============

some magento phpunit tests shared between projects



## WebTestCase

this repository contains some base classes to do phpunit tests which imitates website requests
without the need of a webserver.
Inspiration is the Symfony 
[WebTestCase](https://github.com/symfony/symfony/blob/master/src/Symfony/Bundle/FrameworkBundle/Test/WebTestCase.php) 
as found in [Symfony\Bundle\SecurityBundle\Tests\Functional\FormLoginTest](https://github.com/symfony/symfony/blob/master/src/Symfony/Bundle/SecurityBundle/Tests/Functional/FormLoginTest.php)

A current example of usage is to find in the [WizardsFugue MagentoCommon Repository](https://github.com/WizardsFugue/magento_common_example/blob/master/tests/phpunit/web/SimpleTest.php).


We use own Request and Response classes to make testing easier and workaround some workflow issues like redirects

Also we suggest some code calls inside the bootstrap file:

```php

Mage::setIsDeveloperMode(true);


Mage::register('custom_entry_point', true);

Mage::$headersSentThrowsException = false;

ini_set('display_errors', 1);

umask(0);

if(!isset($options)){
    $options = array();
}

Mage::app('', 'store', $options);
Mage::app()->cleanCache();

```


The ```Mage::$headersSentThrowsException``` is needed to workaround the test about canSendHeaders which fails outside
of webserver context.  
The cleanCache is also important as we want to start the tests with clean cache, even if it slows down the
test calls a bit.


There are currently some issues with Session handling, which is observable in log files. Here it sure makes sense 
to introduce an own session class for testing.

