<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParagraphRequest;
use App\Services\ReverseWordsService;
use Illuminate\Http\Request;

class ParagraphController extends Controller
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
        $products = $this->reverseWordsService->reverseWord();

        return view('products.index', compact('products'));
    }

    /**
     * Display a listing of the resource.
     *
     * @param ParagraphRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function reverseWord(ParagraphRequest $request)
    {
        if(empty($product)) {
            throw new NotFoundHttpException('Product not found');
        }

        $this->buyProduct->buy($product);

        return redirect()->route('products.index');
    }
}
