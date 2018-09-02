<?php

namespace Figures;

require_once 'interface.php';

class Circle implements Figure
{
    private $radius;
    
    public function __construct($rad)
    {
        $this->radius = $rad;
    }
    
    public function Area()
    {
        return 3.14 * pow($this->radius, 2);
    }
    
    public function Radius()
    {
        return $this->radius;
    }
}

?>