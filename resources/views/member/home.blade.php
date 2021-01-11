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
                                        <a href="#" class="btn btn-sm btn-primary">Detail</a>
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
