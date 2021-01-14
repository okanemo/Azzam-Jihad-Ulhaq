@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Hi {{auth::user()->name}}, you are logged in!

                </div>
            </div>

            <div class="card mt-5">
                <div class="card-header">Moneytory</div>
                <div class="card-body">

                    <div>
                        <form action="" class="">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="">Start date</label>
                                    <input type="date" name="start_date" class="form-control" value="{{$data['start_date']}}">
                                </div>

                                <div class="col-md-6">
                                    <label for="">End date</label>
                                    <input type="date" name="end_date" class="form-control" value="{{$data['end_date']}}">
                                </div>

                                <div class="col-md-12 mt-3">
                                    <button class="btn btn-sm btn-block btn-primary">Filter</button>
                                    <a href="{{ route('home') }}" class="btn btn-sm btn-block btn-danger">Delete Filter</a>
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
                                <tr>
                                    <td>
                                        IDR
                                        @if (isset($data['income']['IDR']))
                                            {{number_format($data['income']['IDR'])}}
                                        @else
                                            {{number_format(0)}}
                                        @endif
                                    </td>
                                    <td>
                                        IDR
                                        @if (isset($data['expenses']['IDR']))
                                            {{number_format($data['expenses']['IDR'])}}
                                        @else
                                            {{number_format(0)}}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        JPY
                                        @if (isset($data['income']['JPY']))
                                            {{number_format($data['income']['JPY'])}}
                                        @else
                                            {{number_format(0)}}
                                        @endif
                                    </td>
                                    <td>
                                        JPY
                                        @if (isset($data['expenses']['JPY']))
                                            {{number_format($data['expenses']['JPY'])}}
                                        @else
                                            {{number_format(0)}}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        USD
                                        @if (isset($data['income']['USD']))
                                            {{number_format($data['income']['USD'])}}
                                        @else
                                            {{number_format(0)}}
                                        @endif
                                    </td>
                                    <td>
                                        USD
                                        @if (isset($data['expenses']['USD']))
                                            {{number_format($data['expenses']['USD'])}}
                                        @else
                                            {{number_format(0)}}
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card mt-5">
                <div class="card-header">Your Accounts <a href="{{route('account.create')}}" class="float-right btn btn-sm btn-primary">New Account</a></div>
                <div class="card-body">
                    @component('utilities.notification')
                    @endcomponent
                    <div class="row">
                        @foreach ($accounts as $account)
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$account->name}}</h5>
                                        <p class="card-text">{{$account->currency_code}} - {{$account->currency_desc->description}}</p>
                                        {{-- {{$account->income()}} --}}
                                        <a href="{{route('account.show', $account->id)}}" class="btn btn-sm btn-primary">Detail</a>
                                        <a href="{{route('ledger.create_income', $account->id)}}" class="btn btn-sm btn-success">Income</a>
                                        <a href="{{route('ledger.create_expenses', $account->id)}}" class="btn btn-sm btn-danger">Expenses</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
