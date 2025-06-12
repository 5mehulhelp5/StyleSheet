<?php
namespace Cytracon\StyleSheet\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    const XML_PATH_CSS = 'cytracon_stylesheet/general/custom_css';

    public function getCustomCss(): string
    {
        return (string) $this->scopeConfig->getValue(self::XML_PATH_CSS, ScopeInterface::SCOPE_STORE);
    }

    public function minifyCss(string $css): string
    {
        // Simples Regex-basiertes Minify
        $css = preg_replace('!/\*.*?\*/!s', '', $css);      // Kommentare entfernen
        $css = preg_replace('/\s+/', ' ', $css);            // Mehrere Whitespaces auf einen reduzieren
        $css = preg_replace('/ ?([,:;{}]) ?/', '$1', $css); // Spaces um : ; , { } entfernen
        return trim($css);
    }
}
