<?php

namespace App\Services;

/**
 * Class ReverseWordService
 * @package App\Services
 */
class ReverseWordsService
{

    /**
     * @param string $paragraph
     *
     * @return string
     */
    public function reverseWord(string $paragraph)
    {
        $paragraph = $this->cleanUp($paragraph);

        if (empty($paragraph)) {
           return '';
        }

        $paragraphWords = explode(' ', $paragraph);
        $reverseWords = array_reverse($paragraphWords);

        return implode(' ', $reverseWords);
    }

    /**
     * @param $paragraph
     *
     * @return null|string|string[]
     */
    public function cleanUp($paragraph)
    {
        //replace all . with .+space
        $paragraph = preg_replace('/\./', '. ', $paragraph);

        // replace all spaces with single space
        $paragraph = preg_replace('!\s+!', ' ', $paragraph);

        return $paragraph;
    }
}