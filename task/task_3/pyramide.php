<?php

namespace Figures;

require_once 'interface.php';

class Pyramide implements Figure
{
    private $height;
    private $apofema;
    private $lengthBaseSide;                      //длина стороны основаниии
    private $quanityBase;                         //количество сторон основания
    
    public function __construct($hei, $apo, $len, $qua)
    {
        $this->height = $hei;
        $this->apofema = $apo;
        $this->lengthBaseSide = $len;
        $this->quanityBase = $qua;
    }
    
    public function Area()
    {
        return 0;
    }
    
    public function Height()
    {
        return $this->height;
    }
    
    public function Apofema()
    {
        return $this->apofema;
    }
    
    public function Length()
    {
        return $this->lengthBaseSide;
    }
    
    public function Quanity()
    {
        return $this->quanityBase;
    }
}

?>