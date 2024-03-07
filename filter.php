<!--
    filter function for catalogue.php
-->

<?php
function filter(array $array, $name, $value) {                                              # removes items from array that do not match the filter values
    if ($value == null) {
        return $array;
    }
    
    if ($name == "title") {
        for ($i = 0; $i < sizeof($array); $i++) {
            $info = file("./books/$array[$i]/info.txt"); 
            if (!str_contains(strtolower($array[$i]), strtolower($value))) {
                array_splice($array, $i, 1);
                $i--;
            }
        }
    }
    if ($name == "author") {
        for ($i = 0; $i < sizeof($array); $i++) {
            $info = file("./books/$array[$i]/info.txt"); 
            if (!str_contains(strtolower($info[1]), strtolower($value))) {
                array_splice($array, $i, 1);
                $i--;
            }
        }
    }
    if ($name == "genre") {
        for ($i = 0; $i < sizeof($array); $i++) {
            $info = file("./books/$array[$i]/info.txt"); 
            if (trim($info[2]) != $value) {
                array_splice($array, $i, 1);
                $i--;
            }
        }
    }
    if ($name == "min") {
        for ($i = 0; $i < sizeof($array); $i++) {
            $info = file("./books/$array[$i]/info.txt"); 
            if ($info[5] < $value) {
                array_splice($array, $i, 1);
                $i--;
            }
        }
    }
    if ($name == "max") {
        for ($i = 0; $i < sizeof($array); $i++) {
            $info = file("./books/$array[$i]/info.txt"); 
            if ($info[5] > $value) {
                array_splice($array, $i, 1);
                $i--;
            }
        }
    }
    return $array;
}

?>