<?php

namespace App\Services;

/**
 * Class AlphabeticallySortWordsService
 * @package App\Services
 */
class AlphabeticallySortWordsService
{

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

        asort($paragraphWords);

        return implode(' ', $paragraphWords);
    }
}