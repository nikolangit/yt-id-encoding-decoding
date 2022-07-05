# YouTube video ID encoding/decoding

Class used for encoding and decoding YouTube's video ID.

## Usage

~~~php
$ytVideoIdParsingClass = new YouTubeVideoIdParsing();

// Encoding.
$encodedVideoId = $ytVideoIdParsingClass->encode($valueToEncode);

// Decoding.
$decodedVideoId = $ytVideoIdParsingClass->decode($valueToDecode);
~~~
