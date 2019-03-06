<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParagraphRequest;
use App\Services\ParagraphService;

class ParagraphController extends Controller
{
    /**
     * @var ParagraphService
     */
    private $paragraphService;

    public function __construct(ParagraphService $paragraphService)
    {
        $this->paragraphService = $paragraphService;
    }

    /**
     * Display a Form for reversing words.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'paragraph.index',
            [
                'submitAction' => 'paragraph.reverse_words',
                'name' => 'Reverse Words'
            ]
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @param ParagraphRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function reversWords(ParagraphRequest $request)
    {
        $reversed = $this->paragraphService->reverseWord($request->get('paragraph'));

        return view(
            'paragraph.index',
            [
                'result'       => $reversed,
                'paragraph'    => $request->get('paragraph'),
                'submitAction' => 'paragraph.reverse_chars_index',
                'name' => 'Reverse Words'
            ]
        );
    }

    /**
     * Display a Form for reversing chards but maintaing word order
     *
     * @return \Illuminate\Http\Response
     */
    public function showReversChars()
    {
        return view(
            'paragraph.index',
            [
                'submitAction' => 'paragraph.reverse_chars_index',
                'name' => 'Revers Chars'
            ]
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @param ParagraphRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function reversChars(ParagraphRequest $request)
    {
        $reversed = $this->paragraphService->reverseCharacters($request->get('paragraph'));

        return view(
            'paragraph.index',
            [
                'result'       => $reversed,
                'paragraph'    => $request->get('paragraph'),
                'submitAction' => 'paragraph.reverse_chars_index',
                'name' => 'Revers Chars'
            ]
        );
    }


    /**
     * Display a Form for alphabetically sort words in paragraph
     *
     * @return \Illuminate\Http\Response
     */
    public function showSortAlphabet()
    {
        return view(
            'paragraph.index',
            [
                'submitAction' => 'paragraph.reverse_sort_index',
                'name' => 'Sort'
            ]
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @param ParagraphRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function sortAlphabet(ParagraphRequest $request)
    {
        $reversed = $this->paragraphService->sortWords($request->get('paragraph'));

        return view(
            'paragraph.index',
            [
                'result'       => $reversed,
                'paragraph'    => $request->get('paragraph'),
                'submitAction' => 'paragraph.reverse_sort_index',
                'name' => 'Sort'
            ]
        );
    }

    /**
     * Display a Form for encrypt sort words in paragraph
     *
     * @return \Illuminate\Http\Response
     */
    public function showEncrypt()
    {
        return view(
            'paragraph.index',
            [
                'submitAction' => 'paragraph.encrypt_index',
                'name' => 'Encrypt SHA-384'
            ]
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @param ParagraphRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function encrypt(ParagraphRequest $request)
    {
        $encrypt = $this->paragraphService->encrypt($request->get('paragraph'));

        return view(
            'paragraph.index',
            [
                'result'       => $encrypt,
                'paragraph'    => $request->get('paragraph'),
                'submitAction' => 'paragraph.encrypt_index',
                'name' => 'Encrypt SHA-384'
            ]
        );
    }
}
