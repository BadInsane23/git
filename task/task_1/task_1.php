
<?php
$a = array();

for ($i = 1; $i < 65; $i++) {
    if ($i == 1 or $i == 2){
        $a[$i] = '1';
    } else {
        $a[$i] = bcadd($a[$i-1], $a[$i-2]);   
    }
    echo($i."\t".$a[$i]."<br>");    
}
?>
