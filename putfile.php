<?php

function clearNewStrings($b1) {
    $b1 = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $b1);
    $b1 = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $b1);
    return $b1;
}

function getFile($url){
	$file = $url;
	return file_get_contents($file);
}

function getTpl($tpl){
	ob_start(); 

	require_once('tplfile.php');

	$content = ob_get_contents();

	ob_clean();

	return clearNewStrings($content);
}

function setFile($file, $current,$newContent){
	$current .= $newContent . "\n";

	file_put_contents($file, $current);
}


// -- FileSetter

$current = getFile('./people.txt');
$newContent = getTpl('./tplfile.php');
setFile('./people.txt', $current,$newContent);
