@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Homepage</div>

                    <div class="card-body">
                        <ul>
                            <li>
                                <a href="{{ route('paragraph.reverse_words_index') }}">Reverse Words</a>
                            </li>
                            <li>
                                <a href="{{ route('paragraph.reverse_chars_index') }}">Reverse Chars</a>
                            </li>
                            <li>
                                <a href="{{ route('paragraph.reverse_sort_index') }}">Sort words</a>
                            </li>
                            <li>
                                <a href="{{ route('paragraph.encrypt_index') }}">Encrypt SHA-384 words</a>
                            </li>
                            <li>
                                <a href="{{ route('amortization.index') }}">Amortization table</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
