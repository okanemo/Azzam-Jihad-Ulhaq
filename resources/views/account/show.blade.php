@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detail Account {{ $data['account']->name }}</div>

                <div class="card-body">
                    <div class="row text-center">
                        <table class="table table-bordered">
                            <thead>
                                <th>Income</th>
                                <th>Expenses</th>
                            </thead>
                            <tbody>
                                @foreach ($data['transactions'] as $transaction)
                                    @if ($transaction->type == 1)
                                        <tr>
                                            <td>
                                                {{$data['account']->currency_desc->code}}
                                                @if (isset($transaction->amount))
                                                    {{number_format($transaction->amount)}}
                                                @else
                                                    {{number_format(0)}}
                                                @endif
                                            </td>
                                            <td>
                                                -
                                            </td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td>
                                                -
                                            </td>
                                            <td>
                                                {{$data['account']->currency_desc->code}}
                                                @if (isset($transaction->amount))
                                                    {{number_format($transaction->amount)}}
                                                @else
                                                    {{number_format(0)}}
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
