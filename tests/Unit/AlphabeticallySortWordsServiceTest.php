<?php

namespace Tests\Unit;

use App\Services\AlphabeticallySortWordsService;
use Tests\TestCase;

class AlphabeticallySortWordsServiceTest extends TestCase
{

    /** @var AlphabeticallySortWordsService */
    protected $alphabeticallySortWordsService;

    public function setUp():void
    {
        parent::setUp();

        $this->alphabeticallySortWordsService = new AlphabeticallySortWordsService();
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testSortWords()
    {
        $response = $this->alphabeticallySortWordsService->sortWords("the brown fox");
        $this->assertEquals("brown fox the", $response);

        $response = $this->alphabeticallySortWordsService->sortWords("");
        $this->assertEquals("", $response);
    }
}
