<?php

namespace App\Services;

use App\Utils\StringUtils;

/**
 * Class ReverseCharactersService
 * @package App\Services
 */
class ParagraphService
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
            $word = StringUtils::reverseChars($word);
        }

        return implode(' ', $paragraphWords);
    }

    /**
     * @param string $paragraph
     *
     * @return string
     */
    public function reverseWord(string $paragraph)
    {
        $paragraph = StringUtils::cleanUp($paragraph);

        if (empty($paragraph)) {
            return '';
        }

        return StringUtils::reverseWords($paragraph);
    }

    /**
     * @param string $paragraph
     *
     * @return string
     */
    public function sortWords(string $paragraph)
    {
        if (empty($paragraph)) {
            return '';
        }

        $paragraphWords = explode(' ', $paragraph);
        sort($paragraphWords);

        return implode(' ', $paragraphWords);
    }

    /**
     * @param string $paragraph
     * @param string $encryption
     *
     * @return string
     */
    public function encrypt(string $paragraph, $encryption = "sha384")
    {
        return hash($encryption, $paragraph);
    }

}