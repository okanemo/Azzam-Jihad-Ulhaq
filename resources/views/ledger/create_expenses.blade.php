@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Expenses</div>

                <div class="card-body">
                    @component('utilities.notification')
                    @endcomponent
                    <form action="{{route('ledger.store_expenses')}}" class="form" method="POST">
                        @csrf
                        <input type="hidden" name="account_id" value="{{$data['account_id']}}">

                        <div class="form-group">
                            <label for="">Transaction Name</label>
                            <input type="text" class="form-control" name="transaction_name">
                        </div>

                        <div class="form-group">
                            <label for="">Amount</label>
                            <input type="text" class="form-control" name="amount">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-sm btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
