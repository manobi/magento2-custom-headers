<?php
namespace Manobi\CustomHeaders\Model;

use \Magento\Framework\App\Response\Http;

class CustomHeader extends \Magento\Framework\App\Response\HeaderProvider\AbstractHeaderProvider
{
    /**
     * Custom HTTP header name
     *
     * @var string
     */
    protected $headerName;

    /**
     * Custom HTTP header value
     *
     * @var string
     */
    protected $headerValue;

    /**
     * @param string $xFrameOpt
     * @param string $xFrameOpt
     */
    public function __construct($headerName, $headerValue)
    {
        $this->headerName = $headerName;
        $this->headerValue = $headerValue;
    }
}
