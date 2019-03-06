@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Amortization table</div>

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

                        {{ Form::open(['route' => 'amortization.calculate']) }}

                        <div class="form-group">
                            {{ Form::label("Loan Amount", null, ['class' => 'control-label']) }}
                            {{ Form::text('loan', (!empty($form_data['loan']) ? $form_data['loan'] : null), ['class'=>'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label("Loan terms", null, ['class' => 'control-label']) }}
                            {{ Form::text('loan_terms', (!empty($form_data['loan_terms']) ? $form_data['loan_terms'] : null), ['class'=>'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label("Interest rate (%)", null, ['class' => 'control-label']) }}
                            {{ Form::text('interest_rate',  (!empty($form_data['interest_rate']) ? $form_data['interest_rate'] : null), ['class'=>'form-control']) }}
                        </div>


                        {{Form::submit('Submit Form', ['class' => 'btn btn-primary'])}}

                        {{ Form::close() }}

                        @isset($interest_table)
                            <div class="row mt-4">
                                <div class="col-12">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th class="th-sm">Index
                                                <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                            </th>
                                            <th class="th-sm">Payment
                                                <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                            </th>
                                            <th class="th-sm">Principal
                                                <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                            </th>
                                            <th class="th-sm">Interest
                                                <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                            </th>
                                            <th class="th-sm">Balance
                                                <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($interest_table as $index => $interest)
                                            <tr>
                                                <td>{{++$index}}</td>
                                                <td>{{ $interest['pmt']}}</td>
                                                <td>{{ $interest['ppmt']}}</td>
                                                <td>{{ $interest['interest']}}</td>
                                                <td>{{ $interest['balance']}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

