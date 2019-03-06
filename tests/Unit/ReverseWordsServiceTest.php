<?php

namespace Tests\Unit;

use App\Services\ReverseCharactersService;
use Tests\TestCase;

class ReverseWordsServiceTest extends TestCase
{

    /** @var ReverseCharactersService */
    protected $reverseCharactersService;

    public function setUp():void
    {
        parent::setUp();

        $this->reverseCharactersService = new ReverseCharactersService();
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testReverseCharacters()
    {
        $response = $this->reverseCharactersService->reverseCharacters("the brown fox");
        $this->assertEquals("eht nworb xof", $response);

        $response = $this->reverseCharactersService->reverseCharacters("");
        $this->assertEquals("", $response);
    }

}
