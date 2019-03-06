<?php

namespace Tests\Unit;

use App\Services\ParagraphService;
use App\Services\ReverseCharactersService;
use Tests\TestCase;

class ParagraphServiceTest extends TestCase
{

    /** @var ParagraphService */
    protected $paragraphService;

    public function setUp():void
    {
        parent::setUp();

        $this->paragraphService = new ParagraphService();
    }

    /**
     * @covers \App\Services\ParagraphService::reverseCharacters
     */
    public function testReverseCharacters()
    {
        $response = $this->paragraphService->reverseCharacters("the brown fox");
        $this->assertEquals("eht nworb xof", $response);

        $response = $this->paragraphService->reverseCharacters("");
        $this->assertEquals("", $response);
    }

    /**
     * @covers \App\Services\ParagraphService::reverseWord
     */
    public function testReverseWord()
    {
        $response = $this->paragraphService->reverseWord("the brown fox");
        $this->assertEquals("fox brown the", $response);

        $response = $this->paragraphService->reverseWord("");
        $this->assertEquals("", $response);
    }

    /**
     * @covers \App\Services\ParagraphService::sortWords
     */
    public function testSortWords()
    {
        $response = $this->paragraphService->sortWords("the brown fox");
        $this->assertEquals("brown fox the", $response);

        $response = $this->paragraphService->sortWords("");
        $this->assertEquals("", $response);
    }

}
