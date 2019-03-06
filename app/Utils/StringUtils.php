<?php

namespace App\Utils;

/**
 * Class StringUtils
 * @package App\Utils
 */
class StringUtils
{

    /**
     * @param $paragraph
     *
     * @return null|string|string[]
     */
    public static function cleanUp($paragraph)
    {
        //replace all . with .+space
        $paragraph = preg_replace('/\./', ' . ', $paragraph);

        // replace all spaces with single space
        $paragraph = preg_replace('!\s+!', ' ', $paragraph);

        return $paragraph;
    }

    /**
     * @param $word
     *
     * @return null|string|string[]
     */
    public static function reverseChars($word)
    {
        if (empty($word)) {
            return '';
        }

        return strrev($word);
    }

    /**
     * @param $string
     *
     * @return string
     */
    public static function reverseWords($string)
    {
        $paragraphWords = explode(' ', $string);
        $reverseWords = array_reverse($paragraphWords);

        return implode(' ', $reverseWords);
    }
}
