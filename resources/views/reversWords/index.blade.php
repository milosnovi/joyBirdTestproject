@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{ Form::open(array('route' => 'paragraph.index')) }}

    {{ Form::label("Paragraph", null, ['class' => 'control-label']) }}
    {{ Form::textarea('paragraph', (!empty($paragraph) ? $paragraph : null), ['class'=>'form-control']) }}

    {{Form::submit('Submit Form')}}

    {{ Form::close() }}

    @isset($result)
        <h1>Result:</h1>
        <h2>{{ $result }}</h2>
    @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
