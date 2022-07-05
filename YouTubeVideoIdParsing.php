<?php

/**
 * Parsing and generating YouTube video ID.
 *
 * @copyright Copyright (©) 2022 Nikola Nikolić (https://github.com/nikolangit)
 * @author    Nikola Nikolić <rogers94kv@gmail.com>
 * @link      https://nikolangit.github.io
 */
class YouTubeVideoIdParsing
{

    /**
     * YouTube hash characters.
     *
     * @var array
     */
    private $chars = [
        '0', '1', '2', '3', '4', '5', '6', '7', '8', '9',
        'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
        'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
        '_', '-',
    ];

    /**
     * Number of YouTube's hash characters.
     *
     * @var integer
     */
    private $charsLen = 0;

    public function __construct()
    {
        $this->charsLen = count($this->chars);
    }

    /**
     * It encodes number to the YouTube's video key.
     *
     * @author Nikola Nikolić <rogers94kv@gmail.com>
     * @param  int    $num Number to be encoded.
     * @return string      Video key.
     */
    public function encode(int $num)
    {
        $ret = '';

        $num = abs($num);
        if (!$num) {
            return '0';
        }

        while ($num > 0) {
            $char = $this->chars[$num % $this->charsLen];
            $num  = $num / $this->charsLen | 0;

            $ret = $char . $ret;
        }

        return $ret;
    }

    /**
     * It decodes YouTube's video key.
     *
     * @author Nikola Nikolić <rogers94kv@gmail.com>
     * @param  string $str Video key to be converted.
     * @return int         Video key's number.
     */
    public function decode(string $str)
    {
        $ret = 0;

        $strLen  = strlen($str) - 1;
        $counter = 0;

        while ($counter <= $strLen) {
            $char         = $str[$counter];
            $charIndex    = array_search($char, $this->chars);
            $charPosition = $strLen - $counter;

            $ret += ($charIndex * pow($this->charsLen, $charPosition));
            $counter++;
        }

        return $ret;
    }

}
