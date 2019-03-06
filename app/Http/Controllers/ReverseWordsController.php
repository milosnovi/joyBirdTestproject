<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParagraphRequest;
use App\Services\ReverseWordsService;
use Illuminate\Http\Request;

class ReverseWordsController extends Controller
{

    /**
     * @var ReverseWordsService
     */
    private $reverseWordsService;

    public function __construct(ReverseWordsService $reverseWordsService)
    {
        $this->reverseWordsService = $reverseWordsService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reversWords.index', []);
    }

    /**
     * Display a listing of the resource.
     *
     * @param ParagraphRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function revers(ParagraphRequest $request)
    {
        $reversed = $this->reverseWordsService->reverseWord($request->get('paragraph'));

        return view('reversWords.index', ['result' => $reversed, 'paragraph' => $request->get('paragraph')]);
    }
}
