<?php

require_once 'YouTubeVideoIdParsing.php';

$ytVideoIdParsingClass = new YouTubeVideoIdParsing();

// Number to encode.
$numberToEncode = 42;

// Encoding.
$encodedVideoId = $ytVideoIdParsingClass->encode($numberToEncode);

// Decoding.
$decodedVideoId = $ytVideoIdParsingClass->decode($encodedVideoId);

echo '<pre>';
var_dump(
    $encodedVideoId,
    $decodedVideoId,
);
