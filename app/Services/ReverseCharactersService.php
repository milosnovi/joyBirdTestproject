<?php

namespace App\Services;

/**
 * Class ReverseCharactersService
 * @package App\Services
 */
class ReverseCharactersService
{

    /**
     * @param string $paragraph
     *
     * @return string
     */
    public function reverseCharacters(string $paragraph)
    {
        $paragraphWords = explode(' ', $paragraph);

        if (empty($paragraphWords)) {
            return '';
        }

        foreach($paragraphWords as $index => &$word) {
            $word = $this->reversChars($word);
        }

        return implode(' ', $paragraphWords);
    }

    /**
     * @param $word
     *
     * @return null|string|string[]
     */
    public function reversChars($word)
    {
        if (empty($word)) {
           return '';
        }

        return strrev($word);
    }
}