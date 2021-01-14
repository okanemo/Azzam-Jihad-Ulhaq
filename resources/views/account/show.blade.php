@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detail Account {{ $data['account']->name }}</div>

                <div class="card-body">
                    {{-- <div>
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
                    </div> --}}

                    <div>
                        <form action="{{ route('account.transfer') }}" class="" method="POST">
                            @csrf
                            <input type="hidden" name="account_from" value="{{ $data['account']->id }}">
                            <input type="hidden" name="currency" value="{{$data['currency_rate']}}">

                            <div class="form-group row">
                                <div class="col-md-8 mx-auto">
                                    <div class="form-group">
                                        <label for="">Transfer To</label>
                                        <select name="account_destination" id="" class="form-control">
                                            @foreach ($data['accounts'] as $account)
                                                <option value="{{$account->id}}">{{$account->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Amount ({{ $data['currency'] }})</label>
                                        <input type="text" name="transfer_amount" class="form-control" id="amount" onchange="getAmount()">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Rate</label>
                                        <input type="text" name="currency_rate" class="form-control" id="rate" onchange="getRate()">
                                    </div>

                                    <div>
                                        <input type="text" id="result" class="form-control" disabled>
                                    </div>

                                    <script>
                                        let amount = 0
                                        let rate = 0

                                        function getAmount () {
                                            amount = document.getElementById('amount').value
                                            setResult (amount, rate)
                                        }

                                        function getRate () {
                                            rate = document.getElementById('rate').value
                                            setResult (amount, rate)
                                        }

                                        function setResult (amount, rate) {
                                            document.getElementById('result').value = amount * rate
                                        }

                                    </script>

                                </div>

                                <div class="col-md-8 mx-auto mt-3">
                                    <button class="btn btn-sm btn-block btn-primary">Transfer</button>
                                </div>
                            </div>

                        </form>
                    </div>

                    <div class="row text-center">
                        <table class="table table-bordered">
                            <thead>
                                <th>Transaction</th>
                                <th>Income</th>
                                <th>Expenses</th>
                            </thead>
                            <tbody>
                                @foreach ($data['transactions'] as $transaction)
                                    @if ($transaction->type == 1)
                                        <tr>
                                            <td>
                                                {{$transaction->transaction_name}}
                                            </td>
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
                                                {{$transaction->transaction_name}}
                                            </td>
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
