<?php

/**
 * @author Samundra Shrestha <samundra.shr@gmail.com>
 * @filesource get_link.php
 * @date Oct 11, 2012 
 */
$url = $_POST['url'];
//$d = new Downloader('http://www.xvideos.com/video987839/black_sin_the_blondes_-_sharon_wild_sexy_blonde_loves_black_dick_3');


/**
 * Is there a function in PHP that can decode Unicode escape sequences like "\u00ed" to "í" and all other similar occurrences?
 * @see http://stackoverflow.com/questions/2934563/how-to-decode-unicode-escape-sequences-like-u00ed-to-proper-utf-8-encoded-cha 
 */


function replace_unicode_escape_sequence($match) {
    return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');
}

$str = preg_replace_callback('/\\\\u([0-9a-f]{4})/i', 'replace_unicode_escape_sequence', $url);

$decodedStr =  stripslashes(rawurldecode($str));
$string = '\/';
$decodedStr= str_replace($string, '/', $decodedStr);

$message = array();

if (isset($decodedStr)) {
  $message = array(
      'type' => 'success',
      'download_url' => $decodedStr,
  );
} else {
  $message = array(
      'type' => 'failure',
      'download_url' => 'Error retrieving the download link for the url. Please try again later',
  );
}

echo json_encode($message);
?>
