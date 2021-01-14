@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detail Account {{ $data['account']->name }}</div>

                <div class="card-body">
                    <div>
                        <form action="" class="">
                            <div class="form-group row">
                                <div class="col-md-6 mx-auto">
                                    <label for="">Currency</label>
                                    <select name="currency" id="" class="form-control">
                                        <option value="USD" @if($data['currency'] == "USD") selected @endif >US Dollar</option>
                                        <option value="JPY" @if($data['currency'] == "JPY") selected @endif >Japan Yen</option>
                                        <option value="IDR" @if($data['currency'] == "IDR") selected @endif >Indonesia Rupiah</option>
                                    </select>
                                </div>

                                <div class="col-md-12 mt-3">
                                    <button class="btn btn-sm btn-block btn-primary">Convert</button>
                                </div>
                            </div>
                        </form>
                    </div>

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
                                                {{ $data['currency'] }}
                                                @if (isset($transaction->amount))
                                                    {{number_format($transaction->amount * $data['currency_rate'])}}
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
                                                {{ $data['currency'] }}
                                                @if (isset($transaction->amount))
                                                    {{number_format($transaction->amount * $data['currency_rate'])}}
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
