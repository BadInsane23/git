<?php

namespace Figures;

require_once 'interface.php';

class Rectangle implements Figure
{
    private $length;
    private $width;
    
    public function __construct($len, $wid)
    {
        $this->length = $len;
        $this->width = $wid;
    }
    
    public function Area()
    {
        return $this->length * $this->width;
    }
    
    public function Length()
    {
        return $this->length;
    }
    
    public function Width()
    {
        return $this->width;
    }
}

?>