<?php
//function for reading a file name
function readDictionaryFile($fileName) {
    $words = [];
    $stream = fopen($fileName, "r") or die("Unable to open file!");
    while(($line=fgets($stream)) !== false) {
        $word = preg_replace("/[^A-Za-z]/", '', $line);
        array_push($words, $word);
    }
    sort($words);
    print_r($words);
    return $words;
}
