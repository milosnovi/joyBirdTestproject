@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $name }}</div>

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

                        @isset($result)
                            <div class="alert alert-success" role="alert">
                                <strong>Result: </strong> {{ $result }}
                            </div>
                        @endisset

                        <div class="row">
                            <div class="col-12">
                                {{ Form::open(array('route' => $submitAction)) }}

                                <div class="form-group">
                                    {{ Form::label("Paragraph", null, ['class' => 'control-label']) }}
                                    {{ Form::textarea('paragraph', (!empty($paragraph) ? $paragraph : null),
                                    ['class' => 'form-control']) }}
                                </div>

                                {{Form::submit('Submit Form', ['class' => 'btn btn-primary'])}}
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
