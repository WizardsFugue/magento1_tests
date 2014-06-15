<?php
/**
 * 
 * 
 * 
 */

namespace WizardsFugue\Magento1_Tests\Web;


class Request extends \Mage_Core_Controller_Request_Http{
    
    protected $serverOverwrites = array();
    
    public function setServer( $key, $value)
    {
        $this->serverOverwrites[$key] = $value;
    }



    /**
     * Retrieve HTTP HOST
     *
     * @param bool $trimPort
     * @return string
     */
    public function getHttpHost($trimPort = true)
    {
        if( isset($this->serverOverwrites['HTTP_HOST']) ){
            $httpHost = $this->serverOverwrites['HTTP_HOST'];
        }else{
            if (!isset($_SERVER['HTTP_HOST'])) {
                return false;
            }
            $httpHost = $_SERVER['HTTP_HOST'];
        }
        
        if ($trimPort) {
            $host = explode(':', $httpHost);
            return $host[0];
        }
        return $httpHost;
    }
    
} 
