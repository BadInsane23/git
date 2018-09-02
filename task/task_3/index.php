<?php

require_once 'circle.php';
require_once 'rectangle.php';
require_once 'pyramide.php';

use Figures\Rectangle;
use Figures\Circle;
use Figures\Pyramide;


$arrFigure = array();
$arrType = array();
$arrArea = array();
echo "<br> Коллекция фигур<br>";
for($i = 0; $i < 20; $i++)
{
    $type = random_int( 1, 3);
    
    switch($type){
        
        case 1:
            $rad = random_int(1, 20);
            $arrFigure[$i] = new Circle($rad);
            $arrType[$i] = $type;
            $arrArea[$i] = $arrFigure[$i]->Area();
            echo $i."\t Круг с радиусом -".$rad."\t"."Площадь -".$arrArea[$i]."<br>";
            break;
        
        case 2:
            $len = random_int(1, 30);
            $wid = random_int(1, 30);
            $arrType[$i] = $type;
            $arrFigure[$i] = new Rectangle($len, $wid);
            $arrArea[$i] = $arrFigure[$i]->Area();
            echo $i."\t Прямоугольник со сторонами - ".$len.",".$wid."\t"."Площадь -".$arrArea[$i]."<br>";
            break;
            
        case 3:
            $hei = random_int(1, 30);
            $apo = random_int(1, 30);
            $len = random_int(1, 30);
            $qua = random_int(1, 6);
            $arrFigure[$i] = new Pyramide($hei, $apo, $len, $qua);
            $arrArea[$i] = $arrFigure[$i]->Area();
            $arrType[$i] = $type;
            echo $i;
            echo "\t Пирамида с высотой - ".$hei." , апофемой - ".$apo;
            echo " , длиной стороны основания - ".$len." , количеством сторон - ".$qua;
            echo "\t"."Площадь - ".$arrArea[$i]."<br>";
            break;
    }
}

for($i = 0; $i < 20; $i++)
{
    for($j = 19; $j > $i ; $j--)
    {
        if($arrArea[$j-1] < $arrArea [$j]) {
            $ff = $arrFigure[$j - 1];
            $arrFigure[$j - 1] = $arrFigure[$j];
            $arrFigure[$j] = $ff;
            $fType = $arrType[$j - 1];
            $arrType[$j - 1] = $arrType[$j];
            $arrType[$j] = $fType;
            $fa = $arrArea[$j - 1];
            $arrArea[$j - 1] = $arrArea[$j];
            $arrArea[$j] = $fa;
        }
        
    }
}

echo "<br>Площадь фигур в порядке убывания <br>";

for($i = 0; $i < 20; $i++)
{
    echo $arrArea[$i]."<br>";
}
$file = "newArray.txt";
$data = "";
for($i = 0; $i < 20; $i++)
{
    $stringType = strval($arrType[$i]);
    $data = $data.$stringType."-";
    $arrObj = array();
    switch($arrType[$i]){
        case 1:
            $arrObj[0] = $arrFigure[$i]->Radius();
            break;
        
        case 2:
            $arrObj[0] = $arrFigure[$i]->Length();
            $arrObj[1] = $arrFigure[$i]->Width();
            break;
                       
        case 3:
            $arrObj[0] = $arrFigure[$i]->Height();
            $arrObj[1] = $arrFigure[$i]->Apofema();
            $arrObj[2] = $arrFigure[$i]->Length();
            $arrObj[3] = $arrFigure[$i]->Quanity();
            break;
    }
    $stringFigure = implode (",", $arrObj);
    $data = $data.$stringFigure."|";
}
file_put_contents($file, $data);



$collection = file_get_contents($file);
$stringObjects = explode("|", $collection);
echo "<br>Отсортированная, записанная и прочтенная из файла коллекция<br><br>";
for ($i = 0; $i < 20; $i++)
{
    $stringTypeAndObjects = explode("-",$stringObjects[$i]);
    $newTypeArr[$i] = intval ($stringTypeAndObjects[0]);
    $stringProperties = explode(",",$stringTypeAndObjects[1]);
 
    switch($newTypeArr[$i]){
        case 1:
            $newFiguresArr[$i] = new Circle(intval($stringProperties[0]));
            echo "Круг с радиусом - ".$newFiguresArr[$i]->Radius()."\t"."Площадь - ".$newFiguresArr[$i]->Area()."<br>";
            break;
            
        case 2:
            $newFiguresArr[$i] = new Rectangle(intval($stringProperties[0]),intval($stringProperties[1]));
            echo "Прямоугольник со сторонами - ".$newFiguresArr[$i]->Length().",".$newFiguresArr[$i]->Width()."\t"."Площадь - ".$newFiguresArr[$i]->Area()."<br>";
            break;
        
        case 3:
            $newFiguresArr[$i] = new Pyramide(intval($stringProperties[0]),intval($stringProperties[1]),intval($stringProperties[2]),intval($stringProperties[3]));
            echo "Пирамида с высотой - ".$newFiguresArr[$i]->Height()." , апофемой - ".$newFiguresArr[$i]->Apofema();
            echo " , длиной стороны основания - ".$newFiguresArr[$i]->Length()." , количеством сторон - ".$newFiguresArr[$i]->Quanity();
            echo "\t"."Площадь - ".$newFiguresArr[$i]->Area()."<br>";
            break;
    }
        
}

?>