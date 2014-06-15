<?php
/**
 * 
 * 
 * 
 * 
 */
namespace WizardsFugue\Magento1_Tests\Web;

/**
 * WebTestCase is the base class for functional tests.
 *
 * 
 */
class WebTestCase extends \PHPUnit_Framework_TestCase {

    
    protected static function initMagento( array $options = array() )
    {

        
        
    }
    
    protected static function createClient()
    {

    }
    
    protected static function executeWebRequest( \Mage_Core_Controller_Request_Http $request)
    {

        \Mage::reset();
        $response = new Response();
        //$response = new \Zend_Controller_Response_HttpTestCase();
        $response->headersSentThrowsException = false;
        $options  = self::getDefaultMagentoOptions();
        $options['request']  = $request;

        $options['response'] = $response;

        /** code from \Mage::run('default','store', $options ); */
        $app = \Mage::app('default','store', $options);
        $app->setRequest($options['request']);
        $app->setResponse($options['response']);

        try{
            $app->run(array(
                'scope_code' => 'default',
                'scope_type' => 'store',
                'options'    => $options,
            ));
        }catch( ResponseSendException $e ){
            //$response = $e->getResponse();
        }

        return $response;
    }
    
    protected static function getDefaultMagentoOptions()
    {

        $mage_init_options = array(
            'var_dir' => __DIR__.'/var'
        );
        return $mage_init_options;
    }

    /**
     * Shuts Magent down if it was used in the test.
     */
    protected static function ensureMagentoShutdown()
    {
        if (null ) {
            static::$kernel->shutdown();
        }
    }

    /**
     * Clean up Magento usage in this test.
     */
    protected function tearDown()
    {
        static::ensureMagentoShutdown();
    }
} 