@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Account</div>

                <div class="card-body">
                    @component('utilities.notification')
                    @endcomponent
                    <form action="{{route('account.store')}}" class="form" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Account Name</label>
                            <input type="text" class="form-control" name="account_name">
                        </div>
                        <div class="form-group">
                            <label for="">Currency</label>
                            <select name="currency_code" class="form-control" required>
                                <option value="">Choose One</option>
                                <option value="JPY">JPY - Japan Yen</option>
                                <option value="USD">USD - US Dollar</option>
                                <option value="IDR">IDR - Indonesia Rupiah</option>
                            </select>
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
