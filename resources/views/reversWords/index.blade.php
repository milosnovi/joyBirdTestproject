@extends('layout.website')

@section('content')

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



@endsection