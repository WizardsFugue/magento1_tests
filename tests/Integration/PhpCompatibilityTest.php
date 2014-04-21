<?php

namespace WizardsFugue\Magento1_Tests\Integration;

class PhpCompatibilityTest extends \PHPUnit_Framework_TestCase
{

    public function testGetModel()
    {
        $helper = \Mage::helper('core');
        /** test for 5.5 deprecated warning */
        $this->assertEquals( 'hallo>Welt', $helper->removeTags('<div>hallo>Welt</div>') );
    }
}
