<?php
/**
 * 
 * 
 * 
 * 
 */

namespace WizardsFugue\Magento1_Tests\Web;


class ResponseSendException extends \Exception {
    
    protected $content;
    /**
     * @var \Mage_Core_Controller_Request_Http
     */
    protected $response;
    
    public function setContent($content)
    {
        $this->content = $content;
    }
    
    public function getContent()
    {
        return $this->content;
    }
    
    public function setResponse($response)
    {
        $this->response = $response;
    }

    /**
     * @return \Mage_Core_Controller_Request_Http
     */
    public function getResponse()
    {
        return $this->response;
    }

} 