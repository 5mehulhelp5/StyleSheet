<?php
namespace Cytracon\StyleSheet\Block;

use Magento\Framework\View\Element\Template;
use Cytracon\StyleSheet\Helper\Data as Helper;

class Style extends Template
{
    protected $helper;

    public function __construct(
        Template\Context $context,
        Helper $helper,
        array $data = []
    ) {
        $this->helper = $helper;
        parent::__construct($context, $data);
    }

    public function getMinifiedCss()
    {
        $css = $this->helper->getCustomCss();
        return $this->helper->minifyCss($css);
    }
}
