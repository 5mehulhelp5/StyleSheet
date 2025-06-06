<?php
namespace Cytracon\StyleSheet\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    const XML_PATH_CSS = 'cytracon_stylesheet/general/custom_css';

    public function getCustomCss()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_CSS, ScopeInterface::SCOPE_STORE);
    }

    public function minifyCss($css)
    {
        // Simples Regex-basiertes Minify
        $css = preg_replace('!/\*.*?\*/!s', '', $css);      // Kommentare entfernen
        $css = preg_replace('/
\s*
/', "\n", $css);       // Mehrere Leerzeilen auf eine reduzieren
        $css = preg_replace('/[\n\r \t]/', '', $css);       // Whitespace entfernen
        $css = preg_replace('/ +/', ' ', $css);
        $css = preg_replace('/ ?([,:;{}]) ?/', '$1', $css); // Spaces um : ; , { } entfernen
        return trim($css);
    }
}
